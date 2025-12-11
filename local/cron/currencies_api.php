<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Loader;

function parseCurrencyFile($chars) {
    // удаляем старый файл
    if (file_exists(CURRENCY_XML_PATH)) {
        unlink(CURRENCY_XML_PATH);
    }

    //загружаем новый
    $xmlContent = @file_get_contents(CURRENCY_XML_URL);
    if ($xmlContent === false) {
        logMessage("Ошибка: не удалось загрузить XML с ЦБ РФ.\n");
        return false;
    }
    if (!is_dir(dirname(CURRENCY_XML_PATH))) {
        mkdir(dirname(CURRENCY_XML_PATH), 0755, true);
    }
    
    file_put_contents(CURRENCY_XML_PATH, $xmlContent, FILE_APPEND);
    
    // парсим XML
    $xml = simplexml_load_file(CURRENCY_XML_PATH);
    if (!$xml) {
        logMessage("Ошибка: не удалось распарсить XML.\n");
        return false;
    }

    $rates = [];

    if(!empty($chars)) {
        foreach ($xml->Valute as $valute) {
            $charCode = (string)$valute->CharCode;
            if(in_array($charCode, $chars)) {
                $rates[$charCode] = (float)str_replace(',', '.', $valute->Value);
            }
        }
    }

    return $rates;
}

function getHlEntityClass() {
    Loader::includeModule('highloadblock');
    $hlBlock = HighloadBlockTable::getById(CUR_HLBLOCK_ID)->fetch();
    if (!$hlBlock) {
        logMessage("HL-блок ID=" . CUR_HLBLOCK_ID . " не найден\n");
        return false;
    }
    $entity = HighloadBlockTable::compileEntity($hlBlock);
    return $entity->getDataClass();
}

function getCharCodes($entityClass) {
    $chars = [];
    $result = $entityClass::getList([
        'select' => ['UF_CHAR'],
        'filter' => ['!=UF_CHAR' => 'RUB'],
        'order' => ['ID' => 'ASC']
    ]);
    while ($row = $result->fetch()) {
        $chars[] = $row['UF_CHAR'];
    }
    return $chars;
}

function updateCurrencyRates() {
    $entityClass = getHlEntityClass();
    if (!$entityClass) return;

    $chars = getCharCodes($entityClass);
    if (empty($chars)) {
        logMessage("Нет валют для обновления\n");
        return;
    }

    $rates = parseCurrencyFile($chars);
    if (!$rates) return;

    $result = $entityClass::getList([
        'select' => ['ID', 'UF_CHAR'],
        'filter' => ['!=UF_CHAR' => 'RUB'],
        'order' => ['ID' => 'ASC']
    ]);

    while ($item = $result->fetch()) {
        $code = $item['UF_CHAR'];
        if (!isset($rates[$code])) {
            logMessage("Курс для {$code} не найден\n");
            continue;
        }

        $updateResult = $entityClass::update($item['ID'], [
            'UF_CUR' => $rates[$code]
        ]);

        if (!$updateResult->isSuccess()) {
            logMessage("Ошибка при обновлении ID {$item['ID']}: " . implode(', ', $updateResult->getErrorMessages()) . "\n");
        }
    }
}

try {
    updateCurrencyRates();
} catch(Exception $e) {
    $msg = "КРИТИЧЕСКАЯ ОШИБКА: " . $e->getMessage() . "\n" .
           "Файл: " . $e->getFile() . "\n" .
           "Строка: " . $e->getLine() . "\n";
    logMessage($msg);
}

/*
$config = require_once $_SERVER['DOCUMENT_ROOT'] . '/local/cron/currencies_config.php';
if (!$config) {
    die();
}

function getCurrenciesData($config) {
    $response = @file_get_contents($config['api_url']);

    if ($response) {
        $data = json_decode($response, true);
        
        if (isset($data['conversion_rates'])) {
            $result = [
                'USD' => $data['conversion_rates']['USD'],
                'EUR' => $data['conversion_rates']['EUR'],
                'updated' => date('Y-m-d H:i:s'),
                'timestamp' => time()
            ];
            logMessage(print_r($result, true));
            return $result;
        } else {
            logMessage('Некорректный ответ API v6.exchangerate\n');
            return false;
        }
    } else {
        logMessage('ERROR: Не удалось получить данные API v6.exchangerate\n');
        return false;
    }
}
*/