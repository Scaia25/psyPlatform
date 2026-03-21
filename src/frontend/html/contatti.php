<?php
session_start();

// Controllo se l'utente è loggato
if (isset($_SESSION['utente'])) {
    $utenteLoggato = true;
    $nome = $_SESSION['utente']['nome'];
    $tipologia = $_SESSION['utente']['tipologia'];
    $cognome = $_SESSION['utente']['cognome'];
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Contatti</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/form.css">
    <style>
        .hero {
            max-width: 560px;
        }
    </style>
</head>

<body>

    <header>
        <a class="header-logo" href="../../../index.html">PsyPlatform</a>
        <div class="menu">
            <?php
            if ($utenteLoggato) {
                if($tipologia == "psicologo") {
                    $prefisso = "Dott. ";
                }
                echo "
                <div class='sections-menu'>
                    <span id='user'>$prefisso $nome $cognome</span>
                    <div class='v-divider'></div>
                    <a href='../../../index.html'>Home</a>
                    <a href='dashboard.php'>Dashboard</a>
                    <a href='agenda.php'>Agenda</a>";
                if ($tipologia == 'psicologo') {
                    echo "<a href='archivio.php'>Pazienti</a>";
                } else {
                    echo "<a href='archivio.php'>Psicologi</a>";
                }
                echo "
                    <a href='fatturazione.php'>Fatturazione</a>
                    <a href='contatti.php'>Assistenza</a>
                </div>

                <div class='menu-buttons'>
                    <a href='profilo.html'><button>Il mio profilo</button></a>
                    <a href='../../backend/logout.php'><button id='logoutBtn'>Disconnettiti</button></a>
                </div>";
            } else {
                echo "
                <div class='sections-menu'>
                    <a href='../../../index.html'>Home</a>
                    <a href='funzionalità.html'>Funzionalità</a>
                    <a href='prezzi.html'>Prezzi</a>
                    <a href='contatti.php'>Contatti</a>
                </div>

                <div class='menu-buttons'>
                    <a href='accedi.php'><button>Accedi</button></a>
                    <a href='registrati.html'><button>Registrati</button></a>
                </div>";
            }
            ?>


        </div>
    </header>

    <div class="hero">
        <h1>Parla con noi</h1>
        <p>Rispondiamo entro 24 ore lavorative</p>

        <div class="form-card">
            <form action="" method="post">
                <div class="form-fields">
                    <label for="name-surname">Nome e Cognome</label>
                    <input type="text" id="name-surname" name="name-surname"
                        placeholder="Inserisci il tuo nome e cognome" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Inserisci la tua email" required>

                    <label for="problem-description">Descrivi il problema</label>
                    <textarea id="problem-description" name="problem-description" rows="6"
                        placeholder="Descrivi il tuo problema o richiesta in dettaglio..." required></textarea>
                </div>

                <div class="form-submit">
                    <button type="submit">Invia richiesta</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>