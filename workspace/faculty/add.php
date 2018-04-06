<html>
<head>
	<title>Add Persons</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	//$person_id = mysqli_real_escape_string($mysqli, $_POST['person_id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$cell_phone = mysqli_real_escape_string($mysqli, $_POST['cell_phone']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

		
	// checking empty fields
	if(empty($name) || empty($cell_phone) || empty($email)) {
				
	
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($cell_phone)) {
			echo "<font color='red'>Cell Phone field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO persons(name,cell_phone,email) VALUES('$name','$cell_phone','$email')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
