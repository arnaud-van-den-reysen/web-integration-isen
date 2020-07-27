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

</head>
<body>
<?php
include('server.php');
include('errors.php');
?>
<div class="cover-container d-flex h-100 p-3 mx-1 flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link active" href="login.php">Login</a>
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover">
        <a href="index.php"><img class="mt-5 mb-4 mx-auto d-block" src="Static/images/doctor.png" alt="" width="72" height="72"></a>
        <h1 class="cover-heading text-center">Please log in</h1>
        <p class="lead">Aled is web and mobile application where you can make your own diagnosis. But first we need to know who you are ! So please, use the form below to register or login.</p>


        <form class="form-signin text-center mt-5" method="post" action="login.php">

            <label class="sr-only">Username</label>
            <input type="text" name="username" class="form-control mb-3" placeholder="username" required autofocus>

            <label class="sr-only">Password</label>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" class="btn btn-lg btn-primary btn-block mb-5" name="login_user">Login</button>
            <p><a class="p-2" href="#">Forgot password</a> ?</p>
            <p>Not registered yet ?<a class="p-2" href="register.php">Create an account now</a> !</p>
        </form>
    </main>


    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>


