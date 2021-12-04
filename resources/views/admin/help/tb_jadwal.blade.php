@isset($arr)
<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">#</th>
            <th class="border-top-0">Hari</th>
            <th class="border-top-0">Jam </th>
            <th class="border-top-0">Kuota</th>
            <th class="border-top-0">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arr as $i=>$a){
            ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$a->hari?></td>
                <td><?=substr($a->jam_awal,0,5)?> - <?=substr($a->jam_akhir,0,5)?></td>
                <td><?=$a->kuota?></td>
                <td>

                    <div class="btn-group">
                        <button data-toggle="modal" data-target="#exampleModalCenter" value="<?=$a->id?>" class="btn mx-2 btn-warning d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white tombol_edit"
                        >Edit</button>

                        <button value="<?=$a->id?>"  class="btn mx-2 btn-danger d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white tombol_delete"
                            >Delete</button>
                        </div>
                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
@endisset
