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
	<div class="splide similar-slider">
		<div class="splide__track">
			<ul class="splide__list similar-items">
				<? foreach ($arResult['ITEMS'] as $arItem): ?>
				<li class="splide__slide catalog-item">
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
						<div class="catalog-item__image">
							<? if (!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])): ?>
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<? foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $img): ?>
												<li class="splide__slide">
													<img src="<?= CFile::GetPath($img); ?>"
														alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
												</li>
											<? endforeach; ?>
										</ul>
									</div>
								</div>
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
								<div class="catalog-item__old-price">
									<?= $arItem['PROPERTIES']['OLD_PRICE']['VALUE'] ? number_format($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ',', ' ') . '₽' : ''; ?>
								</div>
								<?
								$discount = discountPrecent($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], $arItem['PROPERTIES']['NEW_PRICE']['VALUE']);
								if ($discount > 0):
									?>
									<div class="catalog-item__sale">
										-<?= $discount; ?>%
									</div>
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
				<? endforeach; ?>
			</ul>
		</div>
	</div>
<? else: ?>
	<p>Ничего не найдено</p>
<? endif; ?>