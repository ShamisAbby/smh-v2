<?php
require_once("connection.php");
session_start();
$user = $_SESSION["userName"];

if (isset($_POST['submit'])) {
    $docTitle = $_POST['docTitle'];
    $docCrs = $_POST['docCrs'];
    $crsCode = strtoupper($_POST['crsCode']);
    $docDesc = $_POST['docDesc'];
    $docPrice = "Tsh500";
    $docPath = "default";


    try {
        $query = $conn->prepare("SELECT `userID` FROM `users` WHERE `userName` = :user");
        $query->execute(array(":user" => $user));
        $res = $query->fetch();

        $userID = $res['userID'];
        // echo $userID."<br>";

        $query = $conn->prepare("SELECT `studID` FROM `students` WHERE `userID` = :user");
        $query->execute(array(":user" => $userID));
        $res = $query->fetch();

        $studID = $res['studID'];

        $stmt1 = $conn->prepare("INSERT INTO `documents`(`studID`, `docTittle`, `docDesc`, `docPrice`, `docPath`, `status`) 
    VALUES (:studID,:docTitle,:docDesc,:docPrice,:docPath,0)");
        $stmt1->execute(array(":studID" => $studID, ":docTitle" => $docTitle, ":docDesc" => $docDesc, ":docPrice" => $docPrice, ":docPath" => $docPath));
        $docID = $conn->lastInsertId();



        $stmt2 = $conn->prepare("INSERT INTO `courses`(`studID`, `docID`, `crsName`, `crsCode`) 
        VALUES (:studID,:docID,:crsName,:crsCode)");
        $stmt2->execute(array(":studID" => $studID, ":docID" => $docID, ":crsName" => $docCrs, ":crsCode" => $crsCode));
        // $docID = $conn->lastInsertId();
    } catch (PDOException $c) {
        echo "Data hazija ingia ktk table la Course" . $c;
    }
}


if (isset($_FILES["docPath"])) {
    
    try {
        $document = $_FILES["docPath"];
        // check if the uploaded is an image with no error, before saving the file
        if (($document["type"] == "application/pdf") and $document["error"] == 0) {
            // split the image name into an array using dot (.),in order to get the extension of the uploaded file
            // the extension is the the last value in the obtained array.
            // eg. if the file name is "a1.png", the resulted array will be ["a1","png"]
            $arr = explode(".", $document["name"]);
            // combine the text (img_) with the name of the logged in user and its file extension to obtain unique file name..
            // eg. if user is "admin" and the previos obtained extension was "png", the new file name will be "img_admin.png"

            // $i = 1;
            $name = $user . "Doc_" . time() . "." . end($arr);
            // $i + 1;
            // state the where the image should be saved, the path is relative to this current file
            $path = "../assets/documents/" . $name;
            // move the uploaded file from the current temporary location to the destination path
            if (move_uploaded_file($document["tmp_name"], $path)) {
                // once the file is saved, update the new image name to the database
                $stmt = $conn->prepare("UPDATE `documents` SET `docPath` = :docPath WHERE docID =:docID");
                $stmt->execute(array(":docPath" => $name, ":docID" => $docID));
            }
        }
    } catch (PDOException $d) {
        echo "File halija ingia ktk database" . $d;
    }
}

header('Location: ../pages/dash.php');
?>