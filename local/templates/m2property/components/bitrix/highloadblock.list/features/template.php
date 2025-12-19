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
	<div class="tabs-hp-container">
		<!-- Контент табов -->
		<div class="tabs-hp-content">
			<div class="tabs-hp-content__item active" data-tab="1">
				<div class="hp-slider-navigation">
					<button class="hp-slider-arrow hp-slider-arrow-prev"><svg width="17" height="10" viewBox="0 0 17 10"
							fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
								stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
						</svg>
					</button>
					<button class="hp-slider-arrow hp-slider-arrow-next"><svg width="17" height="10" viewBox="0 0 17 10"
							fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
								stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
						</svg>
					</button>
				</div>
				<div id="hp-slider__content" class="splide hp-slider__content">
					<div class="splide__track hp-slider__content">
						<ul class="splide__list">
							<? foreach($arResult['rows'] as $row): ?>
							<li class="splide__slide hp-slider__slide">
								<p>
									<?= $row['UF_NAME'] ?>
								</p>
								<span>
									<?= $row['UF_DESCR'] ?>
								</span>
							</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="tabs-hp-content__dots">
			<ul class="splide__pagination"></ul>
		</div>
	</div>
<? endif; ?>