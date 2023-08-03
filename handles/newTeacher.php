<?php
require_once('connection.php');

if(isset($_POST['submit'])){
    $name = $_POST['fname'];
    $user = $_POST['uname'];
    $email = $_POST['email'];
    $fPass = sha1($_POST['pass1']);
    $sPass = sha1($_POST['pass2']);
    $phone = $_POST['phone'];
    $course = $_POST['crs'];
   

    if($fPass == $sPass){
        $check=$conn->prepare("SELECT * FROM users WHERE userName =:uname");
        $check->execute(array(":uname"=>$user));
        if($check->rowCount()==0){
            $check=$conn->prepare("SELECT * FROM users WHERE userMail =:uname");
            $check->execute(array(":uname"=>$user));

            if($check->rowCount()==0){
                $stmt=$conn->prepare("INSERT INTO `users`(`userName`, `userPass`, `userMail`, `roleID`, `lastLogin`) 
                VALUES (:uName,:pass,:email,2,CURRENT_TIMESTAMP)");
        
                $stmt->execute(array(":uName"=>$user,":pass"=>$fPass,":email"=>$email));
                $userID = $conn->lastInsertId();
        
        
                $query=$conn->prepare("INSERT INTO `teachers`(`userID`, `techrName`, `teachrPhone`, `techrCourse`) 
                VALUES (:userID,:techrName,:teachrPhone,:techrCourse)");
        
                $query->execute(array(":userID"=>$userID,":techrName"=>$name,":teachrPhone"=>$phone,":techrCourse"=>$course));
        
        
                header("location:../pages/dash.php");
            }else{
                echo '<script type="text/javascript">alert("User Email exist");</script>';
        
            }

        }else{
            echo '<script type="text/javascript">alert("User Name exist");</script>';
    
            // header("location:../admin/reg-worker.php");
        }

    }else{
        echo "Passwords is not some";
    }
    
    


    
    
}


?>