<?php
 if(isset($_GET["v"])){
    $nomD = $_GET["v"];
    $key = "cle";
    $nomDecrypter = openssl_decrypt($nomD, "AES-128-ECB", $key);
    echo $nomDecrypter;
 }