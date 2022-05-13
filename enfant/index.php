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
    <title>Dadabe Noely - acceuil</title>
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
                    <li class="active"><a href="#"><span class="fa fa-home"></span>&nbsp;acceuil</a></li>
                    <li><a href="inscription.php"><span class="fa fa-user-plus"></span>&nbsp;Inscription</a></li>
                    <li><a href="connexion.php"><span class="fa fa-sign-in"></span>&nbsp;Connexion</a></li>
                    <li><a href="../admin/"><span class="fa fa-gears"></span>&nbsp;Admin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="container">
        <div id="dadabe" class="col-lg-6 col-md-6 col-sm-6 col-xs-11 text-center">                
            <img src="../images/dadabe.png" class="img-responsive animated bounceInLeft slower" alt="Bienvenue">
        </div>
        <div class="col-md-6 col-sm-6">
            <h2>Bienvenue</h2>
            <p class="text-justify">
                Tu a moins de 18 ans? Tu veux recevoir un cadeau ce Noël? ... <br> Inscris-toi gratuitement et demandes des cadeaux au père noël en cliquant ci-dessous.
            </p>
            <p><a href="inscription.php"><input type="button" value="S'inscrire &raquo;"></a></p>
            <p class="text-justify">
                Ou bien, si tu as déjà un compte, connecte-toi maintenant.
            </p>
            <p><a href="connexion.php"><input type="button" value="Se connecter &raquo;"></a></p>
            
        </div>
    </section>

    <footer class="container-fluid">
        <div class="col-md-12"> 
            <div class="social">
                <legend>Retrouvez-nous sur:</legend>
                <a href="http://www.facebook.com/dadabenoely" title="Facebook"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a>
                <a href="http://www.instagram.com/dadabenoely" title="Instagram"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
                <a href="http://www.twitter.com/dadabenoely" title="Twitter"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
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