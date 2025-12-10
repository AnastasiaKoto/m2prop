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

use Bitrix\Iblock\SectionPropertyTable;

$this->setFrameMode(true);
if(!empty($arResult["ITEMS"])):
	//p($arResult);
?>
<form class="filters-inner smartfilter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
	<?endforeach;?>
	<div class="filtes-selects">
		<?foreach($arResult["ITEMS"] as $key=>$arItem) { ?>
			<? if ($key !== 'SORT'): ?>
				<? if($arItem['CODE'] === 'SQUARE'): 
				if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0) continue;
				$squareRanges = [];
				$arCur = current($arItem["VALUES"]);
				$squareRanges = [
					[
						'min' => 10,
						'max' => 20,
						'name' => '10 - 20 м2',
						'control_name_suffix' => '_range_0',
						'control_id_suffix' => '_range_0'
					],
					[
						'min' => 20.01,
						'max' => 40,
						'name' => '20 - 40 м2',
						'control_name_suffix' => '_range_1',
						'control_id_suffix' => '_range_1'
					],
					[
						'min' => 40.01,
						'max' => 60,
						'name' => '40 - 60 м2',
						'control_name_suffix' => '_range_2',
						'control_id_suffix' => '_range_2'
					],
					[
						'min' => 60.01,
						'max' => 80,
						'name' => '60 - 80 м2',
						'control_name_suffix' => '_range_3',
						'control_id_suffix' => '_range_3'
					],
					[
						'min' => 80.01,
						'max' => 120,
						'name' => '80 - 120 м2',
						'control_name_suffix' => '_range_4',
						'control_id_suffix' => '_range_4'
					],
					[
						'min' => 120.01,
						'max' => 200,
						'name' => '120 - 200 м2',
						'control_name_suffix' => '_range_5',
						'control_id_suffix' => '_range_5'
					],
					[
						'min' => 200.01,
						'max' => 500,
						'name' => '200 - 500 м2',
						'control_name_suffix' => '_range_6',
						'control_id_suffix' => '_range_6'
					],
					[
						'min' => 500.01,
						'max' => 1200,
						'name' => '500 - 1200 м2',
						'control_name_suffix' => '_range_7',
						'control_id_suffix' => '_range_7'
					],
					[
						'min' => 1200.01,
						'max' => 99999,
						'name' => 'от 1200 м2',
						'control_name_suffix' => '_range_8',
						'control_id_suffix' => '_range_8'
					]
				];
				$radio_name = $arItem["VALUES"]["MIN"]["CONTROL_NAME"] . '_custom_ranges';
				foreach ($squareRanges as &$range) {
					$range['control_name'] = $radio_name;
					$range['control_id'] = $arItem["VALUES"]["MIN"]["CONTROL_ID"] . $range['control_id_suffix'];
				}
				unset($range);

				$currentMin = floatval($arItem["VALUES"]["MIN"]["HTML_VALUE"]);
				$currentMax = floatval($arItem["VALUES"]["MAX"]["HTML_VALUE"]);
				$isAllSelected = empty($currentMin) && empty($currentMax);

				$selectedRangeIndex = null;
				$selectedRangeName = 'Любая';
				
				if (!$isAllSelected) {
					foreach ($squareRanges as $index => $range) {
						if ($currentMin == $range['min'] && $currentMax == $range['max']) {
							$selectedRangeIndex = $index;
							$selectedRangeName = $range['name'];
							break;
						}
					}
				}
				?>
				<!-- Площадь -->
				<div class="select-wrap">
					<div class="select-label"><?=$arItem["NAME"]?></div>
					<div class="select" data-select="square">
						<input
							type="hidden"
							name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
							id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
							value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
						/>
						<input
							type="hidden"
							name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
							id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
							value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
						/>
						<div class="select__current" data-select-current>
							<span class="select__value"><?= $selectedRangeName ?></span>
							<div class="select__arrow">
								<svg width="16" height="9" viewBox="0 0 16 9" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
									fill="#7C8589" />
								</svg>
							</div>
						</div>
						<ul class="select__list" data-select-list>
							<li data-select-item <?=$isAllSelected ? 'class="selected"' : ''?>>
								<label class="custom-radio">
									<input
										type="radio"
										value="all"
										name="<?= $radio_name; ?>"
										id="<?= "all_".$arCur["CONTROL_ID"] ?>"
										<?=$isAllSelected ? 'checked' : ''?>
										class="square-all-radio"
										data-action="clear"
									/>
									<span class="custom-radio__mark"></span>
									<span class="custom-radio__text">Любая</span>
								</label>
							</li>
							<?foreach($squareRanges as $index => $range):?>
							<li data-select-item <?=($selectedRangeIndex === $index) ? 'class="selected"' : ''?>>
								<label class="custom-radio">
									<input 
										type="radio" 
										name="<?= $radio_name; ?>" 
										id="<?=$range['control_id']?>" 
										value="<?=$range['min']?>-<?=$range['max']?>" 
										data-min="<?=$range['min']?>" 
										data-max="<?=$range['max']?>"
										class="square-range-radio"
										<?=($selectedRangeIndex === $index) ? 'checked' : ''?>
									/>
									<span class="custom-radio__mark"></span>
									<span class="custom-radio__text"><?=$range['name']?></span>
								</label>
							</li>
							<?endforeach;?>
						</ul>
					</div>
				</div>
				<script>
					BX.ready(function(){
						function initRanges() {
							var minInput = document.getElementById('<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>');
							var maxInput = document.getElementById('<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>');
							var allRadio = document.getElementById('<?= "all_".$arCur["CONTROL_ID"] ?>');
							var rangeRadios = document.querySelectorAll('input.square-range-radio');
							var selectValue = document.querySelector('.select__value');
							var radioGroupName = '<?= $radio_name; ?>';
							
							// Функция обновления скрытых полей
							function updateHiddenFields() {
								var selectedRadio = document.querySelector('input[name="' + radioGroupName + '"]:checked');
								
								if (selectedRadio) {
									if (selectedRadio.classList.contains('square-all-radio')) {
										// Если выбрано "Все"
										minInput.value = '';
										maxInput.value = '';
									} else {
										// Если выбран диапазон
										var min = parseFloat(selectedRadio.getAttribute('data-min'));
										var max = parseFloat(selectedRadio.getAttribute('data-max'));
										minInput.value = min;
										maxInput.value = max;
									}
									smartFilter.keyup(minInput);
									smartFilter.keyup(maxInput);
								}
							}
							
							// Обработчики для всех радиокнопок
							if (allRadio) {
								allRadio.addEventListener('click', updateHiddenFields);
							}
							
							rangeRadios.forEach(function(radio) {
								radio.addEventListener('click', updateHiddenFields);
							});
							
							// Восстановление состояния при загрузке
							updateHiddenFields();
						}
						
						initRanges();
					});
				</script>
				<? elseif($arItem['CODE'] === 'NEW_PRICE'): 
					if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0) continue;
				?>
					<!-- Стоимость -->
					<div class="price-range">
						<div class="price-rabge__item-label"><?=$arItem["NAME"]?></div>
						<div class="price-range__items">
							<div class="price-range__item">
								<div class="price-range__input-wrap">
									<span>от</span>
									<div class="price-range__input">
									<input
										class="min-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
										value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
									/>
									</div>
								</div>
							</div>
							<div class="price-range__item">
								<div class="price-range__input-wrap">
									<span>до</span>
									<div class="price-range__input">
									<input
										class="max-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
										value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
									/>
									</div>
								</div>
							</div>
						</div>
					</div>
				<? else: ?>
					<!-- Сделка -->
					<?
					$arCur = current($arItem["VALUES"]);
					$curSelect = 'Любой';
					foreach($arItem["VALUES"] as $val => $ar):
						if($ar["CHECKED"]) {
							$curSelect = $ar["VALUE"];
							break;
						}
					endforeach;
					?>
					<div class="select-wrap">
						<div class="select-label"><?= $arItem['NAME']; ?></div>
						<div class="select" data-select="<?= $arItem['CODE']; ?>">
							<div class="select__current" data-select-current>
								<span class="select__value"><?= $curSelect; ?></span>
								<div class="select__arrow">
									<svg width="16" height="9" viewBox="0 0 16 9" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
										fill="#7C8589" />
									</svg>
								</div>
							</div>
							<ul class="select__list bubbles" data-select-list>
								<li data-select-item>
									<label class="custom-radio">
										<input
											type="radio"
											value=""
											name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
											id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
											onclick="smartFilter.click(this)"
										/>
										<span class="custom-radio__mark"></span>
										<span class="custom-radio__text">Все</span>
									</label>
								</li>
								<?foreach($arItem["VALUES"] as $val => $ar):?>
								<li data-select-item <? echo $ar["CHECKED"]? 'class="selected"': '' ?>>
									<label class="custom-radio">
										<input
											type="radio"
											value="<? echo $ar["HTML_VALUE_ALT"] ?>"
											name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
											id="<? echo $ar["CONTROL_ID"] ?>"
											<? echo $ar["CHECKED"] ? 'checked="checked"': '' ?>
											onclick="smartFilter.click(this)"
										/>
										<span class="custom-radio__mark"></span>
										<span class="custom-radio__text"><?=$ar["VALUE"];?></span>
									</label>
								</li>
								<? endforeach; ?>
							</ul>
						</div>
					</div>
				<? endif; ?>
			<? endif; ?>
		<? } ?>

	</div>

	<div class="filters-bottom">
		<?foreach($arResult["ITEMS"] as $key=>$arItem) { ?>
			<? if ($key === 'SORT'): ?>
				<? foreach ($arItem as $sortKey => $sortOption): 
					$currentSort = 'По умолчанию';
					if($sortOption['ACTIVE']) {
						$currentSort = $sortOption['NAME'];
						break;
					}
				endforeach;
				?>
			<div class="filters-sort">
				<div class="select-wrap">
					<div class="select" data-select="sort">
						<div class="select__current" data-select-current>
							<span class="select__value"><?= $currentSort; ?></span>
							<div class="select__arrow">
								<svg width="16" height="9" viewBox="0 0 16 9" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd"
									d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
									fill="#7C8589" />
								</svg>
							</div>
						</div>
						<ul class="select__list sort-list" data-select-list>
							<? foreach ($arItem as $sortKey => $sortOption): 
							?>
							<li data-select-item <?= $sortOption['ACTIVE'] ? 'class="selected"' : '' ?>>
								<label class="custom-radio">
									<input type="radio" name="sort_radios" data-sort="<?= $sortOption['SORT'] ?>" data-name="<?= $sortKey; ?>" <?= $sortOption['ACTIVE'] ? 'checked' : '' ?> value="<?= $sortOption['ORDER'] ?>">
									<span class="custom-radio__mark"></span>
									<span class="custom-radio__text"><?= $sortOption['NAME']; ?></span>
								</label>
							</li>
							<? endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		<? endif;
		}
		?>
		<div class="filters-right">
			<button class="reset-filters" type="submit" id="del_filter" name="del_filter">
				Сбросить фильтры
			</button>
			<div id="modef" class="filters-result">
				Найдено: <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.(int)($arResult["ELEMENT_COUNT"] ?? 0).'</span>'));?>
				<a style="display: none;" href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
			</div>
			<button class="filters-apply" type="submit" id="set_filter" name="set_filter">Показать</button>
		</div>
	</div>
</form>
<? endif; ?>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
<script>
	const form = document.querySelector('form[name="<?echo $arResult["FILTER_NAME"]."_form"?>"]');
	
	function handleSortClick() {
		if (!form) return;
		document.querySelectorAll('.sort-list li').forEach(item => {
			if(item !== this.closest('li')) {
				item.classList.remove('selected');
			}
		});
		
		const radio = this;
		const sortInput = form.querySelector('input[name="sort"]');
		const sortFieldInput = form.querySelector('input[name="sort_field"]');
		const sortOrderInput = form.querySelector('input[name="sort_order"]');

		
		if (sortInput && sortFieldInput && sortOrderInput) {
			sortInput.value = this.getAttribute('data-name');
			sortFieldInput.value = this.getAttribute('data-sort');
			sortOrderInput.value = this.value;
		}
	}

	document.querySelectorAll('input[name="sort_radios"]').forEach(input => {
		input.addEventListener('click', handleSortClick);
	});

	function checkActiveFilters() {
		if (!form) return;
		var checkedInputs = form.querySelectorAll('input[type="radio"]:checked');
		var firstCheckedInput = null;
		checkedInputs.forEach(function(input) {
			if (input.value !== "") {
				if (!firstCheckedInput) {
                    firstCheckedInput = input;
                }
			}
		});
		return firstCheckedInput;
	}

	BX.ready(function() {
		var result = checkActiveFilters();
		if (typeof smartFilter !== 'undefined' && result) {
			setTimeout(function() {
				smartFilter.reload(result);
			}, 300);
		}
	})
</script>
<? /*
<div class="bx-filter <?=$templateData["TEMPLATE_CLASS"]?> <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") echo "bx-filter-horizontal"?>">
	<div class="bx-filter-section container-fluid">
		<div class="row"><div class="<?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-title"><?echo GetMessage("CT_BCSF_FILTER_TITLE")?></div></div>
		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
			<div class="row">
				<?foreach($arResult["ITEMS"] as $key=>$arItem)//prices
				{
					$key = $arItem["ENCODED_ID"];
					if(isset($arItem["PRICE"])):
						if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
							continue;

						$precision = 0;
						$step_num = 4;
						$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
						$prices = array();
						if (Bitrix\Main\Loader::includeModule("currency"))
						{
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
							}
							$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
						}
						else
						{
							$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
							}
							$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
						}
						?>
						<div class="<?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-parameters-box bx-active">
							<span class="bx-filter-container-modef"></span>
							<div class="bx-filter-parameters-box-title" onclick="smartFilter.hideFilterProps(this)"><span><?=$arItem["NAME"]?> <i data-role="prop_angle" class="fa fa-angle-<?if (isset($arItem["DISPLAY_EXPANDED"]) && $arItem["DISPLAY_EXPANDED"] == "Y"):?>up<?else:?>down<?endif?>"></i></span></div>
							<div class="bx-filter-block" data-role="bx_filter_block">
								<div class="row bx-filter-parameters-box-container">
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_FROM")?></i>
										<div class="bx-filter-input-container">
											<input
												class="min-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_TO")?></i>
										<div class="bx-filter-input-container">
											<input
												class="max-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>

									<div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
										<div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
											<?for($i = 0; $i <= $step_num; $i++):?>
											<div class="bx-ui-slider-part p<?=$i+1?>"><span><?=$prices[$i]?></span></div>
											<?endfor;?>

											<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-range" id="drag_tracker_<?=$key?>"  style="left: 0%; right: 0%;">
												<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
												<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?
						$arJsParams = array(
							"leftSlider" => 'left_slider_'.$key,
							"rightSlider" => 'right_slider_'.$key,
							"tracker" => "drag_tracker_".$key,
							"trackerWrap" => "drag_track_".$key,
							"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
							"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
							"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
							"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
							"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
							"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
							"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
							"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
							"precision" => $precision,
							"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
							"colorAvailableActive" => 'colorAvailableActive_'.$key,
							"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
						);
						?>
						<script>
							BX.ready(function(){
								window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
							});
						</script>
					<?endif;
				}

				//not prices
				foreach($arResult["ITEMS"] as $key=>$arItem)
				{
					if(
						empty($arItem["VALUES"])
						|| isset($arItem["PRICE"])
					)
						continue;

					if (
						$arItem["DISPLAY_TYPE"] === SectionPropertyTable::NUMBERS_WITH_SLIDER
						&& ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
					)
						continue;
					?>
					<div class="<?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-parameters-box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>bx-active<?endif?>">
						<span class="bx-filter-container-modef"></span>
						<div class="bx-filter-parameters-box-title" onclick="smartFilter.hideFilterProps(this)">
							<span class="bx-filter-parameters-box-hint"><?=$arItem["NAME"]?>
								<?if ($arItem["FILTER_HINT"] <> ""):?>
									<i id="item_title_hint_<?echo $arItem["ID"]?>" class="fa fa-question-circle"></i>
									<script>
										new top.BX.CHint({
											parent: top.BX("item_title_hint_<?echo $arItem["ID"]?>"),
											show_timeout: 10,
											hide_timeout: 200,
											dx: 2,
											preventHide: true,
											min_width: 250,
											hint: '<?= CUtil::JSEscape($arItem["FILTER_HINT"])?>'
										});
									</script>
								<?endif?>
								<i data-role="prop_angle" class="fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>up<?else:?>down<?endif?>"></i>
							</span>
						</div>

						<div class="bx-filter-block" data-role="bx_filter_block">
							<div class="row bx-filter-parameters-box-container">
							<?
							$arCur = current($arItem["VALUES"]);
							switch ($arItem["DISPLAY_TYPE"])
							{
								case SectionPropertyTable::NUMBERS_WITH_SLIDER://NUMBERS_WITH_SLIDER
									?>
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_FROM")?></i>
										<div class="bx-filter-input-container">
											<input
												class="min-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_TO")?></i>
										<div class="bx-filter-input-container">
											<input
												class="max-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>

									<div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
										<div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
											<?
											$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
											$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / 4;
											$value1 = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
											$value2 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step, $precision, ".", "");
											$value3 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 2, $precision, ".", "");
											$value4 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 3, $precision, ".", "");
											$value5 = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
											?>
											<div class="bx-ui-slider-part p1"><span><?=$value1?></span></div>
											<div class="bx-ui-slider-part p2"><span><?=$value2?></span></div>
											<div class="bx-ui-slider-part p3"><span><?=$value3?></span></div>
											<div class="bx-ui-slider-part p4"><span><?=$value4?></span></div>
											<div class="bx-ui-slider-part p5"><span><?=$value5?></span></div>

											<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
												<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
												<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
											</div>
										</div>
									</div>
									<?
									$arJsParams = array(
										"leftSlider" => 'left_slider_'.$key,
										"rightSlider" => 'right_slider_'.$key,
										"tracker" => "drag_tracker_".$key,
										"trackerWrap" => "drag_track_".$key,
										"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
										"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
										"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
										"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
										"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
										"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
										"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
										"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
										"precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
										"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
										"colorAvailableActive" => 'colorAvailableActive_'.$key,
										"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
									);
									?>
									<script>
										BX.ready(function(){
											window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
										});
									</script>
									<?
									break;
								case SectionPropertyTable::NUMBERS://NUMBERS
									?>
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_FROM")?></i>
										<div class="bx-filter-input-container">
											<input
												class="min-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
												/>
										</div>
									</div>
									<div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_TO")?></i>
										<div class="bx-filter-input-container">
											<input
												class="max-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
												/>
										</div>
									</div>
									<?
									break;
								case SectionPropertyTable::CHECKBOXES_WITH_PICTURES://CHECKBOXES_WITH_PICTURES
									?>
									<div class="col-xs-12">
										<div class="bx-filter-param-btn-inline">
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<input
												style="display: none"
												type="checkbox"
												name="<?=$ar["CONTROL_NAME"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<?=$ar["HTML_VALUE"]?>"
												<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
											/>
											<?
											$class = "";
											if ($ar["CHECKED"])
												$class.= " bx-active";
											if ($ar["DISABLED"])
												$class.= " disabled";
											?>
											<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label <?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
												<span class="bx-filter-param-btn bx-color-sl">
													<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
													<span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
													<?endif?>
												</span>
											</label>
										<?endforeach?>
										</div>
									</div>
									<?
									break;
								case SectionPropertyTable::CHECKBOXES_WITH_PICTURES_AND_LABELS://CHECKBOXES_WITH_PICTURES_AND_LABELS
									?>
									<div class="col-xs-12">
										<div class="bx-filter-param-btn-block">
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<input
												style="display: none"
												type="checkbox"
												name="<?=$ar["CONTROL_NAME"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<?=$ar["HTML_VALUE"]?>"
												<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
											/>
											<?
											$class = "";
											if ($ar["CHECKED"])
												$class.= " bx-active";
											if ($ar["DISABLED"])
												$class.= " disabled";
											?>
											<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
												<span class="bx-filter-param-btn bx-color-sl">
													<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
														<span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
													<?endif?>
												</span>
												<span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
												if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
													?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
												endif;?></span>
											</label>
										<?endforeach?>
										</div>
									</div>
									<?
									break;
								case SectionPropertyTable::DROPDOWN://DROPDOWN
									$checkedItemExist = false;
									?>
									<div class="col-xs-12">
										<div class="bx-filter-select-container">
											<div class="bx-filter-select-block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
												<div class="bx-filter-select-text" data-role="currentOption">
													<?
													foreach ($arItem["VALUES"] as $val => $ar)
													{
														if ($ar["CHECKED"])
														{
															echo $ar["VALUE"];
															$checkedItemExist = true;
														}
													}
													if (!$checkedItemExist)
													{
														echo GetMessage("CT_BCSF_FILTER_ALL");
													}
													?>
												</div>
												<div class="bx-filter-select-arrow"></div>
												<input
													style="display: none"
													type="radio"
													name="<?=$arCur["CONTROL_NAME_ALT"]?>"
													id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
													value=""
												/>
												<?foreach ($arItem["VALUES"] as $val => $ar):?>
													<input
														style="display: none"
														type="radio"
														name="<?=$ar["CONTROL_NAME_ALT"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<? echo $ar["HTML_VALUE_ALT"] ?>"
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
												<?endforeach?>
												<div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none;">
													<ul>
														<li>
															<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
																<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
															</label>
														</li>
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
													?>
														<li>
															<label for="<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
														</li>
													<?endforeach?>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<?
									break;
								case SectionPropertyTable::DROPDOWN_WITH_PICTURES_AND_LABELS://DROPDOWN_WITH_PICTURES_AND_LABELS
									?>
									<div class="col-xs-12">
										<div class="bx-filter-select-container">
											<div class="bx-filter-select-block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
												<div class="bx-filter-select-text fix" data-role="currentOption">
													<?
													$checkedItemExist = false;
													foreach ($arItem["VALUES"] as $val => $ar):
														if ($ar["CHECKED"])
														{
														?>
															<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
																<span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
															<?endif?>
															<span class="bx-filter-param-text">
																<?=$ar["VALUE"]?>
															</span>
														<?
															$checkedItemExist = true;
														}
													endforeach;
													if (!$checkedItemExist)
													{
														?><span class="bx-filter-btn-color-icon all"></span> <?
														echo GetMessage("CT_BCSF_FILTER_ALL");
													}
													?>
												</div>
												<div class="bx-filter-select-arrow"></div>
												<input
													style="display: none"
													type="radio"
													name="<?=$arCur["CONTROL_NAME_ALT"]?>"
													id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
													value=""
												/>
												<?foreach ($arItem["VALUES"] as $val => $ar):?>
													<input
														style="display: none"
														type="radio"
														name="<?=$ar["CONTROL_NAME_ALT"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE_ALT"]?>"
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
												<?endforeach?>
												<div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none">
													<ul>
														<li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
															<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
																<span class="bx-filter-btn-color-icon all"></span>
																<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
															</label>
														</li>
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
													?>
														<li>
															<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
																<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
																	<span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
																<?endif?>
																<span class="bx-filter-param-text">
																	<?=$ar["VALUE"]?>
																</span>
															</label>
														</li>
													<?endforeach?>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<?
									break;
								case SectionPropertyTable::RADIO_BUTTONS://RADIO_BUTTONS
									?>
									<div class="col-xs-12">
										<div class="radio">
											<label class="bx-filter-param-label" for="<? echo "all_".$arCur["CONTROL_ID"] ?>">
												<span class="bx-filter-input-checkbox">
													<input
														type="radio"
														value=""
														name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
														id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
														onclick="smartFilter.click(this)"
													/>
													<span class="bx-filter-param-text"><? echo GetMessage("CT_BCSF_FILTER_ALL"); ?></span>
												</span>
											</label>
										</div>
										<?foreach($arItem["VALUES"] as $val => $ar):?>
											<div class="radio">
												<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label" for="<? echo $ar["CONTROL_ID"] ?>">
													<span class="bx-filter-input-checkbox <? echo $ar["DISABLED"] ? 'disabled': '' ?>">
														<input
															type="radio"
															value="<? echo $ar["HTML_VALUE_ALT"] ?>"
															name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
															id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
															onclick="smartFilter.click(this)"
														/>
														<span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
														if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
															?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
														endif;?></span>
													</span>
												</label>
											</div>
										<?endforeach;?>
									</div>
									<?
									break;
								case SectionPropertyTable::CALENDAR://CALENDAR
									?>
									<div class="col-xs-12">
										<div class="bx-filter-parameters-box-container-block"><div class="bx-filter-input-container bx-filter-calendar-container">
											<?$APPLICATION->IncludeComponent(
												'bitrix:main.calendar',
												'',
												array(
													'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
													'SHOW_INPUT' => 'Y',
													'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
													'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
													'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
													'SHOW_TIME' => 'N',
													'HIDE_TIMEBAR' => 'Y',
												),
												null,
												array('HIDE_ICONS' => 'Y')
											);?>
										</div></div>
										<div class="bx-filter-parameters-box-container-block"><div class="bx-filter-input-container bx-filter-calendar-container">
											<?$APPLICATION->IncludeComponent(
												'bitrix:main.calendar',
												'',
												array(
													'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
													'SHOW_INPUT' => 'Y',
													'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
													'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
													'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
													'SHOW_TIME' => 'N',
													'HIDE_TIMEBAR' => 'Y',
												),
												null,
												array('HIDE_ICONS' => 'Y')
											);?>
										</div></div>
									</div>
									<?
									break;
								default://CHECKBOXES
									?>
									<div class="col-xs-12">
										<?foreach($arItem["VALUES"] as $val => $ar):?>
											<div class="checkbox">
												<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
													<span class="bx-filter-input-checkbox">
														<input
															type="checkbox"
															value="<? echo $ar["HTML_VALUE"] ?>"
															name="<? echo $ar["CONTROL_NAME"] ?>"
															id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
															onclick="smartFilter.click(this)"
														/>
														<span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
														if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
															?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
														endif;?></span>
													</span>
												</label>
											</div>
										<?endforeach;?>
									</div>
							<?
							}
							?>
							</div>
							<div style="clear: both"></div>
						</div>
					</div>
				<?
				}
				?>
			</div><!--//row-->
			<div class="row">
				<div class="col-xs-12 bx-filter-button-box">
					<div class="bx-filter-block">
						<div class="bx-filter-parameters-box-container">
							<input
								class="btn btn-themes"
								type="submit"
								id="set_filter"
								name="set_filter"
								value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
							/>
							<input
								class="btn btn-link"
								type="submit"
								id="del_filter"
								name="del_filter"
								value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
							/>
							<div class="bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
								<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.(int)($arResult["ELEMENT_COUNT"] ?? 0).'</span>'));?>
								<span class="arrow"></span>
								<br/>
								<a href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clb"></div>
		</form>
	</div>
</div>
*/?>