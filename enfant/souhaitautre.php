<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}     if (!isset($_SESSION["enfant"])) {
        header("Location: index.php");
        exit(0);
    }
    $enfant=$_SESSION["enfant"];
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
    $nbsouhait=$dn->nombreSouhait($enfant);
    $cadeaux=$dn->listeSouhait($enfant);
    $point=$dn->pointEnfant($enfant)-$dn->pointUtilise($enfant);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="icon" href="../images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <title>Dadabe Noely - Souhait des autres</title>
    <style type="text/css">
    </style>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top"role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="cadeaux.php"><img src="../images/dadabenoely.png" height="120%"></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="cadeaux.php"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
                    <li>
                        <a href="souhait.php">
                            <span class="fa fa-gift"></span>&nbsp;Mes souhaits&nbsp;
                            <!-- hovaina -->
                            <span class="badge"><?php echo $nbsouhait;?></span>
                        </a>
                    </li>
                    <li class="active"><a href="souhaitautre.php"><span class="fa fa-group"></span>&nbsp;Souhaits des autres</a></li>
                    <li>
                        <a href="#deconnecter" data-toggle="modal"><span class="fa fa-sign-out"></span>&nbsp;Déconnexion</a>
                    </li>                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        points restants: <span class="badge"><?php echo $point;?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
       
    <div class="container">
        <?php 
            $listeautre=$dn->select("emailEnfant","enfant","idEnfant in (SELECT idEnfant FROM souhait) AND idEnfant<>$enfant ORDER BY emailEnfant ASC") ;
            $listesouhait=$dn->souhaitAutre();
            foreach ($listeautre as $a => $autre) {
                echo ("
                    <section class='container thumbnail'>
                        <legend>".$autre[0]."</legend>
                        <p><b>Souhaits:</b>&nbsp;|");
                foreach ($listesouhait as $sa => $s) {
                        if($autre["emailEnfant"]==$s["emailEnfant"]){
                            echo ("&nbsp;".$s["nomCadeau"]."&nbsp;<span class='badge'>".$s["quantite"]."</span>&nbsp;|");
                    }                    
                }
                echo ("</p></section>");
            }
        ?>

    </div>

    <footer class="container-fluid">
        <div class="col-md-12"> 
            <div class="social">
                <legend>Retrouvez-nous sur:</legend>
                <a href="https://www.facebook.com/dadabenoely" title="Facebook"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/dadabenoely" title="Instagram"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
                <a href="https://www.twitter.com/dadabenoely" title="Twitter"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
            </div>
        </div>
        <div id="copyright" class="col-md-12 container-fluid">
            <p class="text-center">
                <a href="#">Dadabe Noely</a>&nbsp;&copy;&nbsp;2020.<br>
            </p>
        </div>
    </footer>
    <div class="modal" id="deconnecter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">Deconnexion</h4>
                </div>
                <div class="modal-body">
                    Veux-tu vraiment te déconnecter?
                </div>
                <div class="modal-footer">
                    <a href="deconnexion.php"><button class="btn btn-success" id="valider">Déconnecter</button></a>
                    <button class="btn btn-danger" data-dismiss="modal" id="annuler">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>  
</body>
</html>