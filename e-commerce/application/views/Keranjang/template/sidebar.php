<!-- Sidebar -->
<ul
				class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion"
				id="accordionSidebar"
			>
				<!-- Sidebar - Brand -->
				<a
					class="sidebar-divider align-items-center justify-content-center topbar mb-3"
					href="index.html"
				>
					<div class="sidebar-brand">
						<img src="<?= base_url('assets/logo_toko/logo-shop.png')?>" style=" max-width: 7vh;" alt="">
						<div class="sidebar-brand-text ">Trend Feet </div>
					</div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0" />

				

				<!-- Divider -->
				<hr class="sidebar-divider" />

					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url("dashboard") ?>">
							<i class="fas fa-fw fa-home"></i>
							<span>Beranda</span></a>
					</li>

				<!-- Divider -->
				<hr class="sidebar-divider" />

				<!-- Heading -->
				<div class="sidebar-heading">Menu</div>

				

				<!-- Nav Item - Charts -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("shop")?>">
					<i class="fas fa-fw fa-shopping-cart"></i>
						
						<span>Shop</span></a
					>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("OfficialStore")?>">
					<i class="fas fa-fw fa-star"></i>
						
						<span>Official Store</span></a
					>
				</li>
				

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block" />

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

				
			</ul>
			<!-- End of Sidebar -->