<?php
require_once('connection.php');
session_start();
if (isset($_POST['submit'])) {

    if ($_SESSION['role'] == "student") {

        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $user = $_POST['uname'];
        $Pass = sha1($_POST['pass']);
        $phone = $_POST['phone'];
        $email = $_POST['mail'];
        $accnt = $_POST['accnt'];
        $regNo = $_POST['regNo'];
        $network = $_POST['network'];
        $course = $_POST['course'];


        if ($Pass == "") {
            $stmt = $conn->prepare("UPDATE `users` SET `userName`=:uName,`userMail`= :email WHERE `userID` = :userID");
            $stmt->execute(array(":uName" => $user, ":email" => $email, ":userID" => $user_id));
        } else {
            $stmt = $conn->prepare("UPDATE `users` SET `userName`=:uName,`userPass`= :pass,`userMail`= :email WHERE `userID` = :userID");
            $stmt->execute(array(":uName" => $user, ":pass" => $Pass, ":email" => $email, ":userID" => $user_id));
        }

        $stmt = $conn->prepare("SELECT * FROM `students`, `users` WHERE users.userID = students.userID");
        $stmt->execute();
        $results = $stmt->fetch();
        $studID = $results['studID'];

        $query = $conn->prepare("UPDATE `students` SET `studName`= :sName,`studReg`= :sReg,`studAccnt`= :sAccnt,`studPhone`= :sPhone,`studNet`= :studNet,`studCrs`= :studCrs WHERE studID = :studID");

        $query->execute(array(":sName" => $name, ":sReg" => $regNo, ":sAccnt" => $accnt, ":sPhone" => $phone, ":studNet" => $network, ":studCrs" => $course, ":studID" => $studID));

        $_SESSION['userName'] = $user;

    }elseif($_SESSION['role'] == "teacher"){

        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $user = $_POST['uname'];
        $Pass = sha1($_POST['pass']);
        $phone = $_POST['phone'];
        $email = $_POST['mail'];
        $course = $_POST['course'];


        if ($Pass == "") {
            $stmt = $conn->prepare("UPDATE `users` SET `userName`=:uName,`userMail`= :email WHERE `userID` = :userID");
            $stmt->execute(array(":uName" => $user, ":email" => $email, ":userID" => $user_id));
        } else {
            $stmt = $conn->prepare("UPDATE `users` SET `userName`=:uName,`userPass`= :pass,`userMail`= :email WHERE `userID` = :userID");
            $stmt->execute(array(":uName" => $user, ":pass" => $Pass, ":email" => $email, ":userID" => $user_id));
        }

        $stmt = $conn->prepare("SELECT * FROM `teachers`, `users` WHERE users.userID = teachers.userID");
        $stmt->execute();
        $results = $stmt->fetch();
        $techrID = $results['techrID'];

        $query = $conn->prepare("UPDATE `teachers` SET `techrName`=:sName,`teachrPhone`= :sPhone,`techrCourse`= :studCrs WHERE techrID = :techrID");

        $query->execute(array(":sName" => $name, ":sPhone" => $phone, ":studCrs" => $course, ":techrID" => $techrID));

        $_SESSION['userName'] = $user;

    }
    header("location:../pages/dash.php");
}
