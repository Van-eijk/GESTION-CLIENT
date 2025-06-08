<?php
    session_start();
    include 'database/configdatabase.php';

?>


<?php
    if(isset($_SESSION["idmembre"]) && isset($_SESSION["pseudo"])){ 
        $idMembre = $_SESSION["idmembre"] ;
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>


    <!-- lien pour integrer le framework boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/profilmembre.css">

</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="row main-container">

            <?php
                 
                $reqAfficheMembre = $connexionDataBase ->prepare('SELECT * FROM membre WHERE idmembre = :userConnected');
                $reqAfficheMembre ->execute(array(
                    'userConnected' => $idMembre 
                ));

                $resultatReqAfficheMembre = $reqAfficheMembre->fetch();
            
            ?>



            <div class="row d-flex justify-content-center main-card-client">
                <h3>PROFIL DU MEMBRE</h3>
                <div class="row d-flex justify-content-center info-client">
                    <div class="col-12 col-sm-4 me-0 me-sm-3 photo-profil-client">
                        <img src="img/defaultuser.jpg" alt="image du client">

                    </div>
                    <div class="col-12 col-sm-8 mt-3 mt-sm-0 info-nom">
                        <div class="row border-bottom nom-client">
                            <label for="">Pseudo:</label>
                            <strong>
                                <p><?php
                                echo $resultatReqAfficheMembre['pseudo'];
                            ?></p>
                            </strong>
                        </div>

                        <div class="row border-bottom prenom-client">
                            <label for="">Email:</label>
                            <strong>
                                <p><?php
                                echo $resultatReqAfficheMembre['email'];
                            ?></p>
                            </strong>
                        </div>

                        <div class="row border-bottom ville-client">
                            <label for="">D'ate d'inscription:</label>
                            <strong>
                                <p><?php
                                echo $resultatReqAfficheMembre['dateinscription'];
                            ?></p>
                            </strong>
                        </div>



                    </div>

                </div>

                <div class="row mt-3 d-flex justify-content-around options-card">
                    <a href="accueil.php">OK</a>
                    <a href="modifierclient.php" style="display:none">MODIFIER</a>
                    <a href="accueil.php" style="display:none">SUPPRIMER</a>


                </div>

            </div>




        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>


<?php
    }
?>