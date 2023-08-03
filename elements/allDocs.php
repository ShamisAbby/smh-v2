<?php

// $stmt = $conn->prepare("SELECT * FROM `users`, `documents`,`courses` WHERE users.userID = documents.userID AND users.userID = ")

?>


<?php
if ($_SESSION['role'] == "teacher") {
    $search = "";
    if (isset($_POST["search"]) && $_POST["search"] != "") {

        $search = $_POST["search"];
        $stmt = $conn->prepare("SELECT * FROM `students`,`documents`,`courses` WHERE students.studID = documents.studID 
    AND documents.docID = courses.docID AND documents.status = 0 AND crsCode 
    LIKE '%" . $search . "%' OR docTittle LIKE '%" . $search . "%' ");
    } else {
        $stmt = $conn->prepare("SELECT * FROM `students`,`documents`,`courses` WHERE students.studID = documents.studID 
    AND documents.docID = courses.docID AND documents.status = 0");
    }
} elseif ($_SESSION['role'] == "student") {
    $search = "";
    if (isset($_POST["search"]) && $_POST["search"] != "") {

        $search = $_POST["search"];
        $stmt = $conn->prepare("SELECT * FROM `students`,`documents`,`courses` WHERE students.studID = documents.studID 
        AND documents.docID = courses.docID AND documents.status = 1 AND crsCode 
        LIKE '%" . $search . "%' OR docTittle LIKE '%" . $search . "%' ");
    } else {
        $stmt = $conn->prepare("SELECT * FROM `students`,`documents`,`courses` WHERE students.studID = documents.studID 
    AND documents.docID = courses.docID AND documents.status = 1");
    }
}



$stmt->execute();

?>

<div class="row mb-4">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="search mt-3 w-100">
            <form action="./dash.php" method="post" class="w-100">
                <div style="display: flex; align-items: center;">
                    <input type="text" placeholder="Search by course code" class="input-search w-100" value="<?php echo $search; ?>" name="search" />
                    <button class="btn-search">Search </button>
                </div>
                <!-- <input type="text" placeholder="Search for couse code" class="form-control w-100">
                                <button type="submit" class="btn bg1 text-white">Search</button> -->
            </form>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>

<?php

if ($stmt->rowCount() >= 1) {
    // $docPay = 1000;
    // $descr = 100;
    while ($res = $stmt->fetch()) {
        $docPay = time();
        $descr = time();
?>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="for-doc bg-white p-3 mt-2">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-2">
                        <div class="d-flex justify-content-center align-content-center">
                            <i class="fa-regular fa-file-pdf mt-4 text-danger" style="font-size: 40px;"></i>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="text-start">
                            <h6 class="fw-bolder">
                                <?php echo $res['crsCode'] . " - " . $res['crsName']; ?></h6>
                            <span style="color: var(--color2);">About : </span><?php echo $res['docTittle']; ?> <br>
                            <span style="color: var(--color2);">Aunthor : </span><?php echo $res['studName']; ?>
                            <div class="d-flex flex-row justify-content-between mt-1">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#description<?php echo $descr; ?>">Descriptions</a>

                                <?php


                                if ($_SESSION['role'] == "student") {

                                    $query = $conn->prepare("SELECT * FROM `users`,`students` WHERE users.userID = students.userID AND users.userName = :user");
                                    $query->execute(array(":user" => $user));
                                    $data = $query->fetch();
                                    $studID = $data['studID'];

                                    $testpay = $conn->prepare("SELECT * FROM `transactions`,`students`,`documents`WHERE students.studID = transactions.studID 
                                                    AND documents.docID =  transactions.docID AND documents.docID = :docID AND transactions.studID = :studID");
                                    $testpay->execute(array(":docID" => $res['docID'], ":studID" => $studID));

                                    if ($testpay->rowCount() > 0) {
                                ?>
                                        <a href="../handles/openFile.php?file=<?php echo $res['docPath']; ?>" class="text-success fw-bolder" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                    <?php
                                    } else {

                                    ?>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#payment<?php echo $docPay; ?>" class="text-primary fw-bolder">pay <?php echo $res['docPrice']; ?></a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <a href="../handles/openFile.php?file=<?php echo $res['docPath']; ?>" class="text-success fw-bolder" target="_blank">Check</a>
                                    <a href="../handles/proveDoc.php?id=<?php echo $res['docID']; ?>" class="btn btn-success">Publich</a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ------------------------------------- Modal For Document Description --------------------------------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="description<?php echo $descr; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">About  "<?php echo $res['docTittle']; ?>" Document</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php echo $res['docDesc']; ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- ------------------------------------- Modal For Document Description --------------------------------------------- -->





        <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->
        <!-- Modal -->
        <div class="modal fade" id="payment<?php echo $docPay; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Buy <?php echo $res['docTittle']; ?> Document</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            To gain access to download this document, you need to make a payment of <span class="text-primary"><?php echo $res['docPrice']; ?></span> to the number below. After making the payment,
                            enter the transaction number in the field provided and click Pay now.
                        </p>
                        <form action="../handles/payment.php" method="post" class="form">
                            <input type="text" readonly class="form-control" value="<?php echo $res['studNet'] . " - " . $res['studAccnt']; ?>">
                            <input type="text" name="docID" hidden readonly class="form-control" value="<?php echo $res['docID']; ?>">
                            <input type="number" id="numberInput<?php echo $docPay; ?>" name="transNo" maxlength="9" class="form-control mt-2" maxlength="9" placeholder="Transiction Number">
                            <button class="btn btn-primary mt-2 w-50" type="submit" name="submit">Pay now</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

<!-- 
    ===============> form validation for trasection number to be only 9 digit
 -->
        <script>
            var numberInput<?php echo $docPay; ?> = document.getElementById("numberInput<?php echo $docPay; ?>");

            numberInput<?php echo $docPay; ?>.addEventListener("input", function() {
                if (numberInput<?php echo $docPay; ?>.value.length > 9) {
                    numberInput<?php echo $docPay; ?>.value = numberInput<?php echo $docPay; ?>.value.slice(0, 9);
                }
            });
        </script>
        <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->




    <?php

    }
} else {
    ?>
    <div class="col-lg-4 col-md-4 col-12">
        <div class="for-doc bg-white p-3 mt-2">
            <div class="d-flex justify-content-center align-content-center  text-danger">
                <strong>Ooops!! <br> There is no Document uploaded</strong>
            </div>
        </div>
    </div>

<?php
}
?>