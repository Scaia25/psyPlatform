<?php
function traduzioneMesi($mese)
{
    switch ($mese) {
        case 1:
            $meseInTesto = "Gennaio";
            break;
        case 2:
            $meseInTesto = "Febbraio";
            break;
        case 3:
            $meseInTesto = "Marzo";
            break;
        case 4:
            $meseInTesto = "Aprile";
            break;
        case 5:
            $meseInTesto = "Maggio";
            break;
        case 6:
            $meseInTesto = "Giugno";
            break;
        case 7:
            $meseInTesto = "Luglio";
            break;
        case 8:
            $meseInTesto = "Agosto";
            break;
        case 9:
            $meseInTesto = "Settembre";
            break;
        case 10:
            $meseInTesto = "Ottobre";
            break;
        case 11:
            $meseInTesto = "Novembre";
            break;
        case 12:
            $meseInTesto = "Dicembre";
            break;
        default:
            $meseInTesto = "Errore";
            break;
    }

    return $meseInTesto;
}
?>