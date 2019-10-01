<?php

function chunk (array $a, int $n) : array {
    
    $b = [];
    $c = [];
    
    for ($i = 0; $i < $n; $i += 1) {
        
        $b [] = [];
        $c [] = 0;
    }
    
    sort ($a, SORT_NUMERIC);
    
    while (($j = array_pop ($a)) !== NULL) {
        
        asort ($c, SORT_NUMERIC);
        
        $k = key ($c);
        $b [$k] [] = $j;
        $c [$k] += $j;
    }
    
    return $b;
}

var_export (chunk ([1, 2, 4, 7, 1, 6, 2, 8], 3));
