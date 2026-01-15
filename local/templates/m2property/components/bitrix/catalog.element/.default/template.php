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
 * @var string $templateFolder
 */
$APPLICATION->SetPageProperty("logo", "white");
$this->setFrameMode(true);
$viewsPath = $_SERVER['DOCUMENT_ROOT'] . $templateFolder . '/views/';

if ($arResult['PROPERTIES']['OBJECT_TYPE']['VALUE_ENUM'] == 'Набор объектов') {
    require_once $viewsPath . 'complex.php';
} else {
    require_once $viewsPath . 'simple.php';
}
?>