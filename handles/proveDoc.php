<?php
require_once("./connection.php");

if(isset($_GET['id'])){
    $docID = $_GET['id'];

    $stmt = $conn->prepare("UPDATE `documents` SET status= 1 WHERE docID = :docID");
    $stmt->execute(array(":docID"=>$docID));
    header('location: ../pages/dash.php');
}
?>