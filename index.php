<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="vh-100 d-flex justify-content-center align-items-center bg1">
        <div class="myCard">
            <div class="card shadow">
                <div class="card-header bg2 text-white text-center text-uppercase">
                    Login
                </div>

                <div class="card-body">
                    <div class="form-logo text-center mb-3">
                        <img src="assets/imgs/logo-1.png" width="90px" alt="">
                    </div>

                   <form action="handles/login.php" method="post" class="form">
                        <div class="form-group m-4 text-center">
                            <input type="text" class="login-input" placeholder="UserName/Email" name="user" required>
                        </div>

                        <div class="form-group m-4 text-center">
                            <input type="password" class="login-input" placeholder="Password" name="pass" required>
                        </div>

                        <div class="log-link m-4 text-center">
                            <p><a href="./pages/newStud.php">I don't have an Account</a></p>
                            <p><a href="#">Forget password</a></p>
                        </div>
                        
                        <div class="form-group m-2 ">
                            <button type="submit" name="submit" class="btn-submit p-2">
                                Log-in
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_GET['error1']) && $_GET['error1'] == "true"){
    echo "<script>alert('Oops! Email or Passwords are incorrect')</script>";
}elseif(isset($_GET['error2']) && $_GET['error2'] == "true"){
    echo "<script>alert('Oops! Username or Passwords are incorrect')</script>";
}

?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>