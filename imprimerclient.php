<?php
session_start();
include "database/configdatabase.php";

require 'vendor/autoload.php';

$userOnline = $_SESSION["pseudo"] ;

// Déplacer la définition de la classe AVANT toute instanciation
class MYPDF extends TCPDF {
    // En-tête
    public function Header() {
        // Logo
        $image_file = __DIR__.'/img/gestionclient.png';
        if (file_exists($image_file)) {
            $this->Image($image_file, 15, 14, 55, 10, 'PNG');
        }
        $userOnline = $_SESSION["pseudo"] ;
        
        // Titre
        $this->SetFont('helvetica', 'B', 14);
        $this->Cell(0, 18, $userOnline, 'B', 1, 'R');
        $this->Ln(5);
    }

    // Pied de page
    public function Footer() {
        // Position à 15 mm du bas
        $this->SetY(-15);
        // Police
        $this->SetFont('helvetica', 'I', 10);
        
        date_default_timezone_set('Africa/Douala');
        $today = date('d/m/Y H:i');
        
        $this->Cell(0, 10, 'Document généré le ' . $today, 0, 0, 'L');
        // Numéro de page
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, 0, 'C');
    }
}

if(isset($_SESSION["idmembre"]) && isset($_SESSION["pseudo"])){ 
    if(isset($_GET["idclientimprimer"])){
        $idClient = $_GET["idclientimprimer"]; 

        // Récupération des informations
        $reqAfficheDetailClient = $connexionDataBase->prepare('SELECT * FROM clientt WHERE idclient = :idcliente');
        $reqAfficheDetailClient->execute(array('idcliente'=> $idClient));
        $resultatAfficheClientDetail = $reqAfficheDetailClient->fetch();

        $nomClient = $resultatAfficheClientDetail['nomclient'];
        $prenomClient = $resultatAfficheClientDetail['prenomclient'];
        $telephoneClient = $resultatAfficheClientDetail['telephoneclient'];
        $commentaireClient = $resultatAfficheClientDetail['commentaireclient'];
        $villeClient = $resultatAfficheClientDetail['villeclient'];
        $quartierClient = $resultatAfficheClientDetail['quartierclient'];

        // Création du dossier documents
        $dir = __DIR__ . "/documents/";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        // Utilisation UNIQUE de votre classe personnalisée
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Configuration du document
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Moi');
        $pdf->SetTitle('PDF avec en-tête et pied de page');
        
        // CONFIGURATION ESSENTIELLE : Définir les marges
        $pdf->SetMargins(15, 30, 15); // gauche, haut, droite
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        
        // Ajouter une page
        $pdf->AddPage();

        // SUPPRIMER ces lignes qui désactivent l'en-tête/pied :
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        
        // Contenu du document
        $titre = "INFORMATIONS DU CLIENT $idClient";
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

        
        $pdfFile = $dir . $nomClient .'_'.$telephoneClient. '.pdf';
        $pdf->Output($pdfFile, 'D');
        
        // header('location:accueil.php'); // Attention: impossible après Output()
    }
    else{
        echo'erreur identifiant client';
    }
}
else{
    echo 'Connectez-vous. Si vous navez pas de compte, creez en 1';
}
?>