<?php
namespace Models;

use Core\ResourceModel;
use Models\StudentModel;

class StudentResourceModel extends ResourceModel
{
	public function __construct(StudentModel $student)
	{
		$this->_init("students", "id", $student);
	}
} 