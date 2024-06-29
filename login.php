<?php
session_start();
ob_start();
include('constants.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            width: 100vw;
            height: 80vh;
            position: relative;
            background: rgba(0, 200, 0, 1);
        }

        .fm-title {
            text-align: center;
            position: relative;
            z-index: 5;
        }
    </style>
</head>

<body class="text-white">
    <div class="container">

        <form method="post">
            <div class="row pt-4">

                <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <div class="fm-title">
                        <h3>NYSC PORTAL</h3>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Login</h5>
                        </div>
                        <div class="card-body">
                            <label>Email:</label>
                            <input type="text" name="email" placeholder="Enter email" class="form-control">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="UserLogin">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>