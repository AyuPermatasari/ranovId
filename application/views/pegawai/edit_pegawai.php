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
        <div class="my-auto"><h1>Edit Data pegawai</h1> 
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
                        <?php foreach ($get_pegawai as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('pegawai/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                          

                            <div style="margin-top: 0px" class="form-group">
                                <label>Nama pegawai</label>
                                <input class="form-control" id="nama_pegawai" name="nama_pegawai" type="text" placeholder="Nama pegawai" value="<?php echo $key->nama_pegawai; ?>">
                            </div >

                            <div style="margin-top: 0px" class="form-group">
                                <label>alamat</label>
                                <input class="form-control" id="alamat_pegawai" name="alamat_pegawai" type="text" placeholder="alamat_pegawai" value="<?php echo $key->alamat_pegawai; ?>">
                            </div >

                            <div style="margin-top: 0px" class="form-group">
                                <label>nohp</label>
                                <input class="form-control" id="nohp_pegawai" name="nohp_pegawai" type="number" placeholder="nohp_pegawai" value="<?php echo $key->nohp_pegawai; ?>">
                            </div >

                             <div style="margin-top: " class="form-group">
                                            <label>id jabatan</label>
                                            <select class="form-control" id="required" name='id_jabatan' data-placeholder="Pilih transaksi">
                                            <?php foreach ($jabatan as $key) { ?>
                                                 <?php echo "<option value='".$key->id_jabatan."'>".$key->nama_jabatan."</option>" ?>
                                            <?php } ?>
                                            </select>
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