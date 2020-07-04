<?php
	//require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Add Events</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Add Events</h1>
<form action="addevents.php" method="post" enctype="multipart/form-data" >
<input type="text" value="" placeholder="Event ID" event name="e_id">
<input type="text" value="" placeholder="Event Name" name="event_name">
<input type="text" value="" placeholder="Date of Event (YYYY-MM-DD)" name="doe">
<input type="text" value="" placeholder="Venue" name="venue">
 <button>Submit</button>
</form>


<?php

include 'config.php';

//declare variable. use 'isset' to determine if variable is set and not null. if null, not execute
if(isset($_POST["e_id"]) && isset($_POST["event_name"]) && isset($_POST["doe"]) && isset($_POST["venue"]))
{
	$e_id = (isset($_POST["e_id"]) ? $_POST["e_id"] : null);
	$event_name = (isset($_POST["event_name"]) ? $_POST["event_name"] : null);
	$doe = (isset($_POST["doe"]) ? $_POST["doe"] : null);
	$venue = (isset($_POST["venue"]) ? $_POST["venue"] : null);


	try
	{
		//connect to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//insert data into db
		$stmt = $conn->prepare("INSERT INTO events VALUES(? , ? , ?, ? );");
		
		//execute sql query
		$stmt->execute(array($e_id,$event_name,$doe,$venue));
		
		
		
		echo "<script>alert('Success! Data Inserted.')</script>";
		
		
		
		
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
<a href="home.php"><button type="button">Back</button></a><br>
</div>
</center>
</div>
</body>
</html>