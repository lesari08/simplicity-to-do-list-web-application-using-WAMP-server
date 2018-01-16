<html>
<head>
	<link rel="stylesheet" type="text/css" href="todostyle.css">
	<title text-align="center"> Simplicity: To-Do List </title>
</head>
<body>
<h1>Simplicity: To-Do List</h1>
<h1>Remove Tasks</h1>

  <?php
	  require_once('dbconnection.php');
	  include("classes.php"); 
  ?>

  <?php

	$connection = Db_connect::getInstance();


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

		<form action="deleting.php" method="post" >
		
		
  <?php
		 $counter =1;
		 $task = "task1";

		while($column = $result->fetch_assoc())
			{
			$task=$column["name"];
			$taskno = $column["taskno"];
			
			echo '<input type="checkbox" name="n'.$counter. '"  value=" '.$taskno. ' " />';
			echo $task.'<br>';
			

				++$counter;
			}
			echo '<input type="hidden" name="count" value=" '.$counter. '" />';
			echo '<input type="submit" name="num'.$counter.' " value="submit" />';
			echo '</form>';

	}
	else
	{
		echo "No rows found";
	}
		
	//mysqli_close($connection);
  ?>
</body>
</html>