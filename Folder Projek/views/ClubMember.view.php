<?php

class ClubMemberView
{
    public function render($data)
    {
        $rows = "";
        $studentOptions = "";
        $clubOptions = "";
        $no = 1;

        foreach ($data['members'] as $m) {
            $rows .= "<tr class='text-center align-middle'>
                <td>{$no}</td>
                <td>{$m['student_name']}</td>
                <td>{$m['club_name']}</td>
                <td>{$m['join_date']}</td>
                <td>
                    <a href='club_member.php?hapus_s={$m['student_id']}&hapus_c={$m['club_id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }

        foreach ($data['students'] as $s) {
            $studentOptions .= "<option value='{$s['id']}'>{$s['name']}</option>";
        }

        foreach ($data['clubs'] as $c) {
            $clubOptions .= "<option value='{$c['id']}'>{$c['name']}</option>";
        }

        $tpl = new Template("templates/club_member.html");
        $tpl->replace("JUDUL", "Manajemen Anggota Ekskul");
        $tpl->replace("OPTION_STUDENT", $studentOptions);
        $tpl->replace("OPTION_CLUB", $clubOptions);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}
?>
