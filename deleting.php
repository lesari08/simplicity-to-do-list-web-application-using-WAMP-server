
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


