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
                        <a class="nav-link" href="admin.php"> Admin</a>
                    <?php endif ?>
                    <?php if(isset($_SESSION['doctor']) && $_SESSION['doctor'] == 1) : ?>
                        <a class="nav-link active" href="doctor.php"> Doctor</a>
                    <?php endif ?>
                <?php else :?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
       <?php
        $username = $_SESSION['username'];
         $doctor_display = "SELECT * FROM (authentication INNER JOIN doctor ON authentication.id_auth = doctor.id_auth) INNER JOIN social_details ON social_details.id_socdet = doctor.id_socdet WHERE username='$username'";
         $result = mysqli_query($db, $doctor_display);
         $user = mysqli_fetch_assoc($result);
         echo 'Id_auth :' . $user['id_auth'] . ' First name : ' . $user['firstname'] . ' Last name : ' . $user['lastname'] . ' RPPS : ' . $user['rpps'];
         echo '<br><br><br>';
         $id_doct = $user['id_doc'];
         $appointment_display = "SELECT * FROM (((appointment INNER JOIN patient_medical_record ON appointment.id_medrec = patient_medical_record.id_medrec) INNER JOIN social_details ON social_details.id_socdet = patient_medical_record.id_socdet) INNER JOIN gps_coordinates ON appointment.id_gpsc = gps_coordinates.id_gpsc) INNER JOIN address ON address.id_addr = appointment.id_addr WHERE appointment.id_doc = '$id_doct'";
         $appointment_res = mysqli_query($db, $appointment_display);
         while ($row = mysqli_fetch_assoc($appointment_res)) {
             echo '<br>';
             echo 'Appointment date : ' . $row['date_appoi'] . ' Appointment Hour : ' . $row['hours_appoi'] . ' Appointment Address :'. $row['number']. ' '. $row['street']. ' '. $row['zipcode'] . ' Patient first name : ' . $row['firstname'] . ' Patient last name : ' . $row['lastname'] . ' Patient Social Security Number : ' . $row['socialsecuritynumber'];
             echo ' GPS Coordinates  Longitude : ' . $row['longitude'] . ' Latitude : ' . $row['latitude'];
             echo '<br><br>';
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