<?php
require_once("connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // echo $id;
    $stmt = $conn->prepare("DELETE FROM `answers` WHERE aswID = $id");
    $stmt->execute();
    header("location:../pages/dash.php");

}

?>