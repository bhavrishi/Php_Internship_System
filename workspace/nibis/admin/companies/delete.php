<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$company_id = $_GET['company_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM companies WHERE company_id='$company_id'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

