<?php

require_once('../handles/connection.php');

$stmt = $conn->prepare("SELECT * FROM `students`,`documents`,`courses` WHERE students.studID = documents.studID 
 AND documents.docID = courses.docID AND documents.status = 1");
 

$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>S M H</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/icons/icons.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
<script src="https://kit.fontawesome.com/67887f3fb7.js" crossorigin="anonymous"></script>
<script src="../assets/js/myScript.js"></script>


    
  </head>
  <body>