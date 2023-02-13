<?php
    $mysqli = new mysqli("localhost","root","","phonestoresql","3306");
    if($mysqli->connect_errno) {
        echo "Kết nối thất bại " . $mysqli->connect_error;
        exit();
    }
?>