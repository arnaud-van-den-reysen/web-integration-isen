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
    <style>
    details {
        margin-right: 15px;
        margin-bottom: 15px;
    }
    details > summary {
        padding: 4px;
        border: none;
        cursor: pointer;
        padding-right: 10px;
        padding-left: 10px;
        list-style-type: none;
    }

    details > p {
        padding: 4px;
        margin: 0;
    }
    .title_doctor {
        font-size: 40px;
        text-align: left;
        padding-left: 20px;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        overflow: auto;
        position: relative;
    }
    .une_belle_boite {
        border-right-style: solid;
        border-right-width: 5px;
        border-color: white;
        background-image: linear-gradient(to right,#333,#000);
    }

    .informations {
        text-align: left;
    }

    details[open] summary ~ * {
        animation: sweep .5s ease-in-out;
    }

    @keyframes sweep {
        0%    {opacity: 0; margin-left: -10px}
        100%  {opacity: 1; margin-left: 0px}
    }
    </style>

</head>

<body class="text-center">

<div class="d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Smart-Medical-Assistant</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="index.php">Home</a>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                        <a class="nav-link" href="admin.php"> Admin</a>
                    <?php endif ?>
                    <?php if(isset($_SESSION['doctor']) && $_SESSION['doctor'] == 1) : ?>
                        <a class="nav-link active" href="doctor.php"> Doctor</a>
                    <?php endif ?>
                    <a class="nav-link" href="index.php?logout='1'">logout</a>
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
        echo '<details>';
        echo '<summary class="title_doctor"> Docteur ' . $user['firstname'] . ' ' . $user['lastname'] . '</summary>';
        echo '<p> ID : ' . $user['id_auth'] . ' RPPS : ' . $user['rpps'] . '</p>';
        echo '</details>';
        

        $query = "SELECT socialsecuritynumber FROM patient_medical_record ORDER BY ASC";
        $result = mysqli_query($db, $query);
        echo '<form action = "doctorScript.php" method="POST" name="creaAppointment"><label for="date_appoi">Appointment Date :</label> <input type="date" id="date_appoi"><label for="hour_appoi">Appointment Hour :</label><input type="time" id="hour_appoi" name="appt"><label for="socialsecuritynumber"> socialsecuritynumber:</label><select id="socialsecuritynumber" name="socialsecuritynumber">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'. $row['socialsecuritynumber'].'">'.$row['socialsecuritynumber'].'</option>';
        }
        echo '</select> <input type="submit" name="createAppointment" value="create"></form>';

        $id_doct = $user['id_doc'];
        $appointment_display = "SELECT * FROM (((appointment INNER JOIN patient_medical_record ON appointment.id_medrec = patient_medical_record.id_medrec) INNER JOIN social_details ON social_details.id_socdet = patient_medical_record.id_socdet) INNER JOIN gps_coordinates ON appointment.id_gpsc = gps_coordinates.id_gpsc) INNER JOIN address ON address.id_addr = appointment.id_addr WHERE appointment.id_doc = '$id_doct' ORDER BY appointment.date_appoi";
        $appointment_res = mysqli_query($db, $appointment_display);
        echo '<div class="container">';
        while ($row = mysqli_fetch_assoc($appointment_res)) {
            echo '<details>';
            echo '<summary class="une_belle_boite"><form action="doctorScript.php" method="POST" name="formAppointment">' . $row['date_appoi'] . '</summary>';
            echo '<p class="informations">Appointment date : ' . $row['date_appoi'] . '<input type="hidden" name="date_appoi" value = "' . $row["date_appoi"] . '">  Appointment Hour : ' . $row['hours_appoi'] . '<input type="hidden" name="hour_appoi" value = "' . $row["hours_appoi"] . '"> Appointment Address :'. $row['number']. ' '. $row['street']. ' '. $row['zipcode'] . ' Patient first name : ' . $row['firstname'] . ' Patient last name : ' . $row['lastname'] . '<input type="hidden" name="socialsecuritynumber" value = "' . $row["socialsecuritynumber"] . '"> Patient Social Security Number : ' . $row['socialsecuritynumber'];
            echo ' GPS Coordinates  Longitude : ' . $row['longitude'] . ' Latitude : ' . $row['latitude'] . '</p>';
            echo '<input type="submit" name="deleteAppointment" value="Delete"></form></details>';
        }
        echo '</div>';
       ?>


    </main>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Smart-Medical-Assistant</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>