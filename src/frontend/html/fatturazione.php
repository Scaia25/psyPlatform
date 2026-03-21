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
$provincia = $_SESSION['utente']['provincia'];
$comune = $_SESSION['utente']['comune'];
$indirizzo = $_SESSION['utente']['indirizzo'];
$email = $_SESSION['utente']['email'];

$query = "SELECT YEAR(p.data) as anno, SUM(u.tariffa_oraria) as totaleAnnuale FROM prenotazioni p, utenti u WHERE u.email = p.email_psicologo AND p.email_paziente = '$email' GROUP BY YEAR(p.data) ORDER BY YEAR(p.data) DESC";
$resAnno = $connessione->query($query);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Fatturazione</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/fatturazione.css">
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

    <div class="hero">
        <p class="page-title">Fatturazione</p>
        <?php if ($tipologia == "psicologo") {
            echo "<p class='page-subtitle'>Storico entrate per anno, mese e paziente</p>";
        } else {
            echo "<p class='page-subtitle'>Storico spese per anno, mese e psicologo</p>";
        } ?>
        <div class="page-divider"></div>

        <div class="fatturazione-list">

            <?php
            $totaleComplessivo = 0.00;

            if ($resAnno && $resAnno->num_rows > 0) {
                while ($rowAnno = $resAnno->fetch_assoc()) {
                    $annoCorrente = $rowAnno['anno'];
                    $totaleAnnuale = $rowAnno['totaleAnnuale'];
                    $totaleComplessivo += $totaleAnnuale;
                    $totaleAnnuale = number_format($totaleAnnuale, 2, ',', '.');

                    echo "
        <div class='anno-block' data-anno='{$annoCorrente}'>
            <div class='anno-header'>
                <div class='anno-header-left'>
                    <span class='anno-dot'></span>
                    <span class='anno-label'>{$annoCorrente}</span>
                </div>
                <div class='anno-header-right'>
                    <span class='anno-totale'>Totale: {$totaleAnnuale} €</span>
                    <svg class='anno-chevron' viewBox='0 0 24 24' fill='none' stroke='currentColor'
                        stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'>
                        <polyline points='6 9 12 15 18 9' />
                    </svg>
                </div>
            </div>
            <div class='anno-body'>";

                    // --- INIZIO CICLO MESI ---
                    $queryM = "SELECT MONTH(p.data) as meseNum, SUM(u.tariffa_oraria) as totaleMensile 
                   FROM prenotazioni p, utenti u 
                   WHERE u.email = p.email_psicologo AND p.email_paziente = '$email' 
                   AND YEAR(p.data) = $annoCorrente 
                   GROUP BY MONTH(p.data) ORDER BY MONTH(p.data) ASC";

                    $resMese = $connessione->query($queryM);

                    while ($rowMese = $resMese->fetch_assoc()) {
                        $mNum = $rowMese['meseNum'];
                        $meseTesto = traduzioneMesi($mNum);

                        echo "
            <div class='mese-block' data-mese='{$annoCorrente}-{$mNum}'>
                <div class='mese-header'>
                    <div class='mese-header-left'>
                        <span class='mese-dot'></span>
                        <span class='mese-label'>{$meseTesto}</span>
                    </div>
                    <div class='mese-header-right'>
                        <span class='mese-totale'>{$rowMese['totaleMensile']} €</span>
                        <svg class='mese-chevron' viewBox='0 0 24 24' fill='none' stroke='currentColor'
                            stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'>
                            <polyline points='6 9 12 15 18 9' />
                        </svg>
                    </div>
                </div>
                <div class='mese-body'>";

                        // --- INIZIO CICLO FATTURE ---
                        $queryF = "SELECT concat(u.nome, ' ', u.cognome) as nominativo, u.email, SUM(u.tariffa_oraria) as totaleFattura 
                       FROM prenotazioni p, utenti u 
                       WHERE u.email = p.email_psicologo AND p.email_paziente = '$email' 
                       AND YEAR(p.data) = $annoCorrente AND MONTH(p.data) = $mNum 
                       GROUP BY u.email ORDER BY nominativo ASC";

                        $resFattura = $connessione->query($queryF);
                        while ($rowFattura = $resFattura->fetch_assoc()) {

                        $totaleFattura = $rowFattura['totaleFattura'];
                        $totaleFattura =  number_format($totaleFattura, 2, ',', '.');
                            echo "
                <div class='fattura-row'>
                    <div class='fattura-field fattura-nominativo'>
                        <span class='fattura-field-label'>Soggetto</span>
                        <span class='fattura-field-value'>{$rowFattura['nominativo']}</span>
                    </div>
                    <div class='fattura-field fattura-email'>
                        <span class='fattura-field-label'>Email</span>
                        <span class='fattura-field-value'>{$rowFattura['email']}</span>
                    </div>
                    <div class='fattura-field fattura-importo'>
                        <span class='fattura-field-label'>Importo</span>
                        <span class='fattura-field-value'>{$totaleFattura} €</span>
                    </div>
                </div>";
                        }
                        echo "</div> </div>"; // Chiusura mese-body e mese-block
                    }
                    echo "</div> </div>"; // Chiusura anno-body e anno-block
                }
            } else {
                echo "Nessun movimento trovato";
            }

            // Totale generale fuori dai cicli
            echo "
            <div class='totale-generale'>
                <span class='totale-generale-label'>Totale complessivo</span>
                <span class='totale-generale-value'>{$totaleComplessivo} €</span>
            </div>";
            ?>

        </div>
    </div>

    <script>
        // ── Accordion anni: uno aperto per volta ──
        document.querySelectorAll('.anno-header').forEach(header => {
            header.addEventListener('click', () => {
                const clickedBlock = header.closest('.anno-block');
                const isOpen = clickedBlock.classList.contains('open');

                // Chiudi tutti gli anni (e resetta i mesi interni)
                document.querySelectorAll('.anno-block').forEach(block => {
                    block.classList.remove('open');
                    block.querySelectorAll('.mese-block').forEach(m => m.classList.remove('open'));
                });

                // Apri il cliccato (se era chiuso)
                if (!isOpen) clickedBlock.classList.add('open');
            });
        });

        // ── Accordion mesi: uno aperto per volta dentro lo stesso anno ──
        document.querySelectorAll('.mese-header').forEach(header => {
            header.addEventListener('click', (e) => {
                e.stopPropagation(); // non propagare al header anno
                const clickedMese = header.closest('.mese-block');
                const parentAnno = clickedMese.closest('.anno-block');
                const isOpen = clickedMese.classList.contains('open');

                // Chiudi tutti i mesi dello stesso anno
                parentAnno.querySelectorAll('.mese-block').forEach(m => m.classList.remove('open'));

                // Apri il cliccato (se era chiuso)
                if (!isOpen) clickedMese.classList.add('open');
            });
        });
    </script>

</body>

</html>