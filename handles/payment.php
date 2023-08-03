<?php
require_once("connection.php");

if (isset($_POST['submit'])) {
    $docID = $_POST['docID'];
    $transNo = $_POST['transNo'];

    session_start();
    $user = $_SESSION["userName"];

    $query = $conn->prepare("SELECT * FROM `ctl_no` WHERE `ctl_Nos` = :transNo");
    $query->execute(array(":transNo"=>$transNo));
    
    if($query->rowCount() == 1){


    try {
        $query = $conn->prepare("SELECT * FROM `users`,`students` WHERE users.userID = students.userID AND users.`userName` = :user");
        $query->execute(array(":user" => $user));
        $res = $query->fetch();
        $studID = $res['studID'];
       

        $stmt1 = $conn->prepare("INSERT INTO `transactions`(`studID`, `controllNo`, `docID`, `transDate`) 
        VALUES (:studID,:controllNo,:docID,CURRENT_TIMESTAMP)");
        $stmt1->execute(array(":studID" => $studID, ":controllNo" => $transNo, ":docID" => $docID));

        header('location: ../pages/dash.php');
    } catch (PDOException $e) {
        echo "Error " . $e;
    }

}else{
    echo "Incorrect number";
}
}
