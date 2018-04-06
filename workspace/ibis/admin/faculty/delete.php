<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$person_id = $_GET['person_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM persons WHERE person_id='$person_id'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

