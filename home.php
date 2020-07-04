<?php
	require_once('auth.php');
?>

<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<title>Dashboard</title>
</head>
<body>

<div class="design-block">
<center>
<h1>Dashboard</h1>
<h3>Successful Login. Welcome, <font color="#000000"><?php echo ($_SESSION['SESS_MEMBER_USER']); ?></font></h3>
<h4>Choose option :  </h4>
<a href="add.php"><button type="button">Add Student Data</button></a><br><br>
<a href="search.php"><button type="button">Search Student</button></a><br><br>
<a href="list.php"><button type="button">List Student Data</button></a><br><br>
<a href="update.php"><button type="button">Update Student Data</button></a><br><br>
<a href="delete.php"><button type="button">Delete Student Record</button></a><br><br>
<a href="addevents.php"><button type="button">Add New Event</button></a><br><br>
<a href="admin events list.php"><button type="button">List Events</button></a><br><br>




<?php

include 'config.php';

try
{
	//connect to database
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//to count the number of row
	$stmt = $conn->prepare("SELECT COUNT(*) AS JUMLAH FROM STUDENTS");
	
	//execute the sql query
	$stmt->execute();
	
	//function fetchObject() used to get the column data
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$jum = $row['JUMLAH'];
	
	echo "<div class='datcount'>";
	echo "<br>Data count : <b>$jum</b><br>";
	echo "</div>";
	
}
catch(PDOException $e)
{
	echo "Connection failed : " . $e->getMessage();
}	

//close conection
$conn = null;

?>

<br><br>
<div class="Logout">
<a href="start.php" onclick=><button>Logout</button></a>

</form>
</div>

</center>
</div>
</body>
</html>
