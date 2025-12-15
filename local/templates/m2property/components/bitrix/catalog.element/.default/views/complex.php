<? p($arResult); ?>
<? 
$project_name = $arResult['NAME'];
$address = $arResult['PROPERTIES']['OBJECT_ADDRESS']['VALUE'] ?? false;
$station = $arResult['PROPERTIES']['TIME_TO_STATION']['VALUE'] ?? false;
$way = $arResult['PROPERTIES']['TIME_TO_WAY']['VALUE'] ?? false;
if(!empty($arResult['PROPERTIES']['PRESENTATION']['VALUE'])) {
    $presentation = CFile::GetPath($arResult['PROPERTIES']['PRESENTATION']['VALUE']);
}
?>
<? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
<div class="detail-product-image">
    <img src="<?= $arResult['PROPERTIES']['GALLERY']['VALUE'][0]; ?>" alt="<?= $project_name; ?>">
    <div class="layer"></div>
</div>
<? endif; ?>
<section class="detail-products__ms">
    <div class="container">
        <div class="detail-products__ms-inner">
            <div class="detail-products__ms-address">
                <? if($address): ?>
                <address>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.7232 2.75895C20.6613 2.44624 21.5538 3.33873 21.2411 4.27684L16.1845 19.4467C15.8561 20.4318 14.5163 20.5631 14.0029 19.6603L10.9078 14.2172C10.6409 13.7478 10.2522 13.3591 9.78283 13.0922L4.33973 9.99712C3.437 9.4838 3.56824 8.14394 4.55342 7.81555L19.7232 2.75895Z"
                            stroke="white" stroke-width="1.5" />
                        <path d="M12.7852 11.2109L10.7852 13.2109" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>
                        <?= $address; ?>
                    </span>
                </address>
                <? endif; ?>
                <? if($station): ?>
                <span class="metro">
                    <?= $station; ?>
                </span>
                <? endif; ?>
            </div>
            <h1>
                <?= $project_name; ?>
            </h1>
            <p>
                <?= $arResult['PREVIEW_TEXT']; ?>
            </p>
            <div class="detail-products__ms-bottom">
                <div class="detail-products__ms-bottom-left">
                    <? if(!empty($arResult['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
                    <div class="detail-products__ms-bottom__item">
                        <div class="detail-products__ms-bottom-label">
                            квартиры от
                        </div>
                        <div class="detail-products__ms-bottom__value">
                            <?= number_format($arResult['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', ' ') . ' ₽'; ?>
                        </div>
                    </div>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['SQUARE']['VALUE'])): ?>
                    <div class="detail-products__ms-bottom__item">
                        <div class="detail-products__ms-bottom-label">
                            площадь от
                        </div>
                        <div class="detail-products__ms-bottom__value">
                            <?= $arResult['PROPERTIES']['SQUARE']['VALUE']; ?> м²
                        </div>
                    </div>
                    <? endif; ?>
                </div>
                <div class="detail-products__ms-bottom-right">
                    <? if($presentation): ?>
                    <a href="<?= $presentation; ?>" class="donwload" download>
                        <span>
                            Скачать презентацию
                        </span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.3125 1.09375H14.096L20.6908 7.64241V22.9062H3.3125V1.09375ZM4.8125 2.59375V21.4062H19.1908V8.70461H13.0369V2.59375H4.8125ZM14.5369 3.64546L18.1211 7.20461H14.5369V3.64546ZM11.3155 16.7304V11.6556H12.8155V16.7304L15.1501 14.3959L16.2107 15.4565L12.0655 19.6018L7.92031 15.4565L8.98097 14.3959L11.3155 16.7304Z"
                                fill="#242220" />
                        </svg>
                    </a>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
                    <a href="javascript:void(0)" class="show-gallery">
                        <span>
                            Открыть галерею
                        </span>
                        <span class="gallery-count">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="20" height="20" rx="5" stroke="#242220" stroke-width="1.5" />
                                <path
                                    d="M2.5 17.5L4.7592 15.8863C5.47521 15.3749 6.45603 15.456 7.07822 16.0782L8.15147 17.1515C8.6201 17.6201 9.3799 17.6201 9.84853 17.1515L14.8377 12.1623C15.496 11.504 16.5476 11.4563 17.2628 12.0523L22 16"
                                    stroke="#242220" stroke-width="1.5" stroke-linecap="round" />
                                <circle cx="2" cy="2" r="2" transform="matrix(-1 0 0 1 10 6)" stroke="#242220"
                                    stroke-width="1.5" />
                            </svg>
                            <span>
                                <?= count($arResult['PROPERTIES']['GALLERY']['VALUE']); ?> фото
                            </span>
                        </span>
                    </a>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section product-feed">
    <div class="container">
        <div class="product-feed__inner">
            <div class="product-feed__main-info">
                <ul class="product-feed__main-info__items">
                    <? if(!empty($arResult['PROPERTIES']['CLASS']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['CLASS']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= $arResult['PROPERTIES']['CLASS']['VALUE']; ?>
                        </div>
                    </li>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['NEW_PRICE']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= number_format($arResult['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', ' ') . ' ₽'; ?>
                        </div>
                    </li>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['SQUARE']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['SQUARE']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= $arResult['PROPERTIES']['SQUARE']['VALUE'] . ' м²'; ?>
                        </div>
                    </li>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['FLOORS']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['FLOORS']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= $arResult['PROPERTIES']['FLOORS']['VALUE']; ?>
                        </div>
                    </li>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['APARTMENTS_COUNT']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['APARTMENTS_COUNT']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= $arResult['PROPERTIES']['APARTMENTS_COUNT']['VALUE']; ?>
                        </div>
                    </li>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['DEADLINE']['VALUE'])): ?>
                    <li>
                        <div class="product-feed__main-info__item-label">
                            <?= $arResult['PROPERTIES']['DEADLINE']['NAME']; ?>
                        </div>
                        <div class="product-feed__main-info__item-value">
                            <?= $arResult['PROPERTIES']['DEADLINE']['VALUE']; ?>
                        </div>
                    </li>
                    <? endif; ?>
                </ul>
            </div>
            <? if(!empty($arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'])): ?>
            <ul class="product-feed__image-grid">
                <? foreach($arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'] as $feature): ?>
                <li>
                    <div class="product-feed__image-grid__img">
                        <img src="<?= $feature['UF_FILE']; ?>" alt="<?= $feature['UF_DESCRIPTION']; ?>">
                    </div>
                    <div class="product-feed__image-grid__info">
                        <div class="product-feed__image-grid__info-label">
                            <?= $feature['UF_DESCRIPTION']; ?>
                        </div>
                        <div class="product-feed__image-grid__info-value">
                            <?= $feature['UF_FULL_DESCRIPTION']; ?>
                        </div>
                    </div>
                </li>
                <? endforeach; ?>
            </ul>
            <? endif; ?>
        </div>
    </div>
</section>
<? if(!empty($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'])): ?>
<section class="plans">
    <div class="container">
        <div class="plans-inner">
            <h2>
                Планировка<br>
                <span>
                    в комплексе <?= $project_name; ?>
                </span>
            </h2>
            <div class="plans-tabs">
                <div class="plans-tabs__buttons">
                    <? foreach($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'] as $key => $tab_btn): ?>
                    <button class="plans-tabs__button <?= $key == 0 ? 'active' : ''; ?>" data-tab="<?= $key; ?>">
                        <div class="plans-tabs__button-left">
                            <div class="plans-tabs__button-left__num">
                                <?= $tab_btn['UF_ROOMS']; ?>
                            </div>
                            <span>
                                <?= (int)$tab_btn['UF_ROOMS'] < 2 ? 'Спальня' : 'Спальни'; ?>
                            </span>
                        </div>
                        <div class="plans-tabs__button-right">
                            <? if($tab_btn['UF_PRICE']): ?>
                            <div class="plans-tabs__button-price">
                                <span>
                                    от
                                </span>
                                <?= number_format((int)$tab_btn['UF_PRICE'], 0, '', '.') . '₽'; ?>
                            </div>
                            <? if($tab_btn['UF_SQUARE']): 
                            $pricePerMert = round(($tab_btn['UF_PRICE'] / $tab_btn['UF_SQUARE']));
                            ?>
                            <div class="plans-tabs__button-small__price">
                                <?= 'от ' . number_format($pricePerMert, 0, '', ' ') . '₽/м2'; ?>
                            </div>
                            <? endif; ?>
                            <? endif; ?>
                            <div class="plans-tabs__button-bubbles">
                                <? if($tab_btn['UF_SQUARE']): ?>
                                <div class="plans-tabs__button-bubble">
                                    от <?= $tab_btn['UF_SQUARE']; ?> м2
                                </div>
                                <? endif; ?>
                                <div class="plans-tabs__button-bubble gray">
                                    <? if($tab_btn['UF_VARIANTS']): ?>
                                    <p>
                                        <?= $tab_btn['UF_VARIANTS']; ?> вариант
                                    </p>
                                    <? endif; ?>
                                    <span>
                                        <?= $tab_btn['UF_TYPE']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </button>
                    <? endforeach; ?>
                </div>
                <? foreach($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'] as $key => $tab_btn): ?>
                <div class="plans-tabs__content <?= $key == 0 ? 'active' : ''; ?>" data-tab="<?= $key; ?>">
                    <div class="plans-tabs__map-inner">
                        <div class="plans-tabs__map">
                            <img src="<?= $tab_btn['UF_FILE'] ?>" alt="img">
                        </div>
                        <div class="plans-tabs__map-info">
                            <div class="plans-tabs__map-info__left">
                                <div class="plans-tabs__map-info__title">
                                    <?= $tab_btn['UF_DESCRIPTION'] ?>
                                </div>
                                <div class="plans-tabs__map-info__address">
                                    <address>
                                        <?= $way; ?>
                                    </address>
                                    <span>
                                        <?= $station; ?>
                                    </span>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="plan-btn__more">
                                <span>
                                    Подробнее
                                </span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9989 7L17.4986 7.00049V12.5005M17.0948 7.40389L7.19531 17.3034"
                                        stroke="white" stroke-width="1.5" stroke-miterlimit="16"
                                        stroke-linecap="square" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>
<? endif; ?>
<? if(!empty($arResult['PROPERTIES']['COMPLEX']['VALUE'])): ?>
<section class="detail-about">
    <div class="container">
        <div class="detail-about__inner">
            <div class="detail-about__head">
                <h2>
                    О комплексе<br>
                    <span>
                        <?= $project_name; ?>
                    </span>
                </h2>
                <div class="buttons-wrap">
                    <? if($presentation): ?>
                    <a href="<?= $presentation; ?>" class="donwload" download="">
                        <span>
                            Скачать презентацию
                        </span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.3125 1.09375H14.096L20.6908 7.64241V22.9062H3.3125V1.09375ZM4.8125 2.59375V21.4062H19.1908V8.70461H13.0369V2.59375H4.8125ZM14.5369 3.64546L18.1211 7.20461H14.5369V3.64546ZM11.3155 16.7304V11.6556H12.8155V16.7304L15.1501 14.3959L16.2107 15.4565L12.0655 19.6018L7.92031 15.4565L8.98097 14.3959L11.3155 16.7304Z"
                                fill="#242220"></path>
                        </svg>
                    </a>
                    <? endif; ?>
                    <? if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])): ?>
                    <a href="javascript:void(0)" class="show-gallery">
                        <span>
                            Открыть галерею
                        </span>
                        <span class="gallery-count">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="20" height="20" rx="5" stroke="#242220" stroke-width="1.5">
                                </rect>
                                <path
                                    d="M2.5 17.5L4.7592 15.8863C5.47521 15.3749 6.45603 15.456 7.07822 16.0782L8.15147 17.1515C8.6201 17.6201 9.3799 17.6201 9.84853 17.1515L14.8377 12.1623C15.496 11.504 16.5476 11.4563 17.2628 12.0523L22 16"
                                    stroke="#242220" stroke-width="1.5" stroke-linecap="round"></path>
                                <circle cx="2" cy="2" r="2" transform="matrix(-1 0 0 1 10 6)" stroke="#242220"
                                    stroke-width="1.5">
                                </circle>
                            </svg>
                            <span>
                                <?= count($arResult['PROPERTIES']['GALLERY']['VALUE']); ?> фото
                            </span>
                        </span>
                    </a>
                    <? endif; ?>
                </div>
            </div>
            <div class="point__tabs">
                <div class="slider-wrapper">
                    <div class="secondary-slider__tabs splide">
                        <div class="splide__track">
                            <ul class="splide__list point__tab-btns">
                                <? foreach($arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'] as $key => $element): ?>
                                <li class="splide__slide point__tab-btn"><?= $element['NAME']; ?></li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="main-slider__tabs splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <? foreach($arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'] as $key => $element): ?>
                                <li class="splide__slide point__tab-content">
                                    <div class="fade-slider splide">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                <li class="splide__slide">
                                                    <img src="./assets/img/slidet1.png" alt="img">
                                                    <div class="blur"></div>
                                                    <div class="main-slider__tabs-text">
                                                        На закрытой территории обустроены ландшафтные дворы с длинными
                                                        променадами для ваших
                                                        прогулок. Поработать на свежем воздухе вы сможете в лаунж-зонах
                                                        с навесами или в
                                                        коворкинге в окружении зелени.<br><br>
                                                        Для отдыха после — отправляйтесь на лужайку около фонтана, где
                                                        вы сможете почитать книгу
                                                        и поиграть с детьми. На спортивной площадке организуйте турнир
                                                        по стритболу или
                                                        кардиотренировку. Залог бодрого дня — пробежка по сети
                                                        спортивных дорожек. Для более
                                                        спокойного досуга — столы для настольных игр и пинг-понга,
                                                        петанк. 
                                                    </div>
                                                </li>
                                                <li class="splide__slide">
                                                    <img src="./assets/img/slidet1.png" alt="img">
                                                    <div class="blur"></div>
                                                    <div class="main-slider__tabs-text">
                                                        На закрытой территории обустроены ландшафтные дворы с длинными
                                                        променадами для ваших
                                                        прогулок. Поработать на свежем воздухе вы сможете в лаунж-зонах
                                                        с навесами или в
                                                        коворкинге в окружении зелени.<br><br>
                                                        Для отдыха после — отправляйтесь на лужайку около фонтана, где
                                                        вы сможете почитать книгу
                                                        и поиграть с детьми. На спортивной площадке организуйте турнир
                                                        по стритболу или
                                                        кардиотренировку. Залог бодрого дня — пробежка по сети
                                                        спортивных дорожек. Для более
                                                        спокойного досуга — столы для настольных игр и пинг-понга,
                                                        петанк. 
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="fade-slider__arrows">
                                        <button class="fade-slider__arrow fade-slider__arrow-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="fade-slider__arrow fade-slider__arrow-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<? endif; ?>
<? if($presentation): ?>
<section class="donwload-banner">
    <div class="container">
        <div class="donwload-banner__inner">
            <div class="donwload-banner__image">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/donwload-img.png" alt="<?= $project_name; ?>">
            </div>
            <h2>
                <span>
                    Скачайте
                </span>
                презентацию
                комплекса <?= $project_name; ?>
            </h2>
            <p>
                В презентации — расположение, архитектура, инфраструктура, информация о квартирах и техническом
                оснащении
                комплекса
            </p>
            <a href="<?= $presentation; ?>" class="donwload-link">
                <span>
                    Скачать презентацию
                </span>
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4H26.6155L38 15.4086V42H8V4ZM10.5894 6.61319V39.3868H35.4106V17.2591H24.7871V6.61319H10.5894ZM27.3766 8.44541L33.564 14.6459H27.3766V8.44541ZM21.8155 31.2411V22.4001H24.405V31.2411L28.4351 27.174L30.2661 29.0218L23.1103 36.2433L15.9544 29.0218L17.7854 27.174L21.8155 31.2411Z"
                        fill="white" />
                </svg>
            </a>
        </div>
    </div>
</section>
<? endif; ?>
<? if(!empty($arResult['PROPERTIES']['MAP']['VALUE'])): ?>
<section class="map-section">
    <div class="container">
        <div class="map-section__inner">
            <div class="map-section__head">
                <h2>
                    <span>
                        <?= $project_name; ?>
                    </span>
                    на карте
                </h2>
                <div class="map-section__address">
                    <address>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.7232 2.75895C20.6613 2.44624 21.5538 3.33873 21.2411 4.27684L16.1845 19.4467C15.8561 20.4318 14.5163 20.5631 14.0029 19.6603L10.9078 14.2172C10.6409 13.7478 10.2522 13.3591 9.78283 13.0922L4.33973 9.99712C3.437 9.4838 3.56824 8.14394 4.55342 7.81555L19.7232 2.75895Z"
                                stroke="#242220" stroke-width="1.5" />
                            <path d="M12.7852 11.2109L10.7852 13.2109" stroke="#242220" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>
                            <?= $address; ?>
                        </span>
                    </address>
                    <span>
                        <?= $station; ?>
                    </span>
                </div>
            </div>
            <div class="map-frame">
                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['MAP']['VALUE']); ?>" alt="map">
            </div>
        </div>
    </div>
</section>
<? endif; ?>
<section class="places">
    <div class="container">
        <div class="places-inner">
            <div class="places-inner__left">
                <h2>
                    Места<br>
                    <span>
                        поблизости
                    </span>
                </h2>
            </div>
            <div class="slider-wrapper places-sliders">
                <div class="secondary-slider__tabs splide">
                    <div class="splide__track">
                        <ul class="splide__list point__tab-btns">
                            <li class="splide__slide point__tab-btn">Парк «Покровское-Стрешнево»</li>
                            <li class="splide__slide point__tab-btn">ТРЦ «Авиапарк»</li>
                            <li class="splide__slide point__tab-btn">«ВТБ Арена»</li>
                            <li class="splide__slide point__tab-btn">«Петровский парк»</li>
                            <li class="splide__slide point__tab-btn">Белорусский вокзал</li>
                            <li class="splide__slide point__tab-btn">«Серебряный бор»</li>
                            <li class="splide__slide point__tab-btn">Парк «Ходынское Поле»</li>
                            <li class="splide__slide point__tab-btn">ТРЦ «Афимолл Сити»</li>
                            <li class="splide__slide point__tab-btn">ДЦ «Москва-Сити»</li>
                            <li class="splide__slide point__tab-btn">Кремль</li>
                        </ul>
                    </div>
                </div>
                <div class="main-slider__tabs splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                            <li class="splide__slide point__tab-content">
                                <img src="./assets/img/place.png" alt="img">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="steps">
    <div class="container">
        <div class="steps-inner">
            <div class="steps-inner_row">
                <div class="steps-info">
                    <h2>
                        Ход <br>
                        <span>
                            строительства
                        </span>
                    </h2>
                    <img src="./assets//img//st-decor.svg" alt="img">
                </div>
                <div class="sync-wrapper">
                    <!-- Контент -->
                    <div class="tab-content">
                        <div class="tab-panel" data-month="01">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="02">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="03">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="04">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="05">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="06">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="07">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="08">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="09">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="10">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="11">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-panel" data-month="12">
                            <div class="sync-gallery">
                                <div class="sync-gallery__small splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                    <div class="sync-gallery__arrows">
                                        <button class="sync-gallery__arrow sync-prev">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.95103 1.06069L1.06246 4.94995L4.95155 8.83904M1.63325 4.94966L15.6332 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                        <button class="sync-gallery__arrow sync-next">
                                            <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4318 1.06069L15.3204 4.94995L11.4313 8.83904M14.7496 4.94966L0.749563 4.94965"
                                                    stroke="#242220" stroke-width="1.5" stroke-miterlimit="16"
                                                    stroke-linecap="square" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="sync-gallery__main splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img src="./assets/img/step.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/place.png"></li>
                                            <li class="splide__slide"><img src="./assets/img/slidet1.png"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="steps-tabs">
                <div class="splide splide-tabs" id="months-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- 2024 -->
                            <li class="splide__slide tab-year">2024</li>
                            <li class="splide__slide tab-month" data-month="01"><span>Январь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="02"><span>Февраль</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="03"><span>Март</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="04"><span>Апрель</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="05"><span>Май</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="06"><span>Июнь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="07"><span>Июль</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="08"><span>Август</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="09"><span>Сентябрь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="10"><span>Октябрь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="11"><span>Ноябрь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="12"><span>Декабрь</span>
                                <div class="icon"></div>
                            </li>

                            <!-- 2025 -->
                            <li class="splide__slide tab-year">2025</li>
                            <li class="splide__slide tab-month" data-month="01"><span>Январь</span>
                                <div class="icon"></div>
                            </li>
                            <li class="splide__slide tab-month" data-month="02"><span>Февраль</span>
                                <div class="icon"></div>
                            </li>
                            <!-- и так далее... -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq">
    <div class="container">
        <div class="faq-inner">
            <div class="faq-left">
                <h2>
                    <span>
                        Частые
                    </span>
                    вопросы
                </h2>
                <img src="./assets/img/faq.png" alt="img">
            </div>
            <div class="faq-acc">
                <ul class="faq-acc__items">
                    <li class="faq-acc__item ">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                О проекте Primavera
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                    <li class="faq-acc__item active">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                Варианты планировок
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                    <li class="faq-acc__item">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                Стоимость квартир
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                    <li class="faq-acc__item">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                Сдача проекта
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                    <li class="faq-acc__item">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                Какие условия ипотеки предлагаются для покупки квартиры в ЖК?
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                    <li class="faq-acc__item">
                        <div class="faq-acc__item-head">
                            <div class="faq-acc__item-head-title">
                                Как можно купить квартиру в ЖК Primavera?
                            </div>
                            <div class="faq-acc__item-head__arrow">
                                <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0607 1.06066L7.53033 8.59099L0 1.06066L1.06066 0L7.53033 6.46967L14 5.65597e-07L15.0607 1.06066Z"
                                        fill="#7C8589" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-acc__item-content">
                            Планировки жилого комплекса максимально разнообразны. Вы можете выбрать квартиру с 1-3
                            спальнями,
                            пентхаус с отдельным входом или двухуровневый лот. В некоторых вариантах также доступны
                            приватная
                            терраса и патио. Квартиры представлены с обзором до 270 градусов и панорамными окнами
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="section similar">
    <div class="container">
        <div class="similar-head">
            <div class="similar-head__left">
                <h2>
                    Похожие<br>
                    <span>
                        запросы
                    </span>
                </h2>
                <ul class="tab-content__similar-links">
                    <li>
                        <a href="javascript:void(0)" class="tab-content__similar-link" data-tab="price">
                            По цене
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="tab-content__similar-link active" data-tab="district">
                            По району
                        </a>
                    </li>
                </ul>
            </div>
            <div class="similar-arrows">
                <button class="slider-arrow similar-arrow similar-arrow__prev">
                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.94712 1.06069L1.05855 4.94995L4.94764 8.83904M1.62934 4.94966L15.6293 4.94965"
                            stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
                    </svg>
                </button>
                <button class="slider-arrow similar-arrow similar-arrow__next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
                        <path d="M11.4357 1.06069L15.3243 4.94995L11.4352 8.83904M14.7535 4.94966L0.753469 4.94965"
                            stroke="#242220" stroke-width="1.5" stroke-miterlimit="16" stroke-linecap="square" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-content__similar-content" data-tab="price">
        <div class="splide similar-slider">
            <div class="splide__track">
                <ul class="splide__list similar-items">
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content__similar-content" data-tab="district" style="display: none;">
        <div class="splide similar-slider">
            <div class="splide__track">
                <ul class="splide__list similar-items">
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                    <li class="splide__slide catalog-item">
                        <a href="javascript:void(0)">
                            <div class="catalog-item__image">
                                <div class="splide catalog-images__slider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="./assets/img/ct.jpg"
                                                    alt="Дом в коттеджном поселке «Crystal Istra», 1000 м²">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog-item__tag">
                                    участок 30 соток
                                </div>
                            </div>
                            <div class="catalog-item__body">
                                <div class="catalog-item__prices">
                                    <div class="catalog-item__price">
                                        957 242 300 ₽
                                    </div>
                                    <div class="catalog-item__old-price">
                                        998 242 300 ₽
                                    </div>
                                    <div class="catalog-item__sale">
                                        -41%
                                    </div>
                                </div>
                                <div class="catalog-item__info">
                                    <div class="catalog-item__name">
                                        Дом в коттеджном поселке «Crystal Istra», 1000 м²
                                    </div>
                                    <div class="catalog-item__location">
                                        14 км от МКАД, Новорижское шоссе
                                    </div>
                                </div>
                                <div class="fake-product-btn">
                                    <span>
                                        Подробнее
                                    </span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.63644 0.5L9.13535 0.500399V4.99951M8.80502 0.830389L0.707031 8.92838"
                                            stroke="white" stroke-miterlimit="16" stroke-linecap="square" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="catalog-item__filters">
                                <li class="catalog-item__filter">
                                    участок 30 соток
                                </li>
                                <li class="catalog-item__filter">
                                    чистовая отделка
                                </li>
                                <li class="catalog-item__filter">
                                    6 спален
                                </li>
                                <li class="catalog-item__filter">
                                    2 этажа
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>