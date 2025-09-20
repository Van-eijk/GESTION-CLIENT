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
    <title>Accueil</title>

    <!-- lien pour integrer le framework boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/header.css">

    <!-- media query responsive -->

    <link rel="stylesheet" href="css/accueil2.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="css/accueil.css" media="screen and (min-width: 768px)">







</head>

<body class="">
    <div class="container bg-light p-4">
        <?php include 'header.php'; ?>
        <?php include 'popupdeconnexion.php'; //Confirmation de déconnexion de l'utilisateur ?>



       

        <div class="row main-container">


            <div class="row d-flex justify-content-center search">
                <form class="d-flex" role="search" action="resultatrecherche.php" method="post">
                    <input class="form-control me-2" name="motcle" type="search"
                        placeholder="Rechercher un client . . ." aria-label="Search" />
                    <button class="btn btn-outline-success" name="recherche" type="submit"><i
                            class="bi bi-search fw-bolder"></i></button>
                </form>

            </div>





            <div class="row mt-3 d-flex justify-content-star list-costumer">

                <?php
                    $reqAfficheClient = $connexionDataBase ->prepare('SELECT * FROM clientt WHERE idclientmembre = :userConnected ORDER BY idclient DESC ');
                    $reqAfficheClient ->execute(array(
                        'userConnected' => $idMembre 
                    ));

                    if($reqAfficheClient -> rowCount() >= 1){

                        while($resultatReqAfficheClient = $reqAfficheClient->fetch()){  ?>

                            <div class="col-12 col-md-4 col-lg-3  p-1 p-md-2 carte">
                                <a href="detailclient.php?idclient=<?php echo $resultatReqAfficheClient['idclient'] ;?>" class=""
                                id="">
                                    <div class="card item-card d-flex flex-row align-items-center flex-md-column bg-info">
                                        <span class="icon">
                                            <img src="img/defaultuser.jpg" class="" alt="portrait">

                                        </span>
                                        <div class="card-body d-flex flex-row align-items-center flex-md-column">
                                            <strong>
                                                <h5 class="card-title d-flex align-items-center p-1">
                                                    <?php 
                                                if($resultatReqAfficheClient['prenomclient'] == "Sans prenom"){
                                                    $resultatReqAfficheClient['prenomclient'] = "";
                                                }
                                                echo $resultatReqAfficheClient['nomclient'] . ' ' .  $resultatReqAfficheClient['prenomclient'] ;?>
                                                </h5>
                                            </strong>

                                            <p class="card-text d-none d-md-block"><?php echo $resultatReqAfficheClient['villeclient'] ;?></p>
                                            <p class="card-text d-none d-md-block"><?php echo $resultatReqAfficheClient['telephoneclient'] ;?></p>

                                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                                        </div>
                                    </div>
                                </a>
                            </div>

                <?php
                        }

                    }
                    else{ ?>

                        <p style=" text-align: center ;">Aucun client enregistré pour le moment</p>

                    
                    <?php
                    
                    }


               
                ?>



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