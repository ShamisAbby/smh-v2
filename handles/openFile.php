<?php
if(isset($_GET['file'])){

    $file = $_GET['file'];
    $filePath = '../assets/documents/'.$file;

    // echo $filePath;

    if (file_exists($filePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename= "Document "');
        readfile($filePath);
    } else {
        echo "Oooops! File not found.";
    }

}

?>
