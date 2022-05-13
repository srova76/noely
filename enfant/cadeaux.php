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
    <title>Dadabe Noely - ajouter souhait</title>
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
                    <li class="active"><a href="cadeaux.php"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
                    <li>
                        <a href="souhait.php">
                            <span class="fa fa-gift"></span>&nbsp;Mes souhaits&nbsp;
                            <!-- hovaina -->
                            <span class="badge"><?php echo $nbsouhait;?></span>
                        </a>
                    </li>
                    <li><a href="souhaitautre.php"><span class="fa fa-group"></span>&nbsp;Souhaits des autres</a></li>
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
    <div class="container text-center row">
        <form class="form-horizontal" method="POST" action="cadeaux.php">
            Catégorie:&nbsp;
            <select name="categorie">
                <option value="0">Tout</option>
                <?php
                    foreach($dn->select("*","categorie") as $cat => $c){
                        if($_POST["categorie"]==$c[1]){
                            echo("<option value='$c[1]' selected>".$c[1]."</option>");
                        }
                        else{
                            echo("<option value='$c[1]'>".$c[1]."</option>");
                        }
                    }
                ?>   
            </select>
            &nbsp;Lister par:&nbsp;
            <select name="condition">
                <?php
                    $condition=array("Nom","Point ascendant","Point descendant");
                    foreach ($condition as $key => $value) {
                        if($_POST["condition"]==$value){
                            echo("<option value='$value' selected>$value</option>");
                        }
                        else{
                            echo("<option value='$value'>$value</option>");
                        }
                    }
                ?>         
            </select>
            <input type="text" name="inputRecherche" placeholder="Ex:PS5,..." <?php if(isset($_POST["inputRecherche"])){echo "value=".$_POST["inputRecherche"];}?>> 
            <button name="recherche" type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form> 
    </div>
    <br>
    <div class='container'>
    <?php
    $select="*";
    $from="cadeau c";
    $critere="c.idCadeau NOT IN (SELECT idCadeau FROM souhait WHERE idEnfant='$enfant') ";
    if (isset($_POST["recherche"])) {
        switch ($_POST["condition"]) {
            case "Nom":
                $critere.=" AND c.nomCadeau LIKE '%".$_POST['inputRecherche']."%'";
                $order="nomCadeau ASC";
                break;
            case "Point ascendant":
                $order="point ASC";
                break;
            case "Point descendant":
                $order="point DESC";
                break;
            default:
                $critere=null;
                break;
        }
        if ($_POST["categorie"]!="0"){
            $select="c.idCadeau,c.nomCadeau,c.point,c.idCategorie,c.image,k.nomCategorie";
            $from="cadeau c, categorie k";
            $c=" AND c.idCategorie=k.idCategorie AND k.nomCategorie='".$_POST['categorie']."'";
            // $critere=(isset($critere))? $c." AND ".$critere:$c;
            $critere.=$c;

        }
    }
    if(!isset($order)){
        $order = null;
    }
    $cadeaux=$dn->select($select,$from,$critere,$order);

    foreach ($cadeaux as $c => $cadeau) {
    echo("
        <section class='cadeau container thumbnail col-lg-6 col-md-6 col-sm-6'>
            <div class='col-md-4 col-sm-4 col-xs-4'>              
                <img src='../images/cadeau/".$cadeau["image"].".jpg' class='img-thumbnail img-circle' alt=''>
            </div>
            <div class='col-md-8 col-sm-8 col-xs-8'> 
                <legend>".$cadeau["nomCadeau"]."&nbsp;<span class='badge'>".$cadeau["point"]."</span></legend>
                <a href='#cadeau".$cadeau["idCadeau"]."' title='Ajouter aux souhaits' data-toggle='collapse' class='annuler'><i class='fa fa-plus'></i><i class='fa fa-gift fa-2x'></i></a>        
                <div id='cadeau".$cadeau["idCadeau"]."' class='collapse'>
                    Ajouter aux souhaits?
                    <a href='ajoutsouhait.php?cadeau=".$cadeau["idCadeau"]."' title='Valider' class='ajouter'><i class='fa fa-check'></i></a>
                    <a href='#cadeau".$cadeau["idCadeau"]."' title='Annuler' class='annuler' data-toggle='collapse'><i class='fa fa-close'></i></a>  
                </div>
            </div>
        </section>");
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