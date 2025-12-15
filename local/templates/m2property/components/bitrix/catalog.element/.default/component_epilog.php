<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

//p($arResult);

if (empty($arResult["ID"])) {
    return;
}

$hasPriceBlock = false;
$hasDistrictBlock = false;


$priceValue = $arResult["NEW_PRICE_VALUE"] ?? null;

if ((float)$priceValue > 0) {
    $precent = $priceValue * 0.15;
    $minPrice = (float)$priceValue - $precent;
    $maxPrice = (float)$priceValue + $precent;

    $GLOBALS["SimilarPriceFilter"] = [
        "!ID" => $arResult["ID"],
        "!PROPERTY_OBJECT_TYPE" => 6,
        ">=PROPERTY_NEW_PRICE" => $minPrice,
        "<=PROPERTY_NEW_PRICE" => $maxPrice,
    ];
    $hasPriceBlock = true;
}

$areaValue = trim($arResult["OBJECT_AREA_VALUE"] ?? "");
if ($areaValue !== "") {
    $GLOBALS["SimilarAreaFilter"] = [
        "!ID" => $arResult["ID"],
        "!PROPERTY_OBJECT_TYPE" => 6,
        "PROPERTY_OBJECT_AREA" => $areaValue,
    ];
    $hasDistrictBlock = true;
}

if (!$hasPriceBlock && !$hasDistrictBlock) {
    return;
}

$commonParams = [
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"] ?? "sort",
    "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"] ?? "asc",
    "INCLUDE_SUBSECTIONS" => $arParams['INCLUDE_SUBSECTIONS'],
    "PAGE_ELEMENT_COUNT" => 40,
    "PROPERTY_CODE" => array_merge(
        (array)($arParams["LIST_PROPERTY_CODE"] ?? []),
        ["NEW_PRICE", "OBJECT_AREA"] // ← КРИТИЧЕСКИ ВАЖНО!
    ),
    "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"] ?? [],
    "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"] ?? [],
    "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"] ?? [],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"] ?? "A",
    "CACHE_TIME" => $arParams["CACHE_TIME"] ?? 36000000,
    "CACHE_FILTER" => "Y",
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"] ?? "Y",
    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"] ?? "N",
    "PRICE_CODE" => $arParams["~PRICE_CODE"] ?? [],
    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"] ?? "N",
    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"] ?? 1,
    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"] ?? "Y",
    "BASKET_URL" => $arParams["BASKET_URL"] ?? "/personal/basket.php",
    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"] ?? "action",
    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"] ?? "id",
    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"] ?? "quantity",
    "ADD_PROPERTIES_TO_BASKET" => $arParams["ADD_PROPERTIES_TO_BASKET"] ?? "Y",
    "PARTIAL_PRODUCT_PROPERTIES" => $arParams["PARTIAL_PRODUCT_PROPERTIES"] ?? "N",
    "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"] ?? [],
    "DISPLAY_TOP_PAGER" => "N",
    "DISPLAY_BOTTOM_PAGER" => "N",
    "PAGER_SHOW_ALL" => "N",
    "LAZY_LOAD" => "N",
    "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"] ?? "N",
    "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"] ?? "N",
    "HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"] ?? "N",
    "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"] ?? "",
    "COMPATIBLE_MODE" => $arParams["COMPATIBLE_MODE"] ?? "Y",
];

ob_start();
?>

<section class="section similar">
    <div class="container">
        <div class="similar-head">
            <div class="similar-head__left">
                <h2>
                    Похожие<br>
                    <span>запросы</span>
                </h2>
                <ul class="tab-content__similar-links">
                    <? if ($hasPriceBlock): ?>
                        <li>
                            <a href="javascript:void(0)" class="tab-content__similar-link active" data-tab="price">
                                По цене
                            </a>
                        </li>
                    <? endif; ?>
                    <? if ($hasDistrictBlock): ?>
                        <li>
                            <a href="javascript:void(0)" class="tab-content__similar-link <?= !$hasPriceBlock ? ' active' : '' ?>" data-tab="district">
                                По району
                            </a>
                        </li>
                    <? endif; ?>
                </ul>
            </div>
            <div class="similar-arrows">
                <button class="slider-arrow similar-arrow similar-arrow__prev">←</button>
                <button class="slider-arrow similar-arrow similar-arrow__next">→</button>
            </div>
        </div>

        <? if ($hasPriceBlock): ?>
            <div class="tab-content__similar-content" data-tab="price"<?= $hasDistrictBlock ? '' : ' style="display:block;"' ?>>
                <?
                $priceParams = $commonParams;
                $priceParams["FILTER_NAME"] = "SimilarPriceFilter";
                $APPLICATION->IncludeComponent("bitrix:catalog.section", "filtered_offers", $priceParams, $component);
                ?>
            </div>
        <? endif; ?>

        <? if ($hasDistrictBlock): ?>
            <div class="tab-content__similar-content" data-tab="district"<?= $hasPriceBlock ? ' style="display:none;"' : '' ?>>
                <?
                $districtParams = $commonParams;
                $districtParams["FILTER_NAME"] = "SimilarAreaFilter";
                $APPLICATION->IncludeComponent("bitrix:catalog.section", "filtered_offers", $districtParams, $component);
                ?>
            </div>
        <? endif; ?>
    </div>
</section>

<?
echo ob_get_clean();
?>