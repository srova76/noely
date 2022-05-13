<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $id=$_POST["id"];
    $nom=$_POST["inputnom"];
    $dn->update("categorie","nomCategorie='$nom'","idCategorie='$id'");
    $info="<span class='fa fa-check'></span>&nbsp;Modification effectuée avec succès";
    include "categorie.php";
    exit(0);
?>