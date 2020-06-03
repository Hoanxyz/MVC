<?php
namespace Controllers;

use Models\TaskModel;
use Core\Controller;
use Models\TaskRepository;

class tasksController extends Controller
{
    private $taskRepository;
    private $task;

    public function __construct()
    {
        $this->task = new TaskModel();
        $this->taskRepository = new TaskRepository($this->task);
    }
    public function index()
    {
        // require(ROOT . 'Models/TaskModel.php');
        $d['tasks'] = $this->taskRepository->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["submit"])) {
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);
            $this->task->setCreated_at(date('Y-m-d H:i:s'));
            $this->task->setUpdated_at(date('Y-m-d H:i:s'));

            if ($this->taskRepository->create()) {
                header("Location: " . WEBROOT . "Tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $d["task"] = $this->taskRepository->showTask($id);


        if (isset($_POST["submit"]))
        {
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);

            $this->task->setUpdated_at(date('Y-m-d H:i:s'));

            if ($this->taskRepository->edit($id))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "Tasks/index");
        }
    }
}
?>