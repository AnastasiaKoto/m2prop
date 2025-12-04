<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
if(!empty($arResult['ITEMS'])):
?>
<section class="section last-blog">
	<div class="container">
		<div class="last-blog__head">
			<h2>
				Последнее
				<span>
					в блоге
				</span>
			</h2>
			<a href="/blog/" class="link-to">
				<span>
					Читать блог
				</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12.0028 7L17.5025 7.00049V12.5005M17.0987 7.40389L7.19922 17.3034" stroke="white"
						stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
				</svg>
			</a>
		</div>
		<ul class="last-news__items">
			<? foreach($arResult['ITEMS'] as $arItem): ?>
			<li class="last-news__item">
				<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
					<div class="last-news__item-image">
						<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $arItem['NAME']; ?>">
					</div>
					<div class="gradient"></div>
					<div class="last-news__item-name">
						<?= $arItem['NAME']; ?>
					</div>
					<div class="last-news__item-description">
						<?= $arItem['~PREVIEW_TEXT']; ?>
					</div>
					<div class="last-news__item-arrow">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.51387 1L18.7876 1.00082V10.275M18.1067 1.68104L1.41406 18.3737" stroke="white"
								stroke-width="2" stroke-miterlimit="16" stroke-linecap="square" />
						</svg>
					</div>
				</a>
			</li>
			<? endforeach; ?>
		</ul>
	</div>
</section>
<? endif; ?>