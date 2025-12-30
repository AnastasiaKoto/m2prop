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
if (!empty($arResult['ITEMS'])): ?>
	<section class="projects-hp">
		<div class="container">
			<div class="projects-hp__inner">
				<div class="projects-navigation">
					<button class="project-large__arrow project-large__arrow-prev">
						<div class="icon">
							<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
									stroke="white" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
							</svg>
						</div>
					</button>
					<ul class="splide__pagination"></ul>
					<button class="project-large__arrow project-large__arrow-next">
						<div class="icon">
							<svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
									stroke="white" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
							</svg>
						</div>
					</button>
				</div>
				<div class="projects-hp__left">
					<div class="projects-hp__left-head">
						<div class="projects-hp__left-info">
							<h2>
								Наши<br />
								<span>
									проекты
								</span>
							</h2>
							<div class="projects-hp__description">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_RECURSIVE" => "Y",
										"EDIT_TEMPLATE" => "standard.php",
										"PATH" => "/include/mainpage/projects_descr.php"
									)
								); ?>
							</div>
						</div>
						<a href="/catalog/" class="all-projects" data-move-target=".projects-hp__left-info h2"
                data-move-break="992">
							<span>
								Смотреть все
							</span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.0028 7L17.5025 7.00049V12.5005M17.0987 7.40389L7.19922 17.3034" stroke="white"
									stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
							</svg>
						</a>
					</div>
					<? if (!empty($arResult['NUMBERS'])): ?>
						<ul class="projects-adv">
							<? foreach($arResult['NUMBERS'] as $row): ?>
							<li>
								<p>
									<?= $row['UF_NUMBER']; ?>
								</p>
								<span>
									<?= $row['UF_TITLE']; ?>
								</span>
							</li>
							<? endforeach; ?>
						</ul>
					<? endif; ?>
					<div class="splide project-small__slide">
						<div class="splide__track">
							<ul class="splide__list">
								<? foreach($arResult['ITEMS'] as $arItem): ?>
								<li class="splide__slide">
									<? if(!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])): ?>
									<img src="<?= CFile::GetPath($arItem['PROPERTIES']['GALLERY']['VALUE'][0]); ?>" alt="img">
									<? endif; ?>
									<div class="layer-bg"></div>
									<? if(!empty($arItem['PROPERTIES']['CLASS']['VALUE'])): ?>
									<div class="project-small__tag">
										<?= $arItem['PROPERTIES']['CLASS']['VALUE']; ?>
									</div>
									<? endif; ?>
									<div class="project-small__name">
										<?= $arItem['NAME'] ?>
									</div>
									<div class="project-small__arrow">
										<svg width="13" height="13" viewBox="0 0 13 13" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M5.86411 0.75L11.3639 0.750488V6.25049M10.96 1.15389L1.06055 11.0534"
												stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
												stroke-linecap="square" />
										</svg>
									</div>
								</li>
								<? endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="projects-hp__right">
					<div class="splide project-large__slide">

						<div class="splide__track">
							<ul class="splide__list">
								<? 
								$elements = $arResult['ITEMS'];
								$firstElement = array_shift($elements);
								array_push($elements, $firstElement);
								foreach($elements as $arItem): ?>
								<li class="splide__slide">
									<? if(!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])): ?>
									<img src="<?= CFile::GetPath($arItem['PROPERTIES']['GALLERY']['VALUE'][0]); ?>" alt="img">
									<? endif; ?>
									<div class="blur-layer"></div>
									<div class="project_small_info">
										<div class="project_small_info-left">
											<div class="project_small_info-title">
												<?= $arItem['NAME']; ?>
											</div>
											<div class="project_small_info-address">
												<address>
													<?= $arItem['PROPERTIES']['TIME_TO_WAY']['VALUE']; ?>
												</address>
												<span>
													<?= $arItem['PROPERTIES']['TIME_TO_STATION']['VALUE']; ?>
												</span>
											</div>
											<? if(!empty($arItem['PROPERTIES']['TAGS']['VALUE'])): ?>
											<ul class="project_small_info-bubbles">
												<? foreach($arItem['PROPERTIES']['TAGS']['VALUE'] as $tag): ?>
												<li>
													<?= $tag; ?>
												</li>
												<? endforeach; ?>
											</ul>
											<? endif; ?>
										</div>
										<div class="project_small_info-right">
											<? if(!empty($arItem['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
											<div class="project_small_info-price">
												<span>от</span> ₽ <?= number_format($arItem['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', '.'); ?>
											</div>
											<? endif; ?>
											<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="project-link__more">
												<span>
													Подробнее
												</span>
												<div class="icon">
													<svg width="13" height="13" viewBox="0 0 13 13" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M5.86411 0.75L11.3639 0.750488V6.25049M10.96 1.15389L1.06055 11.0534"
															stroke="white" stroke-width="1.5" stroke-miterlimit="16"
															stroke-linecap="square" />
													</svg>
												</div>
											</a>
										</div>
									</div>
								</li>
								<? endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>