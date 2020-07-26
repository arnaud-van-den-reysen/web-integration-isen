<?php
session_start();
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="../Static/css/mouse_tracker.css" type="text/css"/>
        <title>Symptom : </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body onmousemove="myFunction(showCoords(event))">
        <h3 class="my-5">Please answer the following questions</h3>

        <input type="button" onclick="window.location.href='../pages/form_2.php';clearCoor();" id="btn_confirm_1" name="sub_send_2" value="Confirm">
        <input type="button" onclick="window.location.href='../form_base.php';clearCoor();" id="btn_cancel" name="cancel" value="Cancel">
        <p id="demo"></p>

        <ul id="myList" name="contFichier">
            <li>x/y</li>
        </ul>
        <form action="../CreaFichier.php?username=<?php echo $_SESSION['username']; ?>" method="post" id="envoiPHP" TARGET=_BLANK>
            <input type="text" class="input1" id="contFichier" name="contFichier"
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
            }


        </script>
    </body>
</html>
