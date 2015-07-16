<?php

namespace Tokenly\CurrencyLib;

use Exception;

/*
* CurrencyUtil
*/
class CurrencyUtil
{

    const SATOSHI = 100000000;

    ////////////////////////////////////////////////////////////////////////

    public static function valueToSatoshis($value) {
        return intval(round($value * self::SATOSHI));
    }

    public static function satoshisToValue($satoshis, $places=null) {
        if ($places === null) { $places = 8; }
        $out = round($satoshis / self::SATOSHI, $places);
        return $out;
    } 

    public static function satoshisToFormattedString($satoshis, $places=null) {
        if (!strlen($satoshis)) { return $satoshis; }
        if ($places === null) { $places = 8; }
        $out = number_format($satoshis / self::SATOSHI, $places);
        if (strpos($out, '.') !== false) {
            $out = rtrim($out, '0');
            $out = rtrim($out, '.');
        }

        return $out;
    }


    public static function valueToFormattedString($value, $places=null) {
        if (!strlen($value)) { return $value; }
        if ($places === null) { $places = 8; }
        $out = number_format($value, $places);
        if (strpos($out, '.') !== false) {
            $out = rtrim($out, '0');
            $out = rtrim($out, '.');
        }

        return $out;
    }



    ////////////////////////////////////////////////////////////////////////

}

