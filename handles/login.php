<?php
require_once("connection.php");

if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = sha1($_POST['pass']);


    if(strpos($user, '@') !== false){
        // echo "Word Found!";
        $stmt = $conn->prepare("SELECT * FROM users ,roles WHERE roles.roleID = users.roleID AND users.userMail=:uname AND users.userPass=:pass");
        $stmt->execute(array(":uname"=>$user, ":pass"=>$pass));
    
        if($stmt->rowCount() == 1){
            $result = $stmt->fetch();
    
            session_start();
            $_SESSION['userName'] = $result['userName'];
            $_SESSION['role'] = $result['roleName'];
            $_SESSION['user_id'] = $result['userID'];
            header("location:../pages/dash.php");
    
            
        }else{
            // echo 'You are not registrad';
    
           header("location:../index.php?error1=true");


        }


    } elseif(strpos($user, '@') !== true){
        
        $stmt = $conn->prepare("SELECT * FROM users ,roles WHERE roles.roleID = users.roleID AND users.userName=:uname AND users.userPass=:pass");
        $stmt->execute(array(":uname"=>$user, ":pass"=>$pass));
    
        if($stmt->rowCount() == 1){
            $result = $stmt->fetch();
    
            session_start();
            $_SESSION['userName'] = $result['userName'];
            $_SESSION['role'] = $result['roleName'];
            $_SESSION['user_id'] = $result['userID'];

            header("location:../pages/dash.php");

        }else{
            // echo 'You are not registrad';
    
            header("location:../index.php?error2=true");
        }
    }
    else{
        header("location:../index.php");
        // echo "userName haipo";
    
    }

    
}
else{
    header("location:../index.php");

}
    

?>