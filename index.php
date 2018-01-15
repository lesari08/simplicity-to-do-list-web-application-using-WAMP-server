<html>
<head>
	<title text-align="center"> Simplicity: To-Do List </title>
	<style>
		body {background-color: #f0ead6;}
		h1   {color: grey; text-align: center;}
		h2   {color: grey;text-align: center;}

		table{
			font-family: arial, georgia;
			width: 75%;
			text-align: left;
			padding:5px;
		    color: #404040;
			
		}
		tr, th{
			border: 1px;
			padding: 3px;
		}
		tr:nth-child(even) {
		background-color: white;
		}
		tr:nth-child(odd) {
		background-color: #949494;
		}
	
		li {
			display:center;
			float:left;
			padding: 10px;
		}
		li a{
		display: block;
		color: grey;
		width: 100%;
		font-size: 20px;
		text-align: center;
		padding: 0px,0px, 20px, 0ppx;
		margin: 20px;
		text-decoration: underline;
		}
		li a:hover {
		background-color: white;
		}
	
		ul {
			border-width: 2px;
			border-style: solid;
			border-color: #111111;
			list-style-type: none;
		
			width: 100%;
			margin: 10px;
			padding: 0px;
			overflow: hidden;
			background-color: #00000;
		}
		#myDIV{
		color: grey; 
		text-align: left;
		width = 100%;
		}
		a{
			font-family:arial;
			font-size:18px;
			color: grey;
			text-align: center;

		}
		p{
			font-family: arial, georgia;
			text-align:center;
			font-size:18px;
			
			
		}
</style>
</head>
<body>
<h1>Simplicity: To-Do List</h1>
 
<?php 
$datbasename = "todo_db";
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "todo_db";

//create a connection to your DBMS 
//required parameters: servername, username and password
//optional parameter: name of the database
$connection = new mysqli($servername, $username, $password, $db_name);

//check connection to make sure it completed successfully 
if($connection->connect_error) 
{
	//die() prints the message then exits the current script
	//no value is returned
	die("Connection failed: " . $connection->connect_error);
	
}


$sql = "SELECT * FROM tasklist";
$result = $connection->query($sql) or die(mysql_error());
$column = mysqli_fetch_array($result) or die(mysql_error());

$pending_count = 0;
$completed_count= 0;
$started_count = 0;
$late_count = 0;
$total_count = 0;

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

	//echo $total_count. 'Tasks'.'</h2
	echo '<h2>'.$total_count." TASKS".'</h2>';
  echo '<p>
  <a href="startedList.php">'.$started_count. ' Started</a><br>
 <a href="pendingList.php">'.$pending_count. ' Pending</a><br>
 <a href="completedList.php">'.$completed_count. ' Completed</a><br>
  <a href="lateList.php">'.$late_count. ' Late</a><br></p>

<a href="addTask.php">Add a New Task</a><br><br>
<a href="removeTask.php">Remove Tasks</a><br> ';





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
	
			echo 
			'<tr>'.
			'<th>'. $column["name"].'</th>'.
			'<th>'. $column["status"].'</th>'.
			'<th>'. $column["due_date"].'</th>'.
			'</tr>';
		}
		echo '</table></p>';
}
else
{
	echo "No rows found";
}
	
mysqli_close($connection);
?>

</body>
</html>