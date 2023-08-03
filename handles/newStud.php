<?php
require_once('connection.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $user = $_POST['user'];
    $Pass = sha1($_POST['fPass']);
    // $sPass = sha1($_POST['sPass']);
    $phone = $_POST['phone'];
    $email = $_POST['mail'];
    $accnt = $_POST['accnt'];
    $regNo = $_POST['regNo'];
    $network = $_POST['network'];
    $year = $_POST['year'];
    $course = $_POST['course'];
    
        $check=$conn->prepare("SELECT * FROM users WHERE userName =:uname");
        $check->execute(array(":uname"=>$user));
        if($check->rowCount()==0){
            $check=$conn->prepare("SELECT * FROM users WHERE userMail =:uname");
            $check->execute(array(":uname"=>$email));

            if($check->rowCount()==0){
                $stmt=$conn->prepare("INSERT INTO `users`(`userName`, `userPass`, `userMail`, `roleID`, `lastLogin`) 
                VALUES (:uName,:pass,:email,3,CURRENT_TIMESTAMP)");
        
                $stmt->execute(array(":uName"=>$user,":pass"=>$Pass,":email"=>$email));
                $userID = $conn->lastInsertId();
        
        
                $query=$conn->prepare("INSERT INTO `students`(`userID`, `studName`, `studReg`, `studAccnt`, `studPhone`,`studNet`, `studCrs`, `studYear`) 
                VALUES (:userID,:sName,:sReg,:sAccnt,:sPhone,:studNet,:studCrs,:studYear)");
        
                $query->execute(array(":userID"=>$userID,":sName"=>$name,":sReg"=>$regNo,":sAccnt"=>$accnt,":sPhone"=>$phone,":studNet"=>$network,":studCrs"=>$course,":studYear"=>$year));
        
                header("location:../index.php");
            }else{
                header('location: ../pages/newStud.php?error=email');
            }

        }else{
            header('location: ../pages/newStud.php?error=user');
            
        }
    
    
}


?>