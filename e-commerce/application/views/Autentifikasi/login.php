<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- LinkCSS -->
    <link href="<?php echo base_url('assets/css/login.css?v2') ?>" rel="stylesheet">

  </head>
  <body>
    <!--Navbar start-->

    <div class="navbar">
      <img src="assets/logo_toko/logo-shop.png" style="max-width: 8vh;">
      <!-- Navbar-Logo -->
      <a href="#" class="navbar-logo">Trend Feet</a>

      <!-- Navbar-Menu -->

        <div class="navbar-nav">
          <button class="btnlogin-popup">Login</button>
            
        </div>
        
    </div>
    <!--Navbar end-->
    
    <div class="main">
      <h1>Find your</br>
      <span>dream snekers</span></h1>
      <p>FIND YOUR SHOES FROM OUR VARIOUS</br>
      COLLECTIONS HERE SHOES ARE ENDLESS AND</p>
      <div class="explore">
        <button href="">EXPLORE MORE</button>
      </div>

    </div>
    <div class="form-login">
    <span class="icon-close">
      <ion-icon name="close-circle-outline"></ion-icon>
    </span>
        <h1>Sign In</h1>
            <!-- Flashdata Password salah!! -->
            <?php if ($this->session->flashdata('error')) {?>

            <div class="alert alert-danger">
                <a href="<?= base_url('autentifikasi'); ?>" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong ><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
            <?php } ?>
            
            <!-- Flashdata User belum diaktifasi!! -->
            <?php if ($this->session->flashdata('not-activated')) {?>

            <div class="alert alert-danger">
                <a href="<?= base_url('autentifikasi'); ?>" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong><?php echo $this->session->flashdata('not-activated'); ?></strong>
            </div>
            <?php } ?>
            <!-- Flasdata email belum terdaftar -->
            <?php if ($this->session->flashdata('email-error')) {?>

            <div class="alert alert-danger">
                <a href="<?= base_url('autentifikasi'); ?>" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong><?php echo $this->session->flashdata('email-error'); ?></strong>
            </div>
            <?php } ?>


        
        <form action="<?= base_url('autentifikasi')?>" method="POST">
            <div class="mb-control">
                <input type="text" placeholder="Email" class="form-type" name="email" id="email" autocomplete="off"/>
                <legend class="valid">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </legend>
            </div>
            <div class="mb-control">
                <input type="password" placeholder="Password" class="form-type" name="password" id="password" autocomplete="off"/>
                <legend class="valid">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </legend>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    
        <div class="link-register">
            <h2>Don't have an acount?</h2>
            <a href="<?php echo base_url('Autentifikasi/register')?>">Signup</a>
        </div>

    </div>
</div>



    
        







    <script>
      feather.replace();
    </script>
    <!-- logi Javascript -->
    <script src="assets/js/script.js"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  </body>
</html>