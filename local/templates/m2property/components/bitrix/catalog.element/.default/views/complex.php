<? //p($arResult); ?>
<?
$section_name = $arResult['PROPERTIES']['SECTIONS_NAME']['VALUE'] ?? $arResult['NAME'];
$address = $arResult['PROPERTIES']['OBJECT_ADDRESS']['VALUE'] ?? false;
$station = $arResult['PROPERTIES']['TIME_TO_STATION']['VALUE'] ?? false;
$way = $arResult['PROPERTIES']['TIME_TO_WAY']['VALUE'] ?? false;
$gallery = $arResult['PROPERTIES']['GALLERY']['VALUE'];
if (!empty($arResult['PROPERTIES']['PRESENTATION']['VALUE'])) {
    $presentation = CFile::GetPath($arResult['PROPERTIES']['PRESENTATION']['VALUE']);
}
?>
<? if (!empty($gallery)): ?>
    <div class="detail-product-image">
        <img src="<?= CFile::GetPath($gallery[0]); ?>" alt="<?= $project_name; ?>">
        <div class="layer"></div>
    </div>
<? endif; ?>
<section class="detail-products__ms">
    <div class="container">
        <div class="detail-products__ms-inner">
            <div class="detail-products__ms-address">
                <? if ($address): ?>
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
                <? if ($station): ?>
                    <span class="metro">
                        <?= $station; ?>
                    </span>
                <? endif; ?>
            </div>
            <h1>
                <?= $arResult['NAME']; ?>
            </h1>
            <p>
                <?= $arResult['PREVIEW_TEXT']; ?>
            </p>
            <div class="detail-products__ms-bottom">
                <div class="detail-products__ms-bottom-left">
                    <? if (!empty($arResult['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
                        <div class="detail-products__ms-bottom__item">
                            <div class="detail-products__ms-bottom-label">
                                квартиры от
                            </div>
                            <div class="detail-products__ms-bottom__value">
                                <?= number_format($arResult['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', ' ') . ' ₽'; ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['SQUARE']['VALUE'])): ?>
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
                    <? if ($presentation): ?>
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
                    <? if (!empty($gallery)): ?>
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
                                    <?= count($gallery); ?> фото
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
                    <? if (!empty($arResult['PROPERTIES']['CLASS']['VALUE'])): ?>
                        <li>
                            <div class="product-feed__main-info__item-label">
                                <?= $arResult['PROPERTIES']['CLASS']['NAME']; ?>
                            </div>
                            <div class="product-feed__main-info__item-value">
                                <?= $arResult['PROPERTIES']['CLASS']['VALUE']; ?>
                            </div>
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['NEW_PRICE']['VALUE'])): ?>
                        <li>
                            <div class="product-feed__main-info__item-label">
                                <?= $arResult['PROPERTIES']['NEW_PRICE']['NAME']; ?>
                            </div>
                            <div class="product-feed__main-info__item-value">
                                <?= number_format($arResult['PROPERTIES']['NEW_PRICE']['VALUE'], 0, '', ' ') . ' ₽'; ?>
                            </div>
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['SQUARE']['VALUE'])): ?>
                        <li>
                            <div class="product-feed__main-info__item-label">
                                <?= $arResult['PROPERTIES']['SQUARE']['NAME']; ?>
                            </div>
                            <div class="product-feed__main-info__item-value">
                                <?= $arResult['PROPERTIES']['SQUARE']['VALUE'] . ' м²'; ?>
                            </div>
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['FLOORS']['VALUE'])): ?>
                        <li>
                            <div class="product-feed__main-info__item-label">
                                <?= $arResult['PROPERTIES']['FLOORS']['NAME']; ?>
                            </div>
                            <div class="product-feed__main-info__item-value">
                                <?= $arResult['PROPERTIES']['FLOORS']['VALUE']; ?>
                            </div>
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['APARTMENTS_COUNT']['VALUE'])): ?>
                        <li>
                            <div class="product-feed__main-info__item-label">
                                <?= $arResult['PROPERTIES']['APARTMENTS_COUNT']['NAME']; ?>
                            </div>
                            <div class="product-feed__main-info__item-value">
                                <?= $arResult['PROPERTIES']['APARTMENTS_COUNT']['VALUE']; ?>
                            </div>
                        </li>
                    <? endif; ?>
                    <? if (!empty($arResult['PROPERTIES']['DEADLINE']['VALUE'])): ?>
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
            <? if (!empty($arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'])): ?>
                <ul class="product-feed__image-grid">
                    <? foreach ($arResult['PROPERTIES']['FEATURES']['VALUE_ELEM'] as $feature): ?>
                        <li>
                            <div class="product-feed__image-grid__img">
                                <img src="<?= $feature['UF_FILE']; ?>" alt="<?= $feature['UF_DESCRIPTION']; ?>">
                            </div>
                            <div class="product-feed__image-grid__info">
                                <div class="product-feed__image-grid__info-label">
                                    <?= $feature['UF_DESCRIPTION']; ?>
                                </div>
                                <div class="product-feed__image-grid__info-value <?= $feature['UF_DEF'] ? 'small' : ''; ?>">
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
<? if (!empty($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'])): ?>
    <section class="plans">
        <div class="container">
            <div class="plans-inner">
                <h2>
                    Планировка<br>
                    <span>
                        в комплексе <?= $section_name; ?>
                    </span>
                </h2>
                <div class="plans-tabs">
                    <div class="plans-tabs__buttons">
                        <? foreach ($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'] as $key => $tab_btn): ?>
                            <button class="plans-tabs__button <?= $key == 0 ? 'active' : ''; ?>" data-tab="<?= $key; ?>">
                                <div class="plans-tabs__button-left">
                                    <div class="plans-tabs__button-left__num">
                                        <?= $tab_btn['UF_ROOMS']; ?>
                                    </div>
                                    <span>
                                        <?= (int) $tab_btn['UF_ROOMS'] < 2 ? 'Спальня' : 'Спальни'; ?>
                                    </span>
                                </div>
                                <div class="plans-tabs__button-right">
                                    <? if ($tab_btn['UF_PRICE']): ?>
                                        <div class="plans-tabs__button-price">
                                            <span>
                                                от
                                            </span>
                                            <?= number_format((int) $tab_btn['UF_PRICE'], 0, '', '.') . '₽'; ?>
                                        </div>
                                        <? if ($tab_btn['UF_SQUARE']):
                                            $pricePerMert = round(($tab_btn['UF_PRICE'] / $tab_btn['UF_SQUARE']));
                                            ?>
                                            <div class="plans-tabs__button-small__price">
                                                <?= 'от ' . number_format($pricePerMert, 0, '', ' ') . '₽/м2'; ?>
                                            </div>
                                        <? endif; ?>
                                    <? endif; ?>
                                    <div class="plans-tabs__button-bubbles">
                                        <? if ($tab_btn['UF_SQUARE']): ?>
                                            <div class="plans-tabs__button-bubble">
                                                от <?= $tab_btn['UF_SQUARE']; ?> м2
                                            </div>
                                        <? endif; ?>
                                        <div class="plans-tabs__button-bubble gray">
                                            <? if ($tab_btn['UF_VARIANTS']): ?>
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
                    <? foreach ($arResult['PROPERTIES']['APARTMENTS_TABS']['VALUE_ELEM'] as $key => $tab_btn): ?>
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
<? if (!empty($arResult['PROPERTIES']['COMPLEX']['VALUE'])): ?>
    <section class="detail-about">
        <div class="container">
            <div class="detail-about__inner">
                <div class="detail-about__head">
                    <h2>
                        О комплексе<br>
                        <span>
                            <?= $section_name; ?>
                        </span>
                    </h2>
                    <div class="buttons-wrap">
                        <? if ($presentation): ?>
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
                        <? if (!empty($gallery)): ?>
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
                                        <?= count($gallery); ?> фото
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
                                    <? foreach ($arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'] as $key => $element): ?>
                                        <li class="splide__slide point__tab-btn"><?= $element['NAME']; ?></li>
                                    <? endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="main-slider__tabs splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <? foreach ($arResult['PROPERTIES']['COMPLEX']['VALUE_ELEMENTS'] as $key => $element): ?>
                                        <li class="splide__slide point__tab-content">
                                            <div class="main-slider__tabs-text-wrapper">
                                                <div class="blur"></div>
                                                <div class="main-slider__tabs-text">
                                                    <?= $element['PREVIEW_TEXT']; ?>
                                                </div>
                                            </div>
                                            <div class="fade-slider splide">
                                                <div class="splide__track">
                                                    <? if (!empty($element['GALLERY'])): ?>
                                                        <ul class="splide__list">
                                                            <? foreach ($element['GALLERY'] as $img): ?>
                                                                <li class="splide__slide">
                                                                    <img src="<?= $img; ?>" alt="img">
                                                                    <div class="blur"></div>
                                                                </li>
                                                            <? endforeach; ?>
                                                        </ul>
                                                    <? endif; ?>
                                                </div>
                                            </div>
                                            <div class="fade-slider__pag">
                                                <ul class="splide__pagination"></ul>
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
<? if ($presentation): ?>
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
                    комплекса <?= $section_name; ?>
                </h2>
                <p>
                    В презентации — расположение, архитектура, инфраструктура, информация о квартирах и техническом
                    оснащении
                    комплекса
                </p>
                <a href="<?= $presentation; ?>" class="donwload-link" download="download">
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
<? if (!empty($arResult['PROPERTIES']['MAP']['VALUE'])): ?>
    <section class="map-section">
        <div class="container">
            <div class="map-section__inner">
                <div class="map-section__head">
                    <h2>
                        <span>
                            <?= $section_name; ?>
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
<? if (!empty($arResult['PROPERTIES']['PLACES']['VALUE_ELEM'])): ?>
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
                                <? foreach ($arResult['PROPERTIES']['PLACES']['VALUE_ELEM'] as $place): ?>
                                    <li class="splide__slide point__tab-btn"><?= $place['UF_SHOWED_NAME']; ?></li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="main-slider__tabs splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <? foreach ($arResult['PROPERTIES']['PLACES']['VALUE_ELEM'] as $place): ?>
                                    <li class="splide__slide point__tab-content">
                                        <div class="point__tab-content__blur"></div>
                                        <div class="point__tab-content__info">
                                            <div class="point__tab-content__name">
                                                <?= $place['UF_SHOWED_NAME']; ?>
                                            </div>
                                            <div class="point__tab-content__move">
                                                <div class="point__tab-content__road">
                                                    <span>
                                                        <?= $place['UF_DESCRIPTION']; ?>
                                                    </span>
                                                    <svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.35929 0.0599253C6.40756 0.315725 5.81697 1.30507 6.05772 2.23799C6.30976 3.201 7.29534 3.79912 8.23954 3.5546C9.20255 3.30256 9.80067 2.31698 9.55616 1.3803C9.30412 0.406008 8.30349 -0.195875 7.35929 0.0599253Z"
                                                            fill="#FF7400" />
                                                        <path
                                                            d="M5.5296 4.84431C4.82615 4.92707 4.1528 5.11892 3.44183 5.43491C2.80609 5.7208 2.40358 5.99917 1.91455 6.4882C1.31267 7.09008 0.989156 7.62425 0.710786 8.44808C0.594171 8.80168 0.575362 8.89573 0.590409 9.10639C0.635551 9.69698 1.09072 10.1634 1.68508 10.2236C2.06502 10.2612 2.53524 10.0506 2.74214 9.74965C2.79856 9.67065 2.90389 9.44871 2.97161 9.26062C3.23117 8.56845 3.50201 8.19228 3.96095 7.89134C4.21675 7.72582 4.67568 7.50764 4.70578 7.53773C4.7133 7.54525 4.57412 8.102 4.39731 8.77159C4.22051 9.44118 4.05876 10.0995 4.03995 10.2349C3.96847 10.7089 4.10766 11.3258 4.38227 11.7735C4.44998 11.8826 5.13838 12.6613 5.90954 13.5039L7.30892 15.0312L7.734 16.724C7.96347 17.6531 8.18917 18.492 8.23431 18.586C8.33588 18.8042 8.56535 19.0337 8.80234 19.1503C9.07695 19.2857 9.50955 19.282 9.80297 19.1465C10.0701 19.0224 10.2732 18.8193 10.3898 18.5597C10.5741 18.1572 10.5704 18.1271 10.0475 16.0356C9.72021 14.7265 9.53964 14.0757 9.46441 13.9252C9.34403 13.6882 9.34403 13.6882 8.15531 12.3904C7.71519 11.9127 7.35406 11.4913 7.35406 11.4575C7.35406 11.3898 8.02365 9.10262 8.04999 9.07253C8.06127 9.06501 8.09513 9.12143 8.12898 9.20419C8.64811 10.4606 8.71958 10.5396 9.74278 11.0399C10.4989 11.4086 10.6418 11.4537 10.9353 11.4236C11.3528 11.3823 11.7215 11.1227 11.9096 10.7428C11.9848 10.5885 11.9998 10.4982 11.9998 10.2349C11.9998 9.64808 11.7854 9.37347 11.0255 8.98601L10.544 8.7415L10.2092 7.944C9.82554 7.02237 9.69388 6.76657 9.38917 6.39039C8.57287 5.36343 7.38415 4.80669 6.05625 4.8255C5.83055 4.8255 5.59355 4.83679 5.5296 4.84431Z"
                                                            fill="#FF7400" />
                                                        <path
                                                            d="M3.04703 13.7801L2.59939 14.9199L1.36929 16.1613C-0.0150403 17.5644 6.8117e-06 17.5419 6.8117e-06 18.0798C6.8117e-06 18.4372 0.0940509 18.6629 0.334804 18.9074C0.58308 19.1519 0.808786 19.2422 1.18496 19.2422C1.70032 19.2422 1.71913 19.2271 3.17117 17.7826C3.85958 17.098 4.48027 16.451 4.55174 16.3494C4.65707 16.1952 5.28528 14.7281 5.28528 14.634C5.28528 14.619 4.98434 14.2767 4.61945 13.8779C4.2508 13.4754 3.84829 13.0353 3.72415 12.8961L3.49845 12.6441L3.04703 13.7801Z"
                                                            fill="#FF7400" />
                                                    </svg>
                                                </div>
                                                <div class="point__tab-content__auto">
                                                    <span>
                                                        <?= $place['UF_FULL_DESCRIPTION']; ?>
                                                    </span>
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.8889 9.31818C12.8889 9.0168 13.006 8.72776 13.2143 8.51465C13.4227 8.30154 13.7053 8.18182 14 8.18182C14.2947 8.18182 14.5773 8.30154 14.7857 8.51465C14.994 8.72776 15.1111 9.0168 15.1111 9.31818C15.1111 9.61956 14.994 9.9086 14.7857 10.1217C14.5773 10.3348 14.2947 10.4545 14 10.4545C13.7053 10.4545 13.4227 10.3348 13.2143 10.1217C13.006 9.9086 12.8889 9.61956 12.8889 9.31818ZM5.77778 12.0455H10.2222V10.9091H5.77778V12.0455ZM2 10.2273C1.70531 10.2273 1.4227 10.1075 1.21433 9.89444C1.00595 9.68133 0.888889 9.39229 0.888889 9.09091C0.888889 8.78953 1.00595 8.50049 1.21433 8.28738C1.4227 8.07427 1.70531 7.95455 2 7.95455C2.29469 7.95455 2.5773 8.07427 2.78567 8.28738C2.99405 8.50049 3.11111 8.78953 3.11111 9.09091C3.11111 9.39229 2.99405 9.68133 2.78567 9.89444C2.5773 10.1075 2.29469 10.2273 2 10.2273ZM4.17778 2.13182C4.24 1.94545 4.40889 1.81818 4.59556 1.81818H11.4C11.5911 1.81818 11.76 1.94545 11.8356 2.17273L13.2133 5.90909H2.78667L4.17778 2.13182ZM16 5.58955V5.22727C16 5.04644 15.9298 4.87302 15.8047 4.74515C15.6797 4.61729 15.5101 4.54545 15.3333 4.54545H14.6089L13.5111 1.56818C13.3661 1.11326 13.0844 0.716765 12.7061 0.435185C12.3278 0.153606 11.8723 0.00131 11.4044 0H4.59111C3.63111 0.00454545 2.78667 0.636364 2.50222 1.53182L1.39111 4.54545H0.666667C0.489856 4.54545 0.320286 4.61729 0.195262 4.74515C0.0702378 4.87302 0 5.04644 0 5.22727V5.58955C3.72617e-05 5.74468 0.0518015 5.89516 0.146746 6.01615C0.241691 6.13713 0.374139 6.22139 0.522222 6.255L0.72 6.3L0.377778 7.09546C0.132781 7.66093 0.0056361 8.2724 0.00444455 8.89091L0 14.2636C0 14.6682 0.324444 15 0.72 15H1.94667C2.34222 15 2.66667 14.6682 2.66667 14.2636V13.4091H2V12.7273H14V13.4091H13.3333V14.2636C13.3333 14.6682 13.6578 15 14.0533 15H15.28C15.6756 15 16 14.6682 16 14.2636V8.9C16 8.27727 15.8711 7.65909 15.6222 7.09091L15.28 6.3L15.4778 6.255C15.6259 6.22139 15.7583 6.13713 15.8533 6.01615C15.9482 5.89516 16 5.74468 16 5.58955Z"
                                                            fill="#FF7400" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="<?= $place['UF_FILE']; ?>" alt="img">
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>
<? if (!empty($arResult['PROPERTIES']['PROGRESS']['VALUE_ELEMENTS'])): ?>
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
                        <img src="<?= SITE_TEMPLATE_PATH; ?>/assets/img/st-decor.svg" alt="img">
                    </div>
                    <div class="sync-wrapper">
                        <!-- Контент -->
                        <div class="tab-content">
                            <? foreach ($arResult['PROPERTIES']['PROGRESS']['VALUE_ELEMENTS'] as $section):
                                if (!empty($section['ITEMS'])):
                                    foreach ($section['ITEMS'] as $key => $item):
                                        ?>
                                        <div class="tab-panel" data-month="<?= $key; ?>">
                                            <? if (!empty($item['GALLERY'])): ?>
                                                <div class="sync-gallery">
                                                    <div class="sync-gallery__small splide">
                                                        <div class="splide__track">
                                                            <ul class="splide__list">
                                                                <? foreach ($item['GALLERY'] as $img): ?>
                                                                    <li class="splide__slide"><img src="<?= $img; ?>"></li>
                                                                <? endforeach; ?>
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
                                                                <? foreach ($item['GALLERY'] as $img): ?>
                                                                    <li class="splide__slide"><img src="<?= $img; ?>"></li>
                                                                <? endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            <? endif; ?>
                                        </div>
                                    <? endforeach;
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="steps-tabs">
                    <div class="splide splide-tabs" id="months-slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <? foreach ($arResult['PROPERTIES']['PROGRESS']['VALUE_ELEMENTS'] as $section): ?>
                                    <li class="splide__slide tab-year"><?= $section['NAME']; ?></li>
                                    <? if (!empty($section['ITEMS'])): ?>
                                        <? foreach ($section['ITEMS'] as $key => $item): ?>
                                            <li class="splide__slide tab-month" data-month="<?= $key; ?>">
                                                <span><?= $item['NAME']; ?></span>
                                                <div class="icon"></div>
                                            </li>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? if(!empty($gallery)): ?>
    <div class="page-gallery" style="display:none;">
        <? foreach($gallery as $img): 
        $img_path = CFile::GetPath($img);
        ?>
        <a href="<?= $img_path; ?>" data-fancybox="page-gallery">
            <img src="<?= $img_path; ?>" alt="img">
        </a>
        <? endforeach; ?>
    </div>
    <? endif; ?>
<? endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.breadcrumbs').classList.add('light');
    })
</script>