@isset($arr)
    <?php
if(count($arr) >0){
    ?>
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th class="border-top-0">Tanggal Beli</th>
                <th class="border-top-0">Nama Ticket</th>
                <th class="border-top-0">Pembeli</th>
                <th class="border-top-0">Jumlah Ticket</th>
                <th class="border-top-0">Total Harga</th>
                <th class="border-top-0">Bukti Transfer</th>
                <th class="border-top-0">Status</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach($arr as $a){
    ?>
            <tr>
                <td><?= substr($a->created_at, 0, 10) ?></td>
                <td><?= \App\Models\Ticket::find($a->ticket_id)->nama ?></td>
                <td><?= \App\Models\User::find($a->user_id)->nama ?></td>
                <td><?= \App\Models\Transaksi::where('transaksi_id', '=', $a->id)->sum('jumlah') ?></td>
                <td><?= 'Rp ' . number_format($a->total, 0, ',', '.') ?></td>
                <td><a href="{{ $a->img_dir }}" target="_blank">lihat bukti transfer</a></td>
                <td style="color:orange">Menunggu</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button
                            class="btn btn-success mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white btn_terima"
                            value="{{ $a->id }}">Terima</button>
                        <button
                            class="btn btn-danger mx-2 d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white btn_tolak"
                            value="{{ $a->id }}">Tolak</button>
                    </div>
                </td>
            </tr>
            <?php
        }
    ?>
        </tbody>
    </table>
    <?php
}
?>

@endisset
