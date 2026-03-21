<?php
session_start();
require_once('../../backend/connection.php');

// Controllo se l'utente è loggato
if (!isset($_SESSION['utente'])) {
    header("Location: accedi.php");
    exit();
}

// Recupero i dati dall'array in sessione
$nome = $_SESSION['utente']['nome'];
$tipologia = $_SESSION['utente']['tipologia'];
$cognome = $_SESSION['utente']['cognome'];
$provincia = $_SESSION['utente']['provincia'];
$comune = $_SESSION['utente']['comune'];
$indirizzo = $_SESSION['utente']['indirizzo'];

$query = "SELECT email, concat(nome, ' ', cognome) as nominativo, comune, indirizzo FROM utenti WHERE tipologia = 'psicologo' AND provincia = '$provincia' AND email NOT IN (SELECT email_psicologo FROM prenotazioni WHERE email_paziente = '$email')";
$res = $connessione->query($query);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Psicologi</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/lista-persone.css">
</head>

<body>

    <header>
        <a class="header-logo" href="../../../index.html">PsyPlatform</a>
        <div class="menu">
            <div class="sections-menu">
                <span id="user">
                    <?php if ($tipologia == 'psicologo') {
                        echo "Dott. ";
                    }
                    echo $nome . " " . $cognome ?>
                </span>
                <div class="v-divider"></div>
                <a href="../../../index.html">Home</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="agenda.php">Agenda</a>
                <a href="psicologi.php">Psicologi</a>
                <a href="fatturazione.php">Fatturazione</a>
                <a href="contatti.php">Assistenza</a>
            </div>
            <div class="menu-buttons">
                <a href="profilo.html"><button>Il mio profilo</button></a>
                <a href="../../backend/logout.php"><button id="logoutBtn">Disconnettiti</button></a>
            </div>
        </div>
    </header>

    <div class="hero">
        <p class="page-title">Professionisti disponibili</p>
        <p class="page-subtitle">Provincia di
            <?php echo ucfirst($provincia); ?>
        </p>

        <div class="page-divider"></div>

        <div class="lista-psicologi">

            <?php
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $orario = date('H:i', strtotime($row['orario']));

                    echo
                        "<div class='persona'>
                            <div class='infoPersona'>
                                <span class='info-field-label'>Nominativo</span>
                                <span class='info-field-value'>{$row['nominativo']}</span>
                            </div>
                            <div class='infoPersona info-email'>
                                <span class='info-field-label'>Email</span>
                                <span class='info-field-value'>{$row['email']}</span>
                            </div>
                            <div class='infoPersona info-provincia'>
                                <span class='info-field-label'>comune</span>
                                <span class='info-field-value'>{$row['comune']}</span>
                            </div>
                            <div class='infoPersona info-indirizzo'>
                                <span class='info-field-label'>Indirizzo</span>
                                <span class='info-field-value'>{$row['indirizzo']}</span>
                            </div>
                            <div class='contatta-persona'>
                                <a href='mailto:{$row['email_psicologo']}'><button>Contatta</button></a>
                            </div>
                        </div>";
                }
            } else {
                echo "<p>Nessun psicologo disponibile nella provincia di " . ucfirst($provincia) . "</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>