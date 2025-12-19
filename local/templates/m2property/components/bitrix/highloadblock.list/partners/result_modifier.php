<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arRows = [];

foreach ($arResult["rows"] as $row) {
	if ($row["UF_IMAGE"]) {
		preg_match_all('/href="([^\"]+)"/', $row["UF_IMAGE"], $src);
		$src = $src[1][0];

		$row["UF_IMAGE"] = $src;

		$arRows[] = $row;
	}
}

if (!empty($arRows)) {
    $arResult["rows"] = $arRows;
}