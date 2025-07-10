<?= $this->session->flashdata('pesan'); ?> 

<div class="container-fluid">
    <center>
        <h3>Keranjang Belanja</h3>

        <table class="table break-text" id="table-datatable">
            <tr class="clm text-center" border="1">
                <th style="width: 5vh;">NO</th>
                <th style="width: 15vh;">Image</th>
                <th style="width: 25vh;">Nama Produk</th>
                <th style="width: 20vh; margin-left: 1rem;">Harga</th>
                <th style="width: 25vh;">Keterangan</th>
                <th style="width: 10vh;">Aksi</th>
            </tr>  
            <?php
            $no = 1;
            foreach ($temp as $t) {
            ?>
                <tr class="td mx-3">
                    <td class="text-center"><?= $no ?></td>
                    <td class="img text-center">
                        <img src="<?= base_url('assets/produk/' . $t['image']); ?>" alt="No Picture" width="80%">
                    </td>
                    <td class="name"><?= $t['nama_produk']; ?></td>
                    <td class="hrg text-center">Rp <?= number_format($t['harga'], ); ?></td>
                    <td><?= $t['keterangan']; ?></td>
                    <td class="text-center" nowrap>
                        <a href="<?= base_url('keranjang/hapusProduk/' . $t['id_produk']); ?>" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php 
                $no++;
            } 
            ?> 
        </table>
    </center>
</div>

<!-- TOTAL & CHECKOUT -->
<table style="max-width: 400vh; margin-left: 100vh;">
    <tr>
        <th></th>
        <th></th>
    </tr>  

    <?php 
    foreach ($totalHarga->result() as $total) { ?>
        <tr>
            <td colspan="3" nowrap>
                <a class="btn btn-sm btn-primary">
                    Total (<?= $this->D_keranjang->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?> produk) : 
                    <span>Rp <?= number_format($total->totalHarga, ) ?></span>
                </a>
                <a class="btn btn-sm btn-outline-danger" id="pay-button" >
                    <span class="fas fa-shopping-cart fa-fw"></span> Check Out
                </a>
            </td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>

<pre><div id="result-json"><br></div></pre>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-F3jf_Q-oJhvN15G_"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
      console.log('Pay button clicked');
        // SnapToken acquired from previous step
        snap.pay('<?= $snapToken ?>', {
// Optional
            // onSuccess: function(result){
            // console.log(result);
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            // },
// Optional
        //     onPending: function(result){
        //      console.log(result);
        //    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        //     },
// Optional
            // onError: function(result){
            //  console.log(result);
            //     document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            // }
        });
    };
</script>
