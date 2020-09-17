<?php
session_start();
include('../id.php');
file_put_contents('../coordonnees/coor_'. $_SESSION["username"].'.txt', $_POST['contFichier'], FILE_APPEND);
file_put_contents("../coordonnees/Patient". $_SESSION['id_user']."F".".txt",  $_POST['contFichier2'], FILE_APPEND);//Rajout des résultats du form précedent 
    echo '<script>javascript:window.close()</script>';
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
<head>
    <link rel="stylesheet" href="../Static/css/mouse_tracker.css" type="text/css"/>
    <link rel="stylesheet" href="../Static/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../Static/css/bootstrap.css" type="text/css"/>

    <title>Symptoms analysis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Static/js/form_base.js"></script>

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
        <h1 class="my-5">SYMPTOMS ANALYSIS</h1>

        <h3 class="my-5">CHOOSE A SECOND SYMPTOM </h3>
        <form name="form_symptoms" id ="form_symptoms" action="" method="POST">
            <!-- MUST ADD PHP IN "ACTIONS" -->

            <fieldset id="symptoms">
                <legend>Give your second symptom</legend>

                <div>
                    <label for="Second_symptom">Your second symptom </label>
                    <select class="select" name="Second_symptom" id="Second_symptom">
                        <option value="1">Anxiety</option>
                        <option value="2">Arm pain</option>
                        <option value="3">Back pain</option>
                        <option value="4">Breathing difficulty</option>
                        <option value="5">Chills</option>
                        <option value="6">Cough</option>
                        <option value="7">Delusions</option>
                        <option value="9">Distended belly</option>
                        <option value="10">Ear pain</option>
                        <option value="11">Fatigue</option>
                        <option value="12">Fever</option>
                        <option value="13">Flatulence</option>
                        <option value="14">Headache</option>
                        <option value="15">Nausea</option>
                        <option value="16">Neck pain</option>
                        <option value="17">Nosebleed</option>
                        <option value="18">Permanent thirst</option>
                        <option value="19">Stomachache</option>
                        <option value="20">Sweat</option>
                        <option value="21">Tremor</option>
                        <option value="22">Vertigo</option>
                        <option value="0">Nothing</option>
                    </select>
                </div>

            </fieldset>

            <input onclick="clearCoor()" type="button" id="btn_symptom_2" name="sub_send_2" value="Confirm">
           <!-- <input type="button" onclick="window.location.href='../form_base.php';" id="btn_cancel" name="cancel" value="Cancel">
           -->
        </form>
</div>

<p id="demo"></p>

<ul id="myList" name="contFichier">
    <li>x/y</li>
</ul>
<form action="../CreaFichier.php?username=<?php echo $_SESSION['username']; ?>" method="post" id="envoiPHP" TARGET=_BLANK>
    <input style="visibility: hidden;" type="text" class="input1" id="contFichier" name="contFichier"
           size=9999>
           <input style="visibility: hidden;" type="text" class="input1" id="contFichier2" name="contFichier2"
                  size=9999>
</form>
    </main>


    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="../index.php">Smart-Medical-Assistant</a>.  All rights reserved.</p>
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
        document.getElementById("contFichier2").value = "symptom=" + document.getElementById("Second_symptom").value;
        document.getElementById("contFichier2").value += ",";
    }


</script>
    </body>
</html>
