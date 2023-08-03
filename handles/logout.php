<?php
    session_start();
    require_once("connection.php");
    $user=$_SESSION["userName"];
    $stmt=$conn->prepare("UPDATE users SET lastLogin=CURRENT_TIMESTAMP WHERE userName=:name");
    $stmt->execute(array(":name"=>$user));
    unset($_SESSION["userName"]);
    unset($_SESSION["role"]);
    unset($_SESSION["user_id"]);
    session_destroy();
    header("location:../index.php");
?>