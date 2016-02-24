<?php

use Tokenly\CurrencyLib\Quantity;
use Tokenly\CurrencyLib\CurrencyUtil;
use \PHPUnit_Framework_Assert as PHPUnit;

class QuanitytTest extends PHPUnit_Framework_TestCase {

    public function testQuantity() {
        $q1 = new Quantity(5);
        PHPUnit::assertEquals(5, $q1->getSatoshis());
        PHPUnit::assertEquals(0.00000005, $q1->getFloat());

        $q2 = new Quantity($q1);
        PHPUnit::assertEquals(5, $q2->getSatoshis());
    }

    public function testQuantityFromFloat() {
        $q1 = Quantity::fromFloat(1.2345);
        PHPUnit::assertEquals(123450000, $q1->getSatoshis());
    }
}

