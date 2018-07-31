<body>
   <div class="page-container">
   <!--/content-inner-->
  <div class="left-content">
     <div class="inner-content">
    <!-- header-starts -->
      <div class="header-section">
      <!-- top_bg -->
            
          <div class="clearfix"></div>
        <!-- /top_bg -->
        </div>
        <div class="header_bg">
            
              <div class="header">
                <div class="head-t">
                  
                    <!-- start header_right -->
                  
                    
                  <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
          
        </div>
          <!-- //header-ends -->
        
        <div class="container-fluid p-0">

      <div class="col-sm-12">
        <div class="my-auto"><h1>Edit produk</h1> 
          <br>
          <?php if (validation_errors()) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo validation_errors(); ?></strong></div><?php } 
                                                else if ($this->session->flashdata('terhapus')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('terhapus'); ?></strong></div><?php } else if ($this->session->flashdata('fail')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('fail'); ?></strong></div><?php } else if ($this->session->flashdata('sudah_input')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-success">
                                                    <strong><?php echo $this->session->flashdata('sudah_input'); ?></strong></div><?php } ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="panel panel-default">
                        <?php foreach ($get_produk as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('produk/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                             
                            <div style="margin-top: 0px" class="form-group">
                                <label>Nama produk</label>
                                <input class="form-control" id="nama_produk" name="nama_produk" type="text" placeholder="Nama produk" value="<?php echo $key->nama_produk; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>harga</label>
                                <input class="form-control" id="harga" name="harga" type="number" placeholder="harga" value="<?php echo $key->harga; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>stok</label>
                                <input class="form-control" id="stok" name="stok" type="number" placeholder="stok" value="<?php echo $key->stok; ?>">
                            </div>
                             <div style="margin-top: 0px" class="form-group">
                                <label>Gambar</label>
                                <input class="form-control" id="foto" name="userfile" type="file" placeholder="foto">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>
                                
                            </div><?php } ?>
                          <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      
    <div class="clearfix"> </div>
    </div>