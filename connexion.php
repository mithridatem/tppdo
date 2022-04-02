<?php
    //import des ressources BDD
    include 'pdo.php';
    include 'requetes.php';
    //démarrage de la session
    session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Connexion</title>
</head>
<body>
    <?php
        //import du menu
        include './menu.php';
    ?>
    <h3>Connexion:</h3>
    <form action="" method="post">
        <p>Saisir votre mail:</p>
        <input type="mail" name="mail_users">
        <p>Saisir votre mot de passe:</p>
        <input type="password" name="password_users">
        <p><input type="submit" value="Connexion"></p>
    </form>
    <?php
        //test si les champs du formulaire existent et sont remplis
        if(isset($_POST['mail_users']) AND isset($_POST['password_users'])
        AND $_POST['mail_users'] !='' AND $_POST['password_users'] !=''){
            //création des variables post
            $mail = $_POST['mail_users'];
            $mdp = $_POST['password_users'];
            //test connexion
            if(connexion($bdd,$mail, $mdp)){
               $_SESSION['mail'] = $_POST['mail_users'];
               $_SESSION['connected'] = true;
               echo '<p>connecté</p>';
            }
            //test si l'utilisateur n'existe pas
            else{
                header('Location: index.php?error');
            }
        }
        //test si les champs du formulaire ne sont pas remplis
        else{
            echo '<p>Veuillez remplir les champs de forulaire</p>';
        }
    ?>
</body>
</html>