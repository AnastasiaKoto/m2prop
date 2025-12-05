<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @var array $arResult
 */

?>
<? if ($arResult["isFormNote"] == "Y") {
	if (isset($_REQUEST['RESULT_ID'])) {
		$resultId = intval($_REQUEST['RESULT_ID']);
		$fieldId = 0;
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
			if ($FIELD_SID == 'PHONE') {
				$fieldId = $arQuestion['STRUCTURE'][0]['ID'];
				break;
			}
		}
	}
	?>
	<div class="thx-inner">
	</div>
	<?/*
	<script>
		document.querySelector('.main_section-title').style.display = 'none';
		document.querySelector('.main_question-form__form-subtitle').style.display = 'none';
	</script>
	*/?>
<? } elseif ($arResult["isFormNote"] != "Y") { ?>
	<?= $arResult["FORM_HEADER"] ?>
	<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { ?>
		<? if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] != "checkbox") {  ?>
		<div class="input-wrap">
			<?= recreateTextField($FIELD_SID, $arQuestion, $arQuestion["STRUCTURE"][0]["FIELD_TYPE"]); ?>
		</div>
		<? } ?>
	<? } ?>
	<input class="submit" type="submit" name="web_form_submit"
		value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == "" ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>">
	<div class="form-policy">
		Нажимая на кнопку «Отправить», вы соглашаетесь с <a href="javascript:void(0)"> Политикой
			конфиденциальности</a>
	</div>
	<?= $arResult["FORM_FOOTER"]; ?>
	<?
	if ($arResult["isFormErrors"] == "Y") {
		$fields = [];
		foreach ($arResult['FORM_ERRORS'] as $key => $value) {
			$fields[] = $key;
		}
		p($fields);
		?>
		<?/*
		<script>
			(() => {
				var fields = <?= json_encode($fields, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;

				const form = document.querySelector('.question-form__inner form[name="<?= $arResult['arForm']['SID']; ?>"]');
				if (Array.isArray(fields) && fields.length > 0) {
					fields.forEach(field => {
						field = field + '<?= $prefix ?>';
						let parent = form.querySelector(`#${field}`).closest('.input-wrapper');
						if (!parent.classList.contains('error')) {
							parent.classList.add('error');
						}
					});
				}
			})();
		</script>
		*/?>
	<? } ?>
<? } ?>