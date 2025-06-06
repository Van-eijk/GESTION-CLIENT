<?php
    session_start();
    $lienFichierBDD = "database/configdatabase.php";
    include "classes/Membre.php";

    $membre = new Membre();
    
    if(isset($_POST["save"])){
        $idClientModifier = $_POST["idClientModifier"] ;
       
        if(!empty($_POST["nomClient"])){
            $nouveauNomClient = $_POST["nomClient"] ;
            $membre ->modifierNomClient($lienFichierBDD,$idClientModifier,$nouveauNomClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }

        if(!empty($_POST["prenomClient"])){
            $nouveauPrenomClient = $_POST["prenomClient"] ;
            $membre ->modifierPrenomClient($lienFichierBDD,$idClientModifier,$nouveauPrenomClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }

        if(!empty($_POST["villeClient"])){
            $nouvelleVilleClient = $_POST["villeClient"] ;
            $membre ->modifierVilleClient($lienFichierBDD,$idClientModifier,$nouvelleVilleClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }

        if(!empty($_POST["quartierClient"])){
            $nouveauQuartierClient = $_POST["quartierClient"] ;
            $membre ->modifierQuartierClient($lienFichierBDD,$idClientModifier,$nouveauQuartierClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }

        if(!empty($_POST["telephoneClient"])){
            $nouveauTelephoneClient = $_POST["telephoneClient"] ;
            $membre ->modifierTelephoneClient($lienFichierBDD,$idClientModifier,$nouveauTelephoneClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }

        if(!empty($_POST["commentaireClient"])){
            $nouveauCommentaireClient = $_POST["commentaireClient"] ;
            $membre ->modifierCommentaireClient($lienFichierBDD,$idClientModifier,$nouveauCommentaireClient);
            header("Location: detailclient.php?idclient=$idClientModifier");

        }


}