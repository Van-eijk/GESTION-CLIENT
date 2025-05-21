<?php 

    class Membre{

        // Attributs
        private $pseudo ;
        private $email ;
        private $motDePasse ;


        //Accesseurs

        public function getPseudo(){
            return $this -> pseudo;
        }
        public function setPseudo($pseudoIn){
            $this->pseudo = $pseudoIn ;
        }


        public function getEmail(){
            return $this -> email;
        }
        public function setEmail($emailIn){
            $this->email = $emailIn ;
        }


        public function getMotDePasse(){
            return $this -> motDePasse;
        }
        public function setMotDePasse($motDePasseIn){
            $this->motDePasse = $motDePasseIn ;
        }


        // METHODES

        public function inscriptionMembre($pseudo, $email, $motDePasse){
            //setPseudo($pseudo);

        }

        public function connexionMembre(){

        }

        public function modifierPseudo(){

        }

        public function modifierEmail(){
            
        }

        public function modifierMotDePasse(){
            
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