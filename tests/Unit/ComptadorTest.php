<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Comptador;

class ComptadorTest extends TestCase
{
    public function testValorsInvalids()
    {
        $this->assertEquals(-1, Comptador::comptar(-1, 5, 3));
        $this->assertEquals(-1, Comptador::comptar(5, -1, 3));
    }

    public function testNumeroDinsRang()
    {
        $this->assertEquals(1, Comptador::comptar(3, 7, 5));
    }

    public function testNumeroForaRang()
    {
        $this->assertEquals(0, Comptador::comptar(3, 7, 2));
    }
}
