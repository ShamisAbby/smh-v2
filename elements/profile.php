<div class="dropdown">
    <button class="btn btn-profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../assets/imgs/userProff.png" width="30px" alt="profile" class="profile rounded-circle" />
    </button>
    <ul class="dropdown-menu">
        <?php
        if($_SESSION['role'] != "admin"){
        ?> 
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#userProfile">Profile</a></li>
        <?php
        }
        ?>
        <li><a class="dropdown-item" href="../handles/logout.php" onclick="alert('Are you sure you want to logout...?')">Logout</a></li>
        <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
    </ul>
</div>


<?php
if ($_SESSION['role'] == "student") {
    $id = $_SESSION['user_id'];
    $stmtProfile = $conn->prepare("SELECT * FROM users,students WHERE users.userID = students.userID AND users.userID = $id");
    $stmtProfile->execute();
    $userData = $stmtProfile->fetch();

?>
    <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->
    <div class="modal fade" id="userProfile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Youre login as <?php echo $_SESSION['role'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../handles/updateProfile.php" method="post" class="form" onsubmit="return profileValidation()" id="profileForm">
                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control m-2" value="<?php echo $userData['studName'] ?>" id="fullName">
                            </div>
                            <div class="group-2">
                                <label for="">Email</label>
                                <input type="text" name="mail" class="form-control m-2" value="<?php echo $userData['userMail'] ?>" id="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="goup-1 w-50">
                                <label for="">User Name</label>
                                <input type="text" name="uname" class="form-control m-2" value="<?php echo $userData['userName'] ?>" id="userName">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control m-2" value="<?php echo $userData['studPhone'] ?>" id="phone">
                            </div>
                            <div class="group-2">
                                <label for="">Acount Number</label>
                                <input type="text" name="accnt" class="form-control m-2" value="<?php echo $userData['studAccnt'] ?>" id="accountNumber">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="goup-1">
                                <select name="network" id="" class="form-control m-2" id="network">
                                    <option value="<?php echo $userData['studNet'] ?>"><?php echo $userData['studNet'] ?></option>
                                    <option value="Zantel">Zantel</option>
                                    <option value="Tigo">Tigo</option>
                                    <option value="Airtel">Airtel</option>
                                    <option value="Vodacom">Vodacom</option>
                                    <option value="TTCL">TTCL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <label for="">Registration Number</label>
                                <input type="text" name="regNo" class="form-control m-2" value="<?php echo $userData['studReg'] ?>" id="registrationNumber">
                            </div>
                            <div class="group-2">
                                <label for="">Course Name</label>
                                <input type="text" name="course" class="form-control m-2" value="<?php echo $userData['studCrs'] ?>" id="courseName">
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <input type="text" name="pass" class="form-control m-2" placeholder="Password" id="password">
                            </div>
                            <div class="group-2">
                                <input type="text" class="form-control m-2" placeholder="Confirm Password" id="confirmPassword">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between">
                            <button class="btn btn-success mt-2 w-25" type="submit" name="submit">SAVE</button>
                            <button class="btn btn-primary mt-2 w-25" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">CENCEL</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    Last Login : <?php echo $userData['lastLogin'] ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------- Modal For User Profile --------------------------------------------- -->
<?php
}elseif($_SESSION['role'] == "teacher"){

    $id = $_SESSION['user_id'];
    $stmtProfile = $conn->prepare("SELECT * FROM users,teachers WHERE users.userID = teachers.userID AND users.userID = $id");
    $stmtProfile->execute();
    $userData = $stmtProfile->fetch();

?>
    <!-- ------------------------------------- Modal For Document payment --------------------------------------------- -->
    <div class="modal fade" id="userProfile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg1 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">You login as <?php echo $_SESSION['role'] ?></h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../handles/updateProfile.php" method="post" class="form" onsubmit="return profileValidation()" id="profileForm">
                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control m-2" value="<?php echo $userData['techrName'] ?>" id="fullName">
                            </div>
                            <div class="group-2">
                                <label for="">Email</label>
                                <input type="text" name="uname" class="form-control m-2" value="<?php echo $userData['userName'] ?>" id="email">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control m-2" value="<?php echo $userData['teachrPhone'] ?>" id="phone">
                            </div>
                            <div class="group-2">
                                <label for="">Acount Number</label>
                                <input type="text" name="course" class="form-control m-2" value="<?php echo $userData['techrCourse'] ?>" id="accountNumber">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="goup-1">
                                <label for="">Email</label>
                                <input type="text" name="mail" class="form-control m-2" value="<?php echo $userData['userMail'] ?>" id="registrationNumber">
                            </div>
                        </div>

                    
                        <div class="form-group d-flex justify-content-around">
                            <div class="goup-1">
                                <input type="text" name="pass" class="form-control m-2" placeholder="Password" id="password">
                            </div>
                            <div class="group-2">
                                <input type="text" class="form-control m-2" placeholder="Confirm Password" id="confirmPassword">
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between">
                            <button class="btn btn-success mt-2 w-25" type="submit" name="submit">SAVE</button>
                            <button class="btn btn-primary mt-2 w-25" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">CENCEL</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg1 text-white">
                Last Login : <?php echo $userData['lastLogin'] ?>

                </div>
            </div>
        </div>
    </div>

<?php
}
?>


