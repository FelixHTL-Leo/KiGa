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
	<h2 align="center">List</h2>
	<table width="1525" border="1px">
			<tr>
				<th width="1225">Details</th>
				<th width="300">Post Time</th>
			</tr>
			<?php
        $link = new mysqli("localhost", "root", "");
				mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysqli_select_db($link, "first_db") or die("Cannot connect to database"); //connect to database
				$query = mysqli_query($link, "Select * from list Where public='yes'"); // SQL Query
				while($row = mysqli_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['details'] . "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
					Print "</tr>";
				}
			?>
	</table>
</html>
