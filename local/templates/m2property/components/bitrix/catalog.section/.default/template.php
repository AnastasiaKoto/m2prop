<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
	$navParams = array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
} else {
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'USE_PAGINATION_CONTAINER' => $showTopPager || $showBottomPager,
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];
//p($arResult);?>
<!-- items-container -->
<?
if (!empty($arResult['ITEMS'])): ?>
	<ul class="catalog-items" data-entity="items-row" id="<?= $containerName ?>">
		<?
		foreach ($arResult['ITEMS'] as $arItem) {
			$isLarge = $arItem['PROPERTIES']['OBJECT_TYPE']['VALUE_ENUM'] == 'Набор объектов' ? true : false;
			?>
			<li class="catalog-item <?= $isLarge ? 'large' : ''; ?>" data-entity="item">
				<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
					<?= $isLarge ? '<div class="blur"></div>' : ''; ?>
					<div class="catalog-item__image">
						<? if ($isLarge): ?>
							<img src="<?= CFile::GetPath($arItem['PROPERTIES']['GALLERY']['VALUE'][0]); ?>"
								alt="<?= $arItem['NAME']; ?>">
						<? else: ?>
							<? if (!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])): ?>
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<? foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $img): ?>
												<li class="splide__slide">
													<img src="<?= CFile::GetPath($img); ?>" alt="<?= $arItem['NAME']; ?>">
												</li>
											<? endforeach; ?>
										</ul>
									</div>
								</div>
							<? endif; ?>
						<? endif; ?>
						<? if (!empty($arItem['PROPERTIES']['TAGS']['VALUE'])): ?>
							<div class="catalog-item__tag">
								<?= $arItem['PROPERTIES']['TAGS']['VALUE'][0]; ?>
							</div>
						<? endif; ?>
					</div>
					<div class="catalog-item__body">
						<div class="catalog-item__prices">
							<div class="catalog-item__price">
								<?= $arItem['PROPERTIES']['NEW_PRICE']['VALUE'] ? number_format($arItem['PROPERTIES']['NEW_PRICE']['VALUE'], 0, ',', ' ') . '₽' : ''; ?>
							</div>
							<? if(!empty($arItem['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
								<div class="catalog-item__old-price">
									<?= number_format($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ',', ' ') . '₽'; ?>
								</div>
								<?
								$discount = discountPrecent($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], $arItem['PROPERTIES']['NEW_PRICE']['VALUE']);
								if ($discount > 0):
									?>
									<div class="catalog-item__sale">
										-<?= $discount; ?>%
									</div>
								<? endif; ?>
							<? endif; ?>
						</div>
						<div class="catalog-item__info">
							<div class="catalog-item__name">
								<?= $arItem['NAME']; ?>
							</div>
							<div class="catalog-item__location">
								<?= $arItem['PROPERTIES']['OBJECT_ADDRESS']['VALUE'] ? $arItem['PROPERTIES']['OBJECT_ADDRESS']['VALUE'] . ', ' . $arItem['PROPERTIES']['TIME_TO_WAY']['VALUE'] : ''; ?>
							</div>
						</div>
					</div>
					<? if (!empty($arItem['PROPERTIES']['TAGS']['VALUE'])): ?>
						<ul class="catalog-item__filters">
							<? foreach ($arItem['PROPERTIES']['TAGS']['VALUE'] as $tag): ?>
								<li class="catalog-item__filter">
									<?= $tag; ?>
								</li>
							<? endforeach; ?>
						</ul>
					<? endif; ?>
				</a>
			</li>
			<?
		}
		?>
	</ul>
<? else: ?>
	<p>Ничего не найдено</p>
<? endif; ?>
<!-- items-container -->
	<div class="catalog-navigation">
		<? if ($showBottomPager) { ?>
		<nav data-pagination-num="<?= $navParams['NavNum'] ?>">
			<!-- pagination-container -->
			 <?= $arResult['NAV_STRING'] ?>
			<!-- pagination-container -->
		</nav>
		<? } ?>
		<? if ($showLazyLoad) { ?>
			<div class="show-more-container">
				<button type="button" class="more-items" data-use="show-more-<?= $navParams['NavNum'] ?>">
					<?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
				</button>
			</div>
		<? } ?>
	</div>
<?
$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
		BASKET_URL: '<?= $arParams['BASKET_URL'] ?>',
		ADD_TO_BASKET_OK: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		TITLE_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
		TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
		TITLE_SUCCESSFUL: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
		BTN_MESSAGE_SEND_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS') ?>',
		BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
		COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
		COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
		COMPARE_TITLE: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
		PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX') ?>',
		RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY']) ?>',
		RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW']) ?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
		BTN_MESSAGE_LAZY_LOAD: '<?= CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD']) ?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER') ?>',
		SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
	});
	var <?= $obName ?> = new JCCatalogSectionComponent({
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		componentPath: '<?= CUtil::JSEscape($componentPath) ?>',
		navParams: <?= CUtil::PhpToJSObject($navParams) ?>,
		deferredLoad: false,
		initiallyShowHeader: '<?= !empty($arResult['ITEM_ROWS']) ?>',
		bigData: <?= CUtil::PhpToJSObject($arResult['BIG_DATA']) ?>,
		lazyLoad: !!'<?= $showLazyLoad ?>',
		loadOnScroll: !!'<?= ($arParams['LOAD_ON_SCROLL'] === 'Y') ?>',
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		ajaxId: '<?= CUtil::JSEscape($arParams['AJAX_ID'] ?? '') ?>',
		parameters: '<?= CUtil::JSEscape($signedParams) ?>',
		container: '<?= $containerName ?>'
	});
</script>
<!-- component-end -->