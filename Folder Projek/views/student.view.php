<?php
class StudentView
{
    public function render($data)
    {
        $rows = "";
        $no = 1;

        foreach ($data['students'] as $s) {
            $rows .= "<tr class='text-center align-middle'>
                <td>{$no}</td>
                <td>{$s['name']}</td>
                <td>{$s['nim']}</td>
                <td>{$s['phone']}</td>
                <td>{$s['join_date']}</td>
                <td>{$s['email']}</td>
                <td>{$s['gender']}</td>
                <td>
                    <a href='index.php?id_edit={$s['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='index.php?id_hapus={$s['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }

        // Prefill
        $name = $nim = $phone = $email = $join = $genderL = $genderP = "";
        $formAction = "index.php";
        $btnLabel = "Simpan";
        $btnName = "add";

        if (isset($data['edit_data'])) {
            $s = $data['edit_data'];
            $name = $s['name'];
            $nim = $s['nim'];
            $phone = $s['phone'];
            $email = $s['email'];
            $join = $s['join_date'];
            $genderL = $s['gender'] == "L" ? "checked" : "";
            $genderP = $s['gender'] == "P" ? "checked" : "";
            $formAction = "index.php?id_edit={$s['id']}";
            $btnLabel = "Update";
            $btnName = "update";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("FORM_ACTION", $formAction);
        $tpl->replace("NAME_VAL", $name);
        $tpl->replace("NIM_VAL", $nim);
        $tpl->replace("PHONE_VAL", $phone);
        $tpl->replace("EMAIL_VAL", $email);
        $tpl->replace("JOIN_VAL", $join);
        $tpl->replace("GENDER_L", $genderL);
        $tpl->replace("GENDER_P", $genderP);
        $tpl->replace("BUTTON_LABEL", $btnLabel);
        $tpl->replace("BUTTON_NAME", $btnName);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}
