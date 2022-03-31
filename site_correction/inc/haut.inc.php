
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6a771afa96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= RACINE_SITE.'inc/css/style.css'?>">
    <title>Site</title>
</head>
<body>
    <header>
        <div class="conteneur">
            <nav>
                <?php if(isConnectedAsAdmin()){ ?>
                    <ul>
                        <li><a href='<?= RACINE_SITE . 'admin/gestion_boutique.php'?>'>Gestion boutique</a></li>
                        <li><a href='<?= RACINE_SITE . 'admin/gestion_commande.php'?>'>Gestion commande</a></li>
                        <li><a href='<?= RACINE_SITE . 'admin/gestion_membre.php'?>'>Gestion membre</a></li>
                        <li><a href='<?= RACINE_SITE . 'profil.php'?>'>Profil</a></li>
                        <li><a href='<?= RACINE_SITE . 'deconnexion.php'?>'>Disconnect</a></li>
                        <li><a href="<?= RACINE_SITE . 'boutique.php'?>">Boutique</a></li>
            <li><a href="<?= RACINE_SITE . 'panier.php'?>">Voir votre panier</a></li>
                    </ul>
                <?php }elseif(isConnected()){ ?>
                    <ul>
                        <li><a href='<?= RACINE_SITE . 'profil.php'?>'>Profil</a></li>
                        <li><a href='<?= RACINE_SITE . 'deconnexion.php'?>'>Disconnect</a></li>
                        <li><a href="<?= RACINE_SITE . 'boutique.php'?>">Boutique</a></li>
                        <li><a href="<?= RACINE_SITE . 'panier.php'?>">Voir votre panier</a></li>
                    </ul>    
                <?php }else{ ?>
                    <ul>
                        <li><a href="<?= RACINE_SITE . 'inscription.php'?>">Inscription</a></li>
                        <li><a href="<?= RACINE_SITE . 'connexion.php'?>">Connexion</a></li>
                        <li><a href="<?= RACINE_SITE . 'boutique.php'?>">Boutique</a></li>
                        <li><a href="<?= RACINE_SITE . 'panier.php'?>">Voir votre panier</a></li>
                    </ul>
                <?php } ?>    
            </nav>

        </div>
    
</header>

<div class="conteneur">


