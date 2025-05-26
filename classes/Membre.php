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

        public function importerPhotoClient($fichierPhotoClient,$cheminSauvegarde,$telephoneClient,$nomClient){
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
                $cheminDefinitif = $cheminSauvegarde . $nomFichier ; // on definit l'emplacement definitif du fichier
                move_uploaded_file($cheminTemporaire,$cheminDefinitif); // on stocke le fichier dans le serveur

            
            }
            else{
                return false;
            }

            return $cheminDefinitif ;  
            
            
        }

        public function ajouterClient(){
            

        }

        public function supprimerClient(){
            
        }

        public function modifierClient(){
            
        }

        public function rechercherClient(){
            
        }

        public function listeClient(){
            
        }
    }



?>