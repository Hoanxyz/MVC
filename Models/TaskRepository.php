<?php
namespace Models;

use Models\TaskResourceModel;
use Models\TaskModel;

class TaskRepository
{
	protected $taskResourceModel;

	public function __construct(TaskModel $task)
	{
		$this->taskResourceModel = new TaskResourceModel($task);
	}

	public function showAllTasks()
	{
		return $this->taskResourceModel->showAllTasks();
	}

	public function create()
	{
		return $this->taskResourceModel->create();
	}

	public function showTask($id)
	{
		return $this->taskResourceModel->showTask($id);
	}

	public function edit($id)
	{
		return $this->taskResourceModel->edit($id);
	}

	public function delete($id)
	{
		return $this->taskResourceModel->delete($id);
	}
}