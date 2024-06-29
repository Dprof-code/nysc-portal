<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "nyscDB");

global $db;

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_GET['logout'])) {
    session_destroy();
    header('location: login.php');
    exit;
}

if (!isset($_SESSION["userid"])) {
    $_SESSION["userid"] = rand();
}

$userid = $_SESSION["userid"];


if (isset($_GET['delete'])) {

    $sn = $_GET["delete"];

    $sql =  $db->query("DELETE FROM corper WHERE `corper`.`sn` = '$sn'");

    if ($sql) {
        Alert('Deleted Successfully');
    } else {
        Alert('Error Deleting', 0);
    }
}

// Alert Function

function Alert($note, $x = 1)
{
    echo $x == 1 ? '<div class="alert alert-success" role="alert">
  ' . $note . '!
</div>' : '<div class="alert alert-danger" role="alert">
  ' . $note . '!
</div>';
    return;
}

function status($status)
{
    $rem = "";
    if ($status == 0) {
        $rem = 'Not Posted Yet';
    } else {
        $rem = 'Posted';
    }

    echo "$rem";
}


// NYSC Class

class NYSC
{
    function __construct()
    {
        if (array_key_exists("RegisterCorpMember", $_POST)) {
            $this->RegisterCorpMember();
        }
        if (array_key_exists('UserLogin', $_POST)) {
            $this->UserLogin();
        }
        if (array_key_exists("PostCorp", $_POST)) {
            $this->PostCorp();
        }
    }

    function RegisterCorpMember()
    {
        global $db, $userid;
        extract($_POST);

        $sql =  $db->query("INSERT INTO corper (surname,othernames,school,faculty,dept,corperid) VALUES ('$surname','$othernames','$school','$faculty', '$dept', '$userid')");

        if ($sql) {
            Alert('Successfully Added to Database');
            unset($_SESSION['userid']);
            $userid = '';
        } else {
            Alert('Error Submitting data', 0);
        }
    }

    function PostCorp()
    {
        global $db, $userid;
        extract($_POST);

        $sql =  $db->query("UPDATE `corper` SET `state` = '$state', `place` = '$place', `status` = '1' WHERE `sn`='$sn'");

        if ($sql) {
            Alert('Successfully Posted');
            unset($_SESSION['userid']);
            $userid = '';
        } else {
            Alert('Error Posting', 0);
        }
    }


    function UserLogin()
    {
        global $db;
        //extract($_POST);
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = $db->query("SELECT * FROM users WHERE gmail='$email' AND password='$password' ");
        if (mysqli_num_rows($sql) == 1) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['user'] = $row['sn'];
            header('location: index.php');
            exit;
        } else {
            Alert('Error Submitting data', 0);
        }

        return;
    }
}

$nysc = new NYSC;

//$salesid = $_SESSION['salesid']??'';
