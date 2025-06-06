<?php
    session_start();
    $lienFichierBDD = "database/configdatabase.php";
    include "classes/Membre.php";

    $membre = new Membre();
    
    if(isset($_POST["save"])){
        $idClientModifier = $_POST["idClientModifier"] ;
       
        if(isset($_POST["nomClient"])){
            $nouveauNomClient = $_POST["nomClient"] ;
            $membre ->modifierNomClient($lienFichierBDD,$idClientModifier,$nouveauNomClient);
           

        }

        if(isset($_POST["prenomClient"])){
            
        }

        if(isset($_POST["villeClient"])){
            
        }

        if(isset($_POST["quartierClient"])){
            
        }

        if(isset($_POST["telephoneClient"])){
            
        }

        if(isset($_POST["commentaireClient"])){
            
        }
        

    }