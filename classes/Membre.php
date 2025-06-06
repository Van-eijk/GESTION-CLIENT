<?php 

    class Membre{

        // Attributs
        private $idMembre;
        private $pseudo ;
        private $email ;
        private $motDePasse ;
        private $dateInscription ;


        //Accesseurs

        public function getIdMembre(){
            return $this->idMembre;
        }
        public function setIdMembre($idMembre){
            $this->idMembre = $idMembre ;
        }
        public function getPseudo(){
            return $this->pseudo;
        }
        public function setPseudo($pseudoIn){
            $this->pseudo = $pseudoIn ;
        }

        public function getDateInscription(){
            return $this->dateInscription ;
        }
        public function setDateInscription($dateInscription){
            $this->dateInscription = $dateInscription ;
        }


        public function getEmail(){
            return $this->email;
        }
        public function setEmail($emailIn){
            $this->email = $emailIn ;
        }


        public function getMotDePasse(){
            return $this->motDePasse;
        }
        public function setMotDePasse($motDePasseIn){
            $this->motDePasse = $motDePasseIn ;
        }


        // METHODES

        public function inscriptionMembre($pseudo, $email, $motDePasse, $lienFichierBDD){
            //setPseudo($pseudo);
            include $lienFichierBDD ;
            
            $reqMembre = $connexionDataBase -> prepare('INSERT INTO membre(pseudo,email,motdepasse) VALUES (:pseudo, :email, :motdepasse)');
            $reqMembre ->execute(array(
                'pseudo' => $pseudo,
                'email' => $email,
                'motdepasse' => $motDePasse

            ));

        }

        public function connexionMembre($pseudo, $motDePasse, $lienFichierBDD, $lienPageAccueil){
            include $lienFichierBDD ;
            $motDePasse = sha1($motDePasse);

            $reqConnexionMembre = $connexionDataBase ->prepare("SELECT * FROM membre WHERE pseudo = :pseud AND motdepasse = :mdp");
            $reqConnexionMembre -> execute(array(
                "pseud" => $pseudo,
                "mdp"=> $motDePasse));

            $resultatConnexionMembre = $reqConnexionMembre -> fetch(); // On récupère les informations depuis la base de données

            if(!$resultatConnexionMembre){

                return false;

            }
            else{

                //echo "bobo" ;
                
                session_start();
                $_SESSION["idmembre"] = $resultatConnexionMembre["idmembre"];
                $_SESSION["pseudo"] = $resultatConnexionMembre["pseudo"];
                $_SESSION["email"] = $resultatConnexionMembre["email"];
                $_SESSION["dateinscription"] = $resultatConnexionMembre["dateinscription"];
                header($lienPageAccueil);



                
            }

        }

        public function deconnexionMembre($lien){
             session_start();
            $_SESSION = array();
            $_SESSION = array();
            session_destroy();
            header($lien);

        }

        public function modifierPseudo(){

        }

        public function modifierEmail(){
            
        }

        public function modifierMotDePasse(){
            
        }

        public function importerPhotoClient($fichierPhotoClient,$cheminSauvegardeImage,$telephoneClient,$nomClient){
           // $nomFichier = $cheminSauvegarde['name'];
            $dateDuJour = date("dmyhis");
            $cheminDefinitif = "";
            $nomFichier="";

            $name = $fichierPhotoClient['name'];
            $cheminTemporaire = $fichierPhotoClient['tmp_name'];

            

            $infoFichier = pathinfo($name);
            $extension_upload = $infoFichier['extension']; // On recupère l'extension de chaque fichier

            $extension_autorisees = ['jpg','jpeg','png']; // la liste des extensions autorisées

            // verification de l'extension du fichier

            if(in_array($extension_upload,$extension_autorisees )){
                $nomFichier = basename($name); // on recupère le nom d'origine du fichier
                $nomFichier = $nomClient . $telephoneClient ."_". $dateDuJour ;
                $cheminDefinitif = $cheminSauvegardeImage . $nomFichier ; // on definit l'emplacement definitif du fichier
                move_uploaded_file($cheminTemporaire,$cheminDefinitif); // on stocke le fichier dans le serveur

                 return $cheminDefinitif ;

            
            }
            else{
                return false;
            }

             
            
            
        }

        public function ajouterClient($lienFichierBDD, $lienPhotoClientDefaut, $cheminSauvegardeImage,  $idClientMembre, $nomClient, $prenomClient, $villeClient, $quartierClient, $telephoneClient, $commentaireClient, $fichierPhotoClient="Pas de photo"){



            include $lienFichierBDD ;

            // Si le membre n'a pas choisi une photo pour le client, alors la variable $fichierPhotoClient sera une chaine de caractère et on va choisir une photo par defaut

            if(is_string($fichierPhotoClient)){  

                // On enregistre le client avec le lien de la photo par defaut

                $reqAjoutClient = $connexionDataBase -> prepare('INSERT INTO clientt(idclientmembre,nomclient,prenomclient,villeclient,quartierclient,telephoneclient,commentaireclient,lienphotoclient) VALUES (:idclientmembre, :nomclient, :prenomclient, :villeclient, :quartierclient, :telephoneclient, :commentaireclient, :lienphotoclient)');
                $reqAjoutClient ->execute(array(
                'idclientmembre' => $idClientMembre,
                'nomclient' => $nomClient,
                'prenomclient' => $prenomClient,
                'villeclient' => $villeClient,
                'quartierclient' => $quartierClient,
                'telephoneclient' => $telephoneClient,
                'commentaireclient' => $commentaireClient,
                'lienphotoclient' => $lienPhotoClientDefaut,

                ));

                return true ;

            }
            else{

                // Au cas où le membre a choisi la photo du client, on importe la photo dans le serveur avant d'enregistrer le client dans la base de données

                $resultatImportationPhoto = $this->importerPhotoClient($fichierPhotoClient,$cheminSauvegardeImage,$telephoneClient,$nomClient);  //Importation de la photo du client

                if(is_string($resultatImportationPhoto)){

                    // Si la variable $resultatImportationPhoto est une chaine de caractère, c'est donc le lien de photo du client qui a été généré après l'importation de la photo dans le serveur


                    $reqAjoutClient = $connexionDataBase -> prepare('INSERT INTO clientt(idclientmembre,nomclient,prenomclient,villeclient,quartierclient,telephoneclient,commentaireclient,lienphotoclient) VALUES (:idclientmembre, :nomclient, :prenomclient, :villeclient, :quartierclient, :telephoneclient, :commentaireclient, :lienphotoclient)');
                    $reqAjoutClient ->execute(array(
                    'idclientmembre' => $idClientMembre,
                    'nomclient' => $nomClient,
                    'prenomclient' => $prenomClient,
                    'villeclient' => $villeClient,
                    'quartierclient' => $quartierClient,
                    'telephoneclient' => $telephoneClient,
                    'commentaireclient' => $commentaireClient,
                    'lienphotoclient' => $resultatImportationPhoto,
                    
                    

                    ));

                    return true; // On retourne true pour confirmer que le client a bien été enregistrer dans la base de données y compris la photo du client

                }
                else{

                    // Au cas où la variable $resultatImportationPhoto n'est pas une chaine de caratère, ça veut dire que l'importation de la photo ne s'est pas dérouler correctement du fait de son type alors, on retourne false
                    return false;
                }

            }

   

        }

        public function supprimerClient(){
            
        }

        public function modifierNomClient($lienFichierBDD, $idClient, $nouveauNomClient){
            include $lienFichierBDD;

            $reqModifierNomClient = $connexionDataBase->prepare('UPDATE clientt SET nomclient = :nouveaunom WHERE idclient = :idclient');
            $reqModifierNomClient -> execute(array(
                'nouveaunom' => $nouveauNomClient,
                'idclient' => $idClient
            ));
            
        }

        public function rechercherClient(){
            
        }

        public function listeClient(){
            
        }
    }



?>