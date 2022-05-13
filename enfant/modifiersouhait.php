<?php
    session_start();
    if (!isset($_SESSION["enfant"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $enfant=$_SESSION["enfant"];
    if(isset($_POST["cadeau"])){
        $cadeau=$_POST["cadeau"];
    }else{
        $cadeau = null;
    }

    if(isset($_POST["qte$cadeau"])){
        $qte=$_POST["qte$cadeau"];
    }else{
        $qte = null;
    }

    $pointapresmodification=$dn->pointEnfant($enfant)-$dn->pointUtilise($enfant)-$dn->avantMajSouhait($enfant,$cadeau,$qte);
    if(isset($_POST["modifier"])){
        if($pointapresmodification>=0){
            $dn->update("souhait","quantite=$qte","idCadeau='$cadeau' AND idEnfant='$enfant'");
            $info="<span class='fa fa-check'></span>&nbsp;Modification effectuée avec succès"; 
        }
        else{
            $info="<span class='fa fa-warning'></span>&nbsp;Modification impossible: points insuffisants"; 
        }
   
    }
    if(isset($_POST["supprimer"])){
        $dn->delete_from("souhait","idCadeau='$cadeau' AND idEnfant='$enfant'");
        $info="<span class='fa fa-check'></span>&nbsp;Suppression effectuée avec succès";    
    }
    if(isset($_POST["valider"])){
        $dn->update("souhait","estValide=true","idEnfant='$enfant'");
        $info="<span class='fa fa-check'></span>&nbsp;Validation des souhaits effectuée avec succès";    
    }
    include "souhait.php";
    exit(0);
?>