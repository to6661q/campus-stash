<?php
    $conn = new mysqli("localhost","root","","kekasih");
    if ($conn->connect_error) {
        die ($conn->connect_error);
    };
?>