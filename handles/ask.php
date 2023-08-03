<?php
require_once('connection.php');

if(isset($_POST['submit'])){
    $quest = $_POST['quest'];

    session_start();
    $user = $_SESSION['userName'];
        
    $query = $conn->prepare("SELECT `userID` FROM `users` WHERE `userName` = :user");
    $query->execute(array(":user"=>$user));
    $res1 = $query->fetch();
    $userID = $res1['userID'];


    $stmt = $conn->prepare("INSERT INTO `questions`(`userID`, `questBdy`, `time`) 
    VALUES (:user,:quest,CURRENT_TIMESTAMP)");
    $stmt->execute(array(":user"=>$userID,":quest"=>$quest));
    header('Location: ../pages/dash.php');
   
}

?>