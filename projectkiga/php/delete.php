<?php
  error_reporting(E_ERROR | E_PARSE);
  $link = new mysqli("mariadb", "root", "test");
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysqli_connect("mariadb", "root","test") or die(mysql_error()); //Connect to server
		mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
		$id = $_GET['id'];
		mysqli_query($link, "DELETE FROM messages WHERE id='$id'");
		header("location: home.php");
	}
?>
