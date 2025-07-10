<!-- Content Row -->

    <div class="row justify-content-center my-4" style="margin: 1rem;">
        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card o-hidden border-0 ">
                <img src="<?= base_url("assets/background/shoess.png")?>" class="card-img" alt="shoes">
                <div class="card-img-overlay">
                    <h2 class="card-title text-white">AIR JORDAN 6GX EASTSIDE</h2>
                    <p class="card-text">Discount 20% for Sneakers</br>
                        Fest Id 2024</p>
                    
                    <a href="#" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-lg-4 ">
            <div class="card o-hidden " >
                <img src="<?= base_url("assets/background/bg-dash.png")?>" class="card-img" alt="shoes">
                <div class="card-img-overlay " >
                    <h2 class="card-title bold400 " style=" color: #fff;">Compass Velocity GAZELLE LOW BLACK GUM</h2>
                    <p class="card-text" style="font-size: 0.7rem; color: #fff;">EXPLORE ALL COLLECTIONS</p>
                    <a href="#" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <div class="p " style="display: flex; justify-content:space-between ;  margin-left: 2rem;  padding: 3px;   background-color: #fff;   color: #000000; height: 4vh; width: 20vh; border-radius: 0px 5px 0px 0px;">
        <div>
            <p >Today Best Deals!   </p>
        </div> 
        <div>
            
        </div>
    </div>   
    <div class="row my-0" style="margin: 2rem; overflow-x: auto; overflow-y: hidden; " >
        
        <div class="card-group border-0  justify-content-center" style="  min-width: 230vh; background-color: #fff; " >
            <?php    
                        $count = -1;
                        foreach ($queryAllPdk as $prdk) : 
                            
                            if (++$count == 6) break;
                        ?>

            <div class="card bg-light " style="width: 10rem; margin: 1.5rem; ">
                
                <img src="<?php echo base_url()."/assets/produk/".$prdk->image ?>" class="my-2" style="border: 0.5px solid #A9A9A9; border-radius: 10px; max-width: 22vh; height: 19vh; display:block; margin-left: auto; margin-right: auto;" class="card-img-top" alt="...">
                <div class="card border-0 my-1 bg-light" style="height: 11vh; margin-left: 18px; ">
                    <h1 class="bold900" style="font-size: 8pt; color: #000000;"><?php echo $prdk->nama_produk ?></h1>
                    <div class="row " style="display: flex; align-items: center; margin: 2px; margin-left: 0px;">
                        <img src="<?= base_url("assets/icons/star.png")?>" class="img-fluid rounded-start" alt="starIcons" style=" max-width: 2vh;  margin-right: 8px; ">
                        <span style="font-size: 8pt;">4.5 (<?php echo $prdk->stok ?> Items)</span>
                        <h1  style="color: #e74a3b; font-size: 12pt;">Rp  <?php echo $prdk->harga ?></h1>
                    </div>
                </div>
                <a class="btn btn-primary" href="<?= base_url('dashboard/detailProduk/' . $prdk->id_produk); ?>">BUY</a>            </div>
                    
        
            <?php endforeach; ?>
        </div>
    </div>
</div>