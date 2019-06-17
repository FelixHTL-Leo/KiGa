
<?php
  error_reporting(E_ERROR | E_PARSE);
  $link = new mysqli("mariadb", "root", "test");
	session_start();
	if($_SESSION['user']){
	}
	else{
		//header("location:index.php");
    Print '<script>window.location.assign("index.php");</script>';
	}
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$details = mysqli_real_escape_string($link, $_POST['details']);
		$time = strftime("%X");//time
		$date = strftime("%B %d, %Y");//date
		$decision ="no";
    $groupPlace = mysqli_real_escape_string($link, $_POST['groups']);
		mysqli_connect("mariadb", "root","test") or die(mysql_error()); //Connect to server
		mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
    if($_POST['public'] != null){
      $decision = "yes";
      $groupPlace ="-";
    }
    $query = mysqli_query($link, "Select * from messages"); // SQL Query
    $id = mysqli_num_rows($query) + 1;
		mysqli_query($link, "INSERT INTO messages (id, details, date_posted, time_posted, public, groupPlaceing) VALUES ('$id','$details','$date','$time','$decision','$groupPlace')"); //SQL query
    //header("location: home.php");
    Print '<script>window.location.assign("home.php");</script>';
	}
	else
	{
		//header("location:home.php"); //redirects back to home
    Print '<script>window.location.assign("home.php");</script>';
	}
?>
