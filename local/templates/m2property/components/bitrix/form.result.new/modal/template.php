<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @var array $arResult
 */

?>
<div class="modal-form">
	<? if ($arResult["isFormNote"] == "Y") { ?>
		<script>
			const thnkModal = document.querySelector('.modal__thankyou');
			const activeModal = document.querySelector('.modal-form');
			//const overlay = document.querySelector('.overlay');
			const html = document.querySelector('html');

			if(activeModal && thnkModal) {
				activeModal.classList.remove('active');
				thnkModal.classList.add('active');
			}
		</script>
	<? } elseif ($arResult["isFormNote"] != "Y") { ?>
		<?= $arResult["FORM_HEADER"] ?>
		<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { 
			$required = $arQuestion['REQUIRED'];
		?>
			<? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] != "checkbox") { ?>
				<div class="input-wrap">
					<?= recreateTextField($FIELD_SID, $arQuestion, $arQuestion["STRUCTURE"][0]["FIELD_TYPE"], false, $required); ?>
				</div>
			<? } ?>
		<? } ?>

		<input class="submit" type="submit" name="web_form_submit"
			value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == "" ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>">

		<div class="agreed-col">
			<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { 
				$required = $arQuestion['REQUIRED'];
			?>
				<? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "checkbox") { ?>
					<label class="custom-checkbox">
						<?= recreateTextField($FIELD_SID, $arQuestion, $arQuestion["STRUCTURE"][0]["FIELD_TYPE"], false, $required); ?>
						<span class="custom-checkbox__box"></span>
						<span class="custom-checkbox__text"><?= $arQuestion['CAPTION']; ?></span>
					</label>
				<? } ?>
			<? } ?>
		</div>
		<?= $arResult["FORM_FOOTER"]; ?>
	<? } ?>
</div>