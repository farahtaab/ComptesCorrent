<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\OperacioBancaria;

class OperacioBancariaTest extends TestCase
{
    public function testOperacioBancariaValida()
    {
        $this->assertEquals("Talonari enviat", OperacioBancaria::processar("234", "2345", "56789", "abc12", "talonari"));
        $this->assertEquals("Moviments enviats", OperacioBancaria::processar("234", "2345", "56789", "abc12", "moviments"));
        $this->assertEquals("Talonari i moviments enviats", OperacioBancaria::processar("234", "2345", "56789", "abc12", ""));
    }

    public function testErrorCodiBanc()
    {
        $this->assertEquals("Error: Codi de banc no vàlid", OperacioBancaria::processar("123", "2345", "56789", "abc12", "talonari"));
        $this->assertEquals("Error: Codi de banc no vàlid", OperacioBancaria::processar("000", "2345", "56789", "abc12", "talonari"));
        $this->assertEquals("Error: Codi de banc no vàlid", OperacioBancaria::processar("1a3", "2345", "56789", "abc12", "talonari"));
    }

    public function testErrorCodiSucursal()
    {
        $this->assertEquals("Error: Codi de sucursal no vàlid", OperacioBancaria::processar("234", "0123", "56789", "abc12", "talonari"));
    }

    public function testErrorNumeroCompte()
    {
        $this->assertEquals("Error: Número de compte no vàlid", OperacioBancaria::processar("234", "2345", "5678", "abc12", "talonari"));
    }

    public function testErrorClauPersonal()
    {
        $this->assertEquals("Error: Clau personal no vàlida", OperacioBancaria::processar("234", "2345", "56789", "abc1", "talonari"));
        $this->assertEquals("Error: Clau personal no vàlida", OperacioBancaria::processar("234", "2345", "56789", "#####", "talonari"));
    }

    public function testErrorOrdre()
    {
        $this->assertEquals("Error: Ordre no vàlida", OperacioBancaria::processar("234", "2345", "56789", "abc12", "ingrés"));
        $this->assertEquals("Error: Ordre no vàlida", OperacioBancaria::processar("234", "2345", "56789", "abc12", "retirar"));
    }
}
