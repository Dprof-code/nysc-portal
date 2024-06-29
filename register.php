<?php
session_start();
ob_start();
include('constants.php');

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('nav.php');
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Create Corper Profile</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="">Corper Surname</label>
                                <input type="text" class="form-control" name="surname" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <label for="">Corper Other Names</label>
                                <input type="text" class="form-control" name="othernames" placeholder="Other Names">
                            </div>
                            <div class="form-group">
                                <label for="">School</label>
                                <input type="text" class="form-control" name="school" placeholder="School">
                            </div>
                            <div class="form-group">
                                <label for="">Faculty</label>
                                <input type="text" class="form-control" name="faculty" placeholder="Faculty">
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <input type="text" class="form-control" name="dept" placeholder="Department">
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <div style="float:right">
                                <button type="submit" class="btn btn-primary btn-block" name="RegisterCorpMember">Create Profile</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>