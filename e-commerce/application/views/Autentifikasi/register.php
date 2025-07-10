<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

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
    <link href="<?php echo base_url('assets/css/register.css?v2') ?>" rel="stylesheet">

  </head>
  <body>
    <!--Navbar start-->

    <div class="navbar">
      <!-- Navbar-Logo -->
      <div class="navbar-nav">
        <img src="<?= base_url('assets/logo_toko/logo-shop.png')?>" style="max-width: 8vh;">
      <!-- Navbar-Logo -->
        <a href="#" class="navbar-logo">Treed Feet</a>
      </div>

      <!-- Navbar-Menu -->
        
        
    </div>

    <!--Navbar end-->
    
    <div class="form-register" >
        <h1>Sign Up<h1>
        <form class="user" method="POST" action="<?= base_url('autentifikasi/register');?>">
            <div class="mb-control">
                <input type="text" value="<?= set_value('nama');?>"  placeholder="Full name" class="form-type" name="nama" id="nama" autocomplete="off"/>
                <legend class="valid">
                  <?= form_error('nama');?>
                </legend>
              </div>
              
              <div class="mb-control">
                <input type="text" value="<?= set_value('email');?>" placeholder="Email Address" class="form-type" name="email" id="email" autocomplete="off"/>
                <legend class="valid">
                  <?= form_error('email');?>
                </legend>
              </div>
              <div class="mb-control">
                <input type="password" value="<?= set_value('password');?>" placeholder="Password" class="form-type" name="password" id="password" autocomplete="off"/>
                <legend class="valid">
                  <?= form_error('password');?>
                </legend>
            </div>
            <div class="mb-control">
                <input type="password" value="<?= set_value('password1');?>" placeholder="Repeat Password" class="form-type" name="password1" id="password1" autocomplete="off"/>
                <legend class="valid">
                  <?= form_error('password1');?>
                </legend>
            </div>

            <div class="mb-control">
                <input type="text" value="<?= set_value('alamat');?>" placeholder="Alamat" class="form-type" name="alamat" id="alamat" autocomplete="off"/>
                <legend class="valid">
                  <?= form_error('alamat');?>
                </legend>
            </div>
            
            <button type="submit" name="submit">Submit</button>
        </form>
    
        <div class="link-register">
            <h2>Have Already an Account?</h2>
            <a href="<?php echo base_url('Autentifikasi')?>">Sign In</a>
        </div>

    </div>
</div>



    
        







    <script>
      feather.replace();
    </script>
    <!-- Ham-menu Javascript -->
    <script src="js/script.js">
      
    </script>


  </body>
</html>