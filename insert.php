<html>
<head>
<title> Tasks </title>
</head>
<body style="background-color:aliceblue;">

 <?php
  require_once('dbconnection.php');
  include("classes.php"); ?>
  
<?php

$connection = Db_connect::getInstance();

//save the values from the form into these variable names
$taskname = $_POST['fname'];
$status = $_POST['dropstatus'];
$duedate = $_POST['fduedate'];

$today = date("y-m-d");
//if the date variable is not set
if($duedate == "")
{
	$duedate= $today;
}

//if the date the user enters has already pasted,
//change the status of that task to late
echo "date due: $duedate and today: $today";
if(new DateTime($today) > new DateTime($duedate))
{
	$status = "late";
}

//insert the items from our web form into our tasklist table
$sql="INSERT INTO tasklist(name, status, due_date) VALUES('$taskname','$status', '$duedate')";


//If the insertion into the database was unsuccessful, throw an error
if(!($connection->query($sql))) 
{
	//if an error occured, mysqi_error(), looks at the most recent function
	//call, and returns a description of its most recent error
	echo "Error: ".$sql. " ". mysqi_error($connectoin);

}

	

mysqli_close($connection);

//redirect the user to the index page after the above code has completed
header('Location: index.php');
?>
</body>
</html>