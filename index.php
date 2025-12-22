<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>
<div class="detail-decor">
	<img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/detail-decor.svg" alt="img">
</div>
<section class="mainscreen-hp">
	<div class="container">
		<div class="mainscreen-hp__inner">
			<div class="mainscreen-hp__info">
				<h1>
					<? $APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => "standard.php",
							"PATH" => "/include/mainpage/banner_title.php"
						)
					); ?>
				</h1>
				<div class="mainscreen-hp__description">
					<? $APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => "standard.php",
							"PATH" => "/include/mainpage/banner_descr.php"
						)
					); ?>
				</div>
				<div class="mainscreen-hp__bubbles">
					<div class="mainscreen-hp__bubble">
						Проектирование
					</div>
					<div class="mainscreen-hp__bubble">
						Маркетинговое продвижение
					</div>
					<div class="mainscreen-hp__bubble">
						Дальнейшая эксплуатация
					</div>
				</div>
			</div>
			<?
			$GLOBALS["arrElementsFilter"] = array(
				"PROPERTY_SHOW_MAIN" => "19"
			);
			?>
			<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main_slider", 
	[
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "",
		"BASKET_URL" => "",
		"BRAND_PROPERTY" => "-",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "arrElementsFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => [
		],
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
		"MESS_BTN_DETAIL" => "",
		"MESS_BTN_LAZY_LOAD" => "",
		"MESS_BTN_SUBSCRIBE" => "",
		"MESS_NOT_AVAILABLE" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_FIELD_CODE" => "",
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "",
		"OFFER_TREE_PROPS" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "6",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => [
		],
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => [
			0 => "NEWPRODUCT",
			1 => "MATERIAL",
		],
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => [
			0 => "NEWPRODUCT",
			1 => "",
		],
		"PROPERTY_CODE_MOBILE" => [
		],
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => [
			0 => "",
			1 => "",
		],
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "",
		"USE_ENHANCED_ECOMMERCE" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "main_slider",
		"SHOW_ALL_WO_SECTION" => "N",
		"MESS_NOT_AVAILABLE_SERVICE" => "",
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_CODE_PATH" => "",
		"DISPLAY_COMPARE" => "N",
		"FILE_404" => ""
	],
	false
); ?>
		</div>
	</div>
</section>
<section class="about-hp" id="company">
	<div class="container">
		<div class="about-hp__inner">
			<div class="about-hp__head">
				<div class="about-hp__head-left">
					<h2>
						<span>
							О компании
						</span>
					</h2>
					<img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/badgehp.svg" alt="img">
				</div>
				<div class="about-hp__head-right">
					<div class="about-hp__head-title">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "standard.php",
								"PATH" => "/include/mainpage/company_descr.php"
							)
						); ?>
					</div>
					<div class="about-hp__head-description">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "standard.php",
								"PATH" => "/include/mainpage/company_full_descr.php"
							)
						); ?>
					</div>
				</div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:news.list","services",Array(
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"AJAX_MODE" => "N",
				"IBLOCK_TYPE" => "products",
				"IBLOCK_ID" => "10",
				"NEWS_COUNT" => "4",
				"SORT_BY1" => "ID",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "DESC",
				"FILTER_NAME" => "",
				"FIELD_CODE" => "",
				"PROPERTY_CODE" => "",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_LAST_MODIFIED" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SET_STATUS_404" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => "",
				"PAGER_BASE_LINK" => "",
				"PAGER_PARAMS_NAME" => "arrPager",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => ""
			)
		);?>

		</div>
	</div>
</section>
<?
$GLOBALS["arrElementsFilter"] = array(
	"PROPERTY_SHOW_MAIN" => "19",
	"!PROPERTY_OBJECT_TYPE" => "6"
);
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main_projects", 
	[
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "",
		"BASKET_URL" => "",
		"BRAND_PROPERTY" => "-",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "arrElementsFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => [
		],
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
		"MESS_BTN_DETAIL" => "",
		"MESS_BTN_LAZY_LOAD" => "",
		"MESS_BTN_SUBSCRIBE" => "",
		"MESS_NOT_AVAILABLE" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_FIELD_CODE" => "",
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "",
		"OFFER_TREE_PROPS" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "6",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => [
		],
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => [
			0 => "NEWPRODUCT",
			1 => "MATERIAL",
		],
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => [
			0 => "NEWPRODUCT",
			1 => "",
		],
		"PROPERTY_CODE_MOBILE" => [
		],
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => [
			0 => "",
			1 => "",
		],
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "",
		"USE_ENHANCED_ECOMMERCE" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "main_slider",
		"SHOW_ALL_WO_SECTION" => "N",
		"MESS_NOT_AVAILABLE_SERVICE" => "",
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_CODE_PATH" => "",
		"DISPLAY_COMPARE" => "N",
		"FILE_404" => ""
	],
	false
); ?>
<section class="show-off">
	<div class="container">
		<div class="show-off__inner">
			<div class="show-bg">
				<img src="./assets/img/show-bg.png" alt="img">
			</div>
			<div class="show-off__label">
				О нас
			</div>
			<h2>
				<? $APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "standard.php",
						"PATH" => "/include/mainpage/we_are_title.php"
					)
				); ?>
			</h2>
			<div class="show-off__bottom">
				<div class="show-off__info">
					<svg width="219" height="62" viewBox="0 0 219 62" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_346_20741)">
							<rect y="8.75781" width="216.929" height="52.8218" rx="10"
								transform="rotate(-2.31352 0 8.75781)" fill="#242220" />
							<rect x="-59.4746" y="-299.094" width="940" height="520"
								transform="rotate(-2.31352 -59.4746 -299.094)" fill="#D9D9D9" />
							<rect x="24.4922" y="25.8828" width="46.7797" height="17.1659"
								transform="rotate(-2.31352 24.4922 25.8828)" fill="#FF7400" />
							<path
								d="M42.2688 26.7693L50.4356 26.4394L50.9948 40.2813L42.828 40.6112L42.5484 33.6903L38.6595 35.8567L38.5339 32.7473L42.2688 26.7693Z"
								fill="#242220" />
							<path
								d="M34.3289 27.0901L26.1621 27.42L26.7213 41.2619L34.8881 40.932L34.6085 34.011L38.6595 35.8567L38.5339 32.7473L34.3289 27.0901Z"
								fill="#242220" />
							<path
								d="M70.4477 34.3589L58.1033 36.3102L70.5063 35.8091L70.655 39.491L52.2995 40.2325L51.9434 31.4186L64.3368 30.0592L51.889 30.0725L51.7402 26.3906L70.0958 25.6491L70.4477 34.3589Z"
								fill="#242220" />
							<path
								d="M189.472 32.8817L197.504 24.3191L200 24.2183L200.439 35.0981L197.944 35.1989L197.612 26.9741L189.579 35.5368L187.084 35.6376L186.645 24.7578L189.14 24.657L189.472 32.8817Z"
								fill="#242220" />
							<path
								d="M184.852 24.8338L184.942 27.0497L179.532 27.2683L179.882 35.9322L177.386 36.033L177.036 27.3691L171.547 27.5909L171.457 25.375L184.852 24.8338Z"
								fill="#242220" />
							<path
								d="M170.881 31.0969C170.893 32.0562 170.704 32.9703 170.312 33.8392C169.92 34.6949 169.336 35.405 168.559 35.9696C167.794 36.5204 166.88 36.8173 165.815 36.8603C163.513 36.9533 161.733 36.452 160.476 35.3564L160.684 40.5068L158.188 40.6077L157.596 25.9349L159.672 25.851L160.056 27.4351C161.257 26.1602 163.023 25.4757 165.352 25.3816C166.376 25.3402 167.292 25.5565 168.097 26.0305C168.916 26.504 169.57 27.1707 170.058 28.0308C170.546 28.8909 170.818 29.8663 170.876 30.9571L170.878 31.017L170.881 31.0969ZM164.347 35.16C165.212 35.1251 165.936 34.8959 166.519 34.4724C167.114 34.0351 167.553 33.5108 167.835 32.8996C168.129 32.2745 168.272 31.6755 168.262 31.1027C168.221 30.4245 168.042 29.7852 167.725 29.1848C167.42 28.5706 166.953 28.0763 166.325 27.7017C165.71 27.3134 164.943 27.1377 164.024 27.1748C163.266 27.2055 162.601 27.4256 162.031 27.8352C161.461 28.2315 161.022 28.7425 160.714 29.3681C160.418 29.9799 160.284 30.6185 160.311 31.2839C160.341 32.0159 160.528 32.6816 160.872 33.2809C161.216 33.8801 161.688 34.3543 162.289 34.7033C162.902 35.0384 163.588 35.1907 164.347 35.16Z"
								fill="#242220" />
							<path
								d="M156.326 31.5853L144.987 32.0434C145.054 32.7206 145.273 33.3516 145.643 33.9365C146.013 34.5081 146.545 34.9665 147.239 35.3117C147.932 35.657 148.765 35.8099 149.737 35.7707C150.575 35.7368 151.308 35.5606 151.935 35.242C152.575 34.9095 153.059 34.5167 153.387 34.0636C153.728 33.5966 153.89 33.1568 153.873 32.7442L156.369 32.6434C156.397 33.3354 156.159 34.0515 155.656 34.7917C155.152 35.5319 154.398 36.1622 153.393 36.6828C152.387 37.2033 151.179 37.492 149.769 37.549C148.504 37.6001 147.323 37.4012 146.225 36.9523C145.127 36.4901 144.24 35.8261 143.565 34.9603C142.89 34.0811 142.529 33.0692 142.483 31.9247C142.436 30.7535 142.7 29.7097 143.276 28.7933C143.865 27.863 144.682 27.1369 145.728 26.6147C146.786 26.0788 147.974 25.7842 149.291 25.7309C150.635 25.6766 151.823 25.8686 152.854 26.3068C153.898 26.7446 154.717 27.3913 155.311 28.2471C155.919 29.089 156.253 30.0953 156.313 31.2659L156.326 31.5853ZM149.404 27.526C148.259 27.5722 147.344 27.8625 146.659 28.3967C145.974 28.9309 145.496 29.6168 145.223 30.4543L153.607 30.1155C153.348 29.2995 152.875 28.6521 152.189 28.1733C151.517 27.6939 150.588 27.4781 149.404 27.526Z"
								fill="#242220" />
							<path
								d="M127.203 27.1641L140.778 26.6156L141.217 37.4955L138.722 37.5963L138.372 28.9323L129.788 29.2791L130.138 37.9431L127.643 38.0439L127.203 27.1641Z"
								fill="#242220" />
							<path
								d="M118.826 27.0402C120.13 26.9875 121.312 27.1931 122.37 27.6568C123.442 28.1201 124.289 28.7924 124.911 29.6737C125.546 30.5412 125.886 31.5339 125.931 32.6518C125.976 33.7565 125.717 34.7734 125.155 35.7025C124.605 36.6179 123.815 37.3497 122.784 37.8979C121.766 38.4455 120.605 38.7457 119.301 38.7984C118.05 38.8489 116.862 38.6437 115.737 38.1826C114.625 37.7076 113.724 37.0375 113.036 36.1721C112.348 35.2935 111.981 34.3085 111.937 33.2172C111.893 32.1126 112.178 31.1013 112.794 30.1832C113.41 29.2519 114.253 28.5113 115.324 27.9615C116.394 27.3984 117.562 27.0913 118.826 27.0402ZM119.248 37.0009C120.473 36.9515 121.491 36.5837 122.303 35.8977C123.115 35.1984 123.492 34.1501 123.436 32.7527C123.379 31.3552 122.918 30.3408 122.053 29.7092C121.188 29.0776 120.143 28.7866 118.919 28.8361C118.147 28.8672 117.414 29.0368 116.72 29.3448C116.026 29.6528 115.465 30.122 115.037 30.7525C114.622 31.3824 114.434 32.1699 114.472 33.1148C114.511 34.0597 114.762 34.8294 115.226 35.4238C115.702 36.0044 116.292 36.4205 116.996 36.672C117.712 36.923 118.463 37.0326 119.248 37.0009Z"
								fill="#242220" />
							<path
								d="M110.643 33.5265C110.655 34.4858 110.465 35.4 110.074 36.2689C109.682 37.1246 109.097 37.8347 108.32 38.3993C107.556 38.9501 106.642 39.247 105.577 39.29C103.275 39.383 101.495 38.8817 100.237 37.7861L100.445 42.9365L97.9501 43.0373L97.3573 28.3646L99.4335 28.2807L99.8174 29.8648C101.019 28.5899 102.784 27.9054 105.113 27.8113C106.138 27.7699 107.053 27.9862 107.859 28.4602C108.678 28.9336 109.331 29.6004 109.819 30.4605C110.307 31.3206 110.58 32.296 110.637 33.3868L110.64 33.4467L110.643 33.5265ZM104.109 37.5897C104.974 37.5547 105.698 37.3255 106.28 36.9021C106.876 36.4648 107.315 35.9405 107.597 35.3293C107.891 34.7041 108.034 34.1052 108.024 33.5324C107.983 32.8542 107.804 32.2149 107.486 31.6145C107.182 31.0003 106.715 30.5059 106.087 30.1314C105.471 29.743 104.704 29.5674 103.786 29.6045C103.027 29.6351 102.363 29.8553 101.793 30.2649C101.223 30.6612 100.783 31.1722 100.475 31.7978C100.18 32.4096 100.046 33.0482 100.073 33.7136C100.102 34.4456 100.289 35.1112 100.633 35.7105C100.978 36.3098 101.45 36.784 102.051 37.133C102.664 37.4681 103.35 37.6203 104.109 37.5897Z"
								fill="#242220" />
							<path
								d="M95.1095 24.5577L95.7063 39.3303L93.0113 39.4391L92.5072 26.9623L81.7272 27.3978L82.2313 39.8747L79.5363 39.9835L78.9395 25.2109L95.1095 24.5577Z"
								fill="#242220" />
						</g>
						<defs>
							<clipPath id="clip0_346_20741">
								<rect y="8.75781" width="216.929" height="52.8218" rx="10"
									transform="rotate(-2.31352 0 8.75781)" fill="white" />
							</clipPath>
						</defs>
					</svg>
					<span>
						— это команда профессионалов, специализирующаяся на комплексном сопровождении проектов в
						сфере недвижимости
					</span>
				</div>
				<?$APPLICATION->IncludeComponent("bitrix:highloadblock.list", "about_numbers", Array(
					"BLOCK_ID" => "4",	// ID highload блока
					"CHECK_PERMISSIONS" => "N",	// Проверять права доступа
					"DETAIL_URL" => "",	// Путь к странице просмотра записи
					"FILTER_NAME" => "",	// Идентификатор фильтра
					"PAGEN_ID" => "",	// Идентификатор страницы
					"ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
					"SORT_FIELD" => "ID",	// Поле сортировки
					"SORT_ORDER" => "ASC",	// Направление сортировки
					),
					false
				);?>
			</div>
		</div>
	</div>
</section>
<section class="partners">
	<div class="container">
		<div class="partners-inner">
			<h2>
				<span>
					Наши
				</span><br />
				партнеры
			</h2>
			<?$APPLICATION->IncludeComponent("bitrix:highloadblock.list", "partners", Array(
				"BLOCK_ID" => "5",	// ID highload блока
				"CHECK_PERMISSIONS" => "N",	// Проверять права доступа
				"DETAIL_URL" => "",	// Путь к странице просмотра записи
				"FILTER_NAME" => "",	// Идентификатор фильтра
				"PAGEN_ID" => "",	// Идентификатор страницы
				"ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
				"SORT_FIELD" => "ID",	// Поле сортировки
				"SORT_ORDER" => "ASC",	// Направление сортировки
				),
				false
			);?>
		</div>
	</div>
</section>
<section class="special">
	<div class="container">
		<div class="special-inner">
			<div class="special-bg">
				<img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/spec.png" alt="img">
			</div>
			<h2>
				<span>
					Особенности
				</span><br>
				наших проектов
			</h2>
			<?$APPLICATION->IncludeComponent("bitrix:highloadblock.list", "features", Array(
				"BLOCK_ID" => "6",	// ID highload блока
				"CHECK_PERMISSIONS" => "N",	// Проверять права доступа
				"DETAIL_URL" => "",	// Путь к странице просмотра записи
				"FILTER_NAME" => "",	// Идентификатор фильтра
				"PAGEN_ID" => "",	// Идентификатор страницы
				"ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
				"SORT_FIELD" => "ID",	// Поле сортировки
				"SORT_ORDER" => "ASC",	// Направление сортировки
				),
				false
			);?>
			
		</div>
	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>