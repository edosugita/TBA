<?php

$conn = mysqli_connect("localhost", "root", "", "siakad");

if (!$conn) {
    echo "Database connection failed";
}
