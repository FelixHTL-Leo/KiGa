<html>
	<head>
		<title>Kindergarden Message Website</title>
		<link rel="stylesheet" href="CSS/registerStyle.css">
	</head>
	<body>
		<h2>Register a new Account</h2>
		<div class="topleft">
			<a href="home.php">Click here to go back</a><br/><br/>
		</div>
		<form action="register.php" method="post">
			Enter Username: <input type="text" name="username" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			Employee <input type="checkbox" name="emp" value="no"/><br/>
			<select name="groups">
		    <option value="Blue">Blue</option>
		    <option value="Green">Green</option>
		    <option value="Yellow">Yellow</option>
		    <option value="Red">Red</option>
	  	</select>
			<input id="registerButton" type="submit" value="Register"/>
		</form>
	</body>
</html>

<?php
error_reporting(E_ERROR | E_PARSE);
$link = new mysqli("mariadb", "root", "test");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$groups = mysqli_real_escape_string($link, $_POST['groups']);
	if($_POST['emp'] != null){
		$emp = '+';
		$groups = '-';
	}
	else{
		$emp = '-';
	}
  $bool = true;
	mysqli_connect("mariadb", "root","test") or die(mysql_error()); //Connect to server
	mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query($link, "Select * from users"); //Query the users table
	while($row = mysqli_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		$query = mysqli_query($link, "Select * from users"); // SQL Query
    $id = mysqli_num_rows($query) + 1;
		mysqli_query($link, "INSERT INTO users (id, username, password, role, groups) VALUES ('$id','$username','$password','$emp','$groups')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered! ");</script>'; // Prompts the user
		Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	}
}
?>
