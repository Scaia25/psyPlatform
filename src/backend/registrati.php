<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $tipologia = $_POST['tipologia-utente'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $provincia = trim($_POST['provincia']);
    $password = $_POST['password'];

    $query = "SELECT email FROM utenti WHERE email = '$email'";

    $res = $connessione->query($query);

    if ($res->num_rows == 0) {
        $query = "INSERT INTO utenti (tipologia, nome, cognome, email, provincia, password)
        VALUES ('$tipologia', '$nome', '$cognome', '$email', '$provincia', '$password')";

        $connessione->query($query);
        die("ciao");
    }

    $connessione->close();
    exit();
}
?>