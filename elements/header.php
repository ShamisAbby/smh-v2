<style>
  #content1 {
    display: block;
  }

  #content2 {
    display: none;
  }

  #content3 {
    display: none;
  }
</style>



<div class="container p-3">
  <div class="app-logo p-4 text-center">
    <a href="#" class="display-6 text-uppercase">
      <img class="head-logo" src="../assets/imgs/logo-2.png" alt="" />
    </a>
  </div>

  <div class="container">
    <ul class="nav nav-pills nav-fill gap-2 p-1 small bg1 rounded-5 shadow-sm" id="pillNav2" role="tablist" style="
                --bs-nav-link-color: var(--bs-white);
                --bs-nav-pills-link-active-color: var(--bs-primary);
                --bs-nav-pills-link-active-bg: var(--color2);
              ">
      <?php
      if ($_SESSION['role'] == "teacher") {


      ?>


        <li class="nav-item" role="presentation">
          <button class="nav-link active rounded-5 text-white" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true" onclick="showContent1()">
            Documents
          </button>
        </li>

        <li class="nav-item linkOption1" role="presentation">
          <button class="nav-link rounded-5 text-white button2" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent2()">
            Questions | Answers
          </button>
        </li>

        <li class="nav-item linkOption2" role="presentation">
          <button class="nav-link rounded-5 text-white button2" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent2()">
            Q and A
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5 text-white" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent3()">
            Students
          </button>
        </li>


      <?php

      } elseif ($_SESSION['role'] == "student") {



      ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link active rounded-5 text-white" id="btn1" data-bs-toggle="tab" type="button" role="tab" aria-selected="true" onclick="showContent1()">
            Home
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5 text-white" id="btn2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent2()">
            Document
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5 text-white" id="btn3" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent3()">
            Questions
          </button>
        </li>
      <?php

      } elseif ($_SESSION['role'] == "admin") {
      ?>

<li class="nav-item" role="presentation">
          <button class="nav-link active rounded-5 text-white" id="btn1" data-bs-toggle="tab" type="button" role="tab" aria-selected="true" onclick="showContent1()">
            Home
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5 text-white" id="btn2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent2()">
            Teachers
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link rounded-5 text-white" id="btn3" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" onclick="showContent3()">
            Students
          </button>
        </li>

      <?php

      }
      ?>


    </ul>
  </div>

  <!-- <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8"> -->

  <!-- </div>
                </div> -->
</div>
