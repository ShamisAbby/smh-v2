<?php
require_once('connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM `users` WHERE userID = $id");
    $stmt->execute();
    header('Location: ../pages/dash.php');

}
?>   