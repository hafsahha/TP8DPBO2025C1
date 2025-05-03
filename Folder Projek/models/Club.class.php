<?php
class Club extends DB
{
    public function getAll()
    {
        return $this->execute("SELECT * FROM clubs ORDER BY name");
    }

    public function getById($id)
    {
        return $this->execute("SELECT * FROM clubs WHERE id=$id");
    }

    public function add($data)
    {
        $query = "INSERT INTO clubs (name, description, coach)
                  VALUES (
                    '{$data['name']}',
                    '{$data['description']}',
                    '{$data['coach']}'
                  )";
        return $this->execute($query);
    }

    public function update($id, $data)
    {
        $query = "UPDATE clubs SET
                    name = '{$data['name']}',
                    description = '{$data['description']}',
                    coach = '{$data['coach']}'
                  WHERE id = $id";
        return $this->execute($query);
    }

    public function delete($id)
    {
        return $this->execute("DELETE FROM clubs WHERE id=$id");
    }
}
