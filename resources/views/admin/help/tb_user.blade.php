@isset($arr)

    <table class="table text-nowrap">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Nama</th>
                <th class="border-top-0">Username</th>
                <th class="border-top-0">Email</th>
                <th class="border-top-0">Role</th>
                <th class="border-top-0">Ban</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($arr as $a){
    $role = ($a->isAdmin == 0) ? "user biasa" : "admin";
    $ban = ($a->isBan == 0) ? "<td style='color: lime;'>no</td>" : "<td style='color: red;'>yes</td>";
    ?>
            <tr>
                <td><?= $a->id ?></td>
                <td><?= $a->nama ?></td>
                <td><?= $a->username ?></td>
                <td><?= $a->email ?></td>
                <td><?= $role ?></td>
                <?= $ban ?>
                <td>
                    <button
                        class="btn btn-danger d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white tombol_ban"
                        value="<?= $a->id ?>">ubah status</button>
                </td>

                    <?php
}
?>
        </tbody>
    </table>
    </div>

@endisset
