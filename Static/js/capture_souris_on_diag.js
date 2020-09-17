document.addEventListener("DOMContentLoaded", function(){
    console.log("Initialization");
    //boolean permettant de lancer et stopper l'enregistrement des coordonnées souris
    flag = 0;

    //id du div contenant l'image parcours.jpg
    elmids = ['divid'];

    //les coordonnées oklm
    x = 0;
    y = 0;

    //date de lancement du script
    d = new Date();

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
                                window.location.href = 'clavier.php?username='+username;
                            }
                        }
                    }
                }
            };
        }
    }
});

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