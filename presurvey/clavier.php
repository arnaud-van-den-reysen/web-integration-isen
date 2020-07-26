<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body onkeydown="myFunction(event)">

<p id="sentence">May you write the following sentence: "Hello and welcome to the MedicHuber app! How are you?"</p>

<p id="demo"></p>
</br>
<p id="demo2"></p>
</br>
<p id="demo3"></p>


<form action="../CreaFichierClavier.php?username=<?php echo $_GET['username'];?>" method="POST" id="envoiPHP" TARGET=_BLANK onmousemove="myMouse(showCoords(event))" onclick="myClick()">
    <input type="text" class="input1" id="contFichier" name="contFichier"
           size=50>
           <input style="visibility: hidden;" type="text" class="input1" id="contFichier2" name="contFichier2"
                  size=50>
                  <input style="visibility: hidden;" type="text" class="input1" id="contFichier3" name="contFichier3"
                         size=50>
</form>

<input id="myBouton" type="button" onclick="clearCoor();" value="Confirm">

<script>
var d = new Date();
var listeTime="";
function myFunction(event) {
  var x = event.key;
  var f = new Date();
  listeTime = listeTime + (f.getTime() - d.getTime()) + "/" + x + ",";

}


var listeCoor="";
function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var maCoord = new Object();
    maCoord.x = x;
    maCoord.y = y;
    return(maCoord);
}

function clearCoor() {
    document.getElementById("demo2").innerHTML = listeCoor;
    document.getElementById("demo").innerHTML = listeTime;
    document.getElementById("demo3").innerHTML = document.getElementById("contFichier").value;
    document.getElementById("sentence").style.visibility = "hidden";
    document.getElementById("contFichier").style.visibility = "hidden";
    document.getElementById("myBouton").style.visibility = "hidden";
    document.getElementById("contFichier2").value = listeCoor;
    document.getElementById("contFichier3").value = listeTime;
    document.getElementById("envoiPHP").submit();
    window.location.href = '../form_base.php?username=<?php echo $_GET["username"];?>';
}

function myMouse(maCoord) {

    var str = maCoord.x+"/"+maCoord.y;
    var e = new Date();
    listeCoor = listeCoor + str +  "/" + (e.getTime() - d.getTime()) + ",";
}

function myClick() {
    var m = new Date();
    listeCoor = listeCoor + "CLICK" + "/" + (m.getTime() - d.getTime()) + ",";
}


</script>

</body>
</html>
