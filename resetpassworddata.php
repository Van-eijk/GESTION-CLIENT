<?php

    session_start();
    include "database/configdatabase.php";
    include 'classes/Membre.php' ;


    $mailUser = $_SESSION['address'] ;

    if(isset($_POST['save'])){



        if(isset($_POST['newpassword'])){
            if(isset($_POST['confirmnewpassword'])){

                if($_POST['newpassword'] === $_POST['confirmnewpassword']){
                    $pwd = $_POST['confirmnewpassword'] ;
                    $pwdHache = sha1($pwd);



                    $reqUpdateMembre = $connexionDataBase ->prepare('UPDATE membre SET motdepasse = :pwd WHERE email = :email');
                    $reqUpdateMembre ->execute(array(
                        'pwd' => $pwdHache,
                        'email'=> $mailUser
                    ));


                    // Recuperation du pseudo

                    $reqConMembre = $connexionDataBase ->prepare('SELECT * FROM membre WHERE email = :m');
                    $reqConMembre ->execute(array(
                        'm'=> $mailUser
                    ));
                    $resultatConMembre = $reqConMembre ->fetch();

                    $pseudo = $resultatConMembre['pseudo'] ;

                    $lienFichierBDD = "database/configdatabase.php";
                    $lienPageAccueil ='location:accueil.php';
                    $conMembre = new Membre();


                    $conMembre->connexionMembre($pseudo, $pwd, $lienFichierBDD, $lienPageAccueil );

                    if($conMembre->connexionMembre($pseudo, $pwd, $lienFichierBDD, $lienPageAccueil) == false){
                        $erreurConnexion = "Pseudo ou mot de passe incorrect";

                    }

                    

                    

                }
        
            }
        
        }

    }