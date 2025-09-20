<nav class="navbar navbar-expand-md nav-responsive navbar-dark fixed-top">
    <div class="container main-nav">
        <a href="accueil.php" class="navbar-brand text-uppercase fw-bold text-dark">
            <span class="bg-danger bg-gradient p-1 m-1 rounded-3 text-light">GESTION </span>CLIENT
        </a>

        <button class="navbar-toggler btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ps-3">
                    <a href="accueil.php" class="nav-link text-dark active">Accueil</a>
                </li>

                <li class="nav-item ps-3">
                    <a href="ajouterclient.php" class="nav-link text-dark">Ajouter un client</a>
                </li>

                <li class="nav-item ps-3">
                    <a href="listeclient.php" class="nav-link text-dark">Liste clients</a>
                </li>

                

                <li class="nav-item ps-3">
                    <a href="profilmembre.php" class="nav-link text-dark"> <?php echo $_SESSION["pseudo"] ; ?></a>
                </li>

                <li class="nav-item ps-3">
                     <!-- Confert popupdeconnexion.php -->

                    <a class="nav-link text-dark"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style=" cursor: pointer;">Deconnexion</a>
                </li>
            </ul>

        </div>


    </div>
</nav>