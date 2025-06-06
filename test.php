<?php 
    $nom = "baba";
    $key = "cle";
    $nomCrypter = openssl_encrypt($nom, "AES-128-ECB", $key);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="test2.php?v=<?php echo $nomCrypter ; ?>">send</a>
        
    </body>
</html>