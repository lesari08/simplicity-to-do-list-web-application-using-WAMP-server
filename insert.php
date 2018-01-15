<html>
<head>
<title> Tasks </title>
</head>
<body style="background-color:aliceblue;">
<?php

$datbasename = "todo_db";
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "todo_db";

//create a connection to your DBMS 
//with the servername, username and password
$connection = new mysqli($servername, $username, $password, $db_name);

//check connection to make sure it completed successfully 
if($connection->connect_error) 
{
	//die() prints the message then exits the current script
	//no value is returned
	die("Connection failed: " . $connection->connect_error);
	
}

//save the values from the form into these variable names
$taskname = $_POST['fname'];
$status = $_POST['dropstatus'];
$duedate = $_POST['fduedate'];

//insert the items from our web form into our tasklist table
$sql="INSERT INTO tasklist(name, status, due_date) VALUES('$taskname','$status', '$duedate')";


//If the insertion into the database was unsuccessful, throw an error
if(!($connection->query($sql))) 
{
	//if an error occured, mysqi_error(), looks at the most recent function
	//call, and returns a description of its most recent error
	echo "Error: ".$sql. " ". mysqi_error($connectoin);

}

$sql = "SELECT * FROM tasklist";
$result = $connection->query($sql) or die(mysql_error());
$column = mysqli_fetch_array($result) or die(mysql_error());

//the function num_rows() checks to see if a result of a query returns more
//than zero rows
if($result->num_rows > 0)
{
	//the fetch_assoc() function organizes the results in an associative array
	//Once the results are in an array we can use a loop to reach each item
	while($column = $result->fetch_assoc())
		{
			?> <input type="checkbox"> <?php

			echo $column["taskno"]." - ".$column["name"]." - ". $column["status"]. " - ".$column["due_date"]."<br>";
		}
}
else
{
	echo "No rows found";
}
	

mysqli_close($connection);

//redirect the user to the index page after the above code has completed
header('Location: index.php');
?>
</body>
</html>