<?php
session_start();
require_once('../elements/links.php');
require_once('../handles/connection.php');

if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
    $user = $_SESSION['userName'];
    $role = $_SESSION['role'];

?>
    <div class="for-bg w-100 pb-5">

        <?php
        include_once '../elements/profile.php';
        ?>

        <!-- <button type="button" class="btn btn-profile">
        <img src="../assets/imgs/github.jpg" width="30px" alt="profile" class="profile rounded-circle" />
    </button> -->
        <div class="container text-center">

            <?php
            include_once '../elements/header.php';
            include_once '../elements/introCards.php';


            //   ======================== Fetch data for student status ====================== -->

            require_once("../handles/connection.php");

            $user = $_SESSION['userName'];
            $globalID = $_SESSION['user_id'];

            $stmt0 = $conn->prepare("SELECT * FROM `students`,`users` WHERE students.userID = users.userID and users.userName = :user");
            $stmt0->execute(array(":user" => $user));
            $ids = $stmt0->fetch();
            $user_id = $ids['userID'];
            $student = $ids['studID'];

            // echo $user_id."<br>";
            // echo $student;

            $stmt1 = $conn->prepare("SELECT * FROM documents WHERE documents.studID =:stud");
            $stmt1->execute(array("stud" => $student));

            $stmt2 = $conn->prepare("SELECT * FROM questions WHERE questions.userID =:user1");
            $stmt2->execute(array("user1" => $user_id));

            $stmt3 = $conn->prepare("SELECT * FROM answers WHERE answers.userID =:user2");
            $stmt3->execute(array("user2" => $user_id));

            // ======================== Fetch data for student status ====================== -->


            ?>

            <div id="content1" class="content">
                <div class="row mt-4">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="user-profile bg-white p-4 mb-2">
                            <div class="d-flex flex-row justify-content-around mb-4">
                                <img src="../assets/imgs/userProff.png" width="30px" alt="profile" class="profile rounded-circle" />
                                <h5><?php echo $user; ?></h5>
                            </div>
                            <hr class="hr" />

                            <a href="#" class="user-link" data-bs-toggle="modal" data-bs-target="#studDocs">
                                <div class="d-flex flex-row justify-content-around mb-4">
                                    <h6>Documents</h6>
                                    <strong class="bg1 text-white rounded-pill p-1"><?php echo $stmt1->rowCount(); ?></strong>
                                </div>
                            </a>
                            <hr class="hr" />

                            <a href="#" class="user-link"  data-bs-toggle="modal" data-bs-target="#QuestionsM">
                                <div class="d-flex flex-row justify-content-around mb-4">
                                    <h6>Questions</h6>
                                    <strong class="bg1 text-white rounded-pill p-1"><?php echo $stmt2->rowCount(); ?></strong>
                                </div>
                            </a>
                            <hr class="hr" />

                            <a href="#" class="user-link" data-bs-toggle="modal" data-bs-target="#AnswersM" >
                                <div class="d-flex flex-row justify-content-around mb-4">
                                    <h6>Answers</h6>
                                    <strong class="bg1 text-white rounded-pill p-1"><?php echo $stmt3->rowCount(); ?></strong>
                                </div>
                            </a>
                            <hr class="hr" />

                            <a href="#" class="user-link">
                                <div class="d-flex flex-row justify-content-around mb-4">
                                    <h6>Comments</h6>
                                    <strong class="bg1 text-white rounded-pill p-1"><?php echo 0; ?></strong>
                                </div>
                            </a>
                            <hr class="hr" />
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5">
                        <div class="for-doc bg-white p-3">
                            <div class="form">
                                <form action="../handles/ask.php" method="post" class="d-flex flex-row">
                                    <button name="submit" class="btn mt-0 h-25 btn-ask m-2 text-success">
                                        <!-- <i class="fa-regular fa-paper-plane fa-xl "></i> -->
                                        <i class="fa fa-send-o fa-2x" aria-hidden="true"></i>

                                    </button>
                                    <textarea name="quest" id="" rows="3" placeholder="Ask a question" class="quest-area" required></textarea>
                                </form>
                            </div>
                            <hr />
                            <div class="d-flex flex-row justify-content-around">
                                <div class="left">
                                    <a href="#" class="text-dark ">
                                        <!-- <i class="fa fa-question-circle-o" aria-hidden="true"></i> -->
                                        <i class="fa fa-file-pen fa-lg m-2 text-primary"></i>
                                        Answer Questions
                                    </a>
                                </div>
                                <hr />
                                <div class="right">
                                    <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#uploadDoc">
                                        <i class="fa fa-file-arrow-up fa-lg m-2 text-success"></i>
                                        <!-- <i class="fa fa-upload" aria-hidden="true"></i> -->
                                        Upload Document
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php

                        $stmt->execute();

                        if ($stmt->rowCount() >= 1) {
                            $i = 0;
                            $desc = 10;
                            while ($res = $stmt->fetch()) {
                                $i++;
                                $desc++;
                        ?>
                                <div class="for-doc bg-white p-3 mt-2">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-2">
                                            <div class="d-flex justify-content-center align-content-center">
                                                <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" style="font-size: 50px;"></i>
                                                <!-- <i class="fa-regular fa-file-pdf mt-4 text-danger"></i> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10">
                                            <div class="text-start">
                                                <h6 class="fw-bolder"><?php echo $res['crsCode'] . " - ";
                                                                        echo $res['crsName']; ?></h6>
                                                <span style="color: var(--color2);">About : </span><?php echo $res['docTittle']; ?> <br>
                                                <span style="color: var(--color2);">Aunthor : </span><?php echo $res['studName']; ?>
                                                <div class="d-flex flex-row justify-content-between mt-1">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#description<?php echo $desc; ?>">Read Descriptions</a>

                                                    <?php
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
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#payment<?php echo $i; ?>" class="text-primary fw-bolder">Pay <?php echo $res['docPrice']; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- ------------------------------------- Modal For Document Description --------------------------------------------- -->
                                <!-- Modal -->
                                <div class="modal fade" id="description<?php echo $desc; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">About <?php echo $res['docTittle']; ?> Document</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <?php echo $res['docDesc']; ?>
                                                </p>

                                            </div>
                                            <div class="modal-footer">
                                                <?php
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
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#payment<?php echo $i; ?>" class="text-primary fw-bolder">Pay <?php echo $res['docPrice']; ?></a>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ------------------------------------- Modal For Document Description --------------------------------------------- -->



                                <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->
                                <!-- Modal -->
                                <div class="modal fade" id="payment<?php echo $i; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                                                    <input type="number" id="numberInput<?php echo $i; ?>" name="transNo" maxlength="9" class="form-control mt-2" placeholder="Transiction Number">
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
                                    var numberInput<?php echo $i; ?> = document.getElementById("numberInput<?php echo $i; ?>");

                                    numberInput<?php echo $i; ?>.addEventListener("input", function() {
                                        if (numberInput<?php echo $i; ?>.value.length > 9) {
                                            numberInput<?php echo $i; ?>.value = numberInput<?php echo $i; ?>.value.slice(0, 9); // Truncate to 9 digits
                                        }
                                    });
                                </script>
                                <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->




                            <?php
                                if ($i == 4) {
                                    break;
                                }
                                // echo $i;
                            }
                            ?>
                            <p class="mt-4">
                                <a href="#" onclick="showContent2()" class="fw-bolder">View More Documents</a>

                            </p>
                        <?php

                        } else {
                        ?>

                            <div class="for-doc bg-white p-3 mt-2">
                                <div class="d-flex justify-content-center align-content-center  text-danger">
                                    <strong>Ooops!! <br> There is no Document uploaded</strong>
                                </div>
                            </div>

                        <?php
                        }
                        ?>



                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="docs bg-white p-3">
                            <h6 class="text-capitalize">how this system helps you</h6>
                            <p>
                                Easly connect with resources you need to solve your hardest
                                questions and gives you notes summarys and score marks on your
                                exams.
                            </p>

                        </div>


                        <?php
                        $stmt = $conn->prepare("SELECT * FROM `questions`,`users` WHERE `questions`.`userID` = `users`.`userID` ORDER BY questID DESC");
                        $stmt->execute();

                        if ($stmt->rowCount() >= 1) {
                            $i = 0;
                            while ($res = $stmt->fetch()) {
                                $i++;
                        ?>


                                <!-- ----------------------------------------------------------------------------------------- -->
                                <div class="docs bg-white p-3 mt-2 text-start">
                                    <span class="clr2 fw-bolder">Questioner: </span><?php echo $res['userName']; ?> <br>
                                    <span><span class="clr1 fw-bolder">Question:</span>
                                        <?php echo $res['questBdy']; ?>.
                                    </span><br>
                                    <span class="text-success fw-lighter">sent at:
                                        <?php $date = date_format(date_create($res['time']), " l, d F, Y H:i:s");
                                        echo  $date; ?>
                                    </span> <br>
                                    <a href="#" class="text-success" onclick="showContent3()">
                                        Expore
                                        <i class="fa-regular fa-paper-plane fa-xl text-success"></i>
                                    </a>

                                </div>
                                <!-- ---------------------------------------------------------------------------------------------- -->

                            <?php
                                if ($i == 4) {
                                    break;
                                }
                                // echo $i;
                            }
                            ?>
                            <p class="mt-4">
                                <a href="#" onclick="showContent3()" class="fw-bolder">View More Questions</a>

                            </p>
                        <?php

                        } else {
                        ?>

                            <div class="docs bg-white p-3 mt-2 text-start">
                                <div class="d-flex justify-content-center align-content-center  text-danger">
                                    <strong>Ooops!! <br> There is no Question Asked </strong>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>

                <!-- <span class="addNew bg1 p-3 text-center shadow"> -->
                <button type="button" class="btn btn-expand bg1" data-bs-toggle="modal" data-bs-target="#uploadDoc">
                    <i class="fa fa-plus"></i>
                    <span class="text"> <strong>+</strong> Upload Document</span>
                </button>
            </div>

            <div id="content2" class="content">
                <div class="row mt-5">
                    <?php
                    include_once '../elements/allDocs.php';
                    ?>
                </div>

                <!-- <span class="addNew bg1 p-3 text-center shadow"> -->
                <button type="button" class="btn btn-expand bg1" data-bs-toggle="modal" data-bs-target="#uploadDoc">
                    <i class="fa fa-plus"></i>
                    <span class="text"> <strong>+</strong> Upload Document</span>
                </button>
            </div>

            <div id="content3" class="content" style="display: none;">
                <?php
                include_once '../elements/allQuest.php';
                ?>
            </div>


        </div>




        <!-- Modal -->
        <div class="modal fade" id="uploadDoc" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Upload Document (.pdf)</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../handles/upload.php" class="form" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Document Course" name="docCrs" required>
                                        <label for="floatingPassword">Document Course</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Course Code" name="crsCode" required>
                                        <label for="floatingInput">Course Code</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Document Tittle" name="docTitle" required>
                                        <label for="floatingInput">Document Tittle</label>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="number" maxlength="500" max="500" class="form-control" id="floatingInput" placeholder="Tsh500" name="docPrice" disabled>
                                        <label for="floatingInput">Tsh500</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group  m-3">
                                        <!-- <label for="docPath">Select Document</label> -->
                                        <input type="file" class="form-control" name="docPath" accept=".pdf" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="docDesc" rows="8" class="form-control" placeholder="Describle your document shot and clear" required></textarea>
                                        <!-- <label for="floatingPassword">Password</label> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-3">
                                        <button class="btn btn-primary w-100" name="submit">
                                            Send Document
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>



        <!-- </span> -->
    </div>



    <!-- ============================> Model for all students Documents
 -->
    <div class="modal fade" id="studDocs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $user; ?> Documents</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $testDoc = $conn->prepare("SELECT * FROM `courses`,`users`,`students`,`documents`WHERE students.userID = users.userID 
                        AND documents.studID =  students.studID  AND documents.docID = courses.docID AND users.userID = :userID");
                        $testDoc->execute(array(":userID" => $user_id));
                        $documents = $testDoc->fetchAll();

                        foreach ($documents as $document) {
                        ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-2 mt-2">
                                        <div class="d-flex justify-content-center align-content-center">
                                            <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" style="font-size: 50px;"></i>
                                            <!-- <i class="fa-regular fa-file-pdf mt-4 text-danger"></i> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-10">
                                        <div class="text-start">
                                            <h6 class="fw-bolder"><?php echo $document['crsCode'] . " - " . $document['crsName']; ?></h6>
                                            <span style="color: var(--color2);">About : </span><?php echo $document['docTittle']; ?> <br>
                                            <span style="color: var(--color2);">Aunthor : </span><?php echo $document['studName']; ?>
                                            <div class="d-flex flex-row justify-content-between mt-1">
                                                <a href="../handles/openFile.php?file=<?php echo $document['docPath']; ?>" class="text-success fw-bolder" target="_blank"> Read</a>
                                                <a href="../handles/deleteDocument.php?id=<?php echo $document['docID']; ?>" class="text-danger fw-bolder">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------ -->



    <!-- ============================> Model for all students Documents
 -->
    <div class="modal fade" id="QuestionsM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $user; ?> Questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <?php
                        $stmt2 = $conn->prepare("SELECT * FROM questions,users WHERE questions.userID = users.userID AND users.userID = $globalID");
                        $stmt2->execute();
                        
                        $questions = $stmt2->fetchAll();

                        foreach ($questions as $question) {
                        ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- ----------------------------------------------------------------------------------------- -->
                                    <div class="bg-white p-3 mt-2 text-start">
                                        <span class="clr2 fw-bolder">Questioner: </span><?php echo $question['userName']; ?> <br>
                                        <span><span class="clr1 fw-bolder">Question:</span>
                                            <?php echo $question['questBdy']; ?>.
                                        </span><br>
                                        <span class="text-success fw-lighter">sent at:
                                            <?php $date = date_format(date_create($question['time']), " l, d F, Y H:i:s");
                                            echo  $date; ?>
                                        </span> <br>
                                        <a href="../handles/deleteQuest.php?id=<?php echo $question['questID']; ?>" class="btn btn-danger m-2">
                                            Delete
                                        </a>

                                    </div>
                                    <!-- ---------------------------------------------------------------------------------------------- -->
                                </div>
                            </div>
                            <hr>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------ -->






    
    <!-- ============================> Model for all students Documents
 -->
 <div class="modal fade" id="AnswersM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $user; ?> Answers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <?php
                        $stmt2 = $conn->prepare("SELECT * FROM answers,users WHERE answers.userID = users.userID AND users.userID = $globalID");
                        $stmt2->execute();
                        
                        $questions = $stmt2->fetchAll();

                        foreach ($questions as $question) {
                        ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- ----------------------------------------------------------------------------------------- -->
                                    <div class="bg-white p-3 mt-2 text-start">
                                        <span class="clr2 fw-bolder">Questioner: </span><?php echo $question['userName']; ?> <br>
                                        <span><span class="clr1 fw-bolder">Question:</span>
                                            <?php echo $question['aswBdy']; ?>.
                                        </span><br>
                                        <span class="text-success fw-lighter">sent at:
                                            <?php $date = date_format(date_create($question['time']), " l, d F, Y H:i:s");
                                            echo  $date; ?>
                                        </span> <br>
                                        <a href="../handles/deleteAnswer.php?id=<?php echo $question['aswID']; ?>" class="btn btn-danger m-2">
                                            Delete
                                        </a>

                                    </div>
                                    <!-- ---------------------------------------------------------------------------------------------- -->
                                </div>
                            </div>
                            <hr>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------ -->




    <!-- ============================> Model for all students Documents
 -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------ -->


    <!-- ========================================== This is For Teacher =======================================  -->

<?php
} elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
    $user = $_SESSION['userName'];
    $role = $_SESSION['role'];
?>
    <div class="for-bg w-100 pb-5">
        <?php
        include_once '../elements/profile.php';
        ?>
        <div class="container text-center">

            <?php
            include_once('../elements/header.php');
            include_once('../elements/introCards.php');
            ?>

            <div id="content1" class="content">
                <div class="row mt-4">
                    <?php
                    require_once('../elements/allDocs.php');
                    ?>

                </div>
            </div>

            <div id="content2" class="content">
                <div class="row mt-4">
                    <?php
                    require_once('../elements/allQuest.php');
                    ?>

                </div>
            </div>

            <div id="content3" class="content">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        require_once('../elements/students.php');
                        // require_once('../elements/allQuest.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <span class="addNew bg1 p-3 text-center shadow"> -->
        <!-- <button type="button" class="btn btn-expand bg1">
            <i class="bi bi-plus"></i>
            <span class="text">Upload Document</span>
        </button> -->

        <!-- </span> -->
    </div>
<?php
} elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $user = $_SESSION['userName'];
    $role = $_SESSION['role'];


?>

    <div class="for-bg w-100 pb-5">
        <?php
        include_once '../elements/profile.php';
        ?>
        <div class="container text-center">

            <?php
            include_once('../elements/header.php');
            include_once('../elements/introCards.php');
            ?>

            <div id="content1" class="content">
                <div class="row mt-4">
                   
               
                        <?php
                        $testDoc = $conn->prepare("SELECT * FROM `courses`,`users`,`students`,`documents`WHERE students.userID = users.userID 
                        AND documents.studID =  students.studID  AND documents.docID = courses.docID");
                        $testDoc->execute();
                        $documents = $testDoc->fetchAll();

                        foreach ($documents as $document) {
                        ?>
                            <div class="col-md-4">
                                <div class="row m-2 p-2 bg-white rounded-3">
                                    <div class="col-lg-2 col-md-2 col-2 mt-2">
                                        <div class="d-flex justify-content-center align-content-center">
                                            <i class="fa fa-file-pdf-o fa-3x text-danger" aria-hidden="true" style="font-size: 50px;"></i>
                                            <!-- <i class="fa-regular fa-file-pdf mt-4 text-danger"></i> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-10">
                                        <div class="text-start">
                                            <h6 class="fw-bolder"><?php echo $document['crsCode'] . " - " . $document['crsName']; ?></h6>
                                            <span style="color: var(--color2);">About : </span><?php echo $document['docTittle']; ?> <br>
                                            <span style="color: var(--color2);">Aunthor : </span><?php echo $document['studName']; ?>
                                            <div class="d-flex flex-row justify-content-between mt-1">
                                                <a href="../handles/openFile.php?file=<?php echo $document['docPath']; ?>" class="text-success fw-bolder" target="_blank"> Read</a>
                                                <a href="../handles/deleteDocument.php?id=<?php echo $document['docID']; ?>" class="text-danger fw-bolder">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                   

                </div>
            </div>

            <div id="content2" class="content">
                <div class="row mt-4">
                    <?php
                    require_once('../elements/teachers.php');

                    ?>

                </div>
            </div>

            <div id="content3" class="content">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        require_once('../elements/students.php');
                        // require_once('../elements/allQuest.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addTeacher" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">New Teacher</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../handles/newTeacher.php" class="form" method="post" onsubmit="validate()">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-floating  m-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Document Course" name="fname" required>
                                        <label for="floatingPassword">Full name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Course Code" name="uname" required>
                                        <label for="floatingInput">userName</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Document Tittle" name="email" required>
                                        <label for="floatingInput">Email</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating  m-3">
                                        <input type="tel" class="form-control" id="floatingInput" placeholder="Document Tittle" name="phone" required>
                                        <label for="floatingInput">Phone Number</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating  m-3">
                                        <select class="form-control" id="floatingInput" placeholder="Document Tittle" name="crs" required>
                                            <option value="">--- select Course ---</option>
                                            <?php
                                            $course = $conn->prepare("SELECT * FROM `courses`");
                                            $course->execute();
                                            $all = $course->fetchAll();

                                            foreach ($all as $one) {
                                            ?>
                                                <option value="<?php echo $one['crsCode']; ?>"><?php echo $one['crsCode']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <!-- <label for="floatingInput">Course</label> -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating  m-3">
                                        <input type="password" class="form-control pass1" id="floatingInput" placeholder="Document Tittle" name="pass1" required>
                                        <label for="floatingInput">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-floating  m-3">
                                        <input type="password" class="form-control pass2" id="floatingInput" placeholder="Document Tittle" name="pass2" required>
                                        <label for="floatingInput">Confirm Password</label>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group bg3 p-2 text-center rounded-3" id="passError" style="display: none;">
                                        <p class="text-danger">Please math the passwords</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary w-100" name="submit">
                                            <i class="fa fa-registered" aria-hidden="true"></i> Register
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>




        <!-- </span> -->
    </div>
<?php
} else {

    // echo "Session problem";

    header("location:../index.php");
}

require_once('../elements/buttom.php');
?>