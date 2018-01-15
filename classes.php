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


    public function findAll()
	{
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
