<html>
	<head>
		<title>Kindergarden Message Website</title>
		<link rel="stylesheet" href="CSS/editStyle.css">
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	$id_exists = false;
	?>
	<body>
		<h2>Edit Message</h2>
		<a href="home.php">Return to Home page</a>
		<h2 align="center">Currently Selected</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Public Post</th>
			</tr>
			<?php
        $link = new mysqli("localhost", "root", "");
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
					mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //connect to database
					$query = mysqli_query($link, "Select * from messages Where id='$id'"); // SQL Query
					$count = mysqli_num_rows($query);
					if($count > 0)
					{
						while($row = mysqli_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="left" width="60"><textarea name="textArea" id="" cols="60" rows="5"  readonly>'. $row['details'] ."</textarea></td>";
								Print '<td align="center" width="250">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
								Print '<td align="center" width"250">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
								Print '<td align="center" width="10">'. $row['public']. "</td>";
							Print "</tr>";
              $value = $row['details'];
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
		<?php
		if($id_exists)
		{
		Print '
		<form action="edit.php" method="POST" id="form2">
			public post? <input type="checkbox" name="public[]" value="yes"/><br/>
			<input type="submit" value="Update Messages" id="updateButton"/>
		</form>
		<textarea rows="5" cols="50" name="details" form="form2">'. $value .'</textarea>
		';
		}
		else
		{
			Print '<h2 align="center">There is no data to be edited.</h2>';
		}
		?>
	</body>
</html>
<?php
  $link = new mysqli("localhost", "root", "");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //Connect to database
		$details = mysqli_real_escape_string($link, $_POST['details']);
		$public = "no";
		$id = $_SESSION['id'];
		$time = strftime("%X");//time
		$date = strftime("%B %d, %Y");//date
		foreach($_POST['public'] as $list)
		{
			if($list != null)
			{
				$public = "yes";
			}
		}
		mysqli_query($link, "UPDATE messages SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'") ;
		header("location: home.php");
	}
?>
