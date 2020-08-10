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
        $b = mysqli_error($db);
        echo $b;
        
    }

}

//deleteUser clicked
if (isset($_POST['deleteUser'])) {
    $idAuth = mysqli_real_escape_string($db, $_POST['idAuth']);

    if (empty($idAuth)) { array_push($errors, "idAuth is required"); }

    if (count($errors) == 0) {
        $query = "DELETE FROM authentication WHERE id_auth=$idAuth";
        mysqli_query($db, $query);
        $b = mysqli_error($db);
        echo $b;
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

    if (count($errors) == 0) {
        $query = "UPDATE patient_medical_record SET id_auth='$id_auth'  WHERE socialsecuritynumber='$socialsecuritynumber'";
        mysqli_query($db, $query);
        $query2 = "SELECT id_medrec FROM patient_medical_record WHERE socialsecuritynumber='$socialsecuritynumber'";
        $res = mysqli_query($db, $query2);
        $num = mysqli_fetch_assoc($res);
        $medrec = $num['id_medrec'];
        $query3 = "UPDATE social_details SET firstname ='$firstname', lastname = '$lastname' WHERE id_medrec = '$medrec'";
        mysqli_query($db, $query3);
        $b = mysqli_error($db);
        echo $b;
    }

}

//deletePatient clicked
if (isset($_POST['deletePatient'])) {
    $socialsecuritynumber = mysqli_real_escape_string($db, $_POST['socialsecuritynumber']);

    if (empty($socialsecuritynumber)) { array_push($errors, "socialsecuritynumber is required"); }

    if (count($errors) == 0) {
        $query = "DELETE FROM patient_medical_record WHERE socialsecuritynumber=$socialsecuritynumber";
        mysqli_query($db, $query);
        $b = mysqli_error($db);
        echo $b;
    }
}

//modifyDoctor clicked
if (isset($_POST['modifyDoctor'])) {
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $rpps = mysqli_real_escape_string($db, $_POST['rpps']);
    $id_auth = mysqli_real_escape_string($db, $_POST['id_auth']);

    if (empty($firstname)) { array_push($errors, "firstname is required"); }
    if (empty($lastname)) { array_push($errors, "lastname is required"); }
    if (empty($rpps)) { array_push($errors, "rpps is required"); }

    if (count($errors) == 0) {
        $query = "UPDATE doctor SET id_auth='$id_auth' WHERE rpps='$rpps'";
        mysqli_query($db, $query);
        $query2 = "SELECT id_doc FROM doctor WHERE rpps='$rpps'";
        $res = mysqli_query($db, $query2);
        $num = mysqli_fetch_assoc($res);
        $id_doc = $num['id_doc'];
        $query3 = "UPDATE social_details SET firstname ='$firstname', lastname = '$lastname' WHERE id_doc = '$id_doc'";
        mysqli_query($db, $query3);
        $b = mysqli_error($db);
        echo $b;
    }

}

//deleteDoctor clicked
if (isset($_POST['deleteDoctor'])) {
    $rpps = mysqli_real_escape_string($db, $_POST['rpps']);

    if (empty($rpps)) { array_push($errors, "rpps is required"); }

    if (count($errors) == 0) {
        $query = "DELETE FROM doctor WHERE rpps=$rpps";
        mysqli_query($db, $query);
        $b = mysqli_error($db);
        echo $b;
    }
}
header('location: admin.php');
?>