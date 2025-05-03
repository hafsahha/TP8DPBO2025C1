<?php
include_once("models/Student.class.php");
include_once("views/Student.view.php");
include_once("views/Template.class.php");

class StudentController
{
    private $student;

    public function __construct()
    {
        $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->student->open();
        $this->student->getStudents();

        $data = ['students' => []];
        while ($row = $this->student->getResult()) {
            array_push($data['students'], $row);
        }

        $this->student->close();

        $view = new StudentView();
        $view->render($data);
    }

    public function add()
    {
        $this->student->open();
        $this->student->add($_POST);
        $this->student->close();
        header("Location: index.php");
    }

    public function delete($id)
    {
        $this->student->open();
        $this->student->delete($id);
        $this->student->close();
        header("Location: index.php");
    }

    public function edit($id)
    {
        $this->student->open();
        $this->student->getStudentById($id);
        $edit = $this->student->getResult();

        $this->student->getStudents();
        $data = [
            'students' => [],
            'edit_data' => $edit
        ];

        while ($row = $this->student->getResult()) {
            array_push($data['students'], $row);
        }

        $this->student->close();

        $view = new StudentView();
        $view->render($data);
    }

    public function update($id)
    {
        $this->student->open();
        $this->student->update($id, $_POST);
        $this->student->close();
        header("Location: index.php");
    }
}
