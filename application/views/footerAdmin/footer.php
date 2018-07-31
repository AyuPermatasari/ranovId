
</div>
        <!--//content-inner-->
      <!--/sidebar-menu-->
        <div class="sidebar-menu">
          <header class="logo1">
            <h2>Admin</h2>
          </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
                    <ul id="menu" >
                        <li><a href="<?php echo site_url('HomeAdmin') ?>"><span>Home</span></a></li>
                        
                        
                        <!-- <li id="menu-academico" ><a href="<?php echo site_url('supplier') ?>"><span>Supplier</span></a></li>
                        <li id="menu-academico" ><a href="<?php echo site_url('bahan') ?>"><span>bahan</span></a></li>
                        <li id="menu-academico" ><a href="<?php echo site_url('transaksi_bahan') ?>"><span>Transaksi bahan</span></a></li> -->

                        <li class="sub-menu"> 
                            <a href="javascript:;"> 
                            <span>Personalia</span> 
                            </a> 
                            <ul class="sub"> 
                            <li><a href="<?php echo site_url('jabatan') ?>">Jabatan</a></li> 
                            <li><a href="<?php echo site_url('pegawai') ?>">Pegawai</a></li> 
                            <li><a href="<?php echo site_url('admin') ?>">Admin</a></li> 
                            <li><a href="<?php echo site_url('absensi') ?>">Absensi</a></li> 
                            </ul> 
                        </li>

                        <li class="sub-menu"> 
                            <a href="javascript:;"> 
                            <span>Bahan Baku</span> 
                            </a> 
                            <ul class="sub"> 
                            <li><a href="<?php echo site_url('supplier') ?>">Supplier</a></li> 
                            <li><a href="<?php echo site_url('bahan') ?>">Bahan</a></li> 
                            <li><a href="<?php echo site_url('transaksibhn') ?>">Transaksi Bahan</a></li> 
                            </ul> 
                        </li>
                        <!-- <li id="menu-academico" ><a href="<?php echo site_url('Jabatan') ?>"><span>Jabatan</span></a></li>
                        <li id="menu-academico" ><a href="<?php echo site_url('Admin') ?>"><span>Admin</span></a></li>
                        <li><a href="<?php echo site_url('Pegawai') ?>"><span>Pegawai</span></a></li> -->
                        
                        <li class="sub-menu"> 
                            <a href="javascript:;"> 
                            <span>Produksi Barang</span> 
                            </a> 
                            <ul class="sub"> 
                            <li><a href="<?php echo site_url('produksi') ?>">Produksi</a></li> 
                            <li><a href="<?php echo site_url('produk') ?>">Produk</a></li> 
                            <!-- <li><a href="<?php echo site_url('admin') ?>">Admin</a></li> 
                            <li><a href="<?php echo site_url('absensi') ?>">Absensi</a></li>  -->
                            </ul> 
                        </li>
                        

                        <li class="sub-menu"> 
                            <a href="javascript:;"> 
                            <span>Pengiriman</span> 
                            </a> 
                            <ul class="sub"> 
                            <li><a href="<?php echo site_url('pengiriman') ?>">Pengiriman</a></li> 
                            <li><a href="<?php echo site_url('kurir') ?>">Kurir</a></li> 
                            <!-- <li><a href="<?php echo site_url('admin') ?>">Admin</a></li> 
                            <li><a href="<?php echo site_url('absensi') ?>">Absensi</a></li>  -->
                            </ul> 
                        </li>

                        
                        <li class="sub-menu"> 
                            <a href="javascript:;"> 
                            <span>Laporan</span> 
                            </a> 
                            <ul class="sub"> 
                            <li><a href="<?php echo site_url('lappenggajian') ?>">Penggajian</a></li> 
                            <li><a href="<?php echo site_url('lappengeluaran') ?>">Pengeluaran</a></li> 
                            <li><a href="<?php echo site_url('lappemasukan') ?>">Pemasukan</a></li> 
                            </ul> 
                        </li>


                        <!-- <li id="menu-academico" ><a href="<?php echo site_url('produk') ?>"><span>produk</span></a></li> -->
                        <!-- <li id="menu-academico" ><a href="<?php echo site_url('produksi') ?>"><span>Produksi</span></a></li> -->
                        <!-- <li id="menu-academico" ><a href="<?php echo site_url('pengiriman') ?>"><span>Pengiriman</span></a></li>
                        <li id="menu-academico" ><a href="<?php echo site_url('kurir') ?>"><span>Kurir</span></a></li>
 -->
                        <li id="menu-academico" ><a href="<?php echo site_url('Login/logout')?>" onClick="JavaScript: return confirm('Anda yakin untuk Keluar?')"><span>Logout</span></a></li>
                        
                
                    </ul>
                </div>
                </div>
                <div class="clearfix"></div>    
              </div>
              <script>
              var toggle = true;
                    
              $(".sidebar-icon").click(function() {                
                if (toggle)
                {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
                }
                else
                {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                  $("#menu span").css({"position":"relative"});
                }, 400);
                }
                      
                      toggle = !toggle;
                    });
              </script>
<!--js -->
<script src="<?php echo base_url('') ?>assets/bs/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url('') ?>assets/bs/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url('') ?>assets/bs/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
          
          <script type="text/javascript">
             $(document).ready(function(){
             $('#example').DataTable();
          });
          </script>
   

       <script src="<?php echo base_url('') ?>assets/bs/js/menu_jquery.js"></script>
        <script type="text/javascript">
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }      
          </script>
</body>
</html>