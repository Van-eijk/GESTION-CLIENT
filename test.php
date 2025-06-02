<?php 
    if(isset($_POST["send"])){
       /* if(!empty($_FILES["fichier"])){
            echo"succes";
        }
        
        
        echo "failled";*/

        ?>
        <script>
            if(pictureSelect){
                </script>

                <?php

                    echo"succes";

                ?>

                <script>
                }
            else{

                </script>

                <?php

                echo "failled";

                ?>


                <script>

            }

        </script>

<?php 

        
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>

<form action="test.php" method="post" enctype="multipart/form-data" >
    <input type="text">
    <input type="file" id="fichier" name="fichier">
    <input type="submit" value="send" name="send">
</form>

<script>
    let fichier = document.getElementById("fichier");
    let pictureSelect;
    if(fichier.files && fichier.files.length > 0){
        pictureSelect = true ;
    }
    else{
        pictureSelect = false;
    }
</script>
    
</body>
</html>