<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$internship_id = mysqli_real_escape_string($mysqli, $_POST['internship_id']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
	$company_id = mysqli_real_escape_string($mysqli, $_POST['company_id']);

	
	// checking empty fields
	if(empty($internship_id) || empty($description) || empty($location)  || empty($company_id) ) {	
			
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
			echo "<font color='red'>Company ID field is empty.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE internships SET internship_id='$internship_id',description='$description',location='$location', company_id='$company_id' WHERE internship_id='$internship_id'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$internship_id = $_GET['internship_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM internships WHERE internship_id='$internship_id'");

while($res = mysqli_fetch_array($result))
{
	$internship_id = $res['internship_id'];
	$description = $res['description'];
	$location = $res['location'];
	$company_id = $res['company_id'];
	
}
?>




<html>
<head>	
	<title>View Internships</title>
	<meta charset="utf-8">
  <title>IBIS Internship System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../img/favicon.png" rel="icon">
  <link href="../..img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../style.css" rel="stylesheet">
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#"><img src="../../img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="../">Home</a></li>
          <li class="menu-active"><a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <main id="main">

    <section id="about">
      <div class="container">
    
        <div class="row about-container">

	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID</td>
				<td><?php echo $internship_id;?></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="location" value="<?php echo $location;?>"></td>
			</tr>
			<tr> 
				<td>Company ID</td>
				<td><input type="text" name="company_id" value="<?php echo $company_id;?>"></td>
			</tr>


			<tr>
				<td><input type="hidden" name="internship_id" value=<?php echo $_GET['internship_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
</main>
</section>
</div>
</div>
</body>
</html>