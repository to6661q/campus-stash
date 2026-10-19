<?php
$conn = new mysqli("localhost", "root", "", "db_academi");
if ($conn->connect_error) {
    die($conn->connect_error);
};
