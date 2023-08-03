<div class="row mt-5 vh-100">
    <div class="col-md-8">

        <?php
        require_once("../handles/connection.php");
        $stmt = $conn->prepare("SELECT * FROM `questions`,`users` WHERE `questions`.`userID` = `users`.`userID` ORDER BY questID DESC");
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            
            while ($res = $stmt->fetch()) {
                $i = time();
        ?>


                <!-- ----------------------------------------------------------------------------------------- -->
                <div class="questSect p-2 text-dark text-start Questborder bg3 mb-1">
                    <span class="d-flex flex-row">
                        <img src="../assets/imgs/userProff.png" width="30px" alt="profile" class="profile rounded-circle m-1" />
                        <span class="clr1 m-1">
                            <?php
                            $date = date_format(date_create($res['time']), " l, d F, Y H:i:s");
                            echo $res['userName'] . " at : " . $date;
                            ?>
                        </span>
                    </span>

                    <div class="quest-body m-2 p-3 rounded-3" style="background-color: #f7f7f7;">
                        <?php echo $res['questBdy']; ?>
                    </div>
                    <span>
                        <a href="#" class="clr1 tablinks2" onclick="openTab2(event, 'answerForm<?php echo $i; ?>')"><i class="fa fa-send fa-xl clr1 m-2"></i>Answer</a>
                        <a href="#" class="clr1 p-3 tablinks" onclick="openTab(event, 'Answercontent<?php echo $i; ?>')">
                            <i class="fa-solid fa-eye clr1 m-2 "></i>View Answers
                        </a>
                    </span>

                </div>


                <!-- ----- Asking question field ------ -->
                <div class="position-fixed bottom-0 start-50 translate-middle-x tabcontent2" id="answerForm<?php echo $i; ?>" style="width: 100%; max-width: 500px; display: none;">
                    <form method="post" action="../handles/answr.php">
                        <div class="input-group bg1 rounded-3 p-4 mb-2 shadow">
                            <input type="text" name="answr" class="form-control" placeholder="Answer <?php echo $res['userName'] ?> Question" aria-label="Input field" required>
                            <input type="text" hidden name="questID" value="<?php echo $res['questID']; ?>">
                            <input type="submit" class="btn btn-primary" name="submit" value="Answer">
                        </div>
                    </form>
                </div>

                <!-- <script>
                    const askButton = document.getElementById('askButton');
                    const questField = document.getElementById('questField');

                    askButton.addEventListener('click', function() {
                        if (questField.style.display === 'none') {
                            questField.style.display = 'block';
                        } else {
                            questField.style.display = 'none';
                        }
                    });
                </script> -->

                <!-- ---------------------------------------------------------------------------------------------- -->

                <?php

                $stmt1 = $conn->prepare("SELECT * FROM `answers`,`questions`,`users` 
                WHERE `answers`.`userID` = `users`.`userID` AND answers.questID = questions.questID AND questions.questID = :qstID");
                $stmt1->execute(array("qstID" => $res['questID']));

                if ($stmt1->rowCount() >= 1) {
                    while ($rest = $stmt1->fetch()) {
                ?>

                        <div class="row mb-4">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <div class="questSect p-2 text-dark text-start Answerborder tabcontent" id="Answercontent<?php echo $i; ?>" style="display: none;">
                                    <span class="d-flex flex-row">
                                        <img src="../assets/imgs/userProff.png" width="30px" alt="profile" class="profile rounded-circle m-1" />
                                        <span class="clr2 m-1">
                                            <?php
                                            $date = date_format(date_create($rest['time']), " l, d F, Y H:i:s");
                                            echo $rest['userName'] . " at : " . $date;
                                            ?>
                                        </span>
                                    </span>

                                    <div class="quest-body m-2 p-3 bg-white rounded-3" style="background-color: #f7f7f7;">
                                        <?php echo $rest['aswBdy']; ?>
                                    </div>

                                </div>


                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>

                    <div class="row mb-4">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <div class="questSect p-2 text-dark text-start Answerborder" id="Answercontent<?php echo $i; ?>" style="display: none;">
                                <div class="quest-body m-2 p-3 text-danger rounded-3">
                                    Ooops! There is no Answer for this qustion yet
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
        } else {
            ?>
            <!-- <div class="col-md-6 col-12 p-2"> -->
            <div class="quest-card">
                <div class="docs bg-white p-3 mt-2 text-start">
                    <div class="d-flex justify-content-center align-content-center  text-danger">
                        <strong>Ooops!! <br> There is no Question Asked </strong>
                    </div>
                </div>
            </div>
            <!-- </div> -->


        <?php
        }
        ?>


    </div>



    <div class="col-md-4">
    Easly connect with resources you need to solve your hardest
    questions and gives you notes summarys and score marks on your exams.
    </div>






</div>