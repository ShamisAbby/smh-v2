<?php

    try{

    $conn = new PDO("mysql:host=127.0.0.1;dbname=smh", "root", "");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected";
    }catch(PDOException $e){
        echo " Not connected". $e->getMessage();;
    }
?>