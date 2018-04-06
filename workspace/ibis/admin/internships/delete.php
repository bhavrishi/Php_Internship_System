<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$internship_id = $_GET['internship_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM internships WHERE internship_id='$internship_id'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

