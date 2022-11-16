<?php
    // echo "TEST AFFICHAGE1";
    include('utilisateur.class.php');

    $user = new Utilisateur("pierre", "motdepasse");

    $text = $user->getUserName();
    // echo "TEST AFFICHAGE";
    echo "<p>Hi $text</p>";

