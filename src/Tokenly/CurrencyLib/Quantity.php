<?php

namespace Tokenly\CurrencyLib;


use Exception;
use Tokenly\CurrencyLib\Contracts\Quantity as QuantityContract;
use Tokenly\CurrencyLib\CurrencyUtil;

/*
* An immutable Quantity value
*/
class Quantity implements QuantityContract {

    protected $satoshis_qty = 0;

    /**
     * Create a new quantity
     * @param QuantityContract $mixed_value An integer amount in Satoshis, or another Quantity object
     */
    public function __construct($mixed_value) {
        $this->setValue($mixed_value);
    }

    /**
     * Returns the value in satoshis
     * @return integer value in satoshis
     */
    public function getSatoshis() {
        return $this->satoshis_qty;
    }

    /**
     * Returns the value as a float
     * @return float value as a float
     */
    public function getFloat() {
        return CurrencyUtil::satoshisToValue($this->satoshis_qty);
    }

    // ------------------------------------------------------------------------
    
    protected function setValue($mixed_value) {
        if  ($mixed_value instanceof QuantityContract) {
            $this->satoshis_qty = $mixed_value->getSatoshis();
        } else {
            if (is_int($mixed_value)) {
                $this->satoshis_qty = $mixed_value;
            } else {
                $this->satoshis_qty = intval(round($mixed_value));
            }
        }
    }

}

