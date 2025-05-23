<?php 
    $hostName = "localhost";
    $dbName = "gestionclientdb";
    $username = "root";
    $password = "";





    try{
        $connexionDataBase = new PDO("mysql:host=$hostName;dbname=$dbName", $username, $password ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // Le dernier argument permet de récupérer les érreurs liées à la base de données MySql
    }
    catch(Exception $e){
        echo ("Erreur : $e -> getMessage() ");
    }
    
?>