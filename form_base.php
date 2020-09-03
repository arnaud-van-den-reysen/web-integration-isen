<?php
session_start();

file_put_contents("./coordonnees/Patient". $_SESSION['username']."F".".txt", "");
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->
<html lang="fr">
<head>
	<link rel="stylesheet" href="Static/css/mouse_tracker.css" type="text/css"/>
    <link rel="stylesheet" href="Static/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="Static/css/bootstrap.css" type="text/css"/>
    <script src="Static/js/form_base.js"></script>
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
    <link rel="shortcut icon" type="image/png" href="Static/images/doctor.png"/>

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

function display(){
    var checkBox1 = document.getElementById("acceptConditions1");
    var checkBox2 = document.getElementById("acceptConditions2");
    var text = document.getElementById("btn_symptom_1");

    if (checkBox2.checked && checkBox1.checked== true){
    text.style.display = "";
  } else {
    text.style.display = "none";
  }
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
	document.getElementById("contFichier2").value = "symptom=" + document.getElementById("First_symptom").value;
	document.getElementById("contFichier2").value += ",";
}


</script>

</head>
<body onmousemove="myFunction(showCoords(event))">
<div class="cover-container d-flex h-100 p-3 mx-1 flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Aled</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="index.php">Home</a>
              <!--  <a class="nav-link" href="login.php">Login</a> -->
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover">

<div class="container text-center">
    <h1 class="my-5">Symptoms analysis</h1>


    <input onClick="display()" type="checkbox" id="acceptConditions1"> I understand and accept that the results given don't replace a real medical diagnostic<br>
    <input onClick="display()" type="checkbox" id="acceptConditions2"> I accept the processing and hosting of my health data<br>

    <h5 class="mt-5 mb-3">Choose the most important symptom</h5>
    <form name="form_symptoms" id ="form_symptoms" action="" method="POST">
        <!-- MUST ADD PHP IN "ACTIONS" -->

        <fieldset id="symptoms">
            <div>
                <label for="First_symptom"> Your first symptom</label>
                <select class="select" name="First_symptom" id="First_symptom">
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
                    <option value="21">Vertigo</option>
                </select>
            </div>
        </fieldset>


        <p id="demo"></p>

        <ul id="myList" name="contFichier">
        <li>x/y</li>
        </ul>
        <input onclick="clearCoor()" type="button" class="btn btn-primary" id="btn_symptom_1" name="sub_send_1" value="Confirm" style="display:none">
      
    </form>
<form action="CreaFichier.php?username=<?php echo $_GET['username']; ?>" method="post" id="envoiPHP" TARGET=_BLANK>
<input type="text" class="input1" id="contFichier" name="contFichier">
<input style="visibility: hidden;" type="text" class="input1" id="contFichier2" name="contFichier2">
</form>
</div>
    </main>


    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
        </div>
    </footer>
</div>

</body>
</html>
