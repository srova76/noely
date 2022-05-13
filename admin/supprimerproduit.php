<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $id=$_GET["id"];
    $dn->delete_from("cadeau","idCadeau='$id'");
    $info="<span class='fa fa-check'></span>&nbsp;Suppression effectuée avec succès";    
    include "produit.php";
    exit(0);
?>