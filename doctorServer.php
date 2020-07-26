<?php
session_start();

// initializing variables

$mail = "";
$nom = "";
$prenom = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'benis');
// REGISTER USER
if (isset($_POST['reg_doctor'])) {
    // receive all input values from the form
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($mail)) { array_push($errors, "mail is required"); }
    if (empty($prenom)) { array_push($errors, "prenom is required"); }
    if (empty($nom)) { array_push($errors, "nom is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same mail and/or email
    $user_check_query = "SELECT * FROM doctors WHERE mail='$mail' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['mail'] === $mail) {
            array_push($errors, "mail already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO doctors (mail, prenom, nom, password) 
  			  VALUES('$mail', '$prenom','$nom', '$password')";
        mysqli_query($db, $query);
        header('location: doctorIndex.php');
    }
}


// LOGIN USER
if (isset($_POST['login_doc'])) {
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($mail)) {
        array_push($errors, "mail is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM doctors WHERE mail='$mail' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['mail'] = $mail;
            $_SESSION['success'] = "You are now logged in";
            header('location: doctorIndex.php');
        }else {
            array_push($errors, "Wrong mail/password combination");
        }
    }
}


