<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

       <!-- lien pour integrer le framework boostrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css/inscription.css">


</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center titre mt-lg-5 mt-sm-3">
                <h1 class="text-center">GESTION CLIENT</h1>
            </div>
            

            <div class="row d-flex justify-content-center formulaire pt-5 pb-5">
                <div class="row icon-user">
                    <span class="d-flex justify-content-center">
                        <i class="bi bi-person-circle"></i>

                    </span>
                </div>

                <div class="row d-flex justify-content-center form-input">
                    <form action="" method="post" class="mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm " id="floatingInput" placeholder="bobo">
                            <label for="floatingInput">Pseudo</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-sm " id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Mot de passe</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Confirmer mot de passe">
                            <label for="floatingPassword">Confirmer mot de passe</label>
                        </div>

                        <div class="row d-flex justify-content-center ">
                            <button type="submit" class="btn btn-danger w-25 p-2">Inscription</button>

                        </div>
                    </form>

                        <p class="text-white text-wrap" >Vous avez déjà un compte ? <a href="index.php">connectez-vous ici</a></p>


                </div>

            
            </div>
        </div>
    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>