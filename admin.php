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

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Static/css/cover.css" rel="stylesheet">

</head>

<body class="text-center">

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
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
        <?php
        $user_display = "SELECT * FROM authentication;";
        $result = mysqli_query($db, $user_display);
        while ($user = mysqli_fetch_assoc($result)) {
            echo 'ID User : ' .  $user['id_auth'] . 'username : ' . $user['username'] . ' mail ' . $user['mail'] . ' Admin : ' . $user['isAdmin'] . ' Doctor : ' . $user['isDoctor'];
            echo '<br>';
        }
        echo '<br>';
        $patient_display = "SELECT * FROM patient_medical_record INNER JOIN social_details ON patient_medical_record.id_socdet = social_details.id_socdet;";
        $result = mysqli_query($db, $patient_display);
        while ($patient = mysqli_fetch_assoc($result)) {
            echo 'First Name : ' . $patient['firstname'] . ' last name ' . $patient['lastname'] . ' Social Secruity Number : ' . $patient['socialsecuritynumber'] . ' user ID : ' . $patient['id_auth'];
            echo '<br>';
        }
        echo '<br>';
        $doctor_display = "SELECT * FROM doctor INNER JOIN social_details ON doctor.id_socdet = social_details.id_socdet;";
        $result = mysqli_query($db, $doctor_display);
        while ($doctor = mysqli_fetch_assoc($result)) {
            echo 'First name : ' . $doctor['firstname'] . ' Last name ' . $doctor['lastname'] . ' RPPS : ' . $doctor['rpps'] . ' user IR : ' . $doctor['id_auth'];
            echo '<br>';
        }
        ?>
    </main>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>