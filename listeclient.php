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
            $this->Image($image_file, 10, 14, 55, 10, 'PNG');
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

        $idMembre = $_SESSION["idmembre"] ;
   

        // Récupération des informations
         $reqAfficheClient = $connexionDataBase ->prepare('SELECT * FROM clientt WHERE idclientmembre = :userConnected ORDER BY nomclient');
        $reqAfficheClient ->execute(array(
            'userConnected' => $idMembre 
        ));

        if($reqAfficheClient -> rowCount() >= 1){


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
            $pdf->SetMargins(10, 30, 10); // gauche, haut, droite
            $pdf->SetHeaderMargin(10);
            $pdf->SetFooterMargin(10);
            
            // Ajouter une page
            $pdf->AddPage();

           
            
            // Contenu du document
            $titre = "REPERTOIRE DES CLIENTS";
            $pdf->SetFont('dejavusans','B', 13);
            $pdf->Cell(0, 10, $titre, 1, 1, 'C');

            $pdf->Cell(0, 10, ' ', 0, 1, 'C');

            //$largeurcellule = 30 ;

            // Table Header


            $html = '<table border="1" cellpadding="4" style=" border:5px solid blue; width:100%;">
                <tr style="background-color:#d9edf7; font-weight:bold; text-align:center;">
                
                <th width="30" style="text-align:center;">ID</th>

                <th width="85" >NOM</th>
                <th width="80">PRENOM</th>
                <th width="85">TELEPHONE</th>
                <th width="70">VILLE</th>
                <th width="80">QUARTIER</th>
                <th width="108">COMMENTAIRE</th>
                </tr>';

            $pdf->SetFont('dejavusans','', 11);


            while($resultatReqAfficheClient = $reqAfficheClient->fetch()){
                // Table Rows

                $html .= '<tr>
                            <td style="text-align:center;">'.htmlspecialchars($resultatReqAfficheClient['idclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['nomclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['prenomclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['telephoneclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['villeclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['quartierclient']).'</td>
                            <td>'.htmlspecialchars($resultatReqAfficheClient['commentaireclient']).'</td>

                        </tr>';


            }

            $html .= '</table>';

            // ⚡ Insertion du tableau dans le PDF
            $pdf->writeHTML($html, true, false, true, false, '');

           

            $pdfFile = $dir . 'LISTESCLIENTS'. '.pdf';
            $pdf->Output($pdfFile, 'D');

        }
        else{

            

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
            $pdf->SetMargins(15, 25, 15); // gauche, haut, droite
            $pdf->SetHeaderMargin(10);
            $pdf->SetFooterMargin(10);
            
            // Ajouter une page
            $pdf->AddPage();

           
            // Contenu du document
            $titre = "INFORMATIONS DES CLIENTS";
            $pdf->SetFont('dejavusans','B', 16);
            $pdf->Cell(0, 10, $titre, 1, 1, 'C');
            $pdf->Cell(0, 10, ' ', 0, 1, 'C');

            Cell(0, 10, '0 client', 0, 1, 'L');

            $pdfFile = $dir . 'LISTESCLIENTS'. '.pdf';
            $pdf->Output($pdfFile, 'D');

            }
            
        
            
            
            
        
        // header('location:accueil.php'); // Attention: impossible après Output()
}
else{
    echo 'Connectez-vous. Si vous navez pas de compte, creez en 1';
}
?>