<?php
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $aleatoire=array(100,200,350,500);
    $value[0]=$_POST["inputmail"];
    $value[1]=md5($_POST["inputmdp"]);
    $value[2]=$_POST["inputannee"];
    $value[3]=$_POST["inputcontact"];
    $value[4]=$aleatoire[array_rand($aleatoire)];
    $id=$dn->idSuivant("enfant","idEnfant");
    if (($_POST["inputmdp"]==$_POST["inputmdp1"])) {
        if(date("Y")-$_POST["inputannee"]<=18){
            $v=$dn->insert_into("enfant",$value,"emailEnfant,mdpEnfant,anneeNaissance,contact,bonPoints");
            session_start();
            $_SESSION["enfant"]=$id;
            header("Location: cadeaux.php");
        }
        else{
            $err=" Tu es trop agé pour souhaiter un cadeau au Père Noël"; 
        }
    }
    else {
        $err=" Les mots de passe ne se ressembe pas";
    }

    
    include_once "inscription.php";
    exit(0);
?>