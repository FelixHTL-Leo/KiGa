<html>
	<head>
		<title>Kindergarden Message Website</title>
		<link rel="stylesheet" href="CSS/homeStyle.css">
	</head>
	<?php
  $link = new mysqli("localhost", "root", "");
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	?>
	<body>
		<h2>Message Menu</h2>
		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
		<div class="topright">
			<a href="register.php" id="link1">Click here to register a new Account</a>
		</div>
		<div class="topleft">
			<a href="logout.php">Click here to logout</a>
		</div>

		<form action="add.php" method="POST" id="form">
			Public post? <input type="checkbox" name="public" value="yes" checked/><br/>
			<input id="addButton" type="submit" value="Add to Messages"/>
		</form>
		<textarea rows="5" cols="50" name="details" form="form" placeholder="New Message"></textarea>
		<h2 align="center">Messages written</h2>
		<table border="1px" width="1525">
			<tr>
				<th width="60">Details</th>
				<th width="300">Post Time</th>
				<th width="300">Edit Time</th>
				<th width="10">Edit</th>
				<th width="10">Delete</th>
				<th width="100">Public Post</th>
			</tr>
			<?php
				mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //connect to database
				$query = mysqli_query($link, "Select * from messages"); // SQL Query
				while($row = mysqli_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="left" width="60"><textarea name="textArea" id="" cols="60" rows="5"  readonly>'. $row['details'] ."</textarea></td>";
						Print '<td align="center" width="250">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print '<td align="center" width"250">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
						Print '<td align="center" width="10"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
						Print '<td align="center" width="10"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
						Print '<td align="center" width="10">'. $row['public']. "</td>";
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?id=" + id);
			  }
			}
		</script>
	</body>
</html>
