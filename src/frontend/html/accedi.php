<?php
session_start();
require_once('../../backend/connection.php');
$messaggio_errore = "";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connessione->prepare("SELECT * FROM utenti WHERE email = ? AND password = ?");

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 1) {
        $dati_utente = $res->fetch_assoc();
        $_SESSION['utente'] = $dati_utente;
        header("Location: dashboard.php");
        exit();
    } else {
        $messaggio_errore = "Email o password non validi!";
    }

}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Accedi</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>

    <header>
        <a class="header-logo" href="../../../index.html">PsyPlatform</a>
        <div class="menu">
            <div class="sections-menu">
                <a href="../../../index.html">Home</a>
                <a href="funzionalità.html">Funzionalità</a>
                <a href="prezzi.html">Prezzi</a>
                <a href="contatti.php">Contatti</a>
            </div>
            <div class="menu-buttons">
                <a href="accedi.php"><button>Accedi</button></a>
                <a href="registrati.html"><button>Registrati</button></a>
            </div>
        </div>
    </header>

    <div class="hero">
        <h1>Bentornato</h1>
        <p>Non hai un account? <a href="registrati.php">Registrati ora</a></p>

        <?php if ($messaggio_errore !== ""): ?>
            <div
                style="background: #ffcccc; color: #cc0000; padding: 10px; margin-bottom: 20px; border-radius: 5px; text-align: center;">
                <?php echo $messaggio_errore; ?>
            </div>
        <?php endif; ?>

        <div class="form-card">
            <form action="accedi.php" method="POST">
                <div class="form-fields">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Inserisci la tua email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Inserisci la tua password"
                        required>
                </div>

                <div class="form-submit">
                    <button type="submit">Accedi</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>