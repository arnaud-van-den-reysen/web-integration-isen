<?phpsession_start();?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="Static/images/doctor.png"/>

    <title>Aled</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="../Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Static/css/cover.css" rel="stylesheet">

</head>



<body style="background-color : #333">
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="../index.php">Home</a>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                        <a class="nav-link" href=""> Admin</a>
                    <?php endif ?>
                    <?php if(isset($_SESSION['doctor']) && $_SESSION['doctor'] == 1) : ?>
                        <a class="nav-link" href=""> Doctor</a>
                    <?php endif ?>
            </nav>
        </div>
    </header>
    <h6 style="text-decoration: underline;">Click on the first red circle then follow the path to click on the last red circle.</h6>
<div id="divid" style="width:899px; height:868px; background-image:url('parcours.jpg');"></div>
</div>
</body>
<form action="../CreaFichierSouris.php?username=<?php echo $_GET['username'];?>" method="post" id="envoiPHP" TARGET=_BLANK>
  <input style="visibility: hidden;" type="text" class="input1" id="contFichier" name="contFichier">
</form>


<script type="text/javascript">
//variable lançant un stop j'crois
  var flag = 0;

  //aucune ide
var elmids = ['divid'];

//les coordonnées oklm
var x, y = 0;

//pour le calcul du temps?
var d = new Date();

//fonction qui récupère deux valeurs en fonction de l'écart avec le haut à gauche et le top de la page
function getXYpos(elm) {
  x = elm.offsetLeft;
  y = elm.offsetTop;

  //valeur total de l'offset avec le parent avec son parent à lui
  elm = elm.offsetParent;

//du coup on prend le parent et on l'ajoute à l'offset de l'enfant jusqu'à ce qu'il n'y ai plus de parent, soit l'offest total de la position de l'élément
  while(elm != null) {
    x = parseInt(x) + parseInt(elm.offsetLeft);
    y = parseInt(y) + parseInt(elm.offsetTop);
    elm = elm.offsetParent;
  }

  //On renvoie alors x et y sous la forme d'un tableau
  return {'xp':x, 'yp':y};
}

//la fonction qui récupère la position xy liée à la souris
function getCoords(e) {
  //position récupérée de l'élément this
  var xy_pos = getXYpos(this);

  //test pour Microsoft edge
  if(navigator.appVersion.indexOf("MSIE") != -1) {
    //récupèration du scrolling de la page
    var standardBody = (document.compatMode == 'CSS1Compat') ? document.documentElement : document.body;
    //donne les coordonnées de la souris en fonction du scrolling de la page
    x = event.clientX + standardBody.scrollLeft;
    y = event.clientY + standardBody.scrollTop;
  }
  else {
    x = e.pageX;
    y = e.pageY;
  }

  //prend la position x et y par rapport à l'offset de l'élément parent
  x = x - xy_pos['xp'];
  y = y - xy_pos['yp'];

  var f = new Date();
  window.onload = function() {
    document.getElementById('coords').innerHTML = 'X= '+ x+ ' ,Y= '+ y+',T= '+ (f.getTime() - d.getTime())+';';
  }
  if (flag>0){
    document.getElementById('contFichier').value += x+ ' , ' +y+',T= '+ (f.getTime() - d.getTime())+';';
  }

}


for(var i=0; i<elmids.length; i++) {
  if(document.getElementById(elmids[i])) {

    document.getElementById(elmids[i]).onmousemove = getCoords;


    document.getElementById(elmids[i]).onclick = function() {
      if (x<80){
        if(x>50){
          if(y>10){
            if(y<40){
              fbis = new Date();
              document.getElementById('contFichier').value = x+ ' , ' +y+',T= '+ (fbis.getTime() - d.getTime())+';';
              flag = 1;
            }
          }
        }
      }
      if (x<475){
        if(x>445){
          if(y>405){
            if(y<435){
              fbis = new Date();
              document.getElementById('contFichier').value += x+ ' , ' +y+',T= '+ (fbis.getTime() - d.getTime())+';END';
              flag = 0;
              document.getElementById("envoiPHP").submit();
              window.location.href = 'clavier.php?username=<?php echo $_GET["username"];?>';
            }
          }
        }
      }

    };
  }
}
</script>
