<?php

namespace app\Traits;

trait HashFormatRupiah{
    function fromatRupiah($field, $prefix){
        $prefix = $prefix ? $prefix : 'Rp. ';
        $nominal = $this->attributes[$field];
        return $prefix .  number_format($nominal, 0,',','.' );
    }
}