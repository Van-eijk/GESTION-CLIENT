<?php 
    class Client{
        private $idClient;
        private $idClientMembre;
        private $nomClient;
        private $prenomClient;
        private $villeClient;
        private $quartierClient;
        private $telephoneClient;
        private $commentaireClient;
        private $lienPhotoClient;
        private $dateAjoutClient;

        // Accesseurs et mutateurs

        public function getNomClient(){
            return $this->nomClient;
        }
        public function getIdClient(){
            return $this->idClient;
        }

        public function getIdClientMembre(){
            return $this->idClientMembre ;
        }
        public function getDateAjoutClient(){
            return $this->dateAjoutClient ;
        }
        public function getPrenomClient(){
            return $this->prenomClient;
        }
        public function getVilleClient(){
            return $this->villeClient;
        }
        public function getquartierClient(){
            return $this->quartierClient;
        }
        public function getTelephoneClient(){
            return $this->telephoneClient;
        }
        public function getCommentaireClient(){
            return $this->commentaireClient;
        }
        public function getLienPhotoClient(){
            return $this->lienPhotoClient;
        }

        public function setNomClient($nomClient){
            $this->$nomClient = $nomClient ;
        }

        public function setPrenomClient($prenomClient){
            $this->prenomClient = $prenomClient;
        }
        
        public function setVilleClient($villeClient){
            $this->villeClient = $villeClient ;
        }

        public function setQuartierClient($quartierClient){
            $this->quartierClient = $quartierClient ;
        }
        public function setTelephoneClient($telephoneClient){
            $this->telephoneClient = $telephoneClient ;
        }
        public function setCommentaireClient($commentaireClient){
            $this->commentaireClient = $commentaireClient ;

        }
        public function setLienPhotoClient($lienPhotoClient){
            $this->lienPhotoClient = $lienPhotoClient ;
        }
        public function setDateAjoutClient($dateAjoutClient){
            $this->dateAjoutClient = $dateAjoutClient ;
        }
        public function setIdClientMembre($idClientMembre){
            $this->idClientMembre = $idClientMembre ;
        }
        public function setIdClient($idClient){
             $this->idClient = $idClient ;
        }
    }
?>