<?php
namespace Models;

use Core\ResourceModel;
use Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
	public function __construct(TaskModel $task)
	{
		$this->_init("tasks", "id", $task);
	}
} 