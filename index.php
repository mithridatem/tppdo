<?php
    //import des ressources BDD
    include 'pdo.php';
    include 'requetes.php';
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Document</title>
</head>
<body>
    <?php
        //import du menu
        include './menu.php';
    ?>
    <h3>Liste des pseudos :</h3>
    <?php
        //stockage dans liste des pseudos (liste d'objets)
        $liste = showAllPseudo($bdd);
        //parcours de la liste d'objets (affiche le pseudo)
        foreach($liste as $key){
            //affiche tous les pseudos
            echo '<p>Pseudo : '.$key->pseudo_users.'</p>';
        }
    ?>
    <h3>Afficher les informations à partir du pseudo :</h3>
    <form action="" method="post">
        <p>Saisir un pseudo :</p>
        <input type="text" name="pseudo_users">
        <p><input type="submit" value="Afficher"></p>
    </form>
    <!--gestion des erreurs-->
    <?php
        if(isset($_GET['deconnected'])){
            echo '<p class="error">L\'utilisateur à été déconnecté</p>';
        }
        if(isset($_GET['error'])){
            echo '<p class="error">Les informations de connexion sont incorrectes</p>';
        }
        
    ?>
    <!-- Afficher les informations depuis le pseudo --->
    <?php
        //test récupération du pseudo :
        if(isset($_POST['pseudo_users']) AND $_POST['pseudo_users'] !=''){
            $pseudo = $_POST['pseudo_users'];
            $pseudo = showInfoPseudo($bdd, $pseudo);
            //test si le le pseudo existe 
            if(!empty($pseudo)){
                foreach($pseudo as $key){
                //affichage les informations depuis le pseudo(depuis objet)
                echo '<p>Pseudo : '.$key->pseudo_users.', mail : '.$key->mail_users.'</p>';
                }
            }
            //test si le pseudo n'existe pas 
            else{   
                echo '<p>Le pseudo n\'existe pas</p>';
            }
        }
    ?>
</body>
</html>