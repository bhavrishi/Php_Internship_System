<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$company_id = mysqli_real_escape_string($mysqli, $_POST['company_id']);
	$company_name = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$company_email = mysqli_real_escape_string($mysqli, $_POST['company_email']);
	$comapny_address = mysqli_real_escape_string($mysqli, $_POST['comapny_address']);
	$company_phone = mysqli_real_escape_string($mysqli, $_POST['company_phone']);
		
	// checking empty fields
	if(empty($company_id) || empty($company_name) || empty($company_email) || empty($comapny_address) || empty($company_phone)) {
				
		if(empty($company_id)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		if(empty($company_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($company_email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($comapny_address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		
		if(empty($company_phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO companies(company_id,company_name,company_email,comapny_address,company_phone) VALUES('$company_id','$company_name','$company_email','$comapny_address','$company_phone')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
