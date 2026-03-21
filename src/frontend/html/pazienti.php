<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Pazienti</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/lista-persone.css">
</head>
<body>

    <header>
        <a class="header-logo" href="../../../index.html">PsyPlatform</a>
        <div class="menu">
            <div class="sections-menu">
                <span id="user">Mario Rossi</span>
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
        <p class="page-title">Archivio Pazienti</p>
        <p class="page-subtitle">Tutti i tuoi pazienti in cura</p>

        <div class="page-divider"></div>

        <div class="lista-pazienti">

            <div class="paziente">
                <div class="infoPaziente">
                    <span class="info-field-label">Nominativo</span>
                    <span class="info-field-value">Luigi Verdi</span>
                </div>
                <div class="infoPaziente info-email">
                    <span class="info-field-label">Email</span>
                    <span class="info-field-value">l.verdi@email.com</span>
                </div>
                <div class="contattoPaziente">
                    <a href="mailto:l.verdi@email.com"><button>Contatta</button></a>
                </div>
            </div>

            <div class="paziente">
                <div class="infoPaziente">
                    <span class="info-field-label">Nominativo</span>
                    <span class="info-field-value">Giovanni Bianchi</span>
                </div>
                <div class="infoPaziente info-email">
                    <span class="info-field-label">Email</span>
                    <span class="info-field-value">g.bianchi@email.com</span>
                </div>
                <div class="contattoPaziente">
                    <a href="mailto:g.bianchi@email.com"><button>Contatta</button></a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
