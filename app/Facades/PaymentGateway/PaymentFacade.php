<?php

namespace App\Facades\PaymentGateway;

use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Utils;

Class PaymentFacade extends Facade{

    protected static function getFacadeAccessor()
{
    return 'payment';
}
}
