<?php
    file_put_contents('coordonnees/coor_'.$_GET["username"].'.txt', $_POST['contFichier'], FILE_APPEND);
    file_put_contents('coordonnees/answers_'.$_GET["username"].'.txt', $_POST['contFichier2'], FILE_APPEND);
    echo '<SCRIPT>javascript:window.close()</SCRIPT>';

?>
