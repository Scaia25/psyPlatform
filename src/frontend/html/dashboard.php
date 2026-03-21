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

$query = "SELECT p.email_psicologo, p.orario, concat(u.nome, ' ', u.cognome) as nominativo FROM prenotazioni as p, utenti as u WHERE p.email_paziente = '$email' AND p.data = CURRENT_DATE AND p.email_psicologo = u.email";
$resEventiDelGiorno = $connessione->query($query);

$query = "SELECT p.email_psicologo, p.orario, concat(u.nome, ' ', u.cognome) as nominativo, p.data FROM prenotazioni as p, utenti as u WHERE p.email_paziente = '$email' AND p.email_psicologo = u.email AND p.data >= CURRENT_DATE ORDER BY p.data";
$resPrenotazioni = $connessione->query($query);

$query = "SELECT p.email_psicologo, concat(u.nome, ' ', u.cognome) as nominativo, count(p.email_psicologo) as numeroVisite, u.provincia FROM prenotazioni as p, utenti as u WHERE p.email_paziente = '$email' AND u.email = p.email_psicologo GROUP BY p.email_psicologo";
$resConnessioni = $connessione->query($query);

$query = "SELECT SUM(u.tariffa_oraria) AS totale_mensile FROM prenotazioni p, utenti u WHERE u.email = p.email_psicologo AND p.email_paziente = '$email' AND MONTH(p.data) = MONTH(CURDATE()) AND YEAR(p.data) = YEAR(CURDATE())";
$resFatturaMensile = $connessione->query($query);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - dashboard</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- ===================== HEADER ===================== -->
    <header>
        <span class="header-logo">PsyPlatform</span>

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
                <?php if ($tipologia == 'psicologo') {
                    echo "<a href='archivio.php'>Pazienti</a>";
                } else {
                    echo "<a href='archivio.php'>Psicologi</a>";
                } ?>
                <a href="fatturazione.php">Fatturazione</a>
                <a href="contatti.php">Assistenza</a>
            </div>

            <div class="menu-buttons">
                <a href="profilo.html"><button>Il mio profilo</button></a>
                <a href="../../backend/logout.php"><button id="logoutBtn">Disconnettiti</button></a>
            </div>
        </div>
    </header>

    <!-- ===================== HERO ===================== -->
    <div class="hero">

        <div class="hero-welcome">
            <h1>Buongiorno, <em><?php echo $nome; ?></em></h1>
            <p>Per la giornata odierna hai
                <?php echo $resEventiDelGiorno->num_rows;
                if ($resEventiDelGiorno->num_rows != 1) {
                    echo " eventi";
                } else {
                    echo "  evento";
                } ?>
                in agenda</p>
        </div>

        <!-- ===== 3-COLUMN GRID ===== -->
        <div class="hero-widgets">

            <!-- ── COLONNA 1: Events ── -->
            <div class="widget" id="eventi-giornalieri">
                <div>
                    <div class="widget-header">
                        <span class="widget-accent-dot"></span>
                        <h2>Eventi della giornata</h2>
                    </div>
                    <div class="widget-divider"></div>
                    <?php
                    if ($resEventiDelGiorno->num_rows > 0) {
                        while ($row = $resEventiDelGiorno->fetch_assoc()) {
                            $orario = date('H:i', strtotime($row['orario']));

                            echo
                                "<div class='evento'>
                                        <div class='info-nominativo'>
                                            <p class='card-label'>nominativo</p>
                                            <p class='card-value'>{$row['nominativo']}</p>
                                        </div>
                                        <div class='info-email'>
                                            <p class='card-label'>email</p>
                                            <p class='card-value'>{$row['email_psicologo']}</p>
                                        </div>
                                        <div class='info-orario'>
                                            <p class='card-label'>orario</p>
                                            <p class='card-value'>{$orario}</p>
                                        </div>
                                    </div>";
                        }
                    } else {
                        echo "<p>Nessun evento in programma</p>";
                    }
                    ?>
                </div>

                <div class="widget-button">
                    <a href="agenda.php"><button>Visualizza l'agenda completa</button></a>
                </div>
            </div>

            <!-- ── COLONNA 2: Prenotazioni ── -->
            <div class="widget" id="prenotazioni">
                <div>
                    <div class="widget-header">
                        <span class="widget-accent-dot"></span>
                        <h2>Prenotazioni</h2>
                    </div>
                    <div class="widget-divider"></div>
                    <?php
                    if ($resPrenotazioni->num_rows > 0) {
                        $c = 0;
                        while (($row = $resPrenotazioni->fetch_assoc()) && $c < 3) {
                            $c++;

                            $data = new DateTime($row['data']);
                            $giorno = $data->format('d');
                            $mese = $data->format('m');

                            $orario = date('H:i', strtotime($row['orario']));

                            echo
                                "<div class='prenotazione'>
                                    <div class='info-prenotazione-nominativo'>
                                        <p class='card-label'>nominativo</p>
                                        <p class='card-value'>{$row['nominativo']}</p>
                                    </div>
                                    <div class='info-prenotazione-email'>
                                        <p class='card-label'>email</p>
                                        <p class='card-value'>{$row['email_psicologo']}</p>
                                    </div>
                                    <div class='info-prenotazione-data'>
                                        <p class='card-label'>data</p>
                                        <p class='card-value'>{$giorno}/{$mese}</p>
                                    </div>
                                    <div class='info-prenotazione-orario'>
                                        <p class='card-label'>orario</p>
                                        <p class='card-value'>{$orario}</p>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "<p>Nessun prenotazione in archivio</p>";
                    }
                    ?>
                </div>

                <div class="widget-button">
                    <a href="sessioni.html"><button>Visualizza tutte le prenotazioni</button></a>
                </div>
            </div>

            <!-- ── COLONNA 3: Professionisti + Quota ── -->
            <div class="widget-column-right">

                <div class="widget" id="professionisti">
                    <div>
                        <div class="widget-header">
                            <span class="widget-accent-dot"></span>
                            <h2>Professionisti assegnati</h2>
                        </div>
                        <div class="widget-divider"></div>
                        <?php if ($resConnessioni->num_rows > 0) {
                            $c = 0;
                            while ($row = $resConnessioni->fetch_assoc()) {
                                echo
                                    "<div class='persona'>
                                        <div class='info-persona-nominativo'>
                                            <p class='card-label'>nominativo</p>
                                            <p class='card-value'>{$row['nominativo']}</p>
                                        </div>
                                        <div class='info-persona-email'>
                                            <p class='card-label'>email</p>
                                            <p class='card-value'>{$row['email_psicologo']}</p>
                                        </div>
                                        <div class='info-persona-citta'>
                                            <p class='card-label'>provincia</p>
                                            <p class='card-value'>{$row['provincia']}</p>
                                        </div>
                                    </div>";
                            }
                        } else {
                            echo "<p>Nessun professionista assegnato</p>";
                        }
                        ?>
                    </div>

                    <div class="widget-button">
                        <a href="psicologi.php"><button>Scopri nuovi psicologi</button></a>
                    </div>
                </div>

                <div class="widget" id="entrate-mensili">
                    <div>
                        <div class="widget-header">
                            <span class="widget-accent-dot"></span>
                            <h2>Fatturazione mensile</h2>
                        </div>
                        <div class="widget-divider"></div>

                        <div class="quota-block">
                            <p class="quota-sublabel">Spese stimate questo mese</p>
                            <p class="quota-amount"><?php if ($resFatturaMensile->num_rows > 0) {
                                $row = $resFatturaMensile->fetch_assoc();
                                $totale = $row['totale_mensile'] ?? 0;
                                echo number_format($totale, 2, ',', '.');
                            } else {
                                echo "0,00";
                            } ?> €</p>
                            <p class="quota-sub"><?php echo traduzioneMesi(date('n')) . " " . date('Y'); ?></p>
                        </div>
                    </div>

                    <div class="widget-button">
                        <a href="fatturazione.php"><button>Visualizza fatturazione completa</button></a>
                    </div>
                </div>

            </div><!-- fine .widget-column-right -->

        </div><!-- fine .hero-widgets -->
    </div><!-- fine .hero -->

</body>

</html>