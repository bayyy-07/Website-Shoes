<div class="card text-white mb-3" style="display:flex; background-color: #fff; margin: 1rem; max-width: 135vh; min-height: 80vh; margin: 80px auto; margin-top: 2%;">
    <div class="row">
                <div class="col-md-4 my-2 mx-4"  >
                    <img src="<?= base_url()?>assets/produk/<?= $image?>" class="img-fluid rounded-start" alt="Adidas" style="max-width: 40vh; padding: 0px; border: 1px solid #000000; border-radius: 10px; margin-top: 2rem; "> 
                </div> 
                <div class="text-dark " style="margin: 1rem; margin-top: 2rem; margin-left: 1rem;" >       
                            <h1 class="bold700 " style="font-size: 1.3rem; color: #000000;" ><?= $nama_produk?></h1>       
                        <div class="row" style="align-items: center; margin: 2px; " >
                            
                            <div style="font-size: 1rem; ">
                                <img src="<?= base_url("assets/icons/star.png")?>" class="img-fluid rounded-start" alt="starIcons" style="margin: 1px; max-width: 2vh;  margin-right: 8px;">4.5 (1396 Review) |  
                                <span>1.3M Followers</span>| 2,2RB Terjual
                            </div> 

                        </div>

                                <div class="label-harga" style="width: 70vh;padding: 1rem;background-color: #ffffffdd; color: crimson; border:1px solid #000000;">
                                <h2>Rp <?= $harga; ?></h2>
                                <br>
                                    <img src="<?= base_url("assets/logo_toko/logo-shop.png")?>" class="img-fluid rounded-start" style="max-width: 3vh;" alt="">
                                    <span>TreendFeet Garansi 100% Ori </span></br>
                                    <span style="color: #000000;" >Garansi uang kembali jika produk tidak ori!</span>
                                </div>
                                
                                <div class="" style="width: 70vh; margin: 1rem;color: #000000;">
                                <form action="">
                                        <table class="detail" style="margin: 1rem;width: 50vh;">

                                            <tr>
                                                <td >Voucher Toko</td>
                                                <td>:Tidak Ada</td>                       
                                            </tr>
                                            <tr>
                                                <td colspan="2"> <hr></td> 
                                            </tr>

                                            <tr>
                                                <td >Protection  </td>
                                                <td>:Proteksi Kerusakan + <span>New</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> <hr></td> 
                                            </tr>
                                            
                                            <tr>
                                                <td>Warna</td>
                                                <td>:<?= $warna;?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> <hr></td> 
                                            </tr>
                                            <tr>
                                            <td>Size</td>
                                            <td>
                                                <select name="size">               
                                                    <option value="30" <?php if($size == "40") { echo "SELECTED"; } ?>>40</option>
                                                    <option value="31" <?php if($size == "41") { echo "SELECTED"; } ?>>41</option>
                                                    <option value="32" <?php if($size == "42") { echo "SELECTED"; } ?>>42</option>
                                                    <option value="33" <?php if($size == "43") { echo "SELECTED"; } ?>>43</option>
                                                    <option value="34" <?php if($size == "44") { echo "SELECTED"; } ?>>44</option>
                                                    <option value="35" <?php if($size == "45") { echo "SELECTED"; } ?>>45</option>
                                                </select>
                                            </td>                                           
                                            </tr>
                                            <tr>
                                                <td colspan="2"> <hr></td> 
                                            </tr>
                                            

                                        </table> 
                                        <a class="btn btn-sm btn-outline-danger float-right" href="<?= base_url('keranjang/tambahKeranjang/' . $id); ?>"><span class="fas fa-shopping-cart fa-fw"></span> Masukan Keranjang</a>
                                    </form> 
                                    
                                    
                                </div>
                            </div>



                </div>
            </div>
 </div> 
