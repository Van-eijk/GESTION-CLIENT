<?php
    session_start();
    include "database/configdatabase.php";

    require 'vendor/autoload.php'; // charge TCPDF

//use TCPDF;

    if(isset($_SESSION["idmembre"]) && isset($_SESSION["pseudo"])){ 
        if(isset($_GET["idclientimprimer"])){
            $idClient = $_GET["idclientimprimer"]; 

            // Recuperation des informations depuis la base de données

             $reqAfficheDetailClient = $connexionDataBase ->prepare('SELECT * FROM clientt WHERE idclient = :idcliente');
            $reqAfficheDetailClient ->execute(array(
                'idcliente'=> $idClient
            ));
            $resultatAfficheClientDetail = $reqAfficheDetailClient ->fetch();

            $nomClient = $resultatAfficheClientDetail['nomclient'] ;
            $prenomClient = $resultatAfficheClientDetail['prenomclient'] ;
            $telephoneClient = $resultatAfficheClientDetail['telephoneclient'] ;
            $commentaireClient = $resultatAfficheClientDetail['commentaireclient'] ;
            $villeClient = $resultatAfficheClientDetail['villeclient'] ;
            $quartierClient = $resultatAfficheClientDetail['quartierclient'] ;

            // Generation du fichier PDF

            // Création du dossier documents s'il n'existe pas
            $dir = __DIR__ . "/documents/";
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $pdf = new TCPDF();

            // Désactiver header et footer automatiques
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();
            $titre = "INFORMATIONS DU CLIENT $idClient";

            // Titre
            $pdf->SetFont('dejavusans','B', 16);
            $pdf->Cell(0, 10, $titre, 1, 1, 'C');
            $pdf->Cell(0, 10, ' ', 0, 1, 'C');

            $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Nom :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $nomClient, 'B', 1, 'L'); // Données du client            
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label

            

            $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Prenom :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $prenomClient, 'B', 1, 'L'); // Données du client            
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label



             $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Ville :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $villeClient, 'B',1 , 'L'); // Données du client            
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label



             $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Quartier :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $quartierClient, 'B',1 , 'L'); // Données du client            
            //$pdf->Cell(0, 4, ' ', 0, 1, 'L'); // petit espace en dessous du label



            $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Téléphone :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $telephoneClient, 'B',1 , 'L'); // Données du client            
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label



            $pdf->SetFont('dejavusans','', 10); // Police du label
            $pdf->Cell(0, 5, 'Commentaire :', 0, 1, 'L'); // Label
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label
            $pdf->SetFont('dejavusans','B', 13); // Police des données du client
            $pdf->Cell(0, 6, $commentaireClient, 'B',1 , 'L'); // Données du client            
            //$pdf->Cell(0, 1, ' ', 0, 1, 'L'); // petit espace en dessous du label


            $pdfFile = $dir . "test4.pdf";
            $pdf->Output($pdfFile, 'D');

            header('location:accueil.php');



        }
        else{
            echo'erreur identifiant client';
        }
    }
    else{
        echo 'Connectez-vous. Si vous navez pas de compte, creez en 1';
    }

            




