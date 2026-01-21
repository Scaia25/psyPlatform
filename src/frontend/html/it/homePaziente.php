<?php
require "../../php/auth.php";
richiedeRuolo("paziente");

$nome = $_SESSION["nome"] ?? "nome";
$cognome = $_SESSION["cognome"] ?? "cognome";
$ID_paziente = $_SESSION["ID_paziente"] ?? "ID";
$id_psicologo = $_SESSION["id_psicologo"] ?? "ID";

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform</title>
    <link rel="icon" href="../../images/logo.png">
    <link rel="stylesheet" href="../../css/homePsicologo.css  ">
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
                <a href="homePaziente.php">Home</a>
                <a href="agenda.php">Visualizza agenda</a>
                <a href="contatti.html">Assistenza</a>
            </div>


            <!--<div class="menu-buttons">
                <a href="registraPaziente.php"><button>Registra paziente</button></a>
            </div> -->
        </div>
    </header>

    <div class="upper-hero">
        <div class="hero-text">
            <h1>Bentornatə <?php echo $nome . " " . $cognome; ?>,</h1>
            <div id="stampa">

            </div>
        </div>
    </div>

    <script>
        function pazienteRegistrato() {
            const id_psicologo = <?php echo json_encode($id_psicologo); ?>;

            if (isNaN(id_psicologo)) {
                console.log("senza ID");
            } else {
                console.log("id:" + id_psicologo);
            }
        }

        pazienteRegistrato();
    </script>
</body>

</html>