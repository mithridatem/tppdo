<?php
    //fonction affiche tous les pseudos
    function showAllPseudo($bdd){
        try{
            //requête sql
            $sql = "SELECT pseudo_users FROM users";
            $req = $bdd->prepare($sql);
            $result = $req->execute();
            //$data récupére une liste d'objet
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            //retourne une liste d'objet avec les pseudo_user en bdd (table users)
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction affiche les informations depuis le pseudo
    function showInfoPseudo($bdd, $pseudo){
        try{
            //requête sql
            $sql = "SELECT * FROM users WHERE pseudo_users = :pseudo_users";
            $req = $bdd->prepare($sql);
            $result = $req->execute(array(
                'pseudo_users' => $pseudo
                ));
            //$data récupére une liste d'objet
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            //retourne une liste d'objet avec tous les champs à 
            //partir du pseudo_user en bdd (table users)
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction ajouter un utilisateur en bdd
    function addPseudo($bdd, $pseudo, $mail, $mdp){
        try{
            //requête sql
            $sql = "INSERT INTO users(pseudo_users, mail_users, password_users)
            VALUES(:pseudo_users, :mail_users, :password_users)";
            $req = $bdd->prepare($sql);
            $result = $req->execute(array(
                'pseudo_users' => $pseudo,
                'mail_users' => $mail,
                'password_users' => $mdp
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //connexion
    function connexion($bdd,$mail, $mdp){
        try{
            //requête sql
            $sql = "SELECT * FROM users WHERE mail_users = :mail_users 
            AND password_users = :password_users" ;
            //péparation de la requête
            $req = $bdd->prepare($sql);
            //exécution de la requête
            $req->execute(array(
                'mail_users' => $mail,
                'password_users' => $mdp
                ));
            //parcours du résultat de la requête
            while($data = $req->fetch()){
                //test si on vérifie mail_users et password_users
                if($data['mail_users'] == $mail AND $data['password_users'] == $mdp){
                    //retourne vrai (true)
                    return true;
                }
                //sinon
                else{
                    //retourne faux (false)
                    return false;
                }
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
?>