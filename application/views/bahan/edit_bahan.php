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
        <div class="my-auto"><h1>Edit bahan</h1> 
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
                        <?php foreach ($get_bahan as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('bahan/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                             
                            <div style="margin-top: 0px" class="form-group">
                                <label>Nama bahan</label>
                                <input class="form-control" id="nama_bahan" name="nama_bahan" type="text" placeholder="Nama bahan" value="<?php echo $key->nama_bahan; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>merk</label>
                                <input class="form-control" id="merk" name="merk" type="text" placeholder="merk" value="<?php echo $key->merk; ?>">
                            </div>
                             <div style="margin-top: 0px" class="form-group">
                                <label>stok bahan</label>
                                <input class="form-control" id="stok_bahan" name="stok_bahan" type="number" placeholder="stok_bahan" value="<?php echo $key->stok_bahan; ?>">
                            </div>
                             <div style="margin-top: 0px" class="form-group">
                                <label>satuan</label>
                                <input class="form-control" id="satuan" name="satuan" type="text" placeholder="satuan" value="<?php echo $key->satuan; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>harga</label>
                                <input class="form-control" id="harga" name="harga" type="text" placeholder="harga" value="<?php echo $key->harga; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>jml utk produksi</label>
                                <input class="form-control" id="jmlutkproduksi" name="jmlutkproduksi" type="number" placeholder="jmlutkproduksi" value="<?php echo $key->jmlutkproduksi; ?>">
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