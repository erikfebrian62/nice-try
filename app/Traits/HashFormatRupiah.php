<?php

namespace app\Traits;

trait HashFormatRupiah{
    function formatRupiah($field, $prefix){
        $prefix = $prefix ? $prefix : 'Rp. ';
        $nominal = $this->attributes[$field];
        return $prefix .  number_format($nominal, 0,',','.' );
    }
}