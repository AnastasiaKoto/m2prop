<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
if (!empty($arResult['ITEMS'])):
	?>
	<ul class="about-hp__services-items">
		<? foreach($arResult['ITEMS'] as $arItem): ?>
		<li>
			<a href="javascript:void(0)">
				<div class="icon">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.9989 7L17.4986 7.00049V12.5005M17.0948 7.40389L7.19531 17.3034" stroke="white"
							stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
					</svg>
				</div>
				<div class="about-hp__services-item__title">
					<?= $arItem['NAME']; ?>
				</div>
				<p>
					<?= $arItem['PREVIEW_TEXT']; ?>
				</p>
			</a>
		</li>
		<? endforeach; ?>
	</ul>
<? endif; ?>