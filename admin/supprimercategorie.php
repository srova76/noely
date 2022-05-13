<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $id=$_GET["id"];
    $dn->delete_from("categorie","idCategorie='$id'");
    $info="<span class='fa fa-check'></span>&nbsp;Suppression effectuée avec succès";    
    include "categorie.php";
    exit(0);
?>