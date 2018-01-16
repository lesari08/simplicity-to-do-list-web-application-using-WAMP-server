<html>
<head>
	<link rel="stylesheet" type="text/css" href="todostyle.css">
	<title text-align="center"> Simplicity: To-Do List </title>
</head>
<body>
<h1>Simplicity: To-Do List</h1>
 
	<?php
	  require_once('dbconnection.php');
	  include("classes.php"); ?>
	<?php

	$connection = Db_connect::getInstance();


	$sql = "SELECT * FROM tasklist";
	$result = $connection->query($sql) or die(mysql_error());
	$column = mysqli_fetch_array($result) or die(mysql_error());

	$late_count = 0;

	if($result->num_rows > 0)
	{
		//loop through the table so we can count the number of
		//tasks that each status has
		while($column = $result->fetch_assoc())
			{
				if ($column["status"] == "late")
				{	++$late_count;	}
			}
	}
		
		echo '<h2>'.$late_count." LATE TASKS".'</h2>';



	//run the same query again, but this time to print the tasks
	$sql = "SELECT * FROM tasklist";
	$result = $connection->query($sql) or die(mysql_error());
	$column = mysqli_fetch_array($result) or die(mysql_error());


	//the function num_rows() checks to see if a result of a query returns more
	//than zero rows

	if($result->num_rows > 0)
	{
		//the fetch_assoc() function organizes the results in an associative array
		//Once the results are in an array we can use a loop to reach each item
		?> 
		<p>
		<table>
		<tr>
		
		<th>TASK NAME</th>
		<th>TASK STATUS</th>
		<th>DUE DATE</th>
		</tr>
		


		
	<?php
		while($column = $result->fetch_assoc())
			{

				if($column["status"] == "late")
				{
				echo 
				'<tr>'.
				'<th>'. $column["name"].'</th>'.
				'<th>'. $column["status"].'</th>'.
				'<th>'. $column["due_date"].'</th>'.
				'</tr>';
				}
			}
			
			echo '</table></p>';
	}
	else
	{
		echo "No rows found";
	}
	 
	  echo '<form action="index.php" >
	  <button type="submit" formaction="index.php">Back to previous page</button>
	  </form>';

	  
	mysqli_close($connection);
	?>

</body>
</html>