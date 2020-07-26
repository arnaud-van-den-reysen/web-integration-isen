<?php
include('doctorServer.php');
session_start();
if(isset($_SESSION['mail'])){
    $mail = $_SESSION['mail'];
    $doctor_get_info = "SELECT * FROM doctors WHERE mail='$mail' LIMIT 1";
    $result = mysqli_query($db, $doctor_get_info);
    $data = mysqli_fetch_assoc($result);
    $nomdoctor = $data['nom'];
    $prenomdoctor = $data['prenom'];
    $maildoctor = $data['mail'];
    $iddoctor = $data['IdDoc'];

    //get appointements and user informations informations with the current doc id
    $get_appointement = "SELECT * FROM appointement INNER JOIN patient_medical_record ON appointement.id_user=patient_medical_record.id_user
INNER JOIN social_details ON social_details.id_user=patient_medical_record.id_user INNER JOIN adress ON adress.id_addr=patient_medical_record.id_addr
WHERE appointement.id_doc='$iddoctor'";
    $result_ap = mysqli_query($db, $get_appointement);

}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['mail']);
    header("location: doctorIndex.php");
}
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

<div class="container d-flex h-100 p-3 flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled<span class="text-muted"> for doctors.</span></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="doctorIndex.php">Home</a>
                <?php  if (isset($_SESSION['mail'])) : ?>
                    <a class="nav-link" href="doctorIndex.php?logout='1'">logout</a>
                <?php else :?>
                    <a class="nav-link" href="doctorLogin.php">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

        <?php  if (isset($_SESSION['mail'])) : ?>
            <p class="text-muted">Welcome Dr <?php echo $prenomdoctor;?> <?php echo $nomdoctor;?></p>
            <h1 class="cover-heading mb-5">My appointements</h1>
        <div class="container">
            <div class="card-deck mb-3 text-center">
                <?php
                //parse the result of query to get every pre-info
                while ($row = mysqli_fetch_assoc($result_ap)) {
                   echo '
                    <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal" style="color: black; text-shadow: none">'.$row["firstname"].' '.$row["lastname"].'</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title" style="color: black; text-shadow: none">'.$row["height"].' cm<small class="text-muted">/ '.$row["weight"].' kg</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li style="color: black; text-shadow: none">Date : '.$row["date_appoi"].'
                            <li style="color: black; text-shadow: none">Hour : '.$row["hour_appoi"].'                         
                            <li style="color: black; text-shadow: none">Phone : +33'.$row["phonenum"].'</li>
                            <li style="color: black; text-shadow: none">Address : '.$row["number"].' '.$row["street"].' '.$row["zipcode"].'</li>
                        </ul>
                        <a style="text-decoration:none" href="user_profile.php?id='.$row["id_user"].'"><button type="button" class="btn btn-lg btn-block btn-outline-primary">View profile</button></a>
                    </div>
                </div>';

                }
                ?>
            </div>
        </div>

            <?php else :?>
            <h1 class="cover-heading">You need to register first !</h1>
            <p class="lead">Aled is web and mobile application where you can make your own diagnosis. But first we need to know who you are ! So please, use the button below to register or login.</p>
            <p class="lead">
                <a href="doctorLogin.php" class="btn btn-lg btn-secondary">Login now</a>
            </p>
        <?php endif ?>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="Static/js/jquery.min.js"</script>
<script>window.jQuery || document.write('<script src="Static/js/jquery.min.js"><\/script>')</script>
<script src="Static/js/popper.min.js"></script>
<script src="Static/js/bootstrap.min.js"></script>
</body>
</html>
