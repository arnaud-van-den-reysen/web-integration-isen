<?php
function connectDb() {
    $db = mysqli_connect('localhost', 'root', '', 'web2');
    return $db;
}
?>