<html>
	<head>
		<title>Kindergarden Message Website</title>
		<link rel="stylesheet" href="CSS/homeParentsStyle.css">
	</head>
	<body>
		<div class="topleft">
			<a href="index.php">Click here to log out</a> <br/>
		</div>
	</body>
	<br/>
	<h2 align="center">Messages</h2>
	<table width="1525" border="1px">
			<tr>
				<th width="1225">Details</th>
				<th width="300">Post Time</th>
			</tr>
			<?php
				$link = new mysqli("localhost", "root", "test");
				session_start(); //starts the session
				if($_SESSION['user']){ //checks if user is logged in
				}
				else{
					header("location:index.php"); // redirects if user is not logged in
				}
				$user = $_SESSION['user'];
				mysqli_connect("localhost", "root","test") or die(mysql_error()); //Connect to server
				mysqli_select_db($link, "kigaDB") or die("Cannot connect to database"); //connect to database
				$query = mysqli_query($link, "Select * from messages"); // SQL Query
				$stmt = $link->prepare("SELECT groups FROM users WHERE username = ?");
				$stmt->bind_param('s', $user);

				$stmt->execute();

				$stmt->bind_result($user);
				$stmt->store_result();
				$stmt->fetch();
				while($row = mysqli_fetch_array($query))
				{
					if($row['public'] == 'yes' || $row['public'] == 'no' && $user == $row['groupPlaceing']){
						Print "<tr>";
							Print '<td align="center">'. $row['details'] . "</td>";
							Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print "</tr>";
					}
				}
			?>
	</table>
</html>
