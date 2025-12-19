<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/** @global CMain $APPLICATION */
/** @var array $arParams */
/** @var array $arResult */


if (!empty($arResult['ERROR'])) {
	echo $arResult['ERROR'];
	return false;
}
if (!empty($arResult['rows'])):
	?>
	<ul class="partners-list">
		<? foreach($arResult['rows'] as $row): ?>
		<li>
			<img src="<?= $row['UF_IMAGE']; ?>" alt="<?= $row['UF_NAME']; ?>">
		</li>
		<? endforeach; ?>
	</ul>
<? endif; ?>