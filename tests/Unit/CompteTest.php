<?php

use PHPUnit\Framework\TestCase;

class Compte
{
    public $saldo;
    public $transferitAvui;

    const MAX_INGRES = 6000.00;
    const MAX_RETIRADA = 6000.00;
    const MAX_TRANSFERENCIA_DIA = 3000.00;

    public function __construct($saldo = 0, $transferitAvui = 0)
    {
        $this->saldo = $saldo;
        $this->transferitAvui = $transferitAvui;
    }

    public function ingressar($quantitat)
    {
        if ($quantitat <= 0 || $quantitat > self::MAX_INGRES || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }
        $this->saldo += $quantitat;
        return true;
    }

    public function retirar($quantitat)
    {
        if ($quantitat <= 0 || $quantitat > $this->saldo || $quantitat > self::MAX_RETIRADA || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }
        $this->saldo -= $quantitat;
        return true;
    }

    public function transferir($destinatari, $quantitat)
    {
        if ($quantitat <= 0 || $quantitat > $this->saldo || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }
        if ($this->transferitAvui + $quantitat > self::MAX_TRANSFERENCIA_DIA) {
            return false;
        }

        $this->saldo -= $quantitat;
        $this->transferitAvui += $quantitat;
        $destinatari->ingressar($quantitat);

        return true;
    }

    private function esValidAmbDosDecimals($quantitat)
    {
        return round($quantitat, 2) == $quantitat;
    }
}

class CompteTest extends TestCase
{
    public function testSePuedeIngressarDinero()
    {
        $compte = new Compte(0);
        $result = $compte->ingressar(500);

        $this->assertTrue($result);
        $this->assertEquals(500, $compte->saldo);
    }

    public function testNoSePuedeIngressarMasDe6000()
    {
        $compte = new Compte(0);
        $result = $compte->ingressar(6001);

        $this->assertFalse($result);
        $this->assertEquals(0, $compte->saldo);
    }

    public function testSePuedeRetirarDinero()
    {
        $compte = new Compte(1000);
        $result = $compte->retirar(200);

        $this->assertTrue($result);
        $this->assertEquals(800, $compte->saldo);
    }

    public function testNoSePuedeRetirarMasDeLoDisponible()
    {
        $compte = new Compte(300);
        $result = $compte->retirar(500);

        $this->assertFalse($result);
        $this->assertEquals(300, $compte->saldo);
    }

    public function testSePuedeTransferirDinero()
    {
        $compte1 = new Compte(1000, 0);
        $compte2 = new Compte(200);

        $result = $compte1->transferir($compte2, 300);

        $this->assertTrue($result);
        $this->assertEquals(700, $compte1->saldo);
        $this->assertEquals(500, $compte2->saldo);
    }

    public function testNoSePuedeTransferirMasDelLimiteDiario()
    {
        $compte1 = new Compte(5000, 3000);
        $compte2 = new Compte(200);

        $result = $compte1->transferir($compte2, 1000);

        $this->assertFalse($result);
        $this->assertEquals(5000, $compte1->saldo);
        $this->assertEquals(200, $compte2->saldo);
    }
}
