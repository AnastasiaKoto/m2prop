<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSortParams = [
    'default' => ['NAME' => 'По умолчанию', 'SORT' => 'SORT', 'ORDER' => 'ASC'], // Стандартное поле SORT
	'price_desc' => ['NAME' => 'Сначала дорогие', 'SORT' => 'PROPERTY_NEW_PRICE', 'ORDER' => 'DESC'],
    'price_asc' => ['NAME' => 'Сначала дешевые', 'SORT' => 'PROPERTY_NEW_PRICE', 'ORDER' => 'ASC'],
    'date_desc' => ['NAME' => 'Сначала большие', 'SORT' => 'PROPERTY_SQUARE', 'ORDER' => 'DESC'],
    'date_asc' => ['NAME' => 'Сначала маленькие', 'SORT' => 'PROPERTY_SQUARE', 'ORDER' => 'ASC']
];
$currentSort = $_REQUEST['sort'] ?? 'default';
$activeSort = $arSortParams[$currentSort] ?? $arSortParams['default'];

$arResult['HIDDEN'] = array_filter($arResult['HIDDEN'] ?? [], function($field) {
    return !in_array($field['CONTROL_NAME'], ['sort', 'sort_field', 'sort_order']);
});

$arResult['HIDDEN'][] = [
    'CONTROL_ID' => 'sort_field',
    'CONTROL_NAME' => 'sort_field',
    'HTML_VALUE' => $activeSort['SORT']
];

$arResult['HIDDEN'][] = [
    'CONTROL_ID' => 'sort_order',
    'CONTROL_NAME' => 'sort_order',
    'HTML_VALUE' => $activeSort['ORDER']
];

$arResult['HIDDEN'][] = [
    'CONTROL_ID' => 'sort',
    'CONTROL_NAME' => 'sort',
    'HTML_VALUE' => $currentSort
];

$arResult['ITEMS']['SORT'] = [];
foreach ($arSortParams as $key => $params) {
    $arResult['ITEMS']['SORT'][$key] = [
        'NAME' => $params['NAME'],
        'ACTIVE' => $currentSort === $key,
        'SORT' => $params['SORT'],
        'ORDER' => $params['ORDER']
    ];
}

// Добавляем скрытые поля для всех параметров фильтра
if (!empty($_REQUEST['set_filter']) && $_REQUEST['set_filter'] == 'y') {
    foreach ($_REQUEST as $key => $value) {
        if (strpos($key, 'arrFilter_') === 0) {
            $arResult['HIDDEN'][] = [
                'CONTROL_ID' => $key,
                'CONTROL_NAME' => $key,
                'HTML_VALUE' => $value
            ];
        }
    }
}

// Порядок вывода
$desiredOrder = ['SORT', '25', 'BASE', '64'];
$orderedItems = [];
foreach ($desiredOrder as $key) {
    if (isset($arResult['ITEMS'][$key])) {
        $orderedItems[$key] = $arResult['ITEMS'][$key];
        unset($arResult['ITEMS'][$key]);
    }
}
$arResult['ITEMS'] = array_merge($orderedItems, $arResult['ITEMS']);