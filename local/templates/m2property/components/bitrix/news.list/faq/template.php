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
	<section class="faq">
		<div class="container">
			<div class="faq-inner">
				<div class="faq-left">
					<h2>
						<span>
							Частые
						</span>
						вопросы
					</h2>
					<img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/faq.png" alt="img">
				</div>
				<div class="faq-acc">
					<ul class="faq-acc__items">
						<? foreach($arResult['ITEMS'] as $arItem): ?>
						<li class="faq-acc__item ">
							<div class="faq-acc__item-head">
								<div class="faq-acc__item-head-title">
									<?= $arItem['NAME']; ?>
								</div>
								<div class="faq-acc__item-head__arrow">
									<svg width="16" height="9" viewBox="0 0 16 9" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
											fill="#7C8589" />
									</svg>
								</div>
							</div>
							<div class="faq-acc__item-content">
								<?= $arItem['PREVIEW_TEXT']; ?>
							</div>
						</li>
						<? endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>