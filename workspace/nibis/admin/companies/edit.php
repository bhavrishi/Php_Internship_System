<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$company_id = mysqli_real_escape_string($mysqli, $_POST['company_id']);
	$company_name = mysqli_real_escape_string($mysqli, $_POST['company_name']);
	$company_email = mysqli_real_escape_string($mysqli, $_POST['company_email']);
	$comapny_address = mysqli_real_escape_string($mysqli, $_POST['comapny_address']);	
	$company_phone = mysqli_real_escape_string($mysqli, $_POST['company_phone']);

	
	// checking empty fields
	if(empty($company_name) || empty($company_email) || empty($comapny_address)  || empty($company_phone) ) {	
			
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
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE companies SET company_name='$company_name',company_email='$company_email',comapny_address='$comapny_address', company_phone='$company_phone' WHERE company_id='$company_id'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$company_id = $_GET['company_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM companies WHERE company_id='$company_id'");

while($res = mysqli_fetch_array($result))
{
	$company_name = $res['company_name'];
	$company_email = $res['company_email'];
	$comapny_address = $res['comapny_address'];
	$company_phone = $res['company_phone'];
	
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
				<td>Name</td>
				<td><input type="text" name="company_name" value="<?php echo $company_name;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="company_email" value="<?php echo $company_email;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="comapny_address" value="<?php echo $comapny_address;?>"></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="company_phone" value="<?php echo $company_phone;?>"></td>
			</tr>


			<tr>
				<td><input type="hidden" name="company_id" value=<?php echo $_GET['company_id'];?>></td>
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