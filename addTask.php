<html>
<head>
	<title text-align="center"> Simplicity: To-Do List </title>
	<style>
		body {background-color: aliceblue;}
		h1   {color: blue;}
		p    {color: green;}
	</style>
</head>
<body>
<h1 align="center" >Simplicity: To-Do List</h1>

<h2> Add New Task </h2>

	<form action="insert.php" method="post">
	Name of task: <input type="text" name="fname" /> <br><br>
	Due Date: <input type="date" name="fduedate" /><br><br>

	<!-- dropdown menu for the user to select the status of their task-->
	Status of the task 
	<select name ="dropstatus" >
		<option value="pending">Not Started/Pending</option>
		<option value="started">Started</option>
		<option value="completed">Completed</option>
	</select> <br><br>
	<input type="submit" value="Submit" />
	</form>
</body>
</html>