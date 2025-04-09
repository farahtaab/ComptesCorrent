<?php

namespace App\Models;

class Comptador
{
    /**
     * Comprova si el número està dins del rang.
     */
    public static function comptar($x, $y, $num)
    {
        if ($x > 0 && $y > 0) {
            if ($num >= $x && $num <= $y) {
                return 1; // Número dins del rang
            } else {
                return 0; // Número fora del rang
            }
        }
        return -1; // Error per valors invàlids
    }
}
