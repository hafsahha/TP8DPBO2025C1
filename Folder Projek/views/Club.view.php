<?php
class ClubView
{
    public function render($data)
    {
        $rows = "";
        $no = 1;
        foreach ($data['clubs'] as $c) {
            $rows .= "<tr class='text-center align-middle'>
                <td>{$no}</td>
                <td>{$c['name']}</td>
                <td>{$c['description']}</td>
                <td>{$c['coach']}</td>
                <td>
                    <a href='club.php?id_edit={$c['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='club.php?id_hapus={$c['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }

        $name = $desc = $coach = "";
        $formAction = "club.php";
        $btnLabel = "Simpan";
        $btnName = "add";

        if (isset($data['edit_data'])) {
            $c = $data['edit_data'];
            $name = $c['name'];
            $desc = $c['description'];
            $coach = $c['coach'];
            $formAction = "club.php?id_edit={$c['id']}";
            $btnLabel = "Update";
            $btnName = "update";
        }

        $tpl = new Template("templates/club.html");
        $tpl->replace("FORM_ACTION", $formAction);
        $tpl->replace("NAME_VAL", $name);
        $tpl->replace("DESC_VAL", $desc);
        $tpl->replace("COACH_VAL", $coach);
        $tpl->replace("BUTTON_LABEL", $btnLabel);
        $tpl->replace("BUTTON_NAME", $btnName);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}
