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
	<section class="mainscreen-hp">
		<div class="splide slider-hp">
			<div class="splide__track">
				<ul class="splide__list">
					<? $count = 1;
					foreach($arResult['ITEMS'] as $arItem): ?>
					<li class="splide__slide">
						<div class="slider-hp__image">
							<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $arItem['NAME']; ?>">
						</div>

						<div class="mainscreen-hp__inner">
							<div class="container">
								<div class="mainscreen-hp__info">
									<? if($count == 1): ?>
									<h1>
										<?= $arItem['NAME']; ?>
									</h1>
									<? else: ?>
										<h2>
											<?= $arItem['NAME']; ?>
										</h2>
									<? endif; ?>
									<div class="mainscreen-hp__description">
										<?= $arItem['PREVIEW_TEXT']; ?>
									</div>
									<a href="<?= $arItem['DISPLAY_PROPERTIES']['BTN_LINK']['VALUE']; ?>" class="all-projects">
										<span>
											<?= $arItem['DISPLAY_PROPERTIES']['BTN_TEXT']['VALUE']; ?>
										</span>
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M12.0028 7L17.5025 7.00049V12.5005M17.0987 7.40389L7.19922 17.3034"
												stroke="white" stroke-width="1.5" stroke-miterlimit="16"
												stroke-linecap="square" />
										</svg>
									</a>
								</div>
							</div>
						</div>
					</li>
					<? $count++; endforeach; ?>
				</ul>
			</div>
			<div class="mainscreen-hp__navigation">
				<button class="mainscreen-hp__arrow mainscreen-hp__arrow-prev">
					<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M4.33593 8.75L1.04304 5.45711C0.652517 5.06658 0.652517 4.43342 1.04304 4.04289L4.33593 0.75M1.33594 4.75L15.3359 4.75"
							stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round" />
					</svg>
				</button>
				<ul class="splide__pagination"></ul>
				<button class="mainscreen-hp__arrow mainscreen-hp__arrow-next">
					<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M11.75 8.75L15.0429 5.45711C15.4334 5.06658 15.4334 4.43342 15.0429 4.04289L11.75 0.75M14.75 4.75L0.75 4.75"
							stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round" />
					</svg>
				</button>
			</div>
		</div>

	</section>
<? endif; ?>