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
//p($arResult);
if(!empty($arResult['SECTIONS'])):
?>
<ul class="filters-cats">
	<? foreach($arResult['SECTIONS'] as $arSection): 
	$text_count = '';
	if($arSection['ELEMENT_CNT'] <= 0) {
		continue;
	} elseif($arSection['ELEMENT_CNT'] == 1) {
		$text_count = 'предложение';
	} elseif($arSection['ELEMENT_CNT'] > 1 && $arSection['ELEMENT_CNT'] < 5) {
		$text_count = 'предложения';
	} else {
		$text_count = 'предложений';
	}
	?>
	<li <?= $APPLICATION->GetCurPage() == $arSection['SECTION_PAGE_URL'] ? 'class="active"' : ''; ?> >
		<a href="<?= $arSection['SECTION_PAGE_URL']; ?>">
			<div class="filters-cats__name">
				<?= $arSection['NAME']; ?>
			</div>
			<div class="filters-cats__count">
				<?= $arSection['ELEMENT_CNT'] . ' ' . $text_count; ?>
			</div>
			<img src="<?= $arSection['PICTURE']['SRC']; ?>" alt="<?= $arSection['NAME']; ?>">
		</a>
	</li>
	<? endforeach; ?>
</ul>
<? endif; ?>