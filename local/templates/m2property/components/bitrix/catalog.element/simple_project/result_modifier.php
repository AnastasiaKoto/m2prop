<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
Loader::includeModule('highloadblock');

$arResult['CURRENCIES'] = [];
$hlBlock = HighloadBlockTable::getById(CUR_HLBLOCK_ID)->fetch();
if ($hlBlock) {
    $entity = HighloadBlockTable::compileEntity($hlBlock);
    $entityClass = $entity->getDataClass();

    $result = $entityClass::getList([
        'select' => ['ID', 'UF_CHAR', 'UF_CUR', 'UF_NAME'],
        'order' => ['ID' => 'ASC']
    ]);

    while ($item = $result->fetch()) {
        $arResult['CURRENCIES'][] = $item;
    }
}

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