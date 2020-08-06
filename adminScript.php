<?php
session_start();
include('connect.php');
$db = connectDb();

$errors = array();

//modifyUser clicked
if (isset($_POST['modifyUser'])) {
    $idAuth = mysqli_real_escape_string($db, $_POST['idAuth']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['mail']);
    $isAdmin = mysqli_real_escape_string($db, $_POST['isAdmin']);
    $isDoctor = mysqli_real_escape_string($db, $_POST['isDoctor']);

    if (empty($idAuth)) { array_push($errors, "idAuth is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "email is required"); }

    $user_check_query = "SELECT * FROM authentication WHERE username='$username' OR mail='$email'";
    $result = mysqli_query($db, $user_check_query);

    while ($user = mysqli_fetch_assoc($result)) { // if user exists
        if (($user['username'] === $username) && ($user['id_auth'] != $idAuth)) {
            array_push($errors, "Username already exists");
        }

        if (($user['mail'] === $email) && ($user['id_auth'] != $idAuth)) {
            array_push($errors, "mail already exists");
        }
    }
    if (count($errors) == 0) {
        $query = "UPDATE authentication SET mail='$email', username='$username', isAdmin=$isAdmin, isDoctor=$isDoctor WHERE id_auth=$idAuth";
        mysqli_query($db, $query);
        
    }

}

//deleteUser clicked
if (isset($_POST['deleteUser'])) {
    $idAuth = mysqli_real_escape_string($db, $_POST['idAuth']);

    if (empty($idAuth)) { array_push($errors, "idAuth is required"); }

    if (count($errors) == 0) {
        $query = "DELETE FROM authentication WHERE id_auth=$idAuth";
        mysqli_query($db, $query);
    }
}

//modifyPatient clicked
if (isset($_POST['modifyPatient'])) {
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $socialsecuritynumber = mysqli_real_escape_string($db, $_POST['socialsecuritynumber']);
    $id_auth = mysqli_real_escape_string($db, $_POST['id_auth']);

    if (empty($firstname)) { array_push($errors, "firstname is required"); }
    if (empty($lastname)) { array_push($errors, "lastname is required"); }
    if (empty($socialsecuritynumber)) { array_push($errors, "socialsecuritynumber is required"); }

    $user_check_query = "SELECT * FROM FROM patient_medical_record INNER JOIN social_details ON patient_medical_record.id_socdet = social_details.id_socdet WHERE socialsecuritynumber='$socialsecuritynumber' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

    while ($user = mysqli_fetch_assoc($result)) { // if user exists
        if ($user['socialsecuritynumber'] === $socialsecuritynumber) {
            array_push($errors, "socialsecuritynumber already exists");
        }
    }
    if (count($errors) == 0) {
        $query = "UPDATE patient_medical_record SET socialsecuritynumber='$socialsecuritynumber', username='$username', isAdmin=$isAdmin, isDoctor=$isDoctor WHERE id_auth=$idAuth";
        mysqli_query($db, $query);
        
    }

}

//deleteUser clicked
if (isset($_POST['deleteUser'])) {
    $idAuth = mysqli_real_escape_string($db, $_POST['idAuth']);

    if (empty($idAuth)) { array_push($errors, "idAuth is required"); }

    if (count($errors) == 0) {
        $query = "DELETE FROM authentication WHERE id_auth=$idAuth";
        mysqli_query($db, $query);
    }
}

header('location: admin.php');
?>