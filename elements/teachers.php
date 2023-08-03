<div class="container">
<?php
// require_once('../handles/connection.php');

$stmt = $conn->prepare("SELECT * FROM `teachers`, `users` WHERE users.userID = teachers.userID");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="tittle mt-5">
    <div class="display-3 fs-4">
        List of all Teachers work in this System
    </div>
</div>
<div class="table-responsive mt-5">
    <table class="table table-hover">
        <thead>
            <tr class="clr1">
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Course</th>
                <th scope="col">Phone No</th>
                <th scope="col">Email</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($results as $result) {
                $no++;
            ?>
                <tr>
                    <th scope="row" class="clr2"><?php echo $no; ?></th>
                    <td><?php echo $result['techrName']; ?></td>
                    <td><?php echo $result['userName']; ?></td>
                    <td><?php echo $result['techrCourse']; ?></td>
                    <td><?php echo $result['teachrPhone']; ?></td>
                    <td><?php echo $result['userMail']; ?></td>
                    <td>
                        <a href="../handles/deleteUser.php?id=<?php echo $result['userID']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $result['techrName']; ?>')" class="btn btn-danger">Delete</a>
                    </td>


                </tr>
            <?php

            }
            ?>

        </tbody>
    </table>
</div>

<button type="button" class="btn btn-expand bg1" data-bs-toggle="modal" data-bs-target="#addTeacher">
    <i class="fa fa-plus"></i>
    <span class="text"> <strong>+</strong> Add Teacher</span>
</button>
</div>