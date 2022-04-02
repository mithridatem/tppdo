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
?>