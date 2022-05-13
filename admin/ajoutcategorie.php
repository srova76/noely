<?php
    session_start();
    // if (!isset($_SESSION["admin"])) {
    //     header("Location: index.php");
    //     exit(0);
    // }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $cat=$_POST["inputnom"];
    $values[0]=$cat;
    $t=$dn->select("*","categorie","nomCategorie='$cat'");
    if(is_null($t[0])){
        $insert=$dn->insert_into("categorie",$values,"nomCategorie");
        if($insert)
        {
            $info="<span class='fa fa-check'></span>&nbsp;Jouet ajouté aux souhaits";
        }
        else{
            $info="<span class='fa fa-warning'></span>&nbsp;Erreur lors de l'insertion";
        }
    }
    else{
        $info="<span class='fa fa-warning'></span>&nbsp;La catégorie que vous avez ajouté existe déjà.<br> Veuillez utiliser un autre nom.";
    }
    
    include "categorie.php";
    exit(0);
?>