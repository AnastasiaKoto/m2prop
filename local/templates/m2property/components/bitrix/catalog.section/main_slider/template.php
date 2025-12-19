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
if (!empty($arResult['ITEMS'])):
	?>
	<div class="mainscreen-hp__slider">
		<div id="slider-wrapper__hp" class="slider-wrapper__hp">
			<!-- Большой слайдер -->
			<div id="main-slider__hp" class="splide main-slider__hp">
				<div class="splide__track">
					<ul class="splide__list">
						<? foreach($arResult['ITEMS'] as $arItem): ?>
						<li class="splide__slide">
							<? if(!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])): ?>
							<img src="<?= CFile::GetPath($arItem['PROPERTIES']['GALLERY']['VALUE'][0]); ?>" alt="<?= $arItem['NAME']; ?>">
							<? endif; ?>
							<div class="bg-layer"></div>
							<? if(!empty($arItem['PROPERTIES']['CLASS']['VALUE'])): ?>
							<div class="main-slider__hp-tag">
								<?= $arItem['PROPERTIES']['CLASS']['VALUE']; ?>
							</div>
							<? endif; ?>
							<div class="main-slider__hp-info">
								<div class="main-slider__hp-name">
									<?= $arItem['NAME']; ?>
								</div>
								<div class="main-slider__hp-address">
									<address>
										<?= $arItem['PROPERTIES']['TIME_TO_WAY']['VALUE']; ?>
									</address>
									<span>
										<?= $arItem['PROPERTIES']['OBJECT_ADDRESS']['VALUE']; ?>
									</span>
								</div>
								<? if(!empty($arItem['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
								<div class="main-slider__hp-price">
									<span>
										от
									</span>
									₽ <?= number_format($arItem['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', '.'); ?>
								</div>
								<? endif; ?>
							</div>
							<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="main-slider__hp-arrow">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M12.0028 7L17.5025 7.00049V12.5005M17.0987 7.40389L7.19922 17.3034"
										stroke="white" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
								</svg>
							</a>
						</li>
						<? endforeach; ?>
					</ul>
				</div>
			</div>

			<!-- Маленький слайд следующего изображения -->
			<? 
			$elements = $arResult['ITEMS'];
			//$firstElement = array_shift($elements);
			//array_push($elements, $firstElement);
			?>
			<div class="next-thumb__wrap">
				<a href="/catalog/" class="all-projects">
					<span>
						Все объекты
					</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.0028 7L17.5025 7.00049V12.5005M17.0987 7.40389L7.19922 17.3034" stroke="white"
							stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
					</svg>
				</a>
				<div id="next-thumb__hp" class="splide next-thumb">
					<div class="splide__track">
						<ul class="splide__list">
							<? foreach($elements as $element): ?>
							<li class="splide__slide">
								<img src="<?= CFile::GetPath($element['PROPERTIES']['GALLERY']['VALUE'][0]); ?>" alt="<?= $element['NAME']; ?>">
								<div class="next-thumb__layer"></div>
								<a href="<?= $element['DETAIL_PAGE_URL']; ?>" class="next-thumb__arrow">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path d="M11.9989 7L17.4986 7.00049V12.5005M17.0948 7.40389L7.19531 17.3034"
											stroke="white" stroke-width="1.5" stroke-miterlimit="16"
											stroke-linecap="square" />
									</svg>
								</a>
								<div class="next-thumb__name">
									<?= $element['NAME']; ?>
								</div>
							</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

		</div>
		<div class="mainscreen-hp__navigation">
			<button class="mainscreen-hp__arrow mainscreen-hp__arrow-prev">
				<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M4.33593 8.75L1.04304 5.45711C0.652517 5.06658 0.652517 4.43342 1.04304 4.04289L4.33593 0.75M1.33594 4.75L15.3359 4.75"
						stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
				</svg>
			</button>
			<ul class="splide__pagination"></ul>
			<button class="mainscreen-hp__arrow mainscreen-hp__arrow-next">
				<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M11.75 8.75L15.0429 5.45711C15.4334 5.06658 15.4334 4.43342 15.0429 4.04289L11.75 0.75M14.75 4.75L0.75 4.75"
						stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
				</svg>
			</button>
		</div>
	</div>
<? endif; ?>