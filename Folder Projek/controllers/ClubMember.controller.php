<?php
include_once("Conf.php");
include_once("models/DB.class.php");
include_once("models/ClubMember.class.php");
include_once("views/Template.class.php");
include_once("views/ClubMember.view.php");

class ClubMemberController
{
    private $clubMember;

    function __construct()
    {
        $this->clubMember = new ClubMember(
            Conf::$db_host,
            Conf::$db_user,
            Conf::$db_pass,
            Conf::$db_name
        );
    }

    public function index()
    {
        $this->clubMember->open();
        $this->clubMember->getAll();

        $data = [
            "members" => [],
            "students" => [],
            "clubs" => []
        ];

        while ($row = $this->clubMember->getResult()) {
            $data["members"][] = $row;
        }

        $this->clubMember->getAllStudents();
        while ($row = $this->clubMember->getResult()) {
            $data["students"][] = $row;
        }

        $this->clubMember->getAllClubs();
        while ($row = $this->clubMember->getResult()) {
            $data["clubs"][] = $row;
        }

        $this->clubMember->close();

        $view = new ClubMemberView();
        $view->render($data);
    }

    public function add()
    {
        $this->clubMember->open();
        $this->clubMember->add($_POST);
        $this->clubMember->close();
        header("Location: club_member.php");
    }

    public function delete($student_id, $club_id)
    {
        $this->clubMember->open();
        $this->clubMember->delete($student_id, $club_id);
        $this->clubMember->close();
        header("Location: club_member.php");
    }
}
?>
