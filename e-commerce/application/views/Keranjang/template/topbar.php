<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<nav
						class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
					>
						<!-- Sidebar Toggle (Topbar) -->
						

						<!-- Topbar Search -->
						<form action="<?php echo base_url('/shop/search')?>" method="post">
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
								<div class="input-group-append">
									<button class="btn btn-dark" type="submit">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							
							<!-- Nav Item - Alerts -->
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

						
							
							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a
									class="nav-link dropdown-toggle"
									href="#"
									id="userDropdown"
									role="button"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<span class="mr-2 d-none d-lg-inline text-gray-600 "
										>Settings</span
									>
									
								</a>
								<!-- Dropdown - User Information -->
								<div
									class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown"
								>
									<a class="dropdown-item" href="<?= base_url('profile')?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Settings
									</a>
									
									<div class="dropdown-divider"></div>
									<a
										class="dropdown-item"
										href="<?= base_url('autentifikasi/logout'); ?>"
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>
						</ul>
					</nav>
					<!-- End of Topbar -->