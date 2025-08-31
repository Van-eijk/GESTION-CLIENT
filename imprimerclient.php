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

            $nomClient = 'Nom: ' . '' . $resultatAfficheClientDetail['nomclient'] ;
            $prenomClient = 'Prenom: ' . '' . $resultatAfficheClientDetail['prenomclient'] ;
            $telephoneClient = 'Telephone: ' . '' . $resultatAfficheClientDetail['telephoneclient'] ;
            $commentaireClient = 'Commentaire: ' . '' . $resultatAfficheClientDetail['commentaireclient'] ;
            $villeClient = 'Ville: ' . '' . $resultatAfficheClientDetail['villeclient'] ;
            $quartierClient = 'Quartier: ' . '' . $resultatAfficheClientDetail['quartierclient'] ;

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
            $titre = "INFORMATION DU CLIENT $idClient";

            // Titre
            $pdf->SetFont('dejavusans','B', 16);
            $pdf->Cell(0, 10, $titre, 1, 1, 'C');
            $pdf->Cell(0, 10, ' ', 0, 1, 'C');

            $pdf->Cell(0, 10, $nomClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');

            $pdf->Cell(0, 10, $prenomClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');

            $pdf->Cell(0, 10, $villeClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');

            $pdf->Cell(0, 10, $quartierClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');

            $pdf->Cell(0, 10, $telephoneClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');

            $pdf->Cell(0, 10, $commentaireClient, 0, 1, 'L');
            $pdf->Cell(0, 10, ' ', 0, 1, 'L');


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

            




