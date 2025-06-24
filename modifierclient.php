<?php
    session_start();
    include "database/configdatabase.php";

?>


<?php
    if(isset($_SESSION["idmembre"]) && isset($_SESSION["pseudo"])){ 
        if(isset($_GET["idclientmodifier"])){
            $idClientModifier = $_GET["idclientmodifier"];



            
       
            
            
    ?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier client</title>


    <!-- lien pour integrer le framework boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/modifierclient.css">

</head>

<body>

    <div class="container">
        <?php include 'header.php'; ?>

        <div class="row main-container">


            <?php

        $reqAfficheDetailClient = $connexionDataBase ->prepare('SELECT * FROM clientt WHERE idclient = :idcliente');
        $reqAfficheDetailClient ->execute(array(
            'idcliente'=> $idClientModifier
        ));
        $resultatAfficheClientDetail = $reqAfficheDetailClient ->fetch();
        

       
        
    ?>






            <div class="row d-flex justify-content-center main-card-client">

                <h3 class="fs-5 fs-md-1">MODIFICATION DES INFORMATIONS DU CLIENT
                    <?php echo $resultatAfficheClientDetail["nomclient"] ; ?></h3>


                <!-- insertion du formulaire-->

                <form action="modifierclientdata.php" method="post" class="row d-flex justify-content-center">


                    <div class="row d-flex justify-content-center info-client">
                        <div class="col-12 col-sm-4 me-0 me-sm-3 photo-profil-client">

                            <img src="img/defaultuser.jpg" alt="image du client">


                            <label for="photoClient" class="picture-client">
                                <i class="bi bi-camera-fill"></i>
                            </label>


                        </div>
                        <div class="col-12 col-sm-8 mt-3 mt-sm-0 info-nom">

                            <div class="form-floating mb-3 nom-client">
                                <input type="text" class="form-control form-control-sm " value="<?php echo $resultatAfficheClientDetail["nomclient"] ; ?>" name="nomClient"
                                    id="floatingInput" placeholder="Nom">
                                <label for="floatingInput">Nom</label>
                            </div>

                            <div class="form-floating mb-3 prenom-client">
                                <input type="text" class="form-control form-control-sm " name="prenomClient"
                                    id="floatingInput" placeholder="Prenom" value="<?php echo $resultatAfficheClientDetail["prenomclient"] ; ?>">
                                <label for="floatingInput">Prenom</label>
                            </div>

                            <div class="form-floating mb-3 ville-client">
                                <input type="text" class="form-control form-control-sm " name="villeClient"
                                    id="floatingInput" placeholder="Ville" value="<?php echo $resultatAfficheClientDetail["villeclient"] ; ?>">
                                <label for="floatingInput">Ville</label>
                            </div>

                            <div class="form-floating mb-3 Quartie-client">
                                <input type="text" class="form-control form-control-sm " name="quartierClient"
                                    id="floatingInput" placeholder="Quartier" value="<?php echo $resultatAfficheClientDetail["quartierclient"] ; ?>">
                                <label for="floatingInput">Quartier</label>
                            </div>

                            <div class="form-floating mb-3 telephone-client">
                                <input type="tel" class="form-control form-control-sm " name="telephoneClient"
                                    id="floatingInput" placeholder="Telephone" value="<?php echo $resultatAfficheClientDetail["telephoneclient"] ; ?>">
                                <label for="floatingInput">Telephone</label>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Un peu de commentaire..."
                                    id="floatingTextarea" name="commentaireClient"><?php echo $resultatAfficheClientDetail["commentaireclient"] ; ?></textarea>
                                <label for="floatingTextarea">Commentaire</label>
                            </div>

                            <input type="file" id="photoClient" class="photo-client">

                            <input type="hidden" value="<?php echo $idClientModifier ; ?>" name="idClientModifier">

                        </div>

                    </div>

                    <div class="row mt-3 d-flex justify-content-around options-card">
                        <a href="detailclient.php?idclient=<?php echo $idClientModifier ; ?>">ANNULER</a>
                        <input type="submit" value="ENREGISTRER" name="save">

                    </div>





                </form>


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
     else{
        echo'erreur identifiant client';
     }
    }
    else{
        echo 'Connectez-vous. Si vous navez pas de compte, creez en 1';
    }

?>