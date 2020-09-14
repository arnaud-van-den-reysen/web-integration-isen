<?php
session_start();
include('../id.php');
file_put_contents('../coordonnees/coor_'. $_SESSION["username"].'.txt', $_POST['contFichier'], FILE_APPEND);
    file_put_contents("../coordonnees/Patient". $_SESSION['id_user']."F".".txt",  $_POST['contFichier2'], FILE_APPEND);
    echo '<script>javascript:window.close()</script>';
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>

    <title>Symptom : Anxiety</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Static/js/form_base.js"></script>
    <script src="../Static/css/normalize.css"></script>
    <script src="../Static/css/style.css"></script>
    <link rel="stylesheet" href="../Static/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Static/css/mouse_tracker.css" type="text/css"/>
    <link rel="stylesheet" href="../Static/css/style.css" type="text/css"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../Static/images/doctor.png"/>

    <title>Aled - symptom diagnosis</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="../Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Static/css/cover.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../Static/images/doctor.png"/>

</head>

<body onmousemove="myFunction(showCoords(event))">
<div class="cover-container d-flex h-100 p-3 mx-1 flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Smart-Medical-Assistant</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="../index.php">Home</a>
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover">

<div class="container text-center">
    <h1 class="my-5">Thank you for completing the survey!</h1>
    <p class="text-muted">Go back to <a onclick="clearCoor()" href="../index.php">Home page</a></p>
</div>

<p id="demo"></p>

<ul id="myList" name="contFichier">
    <li>x/y</li>
</ul>
<form action="../CreaFichier.php?username=<?php echo $_SESSION['username']; ?>" method="post" id="envoiPHP" TARGET=_BLANK>
    <input type="text" class="input1" id="contFichier" name="contFichier"
           size=9999>
</form>

    </main>


    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>
<script>
    var listeCoor="";
    var d = new Date();
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
        var f = new Date();
        var str = maCoord.x+"/"+maCoord.y+"/"+(f.getTime() - d.getTime());
        listeCoor = listeCoor + str + ",";
        $(".input1").val(listeCoor);
    }


</script>
</body>
</html>
