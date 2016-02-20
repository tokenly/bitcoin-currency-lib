<?php

namespace Tokenly\CurrencyLib\Contracts;

use Exception;

/*
* Quantity
*/
interface Quantity
{

    public function __construct($mixed_value);

    public function getSatoshis();
    public function getFloat();

}

