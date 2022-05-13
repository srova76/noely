<?php
    session_start();
    if (!isset($_SESSION["enfant"])) {
        header("Location: index.php");
        exit(0);
    }
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $enfant=$_SESSION["enfant"];
    $cadeau=$_GET["cadeau"];
    $values[0]=$enfant;
    $values[1]=$cadeau;
    $values[2]=1;
    $values[3]=date("Y-m-j H:i:s");
    $values[4]=false;
    $t=$dn->select("*","souhait","idEnfant='$enfant' AND idCadeau='$cadeau'");
    $pointapresinsertion=$dn->pointEnfant($enfant)-$dn->pointUtilise($enfant)-$dn->avantAjoutSouhait($enfant,$cadeau,1);
    if(is_null($t[0])){
        if($pointapresinsertion>=0)
        {
            $dn->insert_into("souhait",$values,"idEnfant,idCadeau,quantite,dateSouhait,estValide");
            $info="<span class='fa fa-check'></span>&nbsp;Jouet ajouté aux souhaits";
        }
        else{
            $info="<span class='fa fa-warning'></span>&nbsp;Insertion impossible: Point insuffisant";
        }
    }
    else{
        $info="<span class='fa fa-warning'></span>&nbsp;Jouet déjà ajouté aux souhaits";
    }
    
    include "cadeaux.php";
    exit(0);
?>