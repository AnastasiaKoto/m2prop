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
	<ul class="<?= $arParams['LOC_CLASS'] ?>">
		<? foreach($arResult['rows'] as $row): ?>
		<li>
			<a href="<?= $row['UF_LINK']; ?>" target="_blank">
				<?= html_entity_decode(htmlspecialchars_decode($row['UF_ICON'])); ?>
			</a>
		</li>
		<? endforeach; ?>
	</ul>
<? endif; ?>