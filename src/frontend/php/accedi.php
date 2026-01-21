<?php
session_start();

$conn = new mysqli("localhost", "root", "", "psyplatform");
if ($conn->connect_error) {
    die("Errore di connessione");
}

$email = $_POST["email"];
$password = $_POST["password"];

/* 🔍 Controllo pazienti */
$sqlP = "SELECT * FROM pazienti 
         WHERE email = '$email' 
         AND password = '$password'";
$resP = $conn->query($sqlP);

if ($resP->num_rows == 1) {
    $utente = $resP->fetch_assoc(); // prende la riga dal DB

    $_SESSION["ID_paziente"] = $utente["ID_paziente"];
    $_SESSION["nome"] = $utente["nome"];
    $_SESSION["cognome"] = $utente["cognome"];
    $_SESSION["email"] = $utente["email"];
    $_SESSION["id_psicologo"] = $utente["id_psicologo"];
    $_SESSION["ruolo"] = "paziente";

    header("Location: ../html/it/homePaziente.php");
    exit;
}

/* 🔍 Controllo psicologi */
$sqlS = "SELECT * FROM psicologi 
         WHERE email = '$email' 
         AND password = '$password'";
$resS = $conn->query($sqlS);

if ($resS->num_rows == 1) {
    $utente = $resS->fetch_assoc(); // prende la riga dal DB

    $_SESSION["ID"] = $utente["ID_psicologo"];
    $_SESSION["nome"] = $utente["nome"];
    $_SESSION["cognome"] = $utente["cognome"];
    $_SESSION["email"] = $utente["email"];
    $_SESSION["ruolo"] = "psicologo";

    header("Location: ../html/it/homePsicologo.php");
    exit;
}

/* ❌ Nessun match */
echo "Credenziali errate";
?>
