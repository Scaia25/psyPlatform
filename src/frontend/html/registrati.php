<?php
session_start();
require_once('../../backend/connection.php');
$messaggio_errore = "";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $tipologia = $_POST['tipologia-utente'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $provincia = trim($_POST['provincia']);
    $password = $_POST['password'];
    $comune = $_POST['comune'];
    $indirizzo = $_POST['indirizzo'];

    $stmt = $connessione->prepare("SELECT email FROM utenti WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        $stmt->close();

        $query = "INSERT INTO utenti (tipologia, nome, cognome, email, provincia, password, comune, indirizzo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connessione->prepare($query);

        $stmt->bind_param("ssssssss", $tipologia, $nome, $cognome, $email, $provincia, $password, $comune, $indirizzo);

        if ($stmt->execute()) {
            $_SESSION['utente']['tipologia'] = $tipologia;
            $_SESSION['utente']['nome'] = $nome;
            $_SESSION['utente']['cognome'] = $cognome;
            $_SESSION['utente']['email'] = $email;
            $_SESSION['utente']['provincia'] = $provincia;
            $_SESSION['utente']['password'] = $password;
            $_SESSION['utente']['comune'] = $comune;
            $_SESSION['utente']['indirizzo'] = $indirizzo;


            header("Location: dashboard.php");
            exit();
        } else {
            die("Errore di connessione: " . $connessione->connect_error);
        }
    } else {
        $messaggio_errore = "Questa email è già registrata!";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsyPlatform - Registrati</title>
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
            max-width: 540px;
        }
    </style>
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
        <h1>Crea un account</h1>
        <p>Hai già un account? <a href="accedi.php">Accedi ora</a></p>

        <?php if ($messaggio_errore !== ""): ?>
            <div
                style="background: #ffcccc; color: #cc0000; padding: 10px; margin-bottom: 20px; border-radius: 5px; text-align: center;">
                <?php echo $messaggio_errore; ?>
            </div>
        <?php endif; ?>

        <div class="form-card">
            <form action="registrati.php" method="POST">
                <div class="form-fields">

                    <label>Tipologia</label>
                    <div class="tipologia-utente">
                        <label class="custom-radio">
                            <input type="radio" name="tipologia-utente" value="paziente" checked>
                            Paziente
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="tipologia-utente" value="psicologo">
                            Psicologo
                        </label>
                    </div>

                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome" required>

                    <label for="cognome">Cognome</label>
                    <input type="text" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Inserisci la tua email" required>

                    <label for="provincia">Provincia</label>
                    <input type="text" list="listaProvince" id="provincia" name="provincia"
                        placeholder="Scrivi o scegli una provincia" required>
                    <datalist id="listaProvince">
                        <option value="Agrigento">
                        <option value="Alessandria">
                        <option value="Ancona">
                        <option value="Aosta">
                        <option value="Arezzo">
                        <option value="Ascoli Piceno">
                        <option value="Asti">
                        <option value="Avellino">
                        <option value="Bari">
                        <option value="Barletta-Andria-Trani">
                        <option value="Belluno">
                        <option value="Benevento">
                        <option value="Bergamo">
                        <option value="Biella">
                        <option value="Bologna">
                        <option value="Bolzano">
                        <option value="Brescia">
                        <option value="Brindisi">
                        <option value="Cagliari">
                        <option value="Caltanissetta">
                        <option value="Campobasso">
                        <option value="Caserta">
                        <option value="Catania">
                        <option value="Catanzaro">
                        <option value="Chieti">
                        <option value="Como">
                        <option value="Cosenza">
                        <option value="Cremona">
                        <option value="Crotone">
                        <option value="Cuneo">
                        <option value="Enna">
                        <option value="Fermo">
                        <option value="Ferrara">
                        <option value="Firenze">
                        <option value="Foggia">
                        <option value="Forlì-Cesena">
                        <option value="Frosinone">
                        <option value="Genova">
                        <option value="Gorizia">
                        <option value="Grosseto">
                        <option value="Imperia">
                        <option value="Isernia">
                        <option value="La Spezia">
                        <option value="L'Aquila">
                        <option value="Latina">
                        <option value="Lecce">
                        <option value="Lecco">
                        <option value="Livorno">
                        <option value="Lodi">
                        <option value="Lucca">
                        <option value="Macerata">
                        <option value="Mantova">
                        <option value="Massa-Carrara">
                        <option value="Matera">
                        <option value="Messina">
                        <option value="Milano">
                        <option value="Modena">
                        <option value="Monza e Brianza">
                        <option value="Napoli">
                        <option value="Novara">
                        <option value="Nuoro">
                        <option value="Oristano">
                        <option value="Padova">
                        <option value="Palermo">
                        <option value="Parma">
                        <option value="Pavia">
                        <option value="Perugia">
                        <option value="Pesaro e Urbino">
                        <option value="Pescara">
                        <option value="Piacenza">
                        <option value="Pisa">
                        <option value="Pistoia">
                        <option value="Pordenone">
                        <option value="Potenza">
                        <option value="Prato">
                        <option value="Ragusa">
                        <option value="Ravenna">
                        <option value="Reggio Calabria">
                        <option value="Reggio Emilia">
                        <option value="Rieti">
                        <option value="Rimini">
                        <option value="Roma">
                        <option value="Rovigo">
                        <option value="Salerno">
                        <option value="Sassari">
                        <option value="Savona">
                        <option value="Siena">
                        <option value="Siracusa">
                        <option value="Sondrio">
                        <option value="Taranto">
                        <option value="Teramo">
                        <option value="Terni">
                        <option value="Torino">
                        <option value="Trapani">
                        <option value="Trento">
                        <option value="Treviso">
                        <option value="Trieste">
                        <option value="Udine">
                        <option value="Varese">
                        <option value="Venezia">
                        <option value="Verbano-Cusio-Ossola">
                        <option value="Vercelli">
                        <option value="Verona">
                        <option value="Vibo Valentia">
                        <option value="Vicenza">
                        <option value="Viterbo">
                    </datalist>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Crea una password sicura"
                        required>

                    <label for="comune">Comune</label>
                    <input type="text" id="comune" name="comune" placeholder="Inserisci il comune di provenienza"
                        required>

                    <label for="indirizzo">Indirizzo</label>
                    <input type="text" id="indirizzo" name="indirizzo" placeholder="Inserisci l'indirizzo" required>
                </div>

                <div class="form-submit">
                    <button type="submit">Registrati</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>