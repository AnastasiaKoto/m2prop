<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @var array $arResult
 */

?>
<? if ($arResult["isFormNote"] == "Y") {?>
	<script>
		const thnkModal = document.querySelector('.modal__thankyou');
		const overlay = document.querySelector('.overlay');
		const html = document.querySelector('html');

		if(overlay && thnkModal) {
			thnkModal.classList.add('active');
			overlay.classList.add('active');
		}
	</script>
<? } elseif ($arResult["isFormNote"] != "Y") { ?>
	<?= $arResult["FORM_HEADER"] ?>
	<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { 
		$required = $arQuestion['REQUIRED'];
	?>
		<? if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] != "checkbox") {  ?>
		<div class="input-wrap">
			<?= recreateTextField($FIELD_SID, $arQuestion, $arQuestion["STRUCTURE"][0]["FIELD_TYPE"], false, $required); ?>
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
<? } ?>