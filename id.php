<?php
include('connect.php');
$db = connectDb();

if(isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $user_get_id = "SELECT id_auth FROM authentication WHERE username = '$user'";
    $res = mysqli_query($db, $user_get_id);
    $result = mysqli_fetch_assoc($res);
    $_SESSION["id_user"] = $result['id_auth'];
}
?>