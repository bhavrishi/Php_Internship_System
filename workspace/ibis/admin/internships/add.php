<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$internship_id = mysqli_real_escape_string($mysqli, $_POST['internship_id']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
	$company_id = mysqli_real_escape_string($mysqli, $_POST['company_id']);
		
	// checking empty fields
	if(empty($internship_id) || empty($description) || empty($location) || empty($company_id)) {
				
		if(empty($internship_id)) {
			echo "<font color='red'>Internship ID field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
		
		if(empty($company_id)) {
			echo "<font color='red'>Comapny ID field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO internships(internship_id,description,location,company_id) VALUES('$internship_id','$description','$location','$company_id')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
