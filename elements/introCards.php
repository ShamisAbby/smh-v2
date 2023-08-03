<?php
if ($_SESSION['role'] == 'teacher') {

?>
  <div class="tittle m-3">
    <h3 class="text-sm display-6 fs-4">
      Welcome Ms/Mr. <strong> <?php echo $user; ?></strong>, You can do the following in this system to help others
    </h3>
  </div>
  <div class="mt-4 myCards">

  <?php
} elseif ($_SESSION['role'] == 'student') {


  ?>
    <div class="tittle m-3">
      <h3 class="text-sm display-6 fs-3">
        Hello <strong> <?php echo $user; ?></strong>, Let's fill the gaps in your collage education
      </h3>
    </div>
    <div class="mt-4 myCards">

    <?php
  } elseif ($_SESSION['role'] == 'admin') {
    ?>

      <div class="tittle m-3">
        <h3 class="text-sm display-6 fs-3">
          Hello <strong> <?php echo $user; ?></strong>, You can do the following in this system to help others
        </h3>
      </div>
      <div class="mt-4 myCards">

      <?php
    }
      ?>





      <!-- <div class="col-md-4 col-4"> -->
      <div class="ask p-2">
        <div class="d-flex flex-row justify-content-around">
          <div class="icon">
            <i class="fa fa-file-circle-question fa-xl text-primary"></i>
          </div>
          <div class="text mx-lg-5">Ask Questions</div>
        </div>
      </div>
      <!-- </div> -->
      <!-- <div class="col-md-4 col-4"> -->
      <div class="answr p-2">
        <div class="d-flex flex-row justify-content-around">
          <div class="icon">
            <i class="fa fa-file-contract fa-xl text-success"></i>
          </div>
          <div class="text mx-lg-5">Answer Questions</div>
        </div>
      </div>
      <!-- </div> -->
      <!-- <div class="col-md-4 col-4"> -->
      <div class="doc p-2">
        <div class="d-flex flex-row justify-content-around">
          <div class="icon">
            <i class="fa-solid fa-file-pdf fa-xl text-primary"></i>
          </div>
          <div class="text mx-lg-5">Upload Documents</div>
        </div>
      </div>
      <!-- </div> -->
      </div>