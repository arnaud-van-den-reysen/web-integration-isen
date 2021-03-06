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
  <script src="../Static/js/capture_souris_on_diag_souris.js" type="text/javascript"></script>
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
    <div id="divid" style="width:899px; height:868px; background-image:url('parcours.jpg');">
    <!--div id="divid" style="width:899px; height:868px; background-image:url('parcours.jpg');"-->
      <label class="boule-noire" style="top:10px;left:50px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">Start</div>
      </label>
      <label class="boule-noire" style="top:190px;left:0px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">8</div>
      </label>
      <label class="boule-noire" style="top:400px;left:-40px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">7</div>
      </label>
      <label class="boule-noire" style="top:750px;left:-80px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">6</div>
      </label>
      <label class="boule-noire" style="top:400px;left:80px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">12</div>
      </label>
      <label class="boule-noire" style="top:580px;left:40px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">11</div>
      </label>
      <label class="boule-noire" style="top:10px;left:180px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">1</div>
      </label>
      <label class="boule-noire" style="top:400px;left:130px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">End</div>
      </label>
      <label class="boule-noire" style="top:750px;left:90px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">5</div>
      </label>
      <label class="boule-noire" style="top:190px;left:250px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">9</div>
      </label>
      <label class="boule-noire" style="top:580px;left:210px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">10</div>
      </label>
      <label class="boule-noire" style="top:10px;left:350px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">2</div>
      </label>
      <label class="boule-noire" style="top:400px;left:310px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">3</div>
      </label>
      <label class="boule-noire" style="top:750px;left:260px;">
        <input type="radio" class="invisible-radio-button">
        <div class="corp-boule-noire">4</div>
      </label>
    </div>
  </div>
</body>

<form action="../CreaFichierSouris.php?username=<?php echo $_GET['username'];?>" method="post" id="envoiPHP" TARGET=_BLANK>
  <input style="visibility: hidden;" type="text" class="input1" id="contFichier" name="contFichier">
</form>