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

$this->setFrameMode(true);
$price = (int)$arResult['PROPERTIES']['NEW_PRICE']['VALUE'];
$square = (int)$arResult['PROPERTIES']['SQUARE']['VALUE'];
$pricePerMetr = round($price / $square);
//p($arResult);
?>
<section class="section detail-product_sm-mainscreen">
	<div class="container">
		<div class="detail-product_sm-inner">
			<div class="photos-counter" data-move-target=".gallery-icon" data-move-break="1050">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="2" y="2" width="20" height="20" rx="5" stroke="#242220" stroke-width="1.5" />
					<path
						d="M2.5 17.5L4.7592 15.8863C5.47521 15.3749 6.45603 15.456 7.07822 16.0782L8.15147 17.1515C8.6201 17.6201 9.3799 17.6201 9.84853 17.1515L14.8377 12.1623C15.496 11.504 16.5476 11.4563 17.2628 12.0523L22 16"
						stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
					<circle cx="2" cy="2" r="2" transform="matrix(-1 0 0 1 10 6)" stroke="#242220" stroke-width="1.5" />
				</svg>
				<span>
					<? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?> Еще <?= count($arResult['PROPERTIES']['GALLERY']['VALUE']); ?> фото <? endif; ?>
				</span>
			</div>
			<div class="detail-product_sm-info">
				<h1>
					<?= $arResult['~DETAIL_TEXT'] ?>
				</h1>
				<div class="detail-product_sm-price">
					<div class="detail-product_sm-price__num">
						<div class="detail-product_sm-price__num-cur">
							<?= number_format($price, 0, '', ' ') . ' ₽' ?? 0; ?>
						</div>
						<div class="detail-product_sm-price__num-old">
							 <?= number_format($pricePerMetr, 0, '', ' ') ?? 0; ?> ₽/м2
						</div>
					</div>
					<div class="detail-product_sm-price__currencies">
						<button type="button" class="detail-product_sm-price__currency active">
							₽
						</button>
						<button type="button" class="detail-product_sm-price__currency">
							$
						</button>
						<button type="button" class="detail-product_sm-price__currency">
							€
						</button>
					</div>
					<div class="detail-product_sm-price__square">
						<?= $square ?? 0; ?> м²
					</div>
				</div>
				<div class="detail-product_sm__description">
					<?= $arResult['~PREVIEW_TEXT']; ?>
				</div>
				<div class="detail-product_sm-links">
					<? if(!empty($arResult['PROPERTIES']['PRESENTATION']['VALUE'])): ?>
					<a class="donwload" href="<?= CFile::GetPath($arResult['PROPERTIES']['PRESENTATION']['VALUE']); ?>" download>
						<span>
							Скачать презентацию
						</span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M3.3125 1.09375H14.096L20.6908 7.64241V22.9062H3.3125V1.09375ZM4.8125 2.59375V21.4062H19.1908V8.70461H13.0369V2.59375H4.8125ZM14.5369 3.64546L18.1211 7.20461H14.5369V3.64546ZM11.3155 16.7304V11.6556H12.8155V16.7304L15.1501 14.3959L16.2107 15.4565L12.0655 19.6018L7.92031 15.4565L8.98097 14.3959L11.3155 16.7304Z"
								fill="#242220" />
						</svg>
					</a>
					<? endif; ?>
					<? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
					<a href="javascript:void(0)" class="show-gallery">
						<span>
							Открыть галерею
						</span>
						<div class="g-count">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect x="2" y="2" width="20" height="20" rx="5" stroke="#242220" stroke-width="1.5" />
								<path
									d="M2.5 17.5L4.7592 15.8863C5.47521 15.3749 6.45603 15.456 7.07822 16.0782L8.15147 17.1515C8.6201 17.6201 9.3799 17.6201 9.84853 17.1515L14.8377 12.1623C15.496 11.504 16.5476 11.4563 17.2628 12.0523L22 16"
									stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
								<circle cx="2" cy="2" r="2" transform="matrix(-1 0 0 1 10 6)" stroke="#242220"
									stroke-width="1.5" />
							</svg>
							<span>
								<?= count($arResult['PROPERTIES']['GALLERY']['VALUE']); ?>
							</span>
						</div>
					</a>
					<? endif; ?>
				</div>
			</div>
			<div class="gallery-wrap">
				<!-- Главный слайдер -->
				<? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
				<div class="splide main-slider" id="main-slider" data-move-target=".detail-product_sm-info h1"
					data-move-break="1050">
					<div class="gallery-icon">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M5.36539 16.1349L1.75 16.1349C1.19772 16.1349 0.75 15.6871 0.75 15.1349L0.75 11.5195M1.51918 15.3657L6.9038 9.98112M16.1344 5.36539L16.1344 1.75C16.1344 1.19772 15.6867 0.75 15.1344 0.75L11.519 0.75M15.3652 1.51927L9.98054 6.90388"
								stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
						</svg>
					</div>
					<div class="splide__track">
						<ul class="splide__list">
							<? foreach($arResult['PROPERTIES']['GALLERY']['VALUE'] as $img): ?>
							<li class="splide__slide">
								<a data-fancybox="product" href="<?= CFile::GetPath($img); ?>">
									<img src="<?= CFile::GetPath($img); ?>" alt="">
								</a>
							</li>
							<? endforeach; ?>
						</ul>
					</div>
					<div class="slider-navigation">
						<button class="custom-detail__arrow custom-detail__prev">
							<svg width="17" height="10" viewBox="0 0 17 10" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M4.33593 8.75L1.04304 5.45711C0.652517 5.06658 0.652517 4.43342 1.04304 4.04289L4.33593 0.75M1.33594 4.75L15.3359 4.75"
									stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
							</svg>
						</button>
						<ul class="splide__pagination"></ul>
						<button class="custom-detail__arrow custom-detail__next">
							<svg width="17" height="10" viewBox="0 0 17 10" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M11.75 8.75L15.0429 5.45711C15.4334 5.06658 15.4334 4.43342 15.0429 4.04289L11.75 0.75M14.75 4.75L0.75 4.75"
									stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
							</svg>
						</button>
					</div>
				</div>
				
				<!-- Вертикальный слайдер-миниатюры -->
				<div class="splide thumbs-slider" id="thumbs-slider">
					<div class="splide__track">
						<ul class="splide__list">
							<? foreach($arResult['PROPERTIES']['GALLERY']['VALUE'] as $img): ?>
							<li class="splide__slide">
								<img src="<?= CFile::GetPath($img); ?>" alt="">
							</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div>
				<? endif; ?>
			</div>

		</div>
	</div>
</section>
<section class="section similar">
	<div class="container">
		<div class="similar-head">
			<div class="similar-head__left">
				<h2>
					Похожие<br>
					<span>
						запросы
					</span>
				</h2>
				<ul class="tab-content__similar-links">
					<li>
						<a href="javascript:void(0)" class="tab-content__similar-link" data-tab="price">
							По цене
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="tab-content__similar-link active" data-tab="district">
							По району
						</a>
					</li>
				</ul>
			</div>
			<div class="similar-arrows">
				<button class="slider-arrow similar-arrow similar-arrow__prev">
					<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.94712 1.06069L1.05855 4.94995L4.94764 8.83904M1.62934 4.94966L15.6293 4.94965"
							stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
					</svg>
				</button>
				<button class="slider-arrow similar-arrow similar-arrow__next">
					<svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
						<path d="M11.4357 1.06069L15.3243 4.94995L11.4352 8.83904M14.7535 4.94966L0.753469 4.94965"
							stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
					</svg>
				</button>
			</div>
		</div>
	</div>
	<div class="tab-content__similar-content" data-tab="price">
		<div class="splide similar-slider">
			<div class="splide__track">
				<ul class="splide__list similar-items">
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
				</ul>
				<a href="javascript:void(0)" class="similar-show__more">
					Показать еще
				</a>
			</div>
		</div>
	</div>
	<div class="tab-content__similar-content" data-tab="district" style="display: none;">
		<div class="splide similar-slider">
			<div class="splide__track">
				<ul class="splide__list similar-items">
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
					<li class="splide__slide catalog-item">
						<a href="javascript:void(0)">
							<div class="catalog-item__image">
								<div class="splide catalog-images__slider">
									<div class="splide__track">
										<ul class="splide__list">
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
											<li class="splide__slide">
												<img src="./assets/img/ct.jpg"
													alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
											</li>
										</ul>
									</div>
								</div>
								<div class="catalog-item__tag">
									участок 30 соток
								</div>
							</div>
							<div class="catalog-item__body">
								<div class="catalog-item__prices">
									<div class="catalog-item__price">
										957 242 300 ₽
									</div>
									<div class="catalog-item__old-price">
										998 242 300 ₽
									</div>
									<div class="catalog-item__sale">
										-41%
									</div>
								</div>
								<div class="catalog-item__info">
									<div class="catalog-item__name">
										Дом в коттеджном поселке «Crystal Istra», 1000 м²
									</div>
									<div class="catalog-item__location">
										14 км от МКАД, Новорижское шоссе
									</div>
								</div>
								<div class="fake-product-btn">
									<span>
										Подробнее
									</span>
									<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
											stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
									</svg>
								</div>
							</div>
							<ul class="catalog-item__filters">
								<li class="catalog-item__filter">
									участок 30 соток
								</li>
								<li class="catalog-item__filter">
									чистовая отделка
								</li>
								<li class="catalog-item__filter">
									6 спален
								</li>
								<li class="catalog-item__filter">
									2 этажа
								</li>
							</ul>
						</a>
					</li>
				</ul>
				<a href="javascript:void(0)" class="similar-show__more">
					Показать еще
				</a>
			</div>
		</div>
	</div>
</section>