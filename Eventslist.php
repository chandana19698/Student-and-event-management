<?php
	//require_once('auth.php');
?>
<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/design.css">
<link rel="stylesheet" type="text/css" href="./css/table.css">
<title>Event List Data</title>
</head>
<body>
<div class="logo"></div>
<div class="design-block">
<center>
<h1>Events List</h1>


<?php

include 'config.php';

	
try
{
	
	//connect to database
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$i = 0;
	$stmt = 'CALL GetEventList()';
            // call the stored procedure
            $q = $conn->query($stmt);
            $q->setFetchMode(PDO::FETCH_ASSOC);
	
	echo "<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 5px;
	}
	</style>";
	echo "This Data was fetched by stored procedure GetEventList!";
	echo "<br><center>";
	echo "<table class='responstable'>";
	echo "<tr>";
	echo "	<th>No.</th>";
	echo "	<th>Event Name</th>";
	echo "	<th>Date Of Event</th>";
	echo "	<th>Venue</th>";
	echo "</tr>";
	
	//use php function fetch() to get the db column data
	while ($row = $q->fetch(PDO::FETCH_ASSOC))
	{
        //use the fetched data to store into variable
		$ids = $row['EVENT_NAME'];
		$names = $row['DATE_OF_EVENT'];
		$kos = $row['VENUE'];
		
		echo "<tr>";
		echo "	<td>".($i+1)."</td>";
	 	echo "	<td>$ids</td>";
		echo "	<td>$names</td>";
		echo "	<td>$kos</td>";
		echo "</tr>";
		
		$i++;
	}
	
	
	echo "</tr></table></center>";
	
	
}	
catch (PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

//close conection
$conn = null;


?>

<br><br>
<div class="back-but">
<a href="user options.php"><button type="button">Back</button></a><br>
</div>
</center>
</div>
</body>
</html>