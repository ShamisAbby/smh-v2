<?php
require_once("connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM `questions` WHERE questID = $id");
    $stmt->execute();
    header("location:../pages/dash.php");

}

?>