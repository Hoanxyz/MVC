<?php
namespace Controllers;

use Models\StudentModel;
use Core\Controller;
use Models\StudentRepository;

class studentController extends Controller
{
    private $studentRepository;
    private $student;

    public function __construct()
    {
        $this->student = new StudentModel();
        $this->studentRepository = new StudentRepository($this->student);
    }
    public function index1()
    {
        $d['students'] = $this->studentRepository->showAllTasks();
        // var_dump($d);
        // die();
        $this->set($d);
        $this->render("index1");
    }

    public function create()
    {
        if (isset($_POST["submit"])) {
            $this->student->setName($_POST["name"]);
            $this->student->setAge($_POST["age"]);
            $this->student->setCreated_at(date('Y-m-d H:i:s'));
            $this->student->setUpdated_at(date('Y-m-d H:i:s'));

            if ($this->studentRepository->create()) {
                header("Location: " . WEBROOT . "Student/index1");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $d["student"] = $this->studentRepository->showTask($id);


        if (isset($_POST["submit"]))
        {
            $this->student->setName($_POST["name"]);
            $this->student->setAge($_POST["age"]);

            $this->student->setUpdated_at(date('Y-m-d H:i:s'));

            if ($this->studentRepository->edit($id))
            {
                header("Location: " . WEBROOT . "Student/index1");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->studentRepository->delete($id))
        {
            header("Location: " . WEBROOT . "Student/index1");
        }
    }
}
?>