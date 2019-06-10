<?php
	session_start();
  $link = new mysqli("localhost", "root", "");
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query($link, "SELECT * from users WHERE username='$username'"); //Query the users table if there are matching rows equal to $username
	$exists = mysqli_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
			$table_role = $row['role'];
		}
		if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if(($password == $table_password) && ($table_role == "+"))
				{
					$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
					header("location: home.php"); // redirects the user to the authenticated home page
				}
				else if(($password == $table_password) && ($table_role == "-")){
					$_SESSION['user'] = $username;
					header("location: homeParents.php");
				}

		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("index.php");</script>'; // redirects to Index.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("index.php");</script>'; // redirects to Index.php
	}
?>
