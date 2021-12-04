@isset($arr)
    <?php foreach ($arr as $a){
        ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="<?=$a->img_dir?>"
                        alt="..." />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?=$a->nama?></h5>
                            <?="Rp " . number_format($a->harga,0,',','.');?> <br>
                            Total Kuota : <?=\App\Models\Jadwal::where("ticket_id", "=", $a->id)->sum('kuota')?> <br>

                            <?php
                                $avg = \App\Models\Review::where("ticket_id", "=", $a->id)->avg('rating');
                                if($avg ==""){
                                    echo "belum ada ulasan";
                                    $avg = 0;
                                }
                                else{
                                    for($i = 0; $i<5 ; $i++){
                                        if($i < $avg){
                                            echo "<i class='fas fa-star text-warning'></i>";
                                        }
                                        else{
                                            echo "<i class='fas fa-star text-secondary'></i>";
                                        }
                                    }
                                    echo "<br>";
                                }
                            ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="/detailTicket/<?=$a->id?>">View
                                Detail</a>
                            <a class="btn btn-outline-danger mt-auto"
                                href="/deleteTicket/<?=$a->id?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
@endisset
