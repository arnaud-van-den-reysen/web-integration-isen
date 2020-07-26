<!DOCTYPE html>
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
    <link href="Static/css/signin.css" rel="stylesheet">

</head>
<body class="pt-0">
<?php
include('doctorServer.php');
include('errors.php');
?>
<div class="container d-flex h-100 p-3 mx-1 flex-column mt-0 pt-0">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled<span class="text-muted"> for doctors.</span></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="doctorIndex.php">Home</a>
                <a class="nav-link active" href="login.php">Login</a>
            </nav>
        </div>
    </header>

        <form class="form-signin text-center" method="post" action="doctorLogin.php">
            <a href="doctorIndex.php"><img class="mt-5 mb-4 mx-auto d-block" src="Static/images/doctor.png" alt="" width="72" height="72"></a>
            <h1 class="cover-heading text-center">Please log in</h1>
            <p class="lead">Please, use the form below to register or login.</p>

            <label class="sr-only">Username</label>
            <input type="email" name="mail" class="form-control" placeholder="mail" required autofocus>

            <label class="sr-only">Password</label>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" class="btn btn-lg btn-primary btn-block mb-5" name="login_doc">Login</button>
            <p><a class="p-2" href="#">Forgot password</a> ?</p>
        </form>


    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="doctorIndex.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>


