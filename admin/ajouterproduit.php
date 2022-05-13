<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: index.php");
        exit(0);
    }
    $admin=$_SESSION["admin"];
    include_once "../DadabeNoely.php";
    $dn=new DadabeNoely();
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
    <title>Admin - Ajout produit</title>
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
                <a class="navbar-brand" href="acceuil.php"><img src="../images/dadabenoely.png" height="120%"></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="acceuil.php"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
                    <li class="active"><a href="categorie.php"><span class="fa fa-sort"></span>&nbsp;Catégories</a></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#">
                            <span class="fa fa-gift"></span>&nbsp;Produits <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="produit.php"><i class='fa fa-table'></i>&nbsp;Liste</a></li>
                        <li><a href="ajouterproduit.php"><i class='fa fa-plus'></i>&nbsp;Ajouter</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#">
                            <span class="fa fa-bar-chart"></span>&nbsp;Statistique <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="stattop5.php"><i class='fa fa-star'></i>&nbsp;Top 5 cadeaux</a></li>
                        <li><a href="statpoint.php"><i class='fa fa-sort-amount-asc'></i>&nbsp;Points</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#deconnecter" data-toggle="modal"><span class="fa fa-sign-out"></span>&nbsp;Déconnexion</a>
                    </li>                    
                </ul>
            </div>
            
        </div>
    </div>
        <?php
            if(isset($info)){
        ?>
        <div class="container">
            <div class="jumbotron">
                <?php
                    echo $info;
                    unset($info);
                ?>
            </div>
        </div>
        <?php
            }
        ?>
    <div class='container'>
        <form class="form-signin" enctype="multipart/form-data" method="POST" action="ajoutproduit.php">
            <legend>Formulaire modification Produit</legend>
            <div class="form-group">
                <label for="inputnom">Nom: </label>
                <input name="inputnom" id="inputnom" type="text" class="form-control" placeholder="Nom" required>
                <label for="inputpoint">Point: </label>
                <input name="inputpoint" id="inputpoint" type="number" min='0' class="form-control" placeholder="Point" required>
                <label for="categorie">Catégorie: </label>
                <select name="categorie" class="form-control">
                    <?php
                        foreach($dn->select("*","categorie") as $cat => $c){
                            if($produit["idCategorie"]==$c[0]){
                                echo("<option value='$c[0]' selected>".$c[1]."</option>");
                            }
                            else{
                                echo("<option value='$c[0]'>".$c[1]."</option>");
                            }
                        }
                    ?>   
                </select>
                <label for="fichier">Image: </label><br>
                <input name="fichier" id="fichier" type="file">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Valider les modifications</button>
        </form>
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