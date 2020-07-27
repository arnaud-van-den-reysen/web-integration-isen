

<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        div {
            width: 200px;
            height: 100px;
            border: 1px solid black;
        }
        #myList{
            visibility: hidden;
        }
        #contFichier{
            visibility: hidden;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Mouse Stalker</title>
</head>
<body>

<div onmousemove="myFunction(showCoords(event))" onmouseout="clearCoor()"></div>

<p>Mouse over the rectangle above to get the horizontal and vertical coordinates of your mouse pointer.</p>

<p id="demo"></p>

<ul id="myList" name="contFichier">
    <li>x/y</li>
</ul>

<form action="CreaFichier.php" method="post" id="envoiPHP">
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
