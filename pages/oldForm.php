<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <div class="vh-100 d-flex justify-content-center align-items-center bg1">
    <div class="regForm">
      <div class="card shadow p-1">
        <div class="card-header bg2 text-center text-uppercase text-white">
          <strong>Sign up</strong>
        </div>
        <div class="card-body">
          <form action="../handles/newStud.php" method="post" onsubmit="validate()">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group m-4">
                  <input type="text" placeholder="Full Name" name="name" required />
                </div>

                <div class="form-group m-4">
                  <input type="text" placeholder="User Name" name="user" required />
                </div>

                <div class="form-group m-4">
                  <input type="email" placeholder="Email" name="mail" required />
                </div>

                <div class="form-group m-4">
                  <input type="password" placeholder="Enter Password" name="fPass" required />
                </div>


              </div>

              <div class="col-md-6">
                <div class="form-group m-4">
                  <input type="tel" placeholder="Phone" name="phone" required />
                </div>
                <div class="form-group m-4">
                  <input type="text" placeholder="Reg No" name="regNo" required />
                </div>
                <div class="form-group m-4">
                  <input type="number" placeholder="Account No" name="accnt" required />
                </div>

                <div class="form-group m-4">
                  <input type="password" placeholder="Re-enter Password" name="sPass" required />
                </div>


              </div>
              <div class="col-md-12">
                <div class="form-group bg3 p-2 text-center rounded-3" id="passError" style="display: none;">
                  <p class="text-danger">Please math the passwords</p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group m-4">
                    <button class="btn btn-success w-100" name="submit">Register</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group m-2">
                    <a href="../index.php" class="-w100" name="clear">I have an Account</a>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>