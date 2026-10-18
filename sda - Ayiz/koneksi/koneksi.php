<?php
$conn = new mysqli("localhost", "root", "", "db_academic");
if ($conn->connect_error) {
    die($conn->connect_error);
};
