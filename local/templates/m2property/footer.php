</main>
<footer>
  <div class="container">
    <div class="footer-inner">
      <div class="footer-top">
        <a href="javascript:void(0)" class="footer-logo">
          <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/f-logo.svg" alt="logo">
        </a>
        <? $APPLICATION->IncludeComponent(
          "bitrix:highloadblock.list",
          "socials",
          array(
            "BLOCK_ID" => "7",	// ID highload блока
            "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
            "DETAIL_URL" => "",	// Путь к странице просмотра записи
            "FILTER_NAME" => "",	// Идентификатор фильтра
            "PAGEN_ID" => "",	// Идентификатор страницы
            "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
            "SORT_FIELD" => "ID",	// Поле сортировки
            "SORT_ORDER" => "ASC",	// Направление сортировки
            "LOC_CLASS" => "footer-social"
          ),
          false
        ); ?>
        <div class="footer-form__title">
          Оставьте ваши контакты и мы непременно Вам перезвоним
        </div>
      </div>
      <div class="footer-bottom">
        <? $APPLICATION->IncludeComponent(
          "bitrix:menu",
          "footer_menu",
          array(
            "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
            "MAX_LEVEL" => "1",	// Уровень вложенности меню
            "CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
          ),
          false
        ); ?>
        <ul class="footer-contacts">
          <li>
            <div class="footer-contacts__label">
              Адрес офиса:
            </div>
            <? $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "standard.php",
                "PATH" => "/include/general/address.php"
              )
            ); ?>
          </li>
          <li>
            <div class="footer-contacts__label">
              Телефон:
            </div>
            <? $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "standard.php",
                "PATH" => "/include/general/phone.php"
              )
            ); ?>
          </li>
          <li>
            <div class="footer-contacts__label">
              Email:
            </div>
            <? $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "standard.php",
                "PATH" => "/include/general/email.php"
              )
            ); ?>
          </li>
          <li>
            <div class="footer-contacts__label">
              Время работы:
            </div>
            <? $APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "",
                "EDIT_TEMPLATE" => "standard.php",
                "PATH" => "/include/general/worktime.php"
              )
            ); ?>
          </li>
        </ul>
        <div class="footer-form">
          <? $APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"footer_form", 
	array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"WEB_FORM_ID" => "1",
		"COMPONENT_TEMPLATE" => "footer_form",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "",
			"RESULT_ID" => "",
		)
	),
	false
); ?>
        </div>
      </div>
      <div class="requizites">
        <div class="requizites-item">
          <div class="requizites-text">
            Реквизиты компании
          </div>
        </div>
        <div class="requizites-item">
          <div class="requizites-text">
            ИНН/ОГРН
          </div>
        </div>
      </div>
    </div>
    <div class="under-footer">
      <div class="inder-footer__decor">
        <img src="./assets/img//graphic.png" alt="img">
      </div>
      <div class="footer-copy">
        Copyright © 2025 М2-Проперти
      </div>
      <a href="javascript:void(0)" class="doc-link">
        Пользовательское соглашение
      </a>
      <a href="javvascript:void(0)" class="doc-link">
        Политика конфиденциальности
      </a>
    </div>
  </div>
</footer>
</body>

</html>