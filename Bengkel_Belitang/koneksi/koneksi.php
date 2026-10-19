<?php
    $conn = new mysqli("localhost","root","","unpam_db");
    if ($conn->connect_error) {
        die ($conn->connect_error);
    };
?>