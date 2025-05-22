<?php 
    class Client{
        private $nomClient;
        private $prenomClient;
        private $villeClient;
        private $quartierClient;
        private $telephoneClient;
        private $commentaireClient;
        private $lienPhotoClient;

        // Accesseurs et mutateurs

        public function getNomClient(){
            return $this->nomClient;
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
    }
?>