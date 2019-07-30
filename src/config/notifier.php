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
                'username' => '09122770270',
                'password' => 'm@neyz85',
                'from' => '500020607608',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\PayamResan::class
            ],
            'kavehnegar' => [
                'url' => 'https://api.kavenegar.com/v1/6A5444597961587670525933613152796A6E4E5455673D3D/sms/send.json?',
                'username' => 'info@noonreson.ir',
                'password' => '6A5444597961587670525933613152796A6E4E5455673D3D',
                'from' => '10000101011110',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\KavehNegar::class
            ],
            'kavehnegar_verify' => [
                'url' => 'https://api.kavenegar.com/v1/6A5444597961587670525933613152796A6E4E5455673D3D/sms/send.json?',
                'username' => 'info@noonreson.ir',
                'password' => '6A5444597961587670525933613152796A6E4E5455673D3D',
                'from' => '10000101011110',
                'class_name' => Limito\Notifier\Providers\Sms\Gateways\KavehNegarVerify::class
            ]
        ]
    ]

];