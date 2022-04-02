<?php
    session_start();
    //déconnexion
    session_destroy();
    //redirection
    header('Location: index.php?deconnected');
?>