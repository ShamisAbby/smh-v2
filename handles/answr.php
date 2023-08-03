<?php
require_once('connection.php');

if(isset($_POST['submit'])){
    $answr = $_POST['answr'];
    $questID = $_POST['questID'];

    session_start();
    $user = $_SESSION['userName'];
        
    $query = $conn->prepare("SELECT `userID` FROM `users` WHERE `userName` = :user");
    $query->execute(array(":user"=>$user));
    $res1 = $query->fetch();
    $userID = $res1['userID'];


    $stmt = $conn->prepare("INSERT INTO `answers`(`userID`, `aswBdy`, `questID`, `time`) 
    VALUES (:userID,:aswBdy,:questID, CURRENT_TIMESTAMP)");
    $stmt->execute(array(":userID"=>$userID,":aswBdy"=>$answr,":questID"=>$questID));
    header('Location: ../pages/dash.php');
   
}

?>
