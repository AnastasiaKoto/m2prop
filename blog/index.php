<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
?>
<?$APPLICATION->IncludeComponent("bitrix:news", "blog", Array(
	"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"AJAX_MODE" => "Y",	// Включить режим AJAX
		"IBLOCK_TYPE" => "news",	// Тип инфоблока
		"IBLOCK_ID" => "8",	// Инфоблок
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"USE_SEARCH" => "Y",	// Разрешить поиск
		"USE_RSS" => "Y",	// Разрешить RSS
		"USE_RATING" => "Y",	// Разрешить голосование
		"USE_CATEGORIES" => "Y",	// Выводить материалы по теме
		"USE_REVIEW" => "Y",	// Разрешить отзывы
		"USE_FILTER" => "Y",	// Показывать фильтр
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"LIST_FIELD_CODE" => "",	// Поля
		"LIST_PROPERTY_CODE" => "",	// Свойства
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",	// Скрывать ссылку, если нет детального описания
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"DETAIL_SET_CANONICAL_URL" => "Y",	// Устанавливать канонический URL
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"DETAIL_FIELD_CODE" => "",	// Поля
		"DETAIL_PROPERTY_CODE" => "",	// Свойства
		"DETAIL_DISPLAY_TOP_PAGER" => "Y",	// Выводить над списком
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
		"DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
		"DETAIL_PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
		"SET_LAST_MODIFIED" => "Y",	// Устанавливать в заголовках ответа время модификации страницы
		"PAGER_BASE_LINK_ENABLE" => "Y",	// Включить обработку ссылок
		"SET_STATUS_404" => "Y",	// Устанавливать статус 404
		"SHOW_404" => "Y",	// Показ специальной страницы
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",	// Url для построения ссылок (по умолчанию - автоматически)
		"PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"USE_PERMISSIONS" => "Y",	// Использовать дополнительное ограничение доступа
		"GROUP_PERMISSIONS" => array(	// Группы пользователей, имеющие доступ к детальной информации
			0 => "1",
		),
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_FILTER" => "Y",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"DISPLAY_TOP_PAGER" => "Y",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"FILTER_NAME" => "",	// Фильтр
		"FILTER_FIELD_CODE" => "",	// Поля
		"FILTER_PROPERTY_CODE" => "",	// Свойства
		"NUM_NEWS" => "20",	// Количество новостей для экспорта
		"NUM_DAYS" => "30",	// Количество дней для экспорта
		"YANDEX" => "Y",	// Экспортировать в диалект Яндекса
		"MAX_VOTE" => "5",	// Максимальный балл
		"VOTE_NAMES" => array(	// Подписи к баллам
			0 => "0",
			1 => "1",
			2 => "2",
			3 => "3",
			4 => "4",
		),
		"CATEGORY_IBLOCK" => "",	// Инфоблоки
		"CATEGORY_CODE" => "CATEGORY",	// Код свойства
		"CATEGORY_ITEMS_COUNT" => "5",	// Максимальное количество материалов из одного инфоблока
		"MESSAGES_PER_PAGE" => "10",	// Количество сообщений на одной странице
		"USE_CAPTCHA" => "Y",	// Использовать CAPTCHA
		"REVIEW_AJAX_POST" => "Y",	// Использовать AJAX в диалогах
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",	// Путь относительно корня сайта к папке со смайлами
		"FORUM_ID" => "1",	// ID форума для отзывов
		"URL_TEMPLATES_READ" => "",	// Страница чтения темы (пусто - получить из настроек форума)
		"SHOW_LINK_TO_FORUM" => "Y",	// Показать ссылку на форум
		"POST_FIRST_MESSAGE" => "Y",
		"SEF_FOLDER" => "/blog/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_URL_TEMPLATES" => array(
			"detail" => "#ELEMENT_CODE#/",
			"news" => "",
			"section" => "",
		),
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"VARIABLE_ALIASES" => array(
			"detail" => "",
			"news" => "",
			"section" => "",
		),
		"USE_SHARE" => "Y",	// Отображать панель соц. закладок
		"SHARE_HIDE" => "Y",	// Не раскрывать панель соц. закладок по умолчанию
		"SHARE_TEMPLATE" => "",	// Шаблон компонента панели соц. закладок
		"SHARE_HANDLERS" => array(	// Используемые соц. закладки и сети
			0 => "delicious",
			1 => "lj",
			2 => "twitter",
		),
		"SHARE_SHORTEN_URL_LOGIN" => "",	// Логин для bit.ly
		"SHARE_SHORTEN_URL_KEY" => "",	// Ключ для для bit.ly
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>