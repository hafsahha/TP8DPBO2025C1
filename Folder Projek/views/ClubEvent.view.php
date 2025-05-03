<?php
class ClubEventView
{
    public function render($data)
    {
        $rows = "";
        $clubOptions = "";
        $no = 1;

        $nameVal = "";
        $dateVal = "";
        $locVal = "";
        $selectedClub = "";
        $formAction = "club_event.php";
        $buttonLabel = "Simpan";
        $btnName = "add";

        if (isset($data['edit_event'])) {
            $e = $data['edit_event'];
            $nameVal = $e['event_name'];
            $dateVal = $e['event_date'];
            $locVal = $e['location'];
            $selectedClub = $e['club_id'];
            $formAction = "club_event.php?id_edit={$e['id']}";
            $buttonLabel = "Update";
            $btnName = "update";
        }

        foreach ($data['events'] as $e) {
            $rows .= "<tr class='text-center align-middle'>
                <td>{$no}</td>
                <td>{$e['club_name']}</td>
                <td>{$e['event_name']}</td>
                <td>{$e['event_date']}</td>
                <td>{$e['location']}</td>
                <td>
                    <a href='club_event.php?id_edit={$e['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='club_event.php?id_hapus={$e['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }

        foreach ($data['clubs'] as $c) {
            $selected = $c['id'] == $selectedClub ? "selected" : "";
            $clubOptions .= "<option value='{$c['id']}' $selected>{$c['name']}</option>";
        }

        $tpl = new Template("templates/club_event.html");
        $tpl->replace("FORM_ACTION", $formAction);
        $tpl->replace("EVENT_NAME", $nameVal);
        $tpl->replace("EVENT_DATE", $dateVal);
        $tpl->replace("LOCATION", $locVal);
        $tpl->replace("BUTTON_LABEL", $buttonLabel);
        $tpl->replace("BUTTON_NAME", $btnName);
        $tpl->replace("OPTION_CLUB", $clubOptions);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}
