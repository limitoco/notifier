<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 4:07 PM
 */

return [
    'sms' => [
        'setting' => [
            'default' => 'kavehnegar'
        ],
        'gateways' => [
            'payamresan' => [
                'url' => 'http://sms-webservice.ir/v1/v1.asmx?WSDL',
                'username' => '0',
                'password' => '0',
                'from' => '0',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\PayamResan::class
            ],
            'kavehnegar' => [
                'url' => 'https://api.kavenegar.com/v1/{token}/sms/send.json?',
                'username' => '0',
                'password' => '0',
                'from' => '0',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\KavehNegar::class
            ],
            'kavehnegar_verify' => [
                'url' => 'https://api.kavenegar.com/v1/{token}/sms/send.json?',
                'username' => '0',
                'password' => '0',
                'from' => '0',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\KavehNegarVerify::class
            ]
        ]
    ]

];
