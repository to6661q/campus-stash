<?php
$conn = new mysqli("localhost", "root", "", "akademik");
if ($conn->connect_error) {
    die($conn->connect_error);
};
