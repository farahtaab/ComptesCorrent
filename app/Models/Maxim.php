<?php

namespace App\Models;

class Maxim
{
    /**
     * Retorna el màxim entre tres nombres.
     */
    public static function trobarMaxim($x, $y, $z)
    {
        if ($x > $y && $x > $z) {
            return $x;
        } elseif ($z > $y) {
            return $z;
        } else {
            return $y;
        }
    }
}
