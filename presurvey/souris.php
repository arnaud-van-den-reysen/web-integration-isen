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

    <script src="..\Static\js\capture.js"></script>

</head>



<body style="background-color : #333">
<video id="preview" width="160" height="120" autoplay muted></video>
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
  var flag = 0;

var elmids = ['divid'];

var x, y = 0;

var d = new Date();

function getXYpos(elm) {
  x = elm.offsetLeft;
  y = elm.offsetTop;

  elm = elm.offsetParent;


  while(elm != null) {
    x = parseInt(x) + parseInt(elm.offsetLeft);
    y = parseInt(y) + parseInt(elm.offsetTop);
    elm = elm.offsetParent;
  }


  return {'xp':x, 'yp':y};
}


function getCoords(e) {

  var xy_pos = getXYpos(this);


  if(navigator.appVersion.indexOf("MSIE") != -1) {

    var standardBody = (document.compatMode == 'CSS1Compat') ? document.documentElement : document.body;

    x = event.clientX + standardBody.scrollLeft;
    y = event.clientY + standardBody.scrollTop;
  }
  else {
    x = e.pageX;
    y = e.pageY;
  }

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
