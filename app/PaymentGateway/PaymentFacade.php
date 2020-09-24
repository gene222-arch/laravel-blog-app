<?php

namespace App\PaymentGateway;

class PaymentFacade extends Facade {

    protected static function getFacadeAccessor () {

        return 'payment';
    }


}