<?php

//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_MEMBER_USER']);
unset($_SESSION['SESS_MEMBER_PASS']);

?>

<html>
<head>
<link rel="shortcut icon" href="./images/dblogo.ico" />
<title>Database System</title>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>

<div class="logo"></div>

<div class="login-block">

<form action="user.php" method="post">
	<h1>User Login Page</h1>
	<input type="text" value="" placeholder="Username" name="us"/>
    <input type="password" value="" placeholder="Password"  name="pa" />
    <button>Submit</button>
 </form>

</div>

<?php

$uname = (isset($_POST["us"]) ? $_POST["us"] : null);
$pwd = (isset($_POST["pa"]) ? $_POST["pa"] : null);

include 'config.php';

if(isset($_POST["us"]) && isset($_POST["pa"]))
{

	try
	{
		//connect to db
		$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//sql query
		$stmt = $conn->prepare("SELECT ID, USERNAME, PASSWORD FROM USERLOGIN where username=?");

		//execute sql query
		$stmt->execute(array($uname));
		//fetch
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		//store fetched data into variable
		$i = $result['ID'];
		$u = $result['USERNAME'];
		$p = $result['PASSWORD'];
		if($uname == $u && $pwd == $p)
		{
			session_regenerate_id();
			$_SESSION['SESS_MEMBER_ID'] = $i;
			$_SESSION['SESS_MEMBER_USER'] = $u;
			$_SESSION['SESS_MEMBER_PASS'] = $p;
			session_write_close();
			header("location: user options.php");
			exit();
		}
		else
		{
			session_write_close();
			header("location: user.php");
			exit();
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed : " . $e->getMessage();
	}

	$conn = null;
}

?>

</body>
</html>
