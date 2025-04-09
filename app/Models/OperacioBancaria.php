<?php

namespace App\Models;

class OperacioBancaria
{
    /**
     * Processa una operació bancària i retorna la resposta corresponent.
     */
    public static function processar($codiBanc, $codiSucursal, $numCompte, $clauPersonal, $ordre)
    {
        // 🔹 Validació del codi de banc
        if (!preg_match('/^[2-9][0-9]{2}$/', $codiBanc)) {
            return "Error: Codi de banc no vàlid";
        }

        // 🔹 Validació del codi de sucursal
        if (!preg_match('/^[1-9][0-9]{3}$/', $codiSucursal)) {
            return "Error: Codi de sucursal no vàlid";
        }

        // 🔹 Validació del número de compte
        if (!preg_match('/^\d{5}$/', $numCompte)) {
            return "Error: Número de compte no vàlid";
        }

        // 🔹 Validació de la clau personal
        if (!preg_match('/^[a-zA-Z0-9]{5}$/', $clauPersonal)) {
            return "Error: Clau personal no vàlida";
        }

        // 🔹 Resposta segons l'ordre
        switch (strtolower(trim($ordre))) {
            case "talonari":
                return "Talonari enviat";
            case "moviments":
                return "Moviments enviats";
            case "":
                return "Talonari i moviments enviats";
            default:
                return "Error: Ordre no vàlida";
        }
    }
}
