<?php
session_start();

// initializing variables
$username = "";
$mail    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'web2');


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($mail)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM authentication WHERE username='$username' OR mail='$mail' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['mail'] === $mail) {
            array_push($errors, "mail already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = hash('sha256',$password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO authentication (username, mail, password, isAdmin, isDoctor) 
  			  VALUES('$username', '$mail', '$password', 0 , 0)";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $passwordD = hash('sha256',$password);
        $query = "SELECT * FROM authentication WHERE username='$username' AND password='$passwordD'";
        $wtf = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($wtf);
        if ($username == $row["username"] && $passwordD ==$row["password"]) {
            $_SESSION['username'] = $username;
            if($row["isAdmin"]=="1") {
                $_SESSION['admin'] == 1;
            } else {
                $_SESSION['admin'] == 0;
            }
            if($row["isDoctor"]=="1") {
                $_SESSION['doctor'] == 1;
            }else {
                $_SESSION['doctor'] == 0;
            }
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
