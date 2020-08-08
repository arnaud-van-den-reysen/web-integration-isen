<?php
session_start();
include('connect.php');
$db = connectDb();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="Static/images/doctor.png"/>

    <title>Aled</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Static/css/cover.css" rel="stylesheet">
    <style>
        .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
</style>

</head>

<body class="text-center">

<div class="d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="index.php">Home</a>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
                    <a class="nav-link" href="index.php?logout='1'">logout</a>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                        <a class="nav-link active" href="admin.php"> Admin</a>
                    <?php endif ?>
                    <?php if(isset($_SESSION['doctor']) && $_SESSION['doctor'] == 1) : ?>
                        <a class="nav-link" href="doctor.php"> Doctor</a>
                    <?php endif ?>
                <?php else :?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
    <div class="container">
    <h5>Users</h5>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-light table-striped">
        <thead>
          <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Mail</th>
            <th>Admin</th>
            <th>Doctor</th>
        </tr>
        </thead>

        <tbody>
            
        <?php
        $user_display = "SELECT * FROM authentication;";
        $result = mysqli_query($db, $user_display);
        
        while ($user = mysqli_fetch_assoc($result)) {
            echo "<form action='adminScript.php' method='POST' name='formUser'> <tr><td><input disabled type='text' name='idAuth' value ='" . $user['id_auth'] . "'><input type='hidden' name='idAuth' value ='" . $user['id_auth'] . "'></td> <td><input type='text' name='username' value ='" . $user['username'] . "'>";
            echo "</td> <td><input type='text' name='mail' value = '" . $user['mail'] . "'>";
            if($user['isAdmin'] == '1') {
                echo "</td> <td><input type='hidden' name='isAdmin' value='0'><input checked type='checkbox' name='isAdmin' value='1'>";
            } else {
                echo "</td> <td><input checked type='hidden' name='isAdmin' value='0'> <input type='checkbox' name='isAdmin' value='1'>";
            }
            if($user['isDoctor'] == '1') {
                echo "</td> <td><input type='hidden' name='isDoctor' value='0'><input checked type='checkbox' name='isDoctor' value='1'>";
            } else {
                echo "</td> <td><input checked type='hidden' name='isDoctor' value='0'> <input type='checkbox' name='isDoctor' value='1'>";
            }
            echo "</td> <td><input type='submit' name='modifyUser'value='Modify'></td> <td><input type='submit'  name='deleteUser' value='Delete'></td> </tr></form>";
        }
        ?>
        </tbody>
        </table>
        </div>
        
        <h5>Patient Medical Records</h5>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-dark table-striped">

        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Social Security Number</th>
            <th>User ID</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $patient_display = "SELECT * FROM patient_medical_record INNER JOIN social_details ON patient_medical_record.id_socdet = social_details.id_socdet;";
        $result = mysqli_query($db, $patient_display);
        while ($patient = mysqli_fetch_assoc($result)) {
            echo "<form action='adminScript.php' method='POST' name='formPatient'> <tr><td><input type='text' name='firstname' value ='" . $patient['firstname'] . "'></td> <td><input type='text' name='lastname' value ='" . $patient['lastname'] . "'>";
            echo "</td> <td><input type='text' name='socialsecuritynumber' value = '" . $patient['socialsecuritynumber'] . "'></td> <td><input type='text' name='id_auth' value ='" . $patient['id_auth'] . "'";
            echo "</td> <td><input type='submit' name='modifyPatient'value='Modify'></td> <td><input type='submit'  name='deletePatient' value='Delete'></td> </tr></form>";
        }
        ?>
        </tbody>
        </table>
        </div>

        <h5>Doctors</h5>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-light table-striped">

        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>RPPS</th>
            <th>User ID</th>
        </tr>
        </thead>

        <tbody>
       <?php
        $doctor_display = "SELECT * FROM doctor INNER JOIN social_details ON doctor.id_socdet = social_details.id_socdet;";
        $result = mysqli_query($db, $doctor_display);
        while ($doctor = mysqli_fetch_assoc($result)) {
            echo "<form action='adminScript.php' method='POST' name='formDoctor'> <tr><td><input type='text' name='firstname' value ='" . $doctor['firstname'] . "'></td> <td><input type='text' name='lastname' value ='" . $doctor['lastname'] . "'>";
            echo "</td> <td><input type='text' name='rpps' value = '" . $doctor['rpps'] . "'></td> <td><input type='text' name='id_auth' value ='" . $doctor['id_auth'] . "'";
            echo "</td> <td><input type='submit' name='modifyDoctor'value='Modify'></td> <td><input type='submit'  name='deleteDoctor' value='Delete'></td> </tr></form>";
        }
        ?>
        </tbody>
        </table>
        </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>