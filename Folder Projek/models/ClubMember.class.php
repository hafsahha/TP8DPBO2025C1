<?php
class ClubMember extends DB
{
    function getAll()
    {
        $query = "SELECT 
                    cm.student_id,
                    cm.club_id,
                    s.name AS student_name,
                    c.name AS club_name,
                    cm.join_date
                  FROM club_members cm
                  JOIN students s ON cm.student_id = s.id
                  JOIN clubs c ON cm.club_id = c.id";
        return $this->execute($query);
    }    

    function getAllStudents()
    {
        return $this->execute("SELECT id, name FROM students");
    }

    function getAllClubs()
    {
        return $this->execute("SELECT id, name FROM clubs");
    }

    function add($data)
    {
        $query = "INSERT INTO club_members (student_id, club_id, join_date)
                  VALUES ('{$data['student_id']}', '{$data['club_id']}', '{$data['join_date']}')";
        return $this->execute($query);
    }

    function delete($student_id, $club_id)
    {
        $query = "DELETE FROM club_members WHERE student_id = $student_id AND club_id = $club_id";
        return $this->execute($query);
    }
}
?>
