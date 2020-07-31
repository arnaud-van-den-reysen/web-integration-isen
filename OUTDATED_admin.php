<?php include('doctorServer.php') ?>
<?php include('errors.php') ?>
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
<div class="container">
    <form method="post" action="admin.php">
        <a href="doctorIndex.php"><img class="mt-5 mb-4 mx-auto d-block" src="Static/images/doctor.png" alt="" width="72" height="72"></a>
        <h1 class="cover-heading text-center">Create Account</h1>
        <p class="text-center">create a doctor account</p>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>" class="form-control" placeholder="prenom">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" placeholder="nom">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input class="form-control" placeholder="Email address" type="email" name="mail" value="<?php echo $mail; ?>">
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
            <button type="submit" class="btn btn-primary btn-block" name="reg_doctor"> Create Account  </button>
        </div>
    </form>
</div>
</body>
</html>
