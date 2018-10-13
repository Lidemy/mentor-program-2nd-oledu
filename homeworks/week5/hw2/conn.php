<?php
$servername = "166.62.28.131";
$username = "student2nd";
$password = "mentorstudent123";
$dbname = "mentor_program_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "fail";
}
?>
