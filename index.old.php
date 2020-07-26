<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Static/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="Static/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>ALED - Medecine interventions</title>
     <link rel="shortcut icon" type="image/png" href="Static/images/doctor.png"/>
    <link rel="stylesheet" href="Static/css/style.css">
    <link rel="stylesheet" href="Static/css/normalize.css">
    <link href="/Static/css/blog.css" rel="stylesheet">
    <style>
        body {
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;

        }
        body:before {
            content: "";
            position: fixed;
            height: 100%; width: 100%;
            background: url(/Static/images/fond_dacceuil.jpg);
            background-size: cover;
            z-index: -1; /* Keep the background behind the content */
            -webkit-background-size: cover; /* pour Chrome et Safari */
            -moz-background-size: cover; /* pour Firefox */
            -o-background-size: cover; /* pour Opera */
        }
    </style>
</head>
<body>

<div class="content">
    <!-- notification message -->

    <!-- logged in user information -->


        <header class="blog-header py-3 px-3" style="background-color: white">
            <div class="row flex-nowrap justify-content-between align-items-center mx-5">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="presurvey/souris.html">Faire son diagnostic</a>
                    <a class="text-muted ml-5" href="camera_upload.html">Test Caméra</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="http://boushoku.alwaysdata.net">ALED</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">

                    <?php  if (isset($_SESSION['username'])) : ?>
                        <strong class="mr-5">Welcome <?php echo $_SESSION['username']; ?></strong>
                        <a class="btn btn-sm btn-outline-secondary" href="index.php?logout='1'" >logout</a>
                    <?php else :?>
                        <a class="btn btn-sm btn-outline-secondary" href="login.php">Login</a>
                    <?php endif ?>

                </div>
            </div>

        </header>

</div>

<?php
    //include "base.html";
    include "footer.html";
?>

</body>
</html>
