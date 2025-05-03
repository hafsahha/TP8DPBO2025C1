<?php
class ClubEvent extends DB
{
    public function getAll()
    {
        $query = "SELECT ce.id, c.name AS club_name, ce.event_name, ce.event_date, ce.location, ce.club_id
                  FROM club_events ce
                  JOIN clubs c ON ce.club_id = c.id
                  ORDER BY ce.event_date";
        return $this->execute($query);
    }

    public function getById($id)
    {
        return $this->execute("SELECT * FROM club_events WHERE id = $id");
    }

    public function add($data)
    {
        $query = "INSERT INTO club_events (club_id, event_name, event_date, location)
                  VALUES (
                    '{$data['club_id']}',
                    '{$data['event_name']}',
                    '{$data['event_date']}',
                    '{$data['location']}'
                  )";
        return $this->execute($query);
    }

    public function update($id, $data)
    {
        $query = "UPDATE club_events SET
                    club_id = '{$data['club_id']}',
                    event_name = '{$data['event_name']}',
                    event_date = '{$data['event_date']}',
                    location = '{$data['location']}'
                  WHERE id = $id";
        return $this->execute($query);
    }

    public function delete($id)
    {
        return $this->execute("DELETE FROM club_events WHERE id = $id");
    }
}
