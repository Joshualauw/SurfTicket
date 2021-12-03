@isset($arr)
<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">Kode Promo</th>
            <th class="border-top-0">Nama Promo</th>
            <th class="border-top-0">Diskon</th>
            <th class="border-top-0">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($arr as $a){
                ?>
                 <tr>
                    <td><?=$a->kode?></td>
                    <td><?=$a->nama?></td>
                    <td><?=$a->diskon?>%</td>
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
