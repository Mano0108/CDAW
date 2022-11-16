<?php
    // echo "TEST AFFICHAGE1";
    include('utilisateur.class.php');

    $user = new Utilisateur("pierre", "motdepasse");

    $text = $user->getUserName();
    // echo "TEST AFFICHAGE";
    for($i=0;$i<6;$i++){
        echo "<p>Hi $text</p>";
    }