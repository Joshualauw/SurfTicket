@isset($arr)
    <?php
        if(count($arr) > 0){
            ?>
            <table class="table no-wrap">
                <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Nama</th>
                        <th class="border-top-0">Provinsi</th>
                        <th class="border-top-0">Kota</th>
                        <th class="border-top-0">Harga</th>
                        <th class="border-top-0">Jumlah ticket terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tp = 0;
                    $jt = 0;
                        foreach ($arr as $i=>$a){
                            $tkt = \App\Models\Ticket::find($a->ticket_id);
                            $tp += $tkt->harga;
                            $jt += $a->jum;
                            ?>
                            <tr>
                                <td><?=$i+1?></td>
                                <td class="txt-oflo"><?=$tkt->nama?></td>
                                <td><?= \App\Models\Provinsi::find($tkt->provinsi_id)->nama?></td>
                                <td><?= \App\Models\Kota::find($tkt->kota_id)->nama?></td>
                                <td><span class="text-success"><?="Rp " . number_format($tkt->harga,0,',','.');?></span></td>
                                <td><?=$a->jum?></td>
                            </tr>
                            <?php
                        }
                    ?>

                </tbody>
            </table>
            <div>
                Total Pendapatan : <?= "Rp " . number_format($tp,0,',','.');?> <br>
                Total Ticket Terjual : <?=$jt?>
             </div>
            <?php
        }
    ?>
@endisset
