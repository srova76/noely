<?php
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $mail=$_POST["inputmail"];
    $mdp=$_POST["inputmdp"];
    $con=$dn->testConnexionMembre($mail,$mdp);
    if ($con[0]) {
        session_start();
        $_SESSION["enfant"]=$con[1];
        header("Location: cadeaux.php");
    }
    else{
        $err=$con[1];
        include_once "connexion.php";
        exit(0);
    }
?>