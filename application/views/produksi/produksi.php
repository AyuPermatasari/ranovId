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
        <div class="my-auto"><h1>Produksi <a id="myBtn" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a></h1> 
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

                                <?php if (validation_errors() || $this->session->flashdata('gagal')) {
                                   ?><div  id="myModal" class="modal" style="display: block;"><?php 
                                }else if($this->session->flashdata('error')){
                                    ?><div  id="myModal" class="modal" style="display: block;"><?php
                                }else{
                                    ?><div  id="myModal" class="modal"><?php
                                }?>
                            
                                <div style="margin-top: 25px; margin-left: 300px; width: 70%" class="modal-content">
                                    <div class="modal-header" style="background-color: #b80020">
                                        <span class="close">&times;</span>
                                        <h2>Produksi <i class="glyphicon glyphicon-tasks"></i></h2>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin-top: 10px" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="table-responsive">
                                        <?php echo form_open_multipart('Produksi/add'); ?>
                                        <?php if (validation_errors()) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo validation_errors(); ?></strong></div><?php } 
                                                else if ($this->session->flashdata('gagal')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('gagal');; ?></strong></div><?php }?>
                                        
                                        <div style="margin-top: " class="form-group">
                                            <label>Bahan</label>
                                            <select class="form-control" id="required" name='id_bahan' data-placeholder="Pilih Bahan">
                                            <?php foreach ($bahan as $key) { ?>
                                                 <?php echo "<option value='".$key->id_bahan."'>".$key->id_bahan."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div style="margin-top: " class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" id="required" name='id_produk' data-placeholder="Pilih Produk">
                                            <?php foreach ($produk as $key) { ?>
                                                 <?php echo "<option value='".$key->id_produk."'>".$key->nama_produk."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div style="margin-top: " class="form-group">
                                            <label>Tanggal Produksi </label>
                                            <input class="form-control" id="tanggal_produksi" type="date" name="tanggal_produksi" value="<?php echo set_value('tanggal_produksi') ?>" placeholder="Tanggal Produksi">
                                        </div>
                                        <div style="margin-top: " class="form-group">
                                            <label>Biaya</label>
                                            <input class="form-control" id="biaya" type="text" name="biaya" value="<?php echo set_value('biaya') ?>" placeholder="Biaya">
                                        </div>
                                        <div style="margin-top: " class="form-group">
                                            <label>Hasil</label>
                                            <input class="form-control" id="hasil" type="number" name="hasil" value="<?php echo set_value('hasil') ?>" placeholder="Hasil">
                                        </div>
                                        

                                        <button style="height: 40px; width: 160px; margin-left: 310px;margin-top: 0px; background-color: #1abc9c" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</button>
                                        
                                        <?php echo form_close(); ?>
                                       
                                        </div>
                                 <br>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                            
                                    </div>
                                  </div>

                                </div>
                        </div>

          <table class="table table-bordered table-hover" style="float: right;" id="example">
            <thead>
                <tr>
                    <th width="15%">Bahan</th>
                    <th width="10%">Nama Produk</th>
                    <th width="15%">Tanggal Produksi</th>
                    <th width="15%">Biaya</th>
                    <th width="15%">Hasil</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>
            <tbody><?php foreach ($data_produksi as $key) { ?>
                <tr>
                    <td><?php echo $key->id_bahan; ?></td>
                    <td><?php echo $key->nama_produk ?></td>
                    <td><?php echo $key->tanggal_produksi ?></td>
                    <td><?php echo $key->biaya ?></td>
                    <td><?php echo $key->hasil ?></td> 
                    <td><a href="<?php echo site_url('Produksi/edit/').$key->id_produksi ?>" type="button" class="btn btn-success"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Edit</a> | <a href="<?php echo site_url('Produksi/delete/').$key->id_produksi ?>" type="button" class="btn btn-danger" onClick="JavaScript: return confirm('Anda yakin Hapus data ini ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus</a></td>
                
                </tr>
                <?php } ?>
            </tbody>    
        </table>
        </div>
      </div>

      
    <div class="clearfix"> </div>
    </div>