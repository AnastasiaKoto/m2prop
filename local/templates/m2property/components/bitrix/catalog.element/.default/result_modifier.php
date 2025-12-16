<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
CModule::IncludeModule("iblock");

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
Loader::includeModule('highloadblock');

$arResult['CURRENCIES'] = [];
$arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'] = [];
$arResult['PROPERTIES']['PLACES']['VALUE_ELEM'] = [];

function getHlData($hlId) {
    $hlBlock = HighloadBlockTable::getById($hlId)->fetch();
    if ($hlBlock) {
        $entity = HighloadBlockTable::compileEntity($hlBlock);
        return $entity->getDataClass();
    }
}

//валюты
$entityCurClass = getHlData(CUR_HLBLOCK_ID);
$curResult = $entityCurClass::getList([
    'select' => ['ID', 'UF_CHAR', 'UF_CUR', 'UF_NAME'],
    'order' => ['ID' => 'ASC']
]);
while ($item = $curResult->fetch()) {
    $arResult['CURRENCIES'][] = $item;
}

//особенности
if(!empty($arResult['PROPERTIES']['FEATURES']['VALUE'])) {
    $entityFeaturesClass = getHlData(1);
    $featuresResult = $entityFeaturesClass::getList([
        'select' => ['ID', 'UF_FILE', 'UF_FULL_DESCRIPTION', 'UF_DESCRIPTION', 'UF_NAME', 'UF_SORT'],
        'filter' => [
            'UF_XML_ID' => $arResult['PROPERTIES']['FEATURES']['VALUE']
        ],
        'order' => ['UF_SORT' => 'ASC']
    ]);
    while ($item = $featuresResult->fetch()) {
        $item['UF_FILE'] = CFile::GetPath($item['UF_FILE']);
        $arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'][] = $item;
    }
}

//планировки квартир
if(!empty($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE'])) {
    $entityApartmentsClass = getHlData(2);
    $apartmentsResult = $entityApartmentsClass::getList([
        'select' => ['ID', 'UF_TYPE', 'UF_VARIANTS', 'UF_SQUARE', 'UF_PRICE', 'UF_ROOMS', 'UF_FILE', 'UF_DEF', 'UF_DESCRIPTION', 'UF_SORT', 'UF_NAME'],
        'filter' => [
            'UF_XML_ID' => $arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE']
        ],
        'order' => ['UF_ROOMS' => 'ASC']
    ]);
    while ($item = $apartmentsResult->fetch()) {
        $item['UF_FILE'] = CFile::GetPath($item['UF_FILE']);
        $arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'][] = $item;
    }
}

//места поблизости
if(!empty($arResult['PROPERTIES']['PLACES']['VALUE'])) {
    $entityPlacesClass = getHlData(3);
    $placesResult = $entityPlacesClass::getList([
        'select' => ['ID', 'UF_FILE', 'UF_FULL_DESCRIPTION', 'UF_DESCRIPTION', 'UF_SORT', 'UF_NAME', 'UF_SHOWED_NAME'],
        'filter' => [
            'UF_XML_ID' => $arResult['PROPERTIES']['PLACES']['VALUE']
        ],
        'order' => ['UF_SORT' => 'ASC']
    ]);
    while ($item = $placesResult->fetch()) {
        $item['UF_FILE'] = CFile::GetPath($item['UF_FILE']);
        $arResult['PROPERTIES']['PLACES']['VALUE_ELEM'][] = $item;
    }
}

//о комплексе
if (!empty($arResult['PROPERTIES']['COMPLEX']['VALUE'])):
    $arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'] = [];
    
    $dbItems = CIBlockElement::GetList(
        ["SORT" => "ASC", "NAME" => "ASC"],
        [
            "IBLOCK_ID" => 6,
            "ACTIVE" => "Y",
            "SECTION_ID" => $arResult['PROPERTIES']['COMPLEX']['VALUE'],
            "INCLUDE_SUBSECTIONS" => "N",
        ],
        false,
        false,
        [
            "ID",
            "NAME", 
            "PREVIEW_TEXT",
            "PROPERTY_GALLERY"
        ]
    );
    
    while ($element = $dbItems->GetNext()) {
        
        if (!empty($element['PROPERTY_GALLERY_VALUE'])) {
            $element['GALLERY'] = [];
            $galleryIds = is_array($element['PROPERTY_GALLERY_VALUE']) 
                ? $element['PROPERTY_GALLERY_VALUE'] 
                : [$element['PROPERTY_GALLERY_VALUE']];
            
            foreach ($galleryIds as $fileId) {
                if ($fileId > 0) {
                    $element['GALLERY'][] = CFile::GetPath($fileId);
                }
            }
        }
        
        $arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'][] = $element;
    }
endif;

// for component_epilog
$cp = $this->__component;

if (is_object($cp)) {
    $cp->arResult['NEW_PRICE_VALUE'] = $arResult['PROPERTIES']['NEW_PRICE']['VALUE'];
    $cp->arResult['OBJECT_AREA_VALUE'] = $arResult['PROPERTIES']['OBJECT_AREA']['VALUE'];
    $cp->SetResultCacheKeys([
        'NEW_PRICE_VALUE',
        'OBJECT_AREA_VALUE'
    ]);
}