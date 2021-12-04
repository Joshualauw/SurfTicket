@foreach ($arr as $item)
    @if(isset($spc))
        <?php
            if($spc == $item->id){
                ?>
                <option selected value="<?= $item->id ?>"><?= $item->nama ?></option>
                <?php
            }
            else{
                ?>
                <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                <?php
            }
        ?>
    @else
        <option value="<?= $item->id ?>"><?= $item->nama ?></option>
    @endif
@endforeach
