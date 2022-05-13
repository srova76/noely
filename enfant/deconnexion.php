<?php
    session_start();
    unset($_SESSION["enfant"]);
    header("Location: index.php");
?>