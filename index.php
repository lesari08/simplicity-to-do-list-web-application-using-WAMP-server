<html>
<head>
	<link rel="stylesheet" type="text/css" href="todostyle.css">
	<title text-align="center"> Simplicity: To-Do List </title>
</head>
<body>
<h1>Simplicity: To-Do List</h1>
 
  <?php
	 require_once('dbconnection.php');
	 include("classes.php"); 
  ?>

  <?php 

	$connection = Db_connect::getInstance();
	
	

	$sql = "SELECT * FROM tasklist";
	$result = $connection->query($sql) or die(mysql_error());
	$column = mysqli_fetch_array($result) or die(mysql_error());

	$pending_count = $completed_count= $started_count = $late_count = $total_count = 0;

	if($result->num_rows > 0)
	{
		//loop through the table so we can count the number of
		//tasks that each status has
		while($column = $result->fetch_assoc())
			{
				if($column["status"] == "pending")
				{ ++$pending_count;}
				else if ($column["status"] == "completed")
				{	++$completed_count;}
				else if ($column["status"] == "late")
				{	++$late_count; }
				else if ($column["status"] == "started")
				{	++$started_count;	}
				else
				{echo "unidentifed status: ".$column["status"] ;}	
			}
	}
		$total_count = $pending_count + $late_count + $completed_count + $started_count;
		
		
		
		  echo "Today's date: ".date("m/d/ Y") . "<br>";
		  echo '<h2>'.$total_count." TASKS".'</h2>';
		  echo '<p>
		 <a href="startedList.php">'.$started_count. ' Started</a><br>
		 <a href="pendingList.php">'.$pending_count. ' Pending</a><br>
		 <a href="completedList.php">'.$completed_count. ' Completed</a><br>
		 <a href="lateList.php">'.$late_count. ' Late</a><br></p>

		<a href="addTask.php">Add a New Task</a><br><br>
		<a href="removeTask.php">Remove Tasks</a><br> ';


	$taskObj = new Tasks();
	//print all the tasks 
	$taskObj->findall($connection);


	mysqli_close($connection);
  ?>

</body>
</html>