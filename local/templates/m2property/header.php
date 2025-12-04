<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? use Bitrix\Main\Page\Asset; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title><? $APPLICATION->ShowTitle(); ?></title>
	<? echo $APPLICATION->GetPageProperty('description'); ?>
	<? echo $APPLICATION->GetPageProperty('keywords'); ?>
	<? 
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/main.css');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js');

  $APPLICATION->ShowHead();
	?>
</head>

<body>
  <div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
  </div>
  <header>
    <div class="header-inner">
      <div class="container">
        <div class="header-navigation">
          <a href="javascript:void(0)" class="logo">
            <img src="./assets/img/logo.svg" alt="img">
          </a>
          <nav>
            <ul class="nav-menu">
              <li>
                <a href="javascript:void(0)">
                  Главная
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  О компании
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  Наши услуги
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  Проекты
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  Контакты
                </a>
              </li>
            </ul>
          </nav>
          <button type="button" class="consult">
            Заказать консультацию
          </button>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="breadcrumbs">
        <nav>
          <ul>
            <li>
              <a href="javascript:void(0)">
                Главная
              </a>

            </li>
            <li>
              <span>
                Каталог
              </span>
            </li>
          </ul>
        </nav>
      </div>
    </div>
