<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = ['saldo', 'transferit_avui'];

    const MAX_INGRES = 6000.00;
    const MAX_RETIRADA = 6000.00;
    const MAX_TRANSFERENCIA_DIA = 3000.00;

    public function ingressar($quantitat)
    {
        if ($quantitat <= 0 || $quantitat > self::MAX_INGRES || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }
        $this->saldo += $quantitat;
        $this->save();
        return true;
    }

    public function retirar($quantitat)
    {
        if ($quantitat <= 0 || $quantitat > $this->saldo || $quantitat > self::MAX_RETIRADA || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }
        $this->saldo -= $quantitat;
        $this->save();
        return true;
    }

    public function transferir($destinatari, $quantitat)
    {
        if ($quantitat <= 0 || $quantitat > $this->saldo || !$this->esValidAmbDosDecimals($quantitat)) {
            return false;
        }

        if ($this->transferit_avui + $quantitat > self::MAX_TRANSFERENCIA_DIA) {
            return false;
        }

        $this->saldo -= $quantitat;
        $this->transferit_avui += $quantitat;
        $this->save();

        $destinatari->ingressar($quantitat);
        return true;
    }

    private function esValidAmbDosDecimals($quantitat)
    {
        return round($quantitat, 2) == $quantitat;
    }
}
