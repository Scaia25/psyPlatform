<?php
session_start();
require_once('../../backend/connection.php');
require_once('../../backend/genericFunctions.php');

// Controllo se l'utente è loggato
if (!isset($_SESSION['utente'])) {
    header("Location: accedi.php");
    exit();
}

// Recupero i dati dall'array in sessione
$nome = $_SESSION['utente']['nome'];
$tipologia = $_SESSION['utente']['tipologia'];
$cognome = $_SESSION['utente']['cognome'];
$email = $_SESSION['utente']['email'];

$query = "SELECT p.orario, p.data, concat(u.nome, ' ', u.cognome) as nominativo FROM prenotazioni as p, utenti as u WHERE u.email = p.email_psicologo AND p.email_paziente = '$email'";
$res = $connessione->query($query);
$rows = [];

while ($row = $res->fetch_assoc()) {
    $rows[] = $row;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Agenda</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/agenda.css">
</head>

<body>

    <header>
        <a class="header-logo" href="../../../index.html">PsyPlatform</a>
        <div class="menu">
            <div class="sections-menu">
                <span id="user"><?php if ($tipologia == 'psicologo') {
                    echo "Dott. ";
                }
                echo $nome . " " . $cognome ?></span>
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
        <div class="agenda">
            <div class="controllo-settimana">
                <button id="settimana-precedente">&laquo; Settimana precedente</button>
                <h2>16 Febbraio — 22 Febbraio</h2>
                <button id="settimana-successiva">Settimana successiva &raquo;</button>
            </div>

            <table class="struttura-agenda">
                <tr id="giorni-settimana">
                    <td>Lunedì</td>
                    <td>Martedì</td>
                    <td>Mercoledì</td>
                    <td>Giovedì</td>
                    <td>Venerdì</td>
                    <td>Sabato</td>
                    <td>Domenica</td>
                </tr>
                <tr id="eventi">
                    <td id="eventi-lunedi"></td>
                    <td id="eventi-martedi"></td>
                    <td id="eventi-mercoledi" class="oggi">
                        <div class="evento">
                            <span class="evento-ora">10:00 – 11:00</span>
                            <span class="evento-titolo">Sessione — Mario Rossi</span>
                            <span class="evento-tag">Prima visita</span>
                        </div>
                    </td>
                    </td>
                    <td id="eventi-giovedi"></td>
                    <td id="eventi-venerdi"></td>
                    <td id="eventi-sabato"></td>
                    <td id="eventi-domenica"></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        window.dbDati = <?php echo json_encode($rows); ?>;
    </script>

    <script src="../js/weekChange.js"></script>
</body>

</html>