<?php
class Student extends DB
{
    public function getStudents()
    {
        return $this->execute("SELECT * FROM students");
    }

    public function getStudentById($id)
    {
        return $this->execute("SELECT * FROM students WHERE id=$id");
    }

    public function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $email = $data['email'];
        $join_date = $data['join_date'];
        $gender = $data['gender'];

        $query = "INSERT INTO students (name, nim, phone, email, join_date, gender)
                  VALUES ('$name', '$nim', '$phone', '$email', '$join_date', '$gender')";
        return $this->execute($query);
    }

    public function update($id, $data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $email = $data['email'];
        $join_date = $data['join_date'];
        $gender = $data['gender'];

        $query = "UPDATE students SET 
                    name='$name', nim='$nim', phone='$phone', 
                    email='$email', join_date='$join_date', gender='$gender' 
                  WHERE id=$id";
        return $this->execute($query);
    }

    public function delete($id)
    {
        return $this->execute("DELETE FROM students WHERE id=$id");
    }
}
