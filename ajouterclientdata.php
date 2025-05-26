<?php
    session_start();
    include "classes/Membre.php";

    $membre = new Membre();
    
    if(isset($_POST["enregistrerClient"])){

        $idclientmembre = $_SESSION["idmembre"];
        $prenomClientDefaut = "Sans prenom";
        $quartierClientDefaut = "Quartier inconnu";
        $commentaireClientDefaut = "Sans commentaire";
        $dossierSauv = "img/";
        $cheminPhotoDefaut = "img/defaultuser.jpg";
        $cheminPhotoClient = "";
        $lienFichierBDD = "database/configdatabase.php";
        $nomClient="";
        $prenomClient = "";
        $villeClient = "";
        $quartierClient = "";
        $telephoneClient = "";
        
        if(!empty($_POST["nomClient"])){
            if(empty($_POST["prenomClient"])){
                $_POST["prenomClient"] = $prenomClientDefaut;
            }

            $nomClient = $_POST["nomClient"];


            if(!empty($_POST["villeClient"])){
                if(empty($_POST["quartierClient"])){
                    $_POST["quartierClient"] = $quartierClientDefaut ;
                }

                if(!empty($_POST["telephoneClient"])){
                    if(empty($_POST["commentaireClient"])){
                        $_POST["commentaireClient"] = $commentaireClientDefaut;

                    }
                    if(!empty($_FILES["photoClient"])){
                        if($_FILES['photoClient']['error'] == 0 AND $_FILES['photoClient']['size'] <= 1000000){

                            $cheminPhotoClient = $membre->importerPhotoClient($_FILES["photoClient"],$dossierSauv,$_POST["telephoneClient"],$_POST["nomClient"]);
                            //$membre->ajouterClient($lienFichierBDD, $idclientmembre,);
                        }
                        
                    }else{
                        
                    }
                }
            }
        }
    }