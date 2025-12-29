<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die(); ?>
<? use Bitrix\Main\Page\Asset; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title><? $APPLICATION->ShowTitle(); ?></title>
  <? echo $APPLICATION->GetPageProperty('description'); ?>
  <? echo $APPLICATION->GetPageProperty('keywords'); ?>
  <?
  Asset::getInstance()->addCss('/assets/css/fancybox.css');
  Asset::getInstance()->addCss('/assets/css/splide.min.css');
  Asset::getInstance()->addCss('/assets/css/main.css');
  Asset::getInstance()->addCss('/assets/css/catalog.css');
  Asset::getInstance()->addJs('/assets/js/fancybox.umd.js');
  Asset::getInstance()->addJs('/assets/js/splide.min.js');
  Asset::getInstance()->addJs('/assets/js/main.js');

  $APPLICATION->ShowHead();
  ?>
</head>

<body>
  <div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
  </div>
  <? $currentPage = $APPLICATION->GetCurPage(); ?>
  <header>
    <div class="header-inner">
      <div class="container">
        <div class="header-navigation">
          <a href="/" class="logo">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.svg" alt="img">
          </a>
          <div class="nav-wrapper <?= $currentPage == '/' ? 'darken' : ''; ?>">
            <div class="nav-content">
              <div class="nav-content__head">
                <a href="javascript:void(0)" class="logo">
                  <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.svg" alt="img">
                </a>
                <button type="button" class="close-menu">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="14.1406" width="20" height="1.5" rx="0.75" transform="rotate(-45 0 14.1406)"
                      fill="#73716F" />
                    <rect x="1.06055" y="0.148438" width="20" height="1.5" rx="0.75"
                      transform="rotate(45 1.06055 0.148438)" fill="#73716F" />
                  </svg>
                </button>
              </div>
              <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
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
              );?>
              <button type="button" class="consult" data-modal="open-modal">
                Заказать консультацию
              </button>
              <?$APPLICATION->IncludeComponent("bitrix:highloadblock.list", "socials", Array(
                "BLOCK_ID" => "7",	// ID highload блока
                  "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
                  "DETAIL_URL" => "",	// Путь к странице просмотра записи
                  "FILTER_NAME" => "",	// Идентификатор фильтра
                  "PAGEN_ID" => "",	// Идентификатор страницы
                  "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
                  "SORT_FIELD" => "ID",	// Поле сортировки
                  "SORT_ORDER" => "ASC",	// Направление сортировки
                  "LOC_CLASS" => "header-social"
                ),
                false
              );?>
            </div>
          </div>
          <button type="button" class="burger">
            <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="20" height="1.5" rx="0.75" fill="#73716F" />
              <rect y="5" width="20" height="1.5" rx="0.75" fill="#73716F" />
              <rect y="10" width="20" height="1.5" rx="0.75" fill="#73716F" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>
  <main>
    <? 
    $page = '';

    if($currentPage == '/') {
      Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/homepage.css');
    }

    if (preg_match('#/catalog/.+/.+/#', $currentPage)) {
      $page = 'detail';
    }

    if ($page === 'detail') {
      Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/detail-product.css');
    }
    ?>
    <div class="container">
      <? 
    if($APPLICATION->GetCurPage() !== '/'): ?>
      <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "m2_crumbs", Array(
        "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
          "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
          "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
          "COMPONENT_TEMPLATE" => ""
        ),
        false
      );?>
    <? endif; ?>
    </div>