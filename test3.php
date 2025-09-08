<?php
    include 'cryptage/functions.php';

    $codeDeVerification="coucou";

    $cle = hash('sha256','BoBo@Coeur2.0?',true); // On cree une clé de 32 Caractères
    //On chiffre le code de verification avant de le transmettre par URL à la page de verification pour le comparer avec le code que l'utilisateur va entrer
    $codeDeVerification = encrypt($codeDeVerification,$cle);
    echo 'le mot crypté est :'. $codeDeVerification . '\n';

    $c = decrypt($codeDeVerification,$cle);


    echo 'le mot décrypté est :'. $c ;


  


// 1. DÉFINIR une clé secrète robuste (à garder absolument secrète !)
// Elle doit faire 32 caractères pour AES-256.
/*$ma_cle_secrete = "MaSuperCleSecrete32Caracteres!!";

// 2. CHIFFRER un message
$message_original = "Ceci est un message ultra confidentiel!";
$message_chiffre = encrypt($message_original, $ma_cle_secrete);

echo "Message chiffré : " . $message_chiffre . "\n";*/