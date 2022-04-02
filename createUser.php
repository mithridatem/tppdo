<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <?php
        //import du menu
        include './menu.php';
    ?>
    <h3>Ajouter un compte utilisateur</h3>
    <form action="" method="post">
        <p>saisir son Pseudo:</p>
        <input type="text" name="pseudo_users">
        <p>saisir son mail:</p>
        <input type="mail" name="mail_users">
        <p>saisir son mot de passe:</p>
        <input type="password" name="password_users">
        <p><input type="submit" value="Ajouter"></p>
    </form>
    <?php
        //import des ressources BDD
        include 'pdo.php';
        include 'requetes.php';
        //test si les champs du formulaire existes et sont remplis
        if(isset($_POST['pseudo_users']) AND isset($_POST['mail_users']) AND
        isset($_POST['password_users']) AND $_POST['pseudo_users'] !='' AND
        $_POST['mail_users'] !='' AND $_POST['password_users'] !=''){
            //récupération des champs du formulaire dans des variables
            $pseudo = $_POST['pseudo_users'];
            $mail = $_POST['mail_users'];
            $mdp = $_POST['password_users'];
            //appel de la méthode qui ajoute un utilisateur
            addPseudo($bdd, $pseudo, $mail, $mdp);
            echo '<p>'.$pseudo.' a été ajouté en bdd</p>';
        }
        else{
            echo '<p>Veuillez remplir les champs du formulaire</p>';
        }
    ?>
</body>
</html>