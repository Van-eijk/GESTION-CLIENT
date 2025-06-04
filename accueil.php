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
    <link rel="stylesheet" href="css/accueil.css">



</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <div class="row main-container">


            <div class="row d-flex justify-content-center search">
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control me-2" type="search" placeholder="Rechercher un client . . ."
                        aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>

            </div>





            <div class="row mt-3 d-flex justify-content-between list-costumer">

                <?php
                $reqAfficheClient = $connexionDataBase ->prepare('SELECT * FROM clientt WHERE idclientmembre = :userConnected');
                $reqAfficheClient ->execute(array(
                    'userConnected' => $idMembre 
                ));

                while($resultatReqAfficheClient = $reqAfficheClient->fetch()){  ?>

                <a href="detailclient.php?idclient=<?php echo $resultatReqAfficheClient['idclient'] ;?>" class="m-1" id="">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php 
                                if($resultatReqAfficheClient['prenomclient'] == "Sans prenom"){
                                    $resultatReqAfficheClient['prenomclient'] = "";
                                }
                                echo $resultatReqAfficheClient['nomclient'] . ' ' .  $resultatReqAfficheClient['prenomclient'] ;?>
                            </h5>
                            <p class="card-text"><?php echo $resultatReqAfficheClient['villeclient'] ;?></p>
                            <p class="card-text"><?php echo $resultatReqAfficheClient['telephoneclient'] ;?></p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>

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