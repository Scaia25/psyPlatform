<?php
    session_start();
    $_SESSION = array();

    session_destroy();

    header("Location: ../frontend/html/accedi.php");
    exit;
?>