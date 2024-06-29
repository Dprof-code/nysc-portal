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
    <title>Portal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('nav.php');
    ?>

    <div class="row">
        <div class="col-md-12 pt-4 pb-5">
            <div class="card">
                <div class="card-header">
                    <h6>Corpers</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Surname</th>
                            <th>Other Names</th>
                            <th>School</th>
                            <th>Faculty</th>
                            <th>Dept</th>
                            <th>State</th>
                            <th>Place</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        <?php $i = 1;
                        $sql = $db->query("SELECT * FROM corper");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $e = $i++ ?>
                            <tr>
                                <td><?= $e ?></td>
                                <td><?= $row['surname'] ?></td>
                                <td><?= $row['othernames'] ?></td>
                                <td><?= $row['school'] ?></td>
                                <td><?= $row['faculty'] ?></td>
                                <td><?= $row['dept'] ?></td>
                                <td><?php echo $state = ($row['status'] == 0) ? "-" : $row['state']; ?></td>
                                <td><?php echo $place = ($row['status'] == 0) ? "-" : $row['place']; ?></td>
                                <td style="
                                <?php
                                echo $color = ($row['status'] == 0) ? "color:rgb(200,0,0)" : "color:rgb(0,200,0)";
                                ?>
                                "><?= status($row['status']) ?></td>
                                <td><?= substr($row['created'], 0, 10) ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" id="postBtn" data-bs-toggle="modal" data-bs-target="#postForm" onclick="getCartInput(<?= $row['sn'] ?>)">POST</a>
                                    <a href="<?php echo "?delete=" . $row['sn'] ?>" class=" btn btn-sm btn-danger">DELETE</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="postForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Post Corp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="sn" id="post-sn">
                            <label for="">Attachment</label>
                            <input type="text" class="form-control" name="place" placeholder="Attachment">
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-2">State</label>
                            <input type="text" class="form-control" name="state" placeholder="State" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4" data-bs-dismiss="modal" name="PostCorp">Post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        console.log("loaded");

        const getCartInput = (sn) => {
            document.getElementById("post-sn").value = sn;
        }
    </script>
</body>

</html>