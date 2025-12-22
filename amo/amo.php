<?php
function setAmoDeal($formId, $formCode, $name, $phone, $email, $commerc)
{
    $config = require_once $_SERVER['DOCUMENT_ROOT'] . '/amo/config.php';
    if (!$config) {
        return false;
    }

    $subdomain = $config['subdomain'];
    $domain = $config['domain'];
    $pipeline_id = $config['pipeline_id'];
    $user_amo = $config['user_amo'];
    $access_token = $config['access_token'];

    $data = [
        [
            "name" => $name,
            "pipeline_id" => (int) $pipeline_id,
            //"status_id" => 64848674,
            "responsible_user_id" => (int) $user_amo,
            "_embedded" => [
                "metadata" => [
                    "category" => "forms",
                    "form_id" => $formId,
                    "form_name" => $formCode,
                    "form_page" => "https://m2property.ru/",
                    "form_sent_at" => time(),
                    "referer" => $domain
                ],
                "contacts" => [
                    [
                        "first_name" => $name,
                        "custom_fields_values" => [
                            [
                                "field_code" => "EMAIL",
                                "values" => [
                                    [
                                        "enum_code" => "WORK",
                                        "value" => $email
                                    ]
                                ]
                            ],
                            [
                                "field_code" => "PHONE",
                                "values" => [
                                    [
                                        "enum_code" => "WORK",
                                        "value" => $phone
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    if ($commerc == 'Y') {
        $data[0]["custom_fields_values"] = [
            [
                "field_id" => 1637716,
                "values" => [
                    [
                        "value" => true
                    ]
                ]
            ]
        ];
    }

    $method = "/api/v4/leads/complex";

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token,
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int) $code;
    $errors = [
        301 => 'Moved permanently.',
        400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
        401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
        403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
        404 => 'Not found.',
        500 => 'Internal server error.',
        502 => 'Bad gateway.',
        503 => 'Service unavailable.'
    ];

    if ($code < 200 || $code > 204) {
        $errorMessage = "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error');
        $fullResponse = $out; // <-- это тело ответа от amoCRM

        logMessage($errorMessage . " Response body: " . $fullResponse);
        die(false);
    }


    $Response = json_decode($out, true);
    $Response = $Response['_embedded']['items'];
    $output = 'ID добавленных элементов списков:' . PHP_EOL;
    foreach ($Response as $v)
        if (is_array($v))
            $output .= $v['id'] . PHP_EOL;
    logMessage($output);
    return true;
}