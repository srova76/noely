<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $cadeau=$_POST["cadeau"];
    $nom=$_POST["inputnom"];
    $point=$_POST["inputpoint"];
    $cat=$_POST["categorie"];
    $dn->update("cadeau","nomCadeau='$nom', point='$point', idCategorie='$cat' ","idCadeau='$cadeau'");
    $info="<span class='fa fa-check'></span>&nbsp;Modification effectuée avec succès";
    include "produit.php";
    exit(0);
?>