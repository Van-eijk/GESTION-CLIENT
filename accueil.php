<?php
    session_start();
?>


<?php
    if(isset($_SESSION["idmembre"]) && isset($_SESSION["pseudo"])){ 
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



                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>






                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>








                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>






                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>








                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>





                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>







                <a href="detailclient.php" class="m-1">
                    <div class="card item-card">
                        <img src="img/defaultuser.jpg" class="card-img-top" alt="portrait">
                        <div class="card-body">
                            <h5 class="card-title">BOBO Van</h5>
                            <p class="card-text">Douala</p>
                            <p class="card-text">+237 695 74 06 39</p>

                            <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                    </div>
                </a>





















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