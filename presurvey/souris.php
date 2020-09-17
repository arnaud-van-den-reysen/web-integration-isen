<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/png" href="../Static/images/doctor.png"/>

  <title>Aled</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

  <!-- Bootstrap core CSS -->
  <link href="../Static/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Static/css/cover.css" rel="stylesheet">

  <script src="../Static/js/capture.js"></script>
  <script src="../Static/js/capture_souris_on_diag.js" type="text/javascript"></script>
  <script type="text/javascript">
    var username = "<?php echo $_GET["username"]; ?>";
  </script>
</head>

<body style="background-color : #333">
  <?php  if (isset($_SESSION['username'])) : ?>
    <video id="preview" width="160" height="120" autoplay muted></video>
  <?php else :?>
    <p>Connectez vous.</p>
  <?php endif ?>
  <div class="d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Smart-Medical-Assistant</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="../index.php">Home</a>
        </nav>
      </div>
    </header>

    <!-- Le parcours est une image au dimension fixe, elle ne peut pas être responsive dans l'état actuel du code -->
    <h6 style="text-decoration: underline;">Click on the first red circle then follow the path to click on the last red circle.</h6>
    <div id="divid" style="width:899px; height:868px; background-image:url('parcours.jpg');"></div>
  </div>
</body>

<form action="../CreaFichierSouris.php?username=<?php echo $_GET['username'];?>" method="post" id="envoiPHP" TARGET=_BLANK>
  <input style="visibility: hidden;" type="text" class="input1" id="contFichier" name="contFichier">
</form>