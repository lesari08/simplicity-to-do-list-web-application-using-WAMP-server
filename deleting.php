
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


$number_of_rows = $_POST['count'];

print_r($_POST);
echo "<br>";
echo isset($_POST['n1']);

$num_of_deletions = 0;
for($i = 0; $i < $number_of_rows; $i++)
{
	$var = 'n'.$i;
	if (isset($_POST[$var]))
	{
		++$num_of_deletions;
		echo $_POST[$var];
		$sql="DELETE FROM tasklist WHERE taskno=".$_POST[$var]."";
	
		if(!($connection->query($sql))) 
		{
		//if an error occured, mysqi_error(), looks at the most recent function
		//call, and returns a description of its most recent error
		echo "Error: ".$sql. " ". mysqi_error($connectoin);
		}
		else
		{
			echo "removal number ".$num_of_deletions." successful"."<br>";
		}
	}
}
mysqli_close($connection);

//redirect the user to the index page after the above code has completed
header('Location: index.php');


?>
</body>
</html>


