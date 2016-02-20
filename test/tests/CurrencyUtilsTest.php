<?php

use Tokenly\CurrencyLib\CurrencyUtil;
use \PHPUnit_Framework_Assert as PHPUnit;

class CurrencyUtilsTest extends PHPUnit_Framework_TestCase {

    public function testCurrentUtilsConversions() {
        // float value to satoshis
        PHPUnit::assertEquals(12300000000, CurrencyUtil::valueToSatoshis(123));
        PHPUnit::assertEquals(2100000000000000, CurrencyUtil::valueToSatoshis(21000000));
        PHPUnit::assertEquals(12311111119, CurrencyUtil::valueToSatoshis(123.111111189));
        
        // satoshis to float value
        PHPUnit::assertEquals(123, CurrencyUtil::satoshisToValue(12300000000));
        PHPUnit::assertEquals(21000000, CurrencyUtil::satoshisToValue(2100000000000000));
        PHPUnit::assertEquals(123.11111119, CurrencyUtil::satoshisToValue(12311111119));

        // satoshisToFormattedString
        PHPUnit::assertEquals('123', CurrencyUtil::satoshisToFormattedString(12300000000));
        PHPUnit::assertEquals('123.4', CurrencyUtil::satoshisToFormattedString(12340000000));
        PHPUnit::assertEquals('1,235.6', CurrencyUtil::satoshisToFormattedString(123560000000));

        // valueToFormattedString
        PHPUnit::assertEquals('1,234.5', CurrencyUtil::valueToFormattedString(1234.5));
    }

}

