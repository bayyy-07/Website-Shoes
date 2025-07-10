
<div class="Shop  "  >
    <h1 class="text-center text-black">Shop Now, Good look Later</h1>
    <p class="text-center">"Our shoes are designed with your comfort in mind,Made with high-quality materials,they provide ample support for you feet and are breat hable to keep them cool and dry.Plus, our shoes come in a variety of styles to fit any occasion." </p>

    <nav  class="navbar topbar mb-4 d-flex flex-column  " >
      <div class="container-fluid bg-white "  style=" justify-content: space-between; border: 1px solid #858796; border-radius: 30px; width: 158vh; min-height: 11vh;">

  <!-- Brand Selection -->
  <?php $kategori = $this->D_produk->get_kategori();?>
        <div class="btn-group align-center" >
          <a class="btn btn-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; width: 22vh;  ">
            Brand
          </a>
          
            <ul class="dropdown-menu" >
            <li><a class="dropdown-item" href="<?= base_url('Shop')?>">All</a></li>
              <?php foreach ($kategori as $key => $value) {?>
                <li><a class="dropdown-item" href="<?= base_url('shop/kategori_brand/' .$value->id_brand) ?>">
                <?= $value->nama_brand?></a></li>
              <?php } ?>
              
            </ul>
        </div>

<!-- Harga Selection -->
<div class="btn-group">
          <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; width: 22vh; ">
            Price
          </button>
            <ul class="dropdown-menu text-center">
            <li><a class="dropdown-item" href="<?= base_url('Shop/kategori_hargaUP') ?>">Harga : Rendah ke Tinggi</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Shop/kategori_hargaDown') ?>">Harga : Tinggi ke Rendah</a></li>
            </ul>
        </div>
<!-- Size Selection -->
        <div class="btn-group">
          <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; width: 22vh; ">
            size
          </button>
            <ul class="dropdown-menu text-center">
                <li><a class="dropdown-item" href="#">35-40</a></li>
                
            </ul>
        </div>
<!-- Warna Selection -->
<?php $kategori_warna = $this->D_produk->get_kategori_warna();?>
        <div class="btn-group">
          <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; width: 22vh; ">
            color
          </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('Shop')?>">All</a></li>
            <?php foreach ($kategori_warna as $key => $value) {?>
                <li><a class="dropdown-item" href="<?= base_url('shop/kategori_warna/' .$value->id_warna) ?>">
                <?= $value->warna?></a></li>
              <?php } ?>

                
            </ul>
        </div>


        <!-- Garis Pembatas -->
        <span style="font-size: 2rem;"> | </span>

        <!-- Fitur Keranjang -->
        
        <div class="nav-item no-arrow ">
        <a class="nav-item nav-link "  href="<?= base_url("keranjang")?>"  role="button">
                <i class="fas fa-shopping-cart fa-fw" style="font-size: 1.5rem;" ></i>
                                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" >
									<?= $this->D_keranjang->getDataWhere('temp',
                  ['email_user' => $this->session->userdata('email')])->num_rows();?>

								</span>
                            </a>
						</div>


        <!-- Fitur Search -->
        <form action="<?php echo base_url('/shop/search')?>" method="post">
                  <div class="btn-group">
                    <input
                      type="text"
                      name="keyword"
                      class="form-control  border-1 small"
                      placeholder="Search for..."
                      autocomplete="off"
                      style="max-width: 20vh;"
                    />
                    <div class="input-group-append">
                      <button class="btn btn-dark" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
          </form>

      
      </div>
    </nav>
</div>

<div class="row my-1 align-center "   >
        <div class="card-group border-0  justify-content-center" style="  border: 1px solid #000000; max-width: 135vh; margin-left: 11rem; " >
            <?php    
                        $count = -1;
                        foreach ($allPdkwarna as $row) : 
                            
                            if (++$count == 48) break;
                        ?>
          <div class="col">
          <div class="card " style="width: 13rem; margin: 0.3rem; border-radius: 5px; ">              
                <img src="<?php echo base_url()."/assets/produk/".$row->image ?>" class="my-2" style="border: 0.5px solid #A9A9A9; border-radius: 10px; max-width: 20vh; height: 16vh; display:block; margin-left: auto; margin-right: auto;" class="card-img-top" alt="...">
                <div class="card border-0 my-1" style="height: 12vh; margin-left: 18px; ">
                    <h1 class="bold900" style="font-size: 10pt; color: #000000;"><?php echo $row->nama_produk ?></h1>
                    <div class="row " style="display: flex;align-items: center;  margin: 2px; margin-left: 0px;">
                        <img src="<?= base_url("assets/icons/star.png")?>"  alt="starIcons" style=" max-width: 2vh;  margin-right: 9px; ">
                        <span style="font-size: 10pt;">4.5 (<?php echo $row->stok ?> Items)</span>
                        <h1  style="color: #e74a3b; font-size: 14pt;">Rp  <?php echo $row->harga ?></h1>
                      </div>
                    </div>
                    <a class="btn btn-primary" href="<?= base_url('dashboard/detailProduk/' . $row->id_produk); ?>">BUY</a>            </div>  
          </div>
                    
        
            <?php endforeach; ?>
        </div>
    </div>

    
                    
        
