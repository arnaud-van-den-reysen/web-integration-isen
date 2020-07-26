<?php
session_start();
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
<head>
    <link rel="stylesheet" href="../Static/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../Static/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../Static/css/mouse_tracker.css" type="text/css"/>

    <title>Symptoms analysis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Static/js/form_base.js"></script>
    <link rel="stylesheet" href="../Static/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../Static/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>ALED - Medecine interventions</title>
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-3/vendor/nouislider/nouislider.css">
    <!-- Google fonts - Playfair Display-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">

    <!-- owl carousel-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-3/vendor/owl.carousel/assets/owl.carousel.css">
    <!-- Ekko Lightbox-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-3/vendor/ekko-lightbox/ekko-lightbox.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-3/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/sell/1-2-3/css/custom.css">
    <!-- Favicon-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../Static/images/doctor.png"/>
    <link rel="stylesheet" href="../Static/css/style.css">
    <link rel="stylesheet" href="../Static/css/normalize.css">
    <link href="/Static/css/blog.css" rel="stylesheet">
</head>

<body onmousemove="myFunction(showCoords(event))">
<header class="blog-header py-3 px-3">
    <div class="row flex-nowrap justify-content-between align-items-center mx-5">
        <div class="col-4 pt-1">
            <a class="text-muted" href="../form_base.php">Faire son diagnostic</a>
            <a class="text-muted ml-5" href="../mouse.php">Mouse stalker</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="http://boushoku.alwaysdata.net">ALED</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <form class="form-inline ">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                       aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
            </form>

            <a class="btn btn-sm btn-outline-secondary" href="../login.php">Login</a>
        </div>
    </div>
</header>
<div class="container text-center">
        <h3 class="my-5">Please answer the following questions</h3>

        <form name="form_answers" id ="form_answers" action="" method="POST">

            <div>A. Intensity of vertigo
                <input type="range" min="0" max="10" value="5" id="slider" oninput="slidervalue()">
                <p>Value: <span id="slider_value"></span></p>
            </div>

            <div>B. Did you have a recent emotional pain?
                <input type="radio" name="answer" value="yes"> Yes
                <input type="radio" name="answer" value="no"> No<br>
            </div>

            <div>C. How often do you practice sport per week?
                <input type="range" min="0" max="10" value="5" id="slider2" oninput="slidervalue()">
                <p>Value: <span id="slider_value2"></span></p>
            </div>

            <div>D. Do you take drugs?
                <input type="radio" name="answer2" value="yes"> Yes
                <input type="radio" name="answer2" value="no"> No<br>
            </div>

            <div>E. Did you injure yourself recently ?
                <input type="radio" name="answer3" value="yes"> Yes
                <input type="radio" name="answer3" value="no"> No<br>
            </div>


            <input type="button" onclick="window.location.href = '../pages/finish.php';clearCoor();" id="btn_confirm_1" name="sub_send_2" value="Confirm">
            <input type="button" onclick="window.location.href = '../form_base.php';clearCoor();" id="btn_cancel" name="cancel" value="Cancel">

        </form>
</div>
<p id="demo"></p>

<ul id="myList" name="contFichier">
    <li>x/y</li>
</ul>
<form action="../CreaFichier.php?username=<?php echo $_SESSION['username']; ?>" method="post" id="envoiPHP" TARGET=_BLANK>
    <input type="text" class="input1" id="contFichier" name="contFichier"
           size=9999>
           <input style="visibility: hidden;" type="text" class="input1" id="contFichier2" name="contFichier2"
                  size=9999>
</form>


<script>
    var listeCoor="";
    function showCoords(event) {
        var x = event.clientX;
        var y = event.clientY;
        var coor = "X coords: " + x + ", Y coords: " + y;
        document.getElementById("demo").innerHTML = coor;
        var maCoord = new Object();
        maCoord.x = x;
        maCoord.y = y;
        return(maCoord);
    }

    function clearCoor() {
        document.getElementById("demo").innerHTML = "";
        document.getElementById("envoiPHP").submit();
    }

    function myFunction(maCoord) {
        var node = document.createElement("LI");
        var textnode = document.createTextNode(maCoord.x+"/"+maCoord.y);
        node.appendChild(textnode);
        document.getElementById("myList").appendChild(node);
        var str = maCoord.x+"/"+maCoord.y;
        listeCoor = listeCoor + str + ",";
        $(".input1").val(listeCoor);
        document.getElementById("contFichier2").value =
        document.getElementById("slider").value + "," +
        document.forms["form_answers"].elements["answer"].value + "," +
        document.getElementById("slider2").value + "," +
        document.forms["form_answers"].elements["answer2"].value + "," +
        document.forms["form_answers"].elements["answer3"].value + ",";
    }


</script>
    </body>
</html>
