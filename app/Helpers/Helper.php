<?php
function formatRupiah($nominal, $prefix){
    $prefix = $prefix ? $prefix : 'Rp. ';
    return $prefix .  number_format($nominal, 0,',','.' );
}