# notifier for laravel

1.sms
2.queue
3.otp

## sms gateways
1.kavenegar
2.payamresan
3.kavenegar otp

## installation
run below statements on your terminal:
STEP1:

    composer require limito/notifier
STEP2:

    'providers' => [
    //..
	    \Limito\Notifier\NotifierServiceProvider::class,
    //..
    ]
    
    
STEP3:

    php artisan vendor:publish 
