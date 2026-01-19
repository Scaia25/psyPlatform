<?php
session_start();

function richiedeRuolo($ruolo) {
    if (!isset($_SESSION["ruolo"]) || $_SESSION["ruolo"] !== $ruolo) {
        header("Location: accedi.html");
        exit;
    }
}
