<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Maxim;

class MaximTest extends TestCase
{
    public function testTrobarMaxim()
    {
        $this->assertEquals(5, Maxim::trobarMaxim(5, 2, 1));
        $this->assertEquals(6, Maxim::trobarMaxim(2, 3, 6));
        $this->assertEquals(7, Maxim::trobarMaxim(2, 7, 3));
    }
}
