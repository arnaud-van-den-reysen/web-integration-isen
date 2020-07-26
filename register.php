<?php include('server.php') ?>
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
        <a href="index.php"><img class="mb-4 mx-auto d-block" src="Static/images/doctor.png" alt="" width="72" height="72"></a>
        <h1 class="cover-heading text-center">Create Account</h1>
        <p class="lead">Aled is web and mobile application where you can make your own diagnosis. But first we need to know who you are ! So please, use the form below to register or login.</p>

            <form method="post" action="register.php">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Email address" type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password" name="password_1">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password" name="password_2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="reg_user"> Create Account  </button>
                </div>
                <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
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
