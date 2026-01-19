<?php
require "../../php/auth.php";
richiedeRuolo("psicologo");
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform</title>
    <link rel="icon" href="../../images/logo.png">
    <link rel="stylesheet" href="../../css/registraPaziente.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,800;1,800&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,500;1,500&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <label>PsyPlatform</label>

        <div class="menu">
            <div class="sections-menu">
                <a href="homePsicologo.php">Home</a>
                <a href="agenda.php">Visualizza agenda</a>
                <a href="contatti.html">Assistenza</a>
            </div>


            <div class="menu-buttons">
                <a href="registraPaziente.php"><button>Registra paziente</button></a>
            </div>
        </div>
    </header>

    <div class="hero">
        <h1>REGISTRAZIONE PAZIENTE</h1>

        <form action="" method="" onsubmit="verifica(event)">
            <div class="form-fields">
                <label for="IDPaziente"><strong>ID paziente</strong></label>
                <input type="text" id="IDPaziente" name="IDPaziente" placeholder="Inserire l'ID del paziente" required>
            </div>

            <div id="alert"></div>

            <button type="submit">Registra</button>
        </form>
    </div>

    <script src="../../js/registraPaziente.js"></script>
</body>

</html>