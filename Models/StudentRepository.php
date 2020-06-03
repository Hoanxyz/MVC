<?php
namespace Models;

use Models\StudentResourceModel;
use Models\StudentModel;

class StudentRepository
{
	protected $studentResourceModel;

	public function __construct(StudentModel $student)
	{
		$this->studentResourceModel = new StudentResourceModel($student);
	}

	public function showAllTasks()
	{
		return $this->studentResourceModel->showAllTasks();
	}

	public function create()
	{
		return $this->studentResourceModel->create();
	}

	public function showTask($id)
	{
		return $this->studentResourceModel->showTask($id);
	}

	public function edit($id)
	{
		return $this->studentResourceModel->edit($id);
	}

	public function delete($id)
	{
		return $this->studentResourceModel->delete($id);
	}
}