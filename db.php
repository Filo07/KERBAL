<?php
$conn = mysqli_connect('localhost', 'root', '', 'kerbal'); 

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}