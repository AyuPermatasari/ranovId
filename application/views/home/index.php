	<body>
		<section id="container">
			<!--header start-->
			<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">
				<a href="<?php echo site_url('Home') ?>" class="logo">
					USER
				</a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->
			</header>
			<!--header end-->

			<!--sidebar start-->
			<aside>
				<div id="sidebar" class="nav-collapse">
					<!-- sidebar menu start-->
					<div class="leftside-navigation">
						<ul class="sidebar-menu" id="nav-accordion">
							<li>
								<a class="active" href="<?php echo site_url('Home') ?>">
									
									<span>Product</span>
								</a>
							</li>
							
							<!-- <li class="sub-menu">
								<a href="javascript:;">
									<i class="fa fa-book"></i>
									<span>UI Elements</span>
								</a>
								<ul class="sub">
									<li><a href="typography.html">Typography</a></li>
									<li><a href="glyphicon.html">glyphicon</a></li>
									<li><a href="grids.html">Grids</a></li>
								</ul>
							</li> -->
							

							<li>
								<a href="<?php echo site_url('home/kontak') ?>">
									<span>Kontak </span>
								</a>
							</li>

							
							<li>
								<a href="<?php echo site_url('Login/logout') ?>">
									
									<span>Logout</span>
								</a>
							</li>
							
						</ul>            </div>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">

						

				        <?php foreach ($data_produk as $key) { ?>
			            	<div class="col-lg-4 col-md-6 mb-4" style="color: white">

				                <div class="card h-100">
				                  <a class="MagicZoom" href="<?=base_url("assets/uploads")."/".$key->foto?>" rel="zoom-id:zoom;opacity-reverse:true;"> <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$key->foto ?>" alt="" height="150px"></a>
				                  <div class="card-body">
				                    <h4 class="card-title">
				                      <?php echo $key->nama_produk ?>
				                    </h4>
				                    <h5><?php echo $key->harga ?></h5>
			                      Stok : <?php echo $key->stok ?>
				                    <p class="card-text"></p>
				                  </div>
				                  <div class="card-footer">
			                      <a class="btn btn-default" href="<?php echo site_url('Pemesanan/index/'.$key->id_produk) ?>"><b>PESAN</b></a>
				                  </div>
				                </div>
				              </div>
			            <?php } ?>
					
				</section>

			</section>
			<!--main content end-->
		</section>
	
