<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S-M-H</title>

  <style>
    .tabcontent{
      display:none;
    }
  </style>

</head>

<body>
  


<div class="row mt-5 vh-100">
    <div class="col-md-8">

        <?php
        require_once("../handles/connection.php");
        $stmt = $conn->prepare("SELECT * FROM `questions`,`users` WHERE `questions`.`userID` = `users`.`userID` ORDER BY questID DESC");
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            $i = 0;
            while ($res = $stmt->fetch()) {
                $i++;
        ?>


                <!-- ----------------------------------------------------------------------------------------- -->

                        <button class="tablinks" onclick="openTab(event, 'Answercontent<?php echo $i; ?>')">
                            <i class="fa-solid fa-eye text-white m-2 "></i>View Answers
                        </button>


                <!-- ---------------------------------------------------------------------------------------------- -->

                <?php

                $stmt1 = $conn->prepare("SELECT * FROM `answers`,`questions`,`users` 
                WHERE `answers`.`userID` = `users`.`userID` AND answers.questID = questions.questID AND questions.questID = :qstID");
                $stmt1->execute(array("qstID" => $res['questID']));

                if ($stmt1->rowCount() >= 1) {
                    while ($rest = $stmt1->fetch()) {
                ?>
                                <div class="tabcontent" id="Answercontent<?php echo $i;?>" >
                                        <img src="../assets/imgs/userProff.png" width="30px" alt="profile" class="profile rounded-circle m-1" />
                                            <?php
                                            $date = date_format(date_create($rest['time']), " l, d F, Y H:i:s");
                                            echo $rest['userName'] . " at : " . $date;
                                            ?>
                                        <?php echo $rest['aswBdy']; ?>

                                </div>

                    <?php
                    }
                } 
                    ?>

                    <!-- <div class="row mb-4">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <div class="questSect p-2 text-dark text-start Answerborder" id="Answercontent<?php echo $i; ?>" style="display: none;">
                                <div class="quest-body m-2 p-3 bg-danger rounded-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->

             
                <script>
                    const toggleButton = document.getElementById('toggleButton<?php echo $i; ?>');
                    const content = document.getElementById('Answercontent<?php echo $i; ?>');

                    toggleButton.addEventListener('click', function() {
                        if (content.style.display === 'none') {
                            content.style.display = 'block';
                        } else {
                            content.style.display = 'none';
                        }
                    });
                </script>

            <?php

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








</div>



  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
  }
  </script>
</body>
</html>