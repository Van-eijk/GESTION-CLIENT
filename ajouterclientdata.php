<?php
    session_start();
    include "classes/Membre.php";

    $membre = new Membre();
    
    if(isset($_POST["enregistrerClient"])){

        $idclientmembre = $_SESSION["idmembre"];
        $prenomClientDefaut = "Sans prenom";
        $quartierClientDefaut = "Quartier inconnu";
        $commentaireClientDefaut = "Sans commentaire";
        $commentaireClient = "";
        $dossierSauv = "img/";
        $cheminPhotoDefaut = "img/defaultuser.jpg";
        $cheminPhotoClient = "";
        $lienFichierBDD = "database/configdatabase.php";
        $nomClient="";
        $prenomClient = "";
        $villeClient = "";
        $quartierClient = "";
        $telephoneClient = "";
        $fichierPhotoClient="";
        $resultatAjouterClient = "";
        $erreurAjoutClient = "" ;
        
        if(!empty($_POST["nomClient"])){

            if(empty($_POST["prenomClient"])){
                $_POST["prenomClient"] = $prenomClientDefaut;
               
            }

            if(empty($_POST["quartierClient"])){

                $_POST["quartierClient"] = $quartierClientDefaut ;
                    
            }

            $prenomClient = $_POST["prenomClient"];

            $nomClient = $_POST["nomClient"];

            

            $quartierClient = $_POST["quartierClient"];



            if(!empty($_POST["villeClient"])){


                

                $villeClient = $_POST["villeClient"];

                if(!empty($_POST["telephoneClient"])){

                    $telephoneClient = $_POST["telephoneClient"];

                    if(empty($_POST["commentaireClient"])){
                        $_POST["commentaireClient"] = $commentaireClientDefaut;
                        
                    }

                    $commentaireClient = $_POST["commentaireClient"] ;
                   
                    

                    if(isset($_FILES["photoClient"])){
                        //echo "bonjour";

                        $fichierPhotoClient = $_FILES["photoClient"] ;

                        if($_FILES['photoClient']['error'] == 0 AND $_FILES['photoClient']['size'] <= 1000000){

                            $resultatAjouterClient = $membre->ajouterClient($lienFichierBDD,$cheminPhotoDefaut,$dossierSauv,$idclientmembre,$nomClient,$prenomClient,$villeClient,$quartierClient,$telephoneClient,$commentaireClient,$fichierPhotoClient);

                            if($resultatAjouterClient == false){
                                $erreurAjoutClient = "Erreur lors de l'enregistrement d'un client : l'extension de la photo n'est pas correct";

                            }
                            else{
                                header("location:ajouterclient.php");
                            }
                            
                        }
                        

                        
                        
                    }
                    else{
                        //echo "hello";

                        $resultatAjouterClient = $membre->ajouterClient($lienFichierBDD,$cheminPhotoDefaut,$dossierSauv,$idclientmembre,$nomClient,$prenomClient,$villeClient,$quartierClient,$telephoneClient,$commentaireClient);

                        if($resultatAjouterClient == false){
                            $erreurAjoutClient = "Erreur lors de l'enregistrement d'un client : l'extension de la photo n'est pas correct";

                        }
                        else{
                            header("location:ajouterclient.php");
                        }
                        
                    }
                        
                }
            }
        }
    }

?>