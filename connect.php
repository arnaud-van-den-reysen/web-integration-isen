<?php
function connectDb() {
    $db = mysqli_connect('localhost', 'root', '', 'web2');
    if (!$db) {
        $host_name = 'db5000858744.hosting-data.io';
        $database = 'dbs756027';
        $user_name = 'dbu701178';
        $password = '0fb2017675!A';
        $db = mysqli_connect($host_name, $user_name, $password, $database);
    }
    return $db;
}
?>