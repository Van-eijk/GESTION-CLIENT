<?php
    include 'classes/Membre.php';
    session_start();
    $lien = "location:index.php";

    $deconMembre = new Membre();

    $deconMembre->deconnexionMembre($lien);
?>