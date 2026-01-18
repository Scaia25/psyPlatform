<?php
// Connessione al database
$conn = new mysqli("localhost", "root", "", "psyplatform");

// Controllo connessione
if ($conn->connect_error) {
    die("Errore di connessione");
}

// Prendo i dati dal form
$tipologiaUtente = $_POST["tipologia-utente"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = $_POST["password"];

// Avvio transazione
$conn->begin_transaction();

try {
    // Inserisco l'email nella tabella unica
    $sqlEmail = "INSERT INTO listaEmail (email) VALUES ('$email')";
    $conn->query($sqlEmail);

    // Inserisco nella tabella corretta
    if ($tipologiaUtente === "paziente") {
        $sql = "INSERT INTO pazienti (nome, cognome, email, password, id_psicologo)
                VALUES ('$nome', '$cognome', '$email', '$password', NULL)";
    } elseif ($tipologiaUtente === "psicologo") {
        $sql = "INSERT INTO psicologi (nome, cognome, email, password)
                VALUES ('$nome', '$cognome', '$email', '$password')";
    } else {
        throw new Exception("Tipologia non valida");
    }

    $conn->query($sql);

    // Confermo tutto
    $conn->commit();

    $conn->close();
    header("Location: ../html/it/registrazioneAvvenuta.html");
    exit;
} catch (Exception $e) {
    // Se qualcosa va storto annullo tutto
    $conn->rollback();
    $conn->close();

    echo "<script>
            alert('Email già presente nel sistema');
          </script>";
    exit;
}
