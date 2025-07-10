<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<nav
						class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"style=" background-color: #5a5c69;"
					>
						<!-- Sidebar Toggle (Topbar) -->
						<img src="<?= base_url('assets/logo_toko/logo-shop.png') ?>" style="max-width: 8vh;">
      <!-- Navbar-Logo -->
      					<a href="#" class="navbar-logo" style="font-size: 1.6rem; font-weight: 700;color: #fff; font-family: 'Courier New', Courier, monospace; box-shadow: 0 0 30px #000000;">Treed Feet</a>


						

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							
							<!-- Nav Item - Alerts Keranjang-->
                        <li class="nav-item no-arrow ">
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
						</li>

						<li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
						</li>
							
							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
						
								<!-- Topbar Search -->
						<form class="srch my-3" action="<?php echo base_url('/shop/search')?>" method="post">
							<div class="input-group">
								<input
									type="text"
									name="keyword"
									class="form-control  border-1 small"
									placeholder="Search for..."
									aria-label="Search"
									autocomplete="off"
									aria-describedby="basic-addon2"
								/>
								<div class="input-group-append" >
									<button class="btn btn-dark" type="submit" style="border: 1px #fff;box-shadow: 0 0 3px #000000;">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
							
						</ul>
					</nav>
					<!-- End of Topbar -->