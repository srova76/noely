<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $nom=$_POST["inputnom"];
    $point=$_POST["inputpoint"];
    $cat=$_POST["categorie"];

    $value[0]=$nom;
    $value[1]=$point;
    $value[2]=$cat;
    $value[3]=str_replace(".png","",$_FILES["fichier"]["name"]);

    $fichier_temporaire=$_FILES["fichier"]["tmp_name"];
    $dossier_upload=$_SERVER["DOCUMENT_ROOT"]."/dn/images/cadeau".$_FILES["fichier"]["name"];
    move_uploaded_file($fichier_temporaire,$dossier_upload); 

    $dn->insert_into("cadeau",$value,"nomCadeau,point,idCategorie,image");
    $info="<span class='fa fa-check'></span>&nbsp;Ajout produit effectue avec succes";
    include "produit.php";
    exit(0);
?>