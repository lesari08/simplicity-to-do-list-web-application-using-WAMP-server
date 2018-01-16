<?php

class Tasks
{
    var $name;
    var $due_date;
    var $status;

   protected function getName() 
	{
        return $this->due_date;
    }
    public function getDueDate()
	{
	}
		
    public function getStatus()
	{
	}
	
	public function setName($new_name)
	{
		$this->name = $new_name;
	}
    public function setDueDate()
	{
	}
    public function setStatus()
	{
	}


    public function findAll($connection)
	{
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

	}

    // Common method
    public function printTaskInfo() {
    print $this->getName() . "\n";
	print $this->getDueDate() . "\n";
	print $this->getStatus() . "\n";
    }
}

class StartedTasks extends Tasks
{
  
   
}
class CompletedTasks extends Tasks
{
  
   
}
class PendingTasks extends Tasks
{
  
   
}
class LateTasks extends Tasks
{
  
   
}


//$class1 = new Task;
//$class1->print();
//echo $class1->

?>
