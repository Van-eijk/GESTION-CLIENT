<?php
    session_start();
    include "database/configdatabase.php";

    if(isset($_GET["idclientsupprimer"])){
        $idClient = $_GET["idclientsupprimer"];
        
        $reqSupprimerClient = $connexionDataBase->prepare('DELETE FROM clientt WHERE idclient = :idclientsupp');
        $reqSupprimerClient->execute(array('idclientsupp'=> $idClient));
        header('location:accueil.php');

            
    }
    else{
        echo'Erreur sur lidentifiant du client';
    }
   