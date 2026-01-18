<?php
// Connessione al database
$conn = new mysqli("localhost", "root", "", "psyplatform");

// Controllo connessione
if ($conn->connect_error) {
    die("Errore di connessione");
}

// Prendo i dati dal form
$email = $_POST["email"];
$password = $_POST["password"];

// Query di selezione


// Esecuzione query
if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: ../html/it/registrazioneAvvenuta.html");
    exit;
} else {
    $conn->close();
    echo "<script>
            alert('Errore nella registrazione');
          </script>";
    exit;
}