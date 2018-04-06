<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$person_id = mysqli_real_escape_string($mysqli, $_POST['person_id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$cell_phone = mysqli_real_escape_string($mysqli, $_POST['cell_phone']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	
	// checking empty fields
	if(empty($person_id) || empty($name) || empty($cell_phone)  || empty($email) ) {	
			
		if(empty($person_id)) {
			echo "<font color='red'>Person ID field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($cell_phone)) {
			echo "<font color='red'>Cell Phone field is empty.</font><br/>";
		}	
		

		if(empty($email)) {
			echo "<font color='red'>Email ID field is empty.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE persons SET person_id='$person_id',name='$name',cell_phone='$cell_phone', email='$email' WHERE person_id='$person_id'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$person_id = $_GET['person_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM persons WHERE person_id='$person_id'");

while($res = mysqli_fetch_array($result))
{
	$person_id = $res['person_id'];
	$name = $res['name'];
	$cell_phone = $res['cell_phone'];
	$email = $res['email'];
	
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
				<td>Id</td>
				<td><?php echo $person_id;?></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Cell Phone</td>
				<td><input type="text" name="cell_phone" value="<?php echo $cell_phone;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>


			<tr>
				<td><input type="hidden" name="person_id" value=<?php echo $_GET['person_id'];?>></td>
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