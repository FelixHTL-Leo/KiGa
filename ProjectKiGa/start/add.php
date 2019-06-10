
<?php
  $link = new mysqli("localhost", "root", "");
	session_start();
	if($_SESSION['user']){
	}
	else{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$details = mysqli_real_escape_string($link, $_POST['details']);
		$time = strftime("%X");//time
		$date = strftime("%B %d, %Y");//date
		$decision ="no";
		mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
    if($_POST['public'] != null){
      $decision = "yes";
    }
    $query = mysqli_query($link, "Select * from messages"); // SQL Query
    $id = mysqli_num_rows($query);
		mysqli_query($link, "INSERT INTO messages (id, details, date_posted, time_posted, public) VALUES ('$id','$details','$date','$time','$decision')"); //SQL query
    header("location: home.php");
	}
	else
	{
		header("location:home.php"); //redirects back to hom
	}
?>
