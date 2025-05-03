<?php
include_once("models/Club.class.php");
include_once("views/Template.class.php");
include_once("views/Club.view.php");

class ClubController
{
    private $club;

    function __construct()
    {
        $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->club->open();
        $this->club->getAll();
        $data = ['clubs' => []];
        while ($row = $this->club->getResult()) {
            array_push($data['clubs'], $row);
        }
        $this->club->close();

        $view = new ClubView();
        $view->render($data);
    }

    public function add()
    {
        $this->club->open();
        $this->club->add($_POST);
        $this->club->close();
        header("Location: club.php");
    }

    public function edit($id)
    {
        $this->club->open();
        $this->club->getById($id);
        $edit = $this->club->getResult();

        $this->club->getAll();
        $data = ['clubs' => [], 'edit_data' => $edit];
        while ($row = $this->club->getResult()) {
            array_push($data['clubs'], $row);
        }
        $this->club->close();

        $view = new ClubView();
        $view->render($data);
    }

    public function update($id)
    {
        $this->club->open();
        $this->club->update($id, $_POST);
        $this->club->close();
        header("Location: club.php");
    }

    public function delete($id)
    {
        $this->club->open();
        $this->club->delete($id);
        $this->club->close();
        header("Location: club.php");
    }
}
