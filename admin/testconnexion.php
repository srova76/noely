<?php
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $mail=$_POST["inputlogin"];
    $mdp=$_POST["inputmdp"];
    $con=$dn->testConnexionAdmin($mail,$mdp);
    if ($con[0]) {
        session_start();
        $_SESSION["admin"]=$con[1];
        header("Location: acceuil.php");
    }
    else {
        $err=$con[1];
        include_once "index.php";
        exit(0);
    }
?>