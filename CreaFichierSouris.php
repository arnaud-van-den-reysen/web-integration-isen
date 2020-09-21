<?php
session_start();
?>
<?php
    file_put_contents('coordonnees/test_souris_'.$_GET["username"].'.txt', $_POST['contFichier'], FILE_APPEND);
    echo '<SCRIPT>javascript:window.close()</SCRIPT>';

?>
