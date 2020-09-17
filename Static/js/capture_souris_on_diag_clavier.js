//date de référence
var d = new Date();
//liste des timers
var listeTime="";
//A chaque evenement, ajoute l'action du clavier et son timer
function myFunction(event) {
  var x = event.key;
  var f = new Date();
  listeTime = listeTime + (f.getTime() - d.getTime()) + "/" + x + ",";
}

//liste des coordonnées
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
    document.getElementById("sentence").style.visibility = "hidden";
    document.getElementById("contFichier").style.visibility = "hidden";
    document.getElementById("myBouton").style.visibility = "hidden";
    document.getElementById("contFichier2").value = listeCoor;
    document.getElementById("contFichier3").value = listeTime;
    document.getElementById("envoiPHP").submit();
    window.location.href = '../form_base.php?username='+username;
}

//ajoute une coordonnée souris à la liste à chaque mouvement
function myMouse(maCoord) {
    var str = maCoord.x+"/"+maCoord.y;
    var e = new Date();
    listeCoor = listeCoor + str +  "/" + (e.getTime() - d.getTime()) + ",";
}

//ajoute une coordonnée souris à la liste à chaque click
function myClick() {
    var m = new Date();
    listeCoor = listeCoor + "CLICK" + "/" + (m.getTime() - d.getTime()) + ",";
}