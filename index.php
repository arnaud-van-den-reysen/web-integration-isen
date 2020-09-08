<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['admin']);
    unset($_SESSION['doctor']);
    header("location: index.php");
    
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

    <title>SMA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Static/css/cover.css" rel="stylesheet">

    <script src="Static\js\capture.js"></script>

</head>

<body class="text-center">
<?php  if (isset($_SESSION['username'])) : ?>
    <video id="preview" width="160" height="120" autoplay muted></video>
<?php else :?>
    <p>Connectez vous.</p>
<?php endif ?>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Smart-Medical-Assistant</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="index.php">Home</a>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                        <a class="nav-link" href="admin.php"> Admin</a>
                    <?php endif ?>
                    <?php if(isset($_SESSION['doctor']) && $_SESSION['doctor'] == 1) : ?>
                        <a class="nav-link" href="doctor.php"> Doctor</a>
                    <?php endif ?>
                    <a class="nav-link" href="index.php?logout='1'">Logout</a>
                <?php else :?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
    <img src="./Static/images/doctor.png">
        <?php  if (isset($_SESSION['username'])) : ?>
            <h1 class="cover-heading">Make Your Diagnosis</h1>
            <p class="lead">Aled is web and mobile application where you can make your own diagnosis. You can now make your own diagnosis using the button below</p>
            <p class="lead">
                <a href="presurvey/NewTest.php?username=<?php echo $_SESSION['username']; ?>" class="btn btn-lg btn-secondary">Make diagnosis</a>
            </p>
        <?php else :?>
            <h1 class="cover-heading">You need to register first !</h1>
            <p class="lead">Aled is web and mobile application where you can make your own diagnosis. But first we need to know who you are ! So please, use the button below to register or login.</p>
            <p class="lead">
                <a href="login.php" class="btn btn-lg btn-secondary">Login now</a>
            </p>
        <?php endif ?>
        <div id="voile-noire" class="block-alert">
            <div id="merci-accepte" class="alert-privacy">
                <div>
                    <p>Le site Smart-Medical-Assistant est un logiciel aidant ses utilisateurs à recevoir la meileur aide médical possible. Pour cela nous avons besoin de récolter et de traiter un certain nombres de données personnels. Ces données peuvent être le nom, prénom, localisation, adresse postale, email, données médicales, flux vidéos et autres données personnels indispensable pour permettre un diagnostique précis et un bonne prise de rendez-vous.</p>
                    <p>En cliquant sur le bouton "Accepter", vous autorisez le site Smart-Medical-Assistant à collecter, enregistrer, sauvegarder et traiter vos données personnels.</p>
                </div>
                <div>
                    <button onclick="document.getElementById('voile-noire').style.display='none'">Accepter</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Smart-Medical-Assistant</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script> src="Static/js/jquery.min.js"</script>
<script>window.jQuery || document.write('<script src="Static/js/jquery.min.js"><\/script>')</script>
<script src="Static/js/popper.min.js"></script>
<script src="Static/js/bootstrap.min.js"></script>
</body>
</html>
