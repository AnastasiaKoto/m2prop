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
				if ((int)$arItem["VALUES"]["MAX"]["VALUE"] - (int)$arItem["VALUES"]["MIN"]["VALUE"] <= 0) continue;
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
					if ((int)$arItem["VALUES"]["MAX"]["VALUE"] - (int)$arItem["VALUES"]["MIN"]["VALUE"] <= 0) continue;
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