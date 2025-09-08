<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php'; // charge PHPMailer
    include "database/configdatabase.php";



    if(isset($_POST['send'])){

        $address = $_POST['mailuser'];

        // On vérifie si l'adresse email de l'utilisateur existe dans la base de données

        $reqConMembre = $connexionDataBase ->prepare('SELECT * FROM membre WHERE email = :mail');
        $reqConMembre ->execute(array(
            'mail'=> $address
        ));

        if($resultatConMembre = $reqConMembre ->fetch()){

            $mail = new PHPMailer(true);

            try {
                // Encodage UTF-8
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64'; // garantit la bonne transmission des caractères spéciaux
                // Configuration serveur SMTP

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';      // serveur Gmail ; il y en a d’autres comme yahoo & outlook (live)
                $mail->SMTPAuth   = true;
                $mail->Username   = 'vaneijkdjeatsa@gmail.com';  // ton email Gmail
                $mail->Password   = 'bsrm hnby zele qddz'; // mot de passe d'application Google ( Configurez votre mot de passe)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port       = 587;

                // Expéditeur et destinataire
                $mail->setFrom('vaneijkdjeatsa@gmail.com', 'GESTION CLIENT');
                $mail->addAddress($address, 'Membre GESTION CLIENT');

                // Contenu du mail
                $mail->isHTML(true);
                $mail->Subject = 'CODE DE REINITIALISATION DE VOTRE MOT DE PASSE';
                $codeDeVerification = random_int(100000, 9999999999); // Génère un code à 6 chiffres
                $mail->Body = '
                    <html>
                        <body style="">
                            <h4>Bonjour,</h4>
                            <p>Le code pour réinitialiser votre mot de passe est : <h1 style="color:red";>'. $codeDeVerification . '</h1></p>

                        
                        </body>
                    </html>';            
                $mail->AltBody = 'Bonjour, bienvenue dans la plateforme de gestion client.';

                $mail->send();
                $_SESSION['codeDeVerification'] = $codeDeVerification ;
                $_SESSION['address'] = $address ;

                //echo " Email envoyé avec succès !";

            
                header("Location:codeverification.php");
            } 
            catch (Exception $e) {
                echo "Erreur lors de l’envoi : {$mail->ErrorInfo}";
            }

        }
        else{
            $erreurMail = "Adresse email introuvable";
            header("Location:motpasseoublie.php?em=$erreurMail");
            
        }


        

    }