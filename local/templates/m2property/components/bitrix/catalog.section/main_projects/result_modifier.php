<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
use Bitrix\Main\Entity;

$hlblock = HLBT::getById(11)->fetch();
$entity = HLBT::compileEntity($hlblock);
$entityClass = $entity->getDataClass();

$result = $entityClass::getList([
    'select' => ['*'],
    'filter' => [],
    'order' => ['ID' => 'ASC']
]);

$arResult['NUMBERS'] = [];

while ($item = $result->fetch()) {
    $arResult['NUMBERS'][] = $item;
}