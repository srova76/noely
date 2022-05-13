<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <title>Dadabe Noely - Inscription</title>
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
                <a class="navbar-brand" href="index.php"><img src="../images/dadabenoely.png" height="120%"></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="fa fa-home"></span>&nbsp;acceuil</a></li>
                    <li class="active"><a href="inscription.php"><span class="fa fa-user-plus"></span>&nbsp;Inscription</a></li>
                    <li><a href="connexion.php"><span class="fa fa-sign-in"></span>&nbsp;Connexion</a></li>
                    <li><a href="../admin/"><span class="fa fa-gears"></span>&nbsp;Admin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="container">
        <div id="dadabe" class="col-lg-6 col-md-6 col-sm-6 col-xs-11 text-center">                
            <img src="../images/cadeau1.png" class="img-responsive animated zoomIn slow" alt="">
        </div>
        <div class="col-md-6 col-sm-6">
            <form class="form-signin" method="POST" action="testinscription.php">
                <legend>Formulaire d'inscription</legend>
                <div class="form-group">
                    <label for="inputannee">Année de naissance : </label>
                    <input name="inputannee" id="inputannee" type="number" class="form-control" placeholder="Année de naissance" required>
                </div>
                <div class="form-group">
                    <label for="inputcontact">Contact : </label>
                    <input name="inputcontact" id="inputcontact" type="text" class="form-control" placeholder="Contact" required>
                </div>
                <div class="form-group">
                    <label for="inputmail">Adresse e-mail : </label>
                    <input name="inputmail" id="inputmail" type="mail" class="form-control" placeholder="Adresse e-mail" required>
                </div>
                <div class="form-group">
                    <label for="inputmdp">Mot de passe :</label>
                    <input name="inputmdp" id="inputmdp" type="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="inputmdp1">Confirmation mot de passe :</label>
                    <input name="inputmdp1" id="inputmdp1" type="password" class="form-control" placeholder="Confirmation mot de passe" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Valider</button>
            </form>
            <?php
                if(isset($err)){
                    echo ("<div class='jumbotron'><span class='fa fa-warning'></span>".$err."</div>");
                }
            ?>
        </div>
    </section>

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
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>  
</body>
</html>