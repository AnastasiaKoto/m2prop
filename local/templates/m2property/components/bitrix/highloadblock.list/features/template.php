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
	<ul class="show-off__list">
		<? foreach($arResult['rows'] as $row): ?>
		<li>
			<span>
				<?= $row['UF_NAME']; ?>
			</span>
			<p>
				<?= html_entity_decode($row['UF_NUMBER']); ?>
			</p>
		</li>
		<? endforeach; ?>
	</ul>
<? endif; ?>