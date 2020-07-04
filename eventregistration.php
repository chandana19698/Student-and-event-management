<?php
	//require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Event Registration</title>
</head>
<body class="event">

<div class="design-block">
<center>
<h1>EVENT REGISTRATION FORM</h1>
<form action="eventregistration.php" method="post" enctype="multipart/form-data" >
<input type="text" value="" placeholder="ID" name="id">
<input type="text" value="" placeholder="Name" name="name">
<input type="text" value="" placeholder="Phone Number" name="phone">
<input type="text" value="" placeholder="user name" name="username">
<input type="text" value="" placeholder="event name" name="event_name">
<input type="text" value="" placeholder="event id" name="e_id">
 <button>Submit</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["username"]) && isset($_POST["event_name"]) && isset($_POST["e_id"]))
{
	echo "<script>alert('Success! inside if.')</script>";
	$id = (isset($_POST["id"]) ? $_POST["id"] : null);
	$name = (isset($_POST["name"]) ? $_POST["name"] : null);
	$phone = (isset($_POST["phone"]) ? $_POST["phone"] : null);
	$uname = (isset($_POST["username"]) ? $_POST["username"] : null);
	$event_name = (isset($_POST["event_name"]) ? $_POST["event_name"] : null);
	$e_id = (isset($_POST["e_id"]) ? $_POST["e_id"] : null);

	
	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//insert data into db
		$stmt = $conn->prepare("INSERT INTO EVENTREGISTRATION VALUES(? , ? , ? , ? , ? , ? );");
		
		//execute sql query
		$stmt->execute(array($id,$name,$phone,$username,$event_name,$e_id));
		
		
		
		echo "<script>alert('Success! Data Inserted.')</script>";
		header("location: eventregistration.php");
		
		
		
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

	//close conection
	$conn = null;
	
	
	
}




?>

<br><br>

<div class="back-but">
<a href="user options.php"><button type="button">Back</button></a><br>
</div>
</center>
</div>
</body>
</html>