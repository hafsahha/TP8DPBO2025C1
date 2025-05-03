<?php
include_once("models/ClubEvent.class.php");
include_once("models/Club.class.php");
include_once("views/Template.class.php");
include_once("views/ClubEvent.view.php");

class ClubEventController
{
    private $event;
    private $club;

    function __construct()
    {
        $this->event = new ClubEvent(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->event->open();
        $this->event->getAll();

        $this->club->open();
        $this->club->getAll();

        $data = ["events" => [], "clubs" => []];

        while ($row = $this->event->getResult()) {
            $data["events"][] = $row;
        }
        while ($row = $this->club->getResult()) {
            $data["clubs"][] = $row;
        }

        $this->event->close();
        $this->club->close();

        $view = new ClubEventView();
        $view->render($data);
    }

    public function add()
    {
        $this->event->open();
        $this->event->add($_POST);
        $this->event->close();
        header("Location: club_event.php");
    }

    public function delete($id)
    {
        $this->event->open();
        $this->event->delete($id);
        $this->event->close();
        header("Location: club_event.php");
    }

    public function edit($id)
    {
        $this->event->open();
        $this->event->getById($id);
        $edit = $this->event->getResult();

        $this->event->getAll();
        $this->club->open();
        $this->club->getAll();

        $data = [
            "events" => [],
            "clubs" => [],
            "edit_event" => $edit
        ];

        while ($row = $this->event->getResult()) {
            $data["events"][] = $row;
        }
        while ($row = $this->club->getResult()) {
            $data["clubs"][] = $row;
        }

        $this->event->close();
        $this->club->close();

        $view = new ClubEventView();
        $view->render($data);
    }

    public function update($id)
    {
        $this->event->open();
        $this->event->update($id, $_POST);
        $this->event->close();
        header("Location: club_event.php");
    }
}
