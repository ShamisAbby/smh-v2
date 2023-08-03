<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap.css" /> -->
  <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="./test.css" />
  <link rel="stylesheet" href="../assets/css/font.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" /> -->
</head>

<body>
  <div class="main-content">
    <div class="form-content d-flex flex-row">
      <div class="left-content">
        <a href="#" id="tab-1" onclick="form_1()">
          <div class="tab-1">
            <h4>Personal Information</h4>
          </div>
        </a>

        <a href="#" onclick="form_2()">
          <div class="tab-2">
            <h4>Educational Information</h4>
          </div>
        </a>

        <a href="#" onclick="form_3()">
          <div class="tab-3">
            <h4>Financial Information</h4>
          </div>
        </a>

        <a href="../index.php">
          <div class="tab-4">
            <h4>I have an Account</h4>
          </div>
        </a>

        <div class="scrollable-container">
          <div class="scrollable-content">
            <p class="alert" role="alert" id="error1" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error2" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error3" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error4" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error5" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error6" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error7" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error8" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error9" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error10" style="display: none;">
            </p>
            <p class="alert" role="alert" id="error11" style="display: none;">
            </p>

            <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == 'user') {
            ?>
                <p class="alert" role="alert" id="error9">
                  Ooops! username exist
                </p>
              <?php
              } else {
              ?>
                <p class="alert" role="alert" id="error9">
                  Ooops! Email Address exist
                </p>
            <?php
              }
            }
            ?>

          </div>
        </div>


      </div>

      <div class="right-content">
        <form onsubmit="return validateForm()" action="../handles/newStud.php" method="post" id="Form" class="formSelf">
          <section class="inner" id="personal">
            <div class="inner-header">
              <h3 class="heading">Peronal Infomation</h3>
              <p>
                Please enter your infomation and proceed to the next step so
                we can build your accounts.
              </p>
            </div>

            <div class="form-row names">
              <div class="form-holder">
                <fieldset>
                  <legend>Full Name</legend>
                  <input type="text" id="fullName" placeholder="Full Name" name="name" class="form-control" />
                </fieldset>
              </div>

              <div class="form-holder">
                <fieldset>
                  <legend>User Name</legend>
                  <input type="text" id="username" placeholder="User Name" name="user" />
                </fieldset>
              </div>
            </div>
            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Your Email</legend>
                  <input type="email" id="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@gmail.com" name="mail" />
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Phone Number</legend>
                  <input type="tel" id="phone" placeholder="+255 ***-***-***" name="phone" />
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Password</legend>
                  <input type="password" id="password" placeholder="Enter Password" name="fPass" />
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Confirm Password</legend>
                  <input type="password" id="confirmPassword" placeholder="Re-enter Password" name="sPass" />
                </fieldset>
              </div>
            </div>
          </section>

          <section class="inner" id="education" style="display: none">
            <div class="inner-header">
              <h3 class="heading">Educational Information</h3>
              <p>
                Please enter your infomation and proceed to the next step so
                we can build your accounts.
              </p>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Course Name</legend>
                  <input type="text" placeholder="Ex: BITAM" name="course" />
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Registretion No</legend>
                  <input type="text" placeholder="DIT/**/**/TZ" name="regNo" id="regNo" />
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Studies Year</legend>
                  <select name="year" id="year">
                    <option value="">-- Select your Year --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <!-- <option value="TTCL">5</option> -->
                  </select>
                </fieldset>
              </div>
            </div>
          </section>

          <section class="inner" id="financial" style="display: none">
            <div class="inner-header">
              <h3 class="heading">Financial Information</h3>
              <p>
                Please enter your infomation and proceed to the next step so
                we can build your accounts.
              </p>
            </div>
            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Network</legend>
                  <select name="network" id="network">
                    <option value="">-- Select Network --</option>
                    <option value="Zantel">Zantel</option>
                    <option value="Tigo">Tigo</option>
                    <option value="Airtel">Airtel</option>
                    <option value="Vodacom">Vodacom</option>
                    <option value="TTCL">TTCL</option>
                  </select>
                </fieldset>
              </div>
            </div>

            <div class="form-row">
              <div class="form-holder form-holder-2">
                <fieldset>
                  <legend>Payment Number</legend>
                  <input type="tel" placeholder="+255 ***-***-***" id="accnt" name="accnt" />
                </fieldset>
              </div>
            </div>
          </section>

          <div class="controler">
            <!-- --------------------- -->
            <a class="next" onclick="form_1()" id="prev1" style="display: none">Prev</a>

            <a class="next" onclick="form_2()" id="prev2" style="display: none">Prev</a>

            <!-- --------------------- -->
            <a class="next" onclick="form_2()" id="next1">Next</a>

            <!-- --------------------- -->
            <a class="next" onclick="form_3()" id="next2" style="display: none">Next</a>

            <!-- --------------------- -->

            <input type="submit" value="Finish" name="submit" class="next" id="next3" style="display: none">

          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./test.js"></script>
</body>

</html>