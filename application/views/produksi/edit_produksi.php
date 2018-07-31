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
        <div class="my-auto"><h1>Edit Data produksi</h1> 
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
                        <?php foreach ($get_produksi as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('produksi/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                           



                           <!--  <div style="margin-top: 0px" class="form-group">
                                <label>tanggal</label>
                                <input class="form-control" id="tanggal_produksi" name="tanggal_produksi" type="date" placeholder="tanggal_produksi" value="<?php echo $key->tanggal_produksi; ?>">
                            </div> -->
                            <div style="margin-top: 0px" class="form-group">
                                <label>tanggal</label>
                                <input class="form-control" id="tanggal_produksi" name="tanggal_produksi" type="date" placeholder="tanggal_produksi" value="<?php echo $key->tanggal_produksi; ?>">
                            </div>

                            <div style="margin-top: 0px" class="form-group">
                                <label>biaya</label>
                                <input class="form-control" id="biaya" name="biaya" type="number" placeholder="biaya" value="<?php echo $key->biaya; ?>">
                            </div class="form-group">

                            <div style="margin-top: 0px" class="form-group">
                                <label>hasil</label>
                                <input class="form-control" id="hasil" name="hasil" type="number" placeholder="hasil" value="<?php echo $key->hasil; ?>">
                            

                            <div style="margin-top: " class="form-group">
                                            <label>id bahan</label>
                                            <select class="form-control" id="required" name='id_bahan' data-placeholder="Pilih Pegawai">
                                            <?php foreach ($bahan as $key) { ?>
                                                 <?php echo "<option value='".$key->id_bahan."'>".$key->id_bahan."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                            <div class="form-group">

                               <div style="margin-top: " class="form-group">
                                            <label>produk</label>
                                            <select class="form-control" id="required" name='id_produk' data-placeholder="Pilih Pegawai">
                                            <?php foreach ($produk as $key) { ?>
                                                 <?php echo "<option value='".$key->id_produk."'>".$key->nama_produk."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                            <div class="form-group">

                              </div class="form-group">
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