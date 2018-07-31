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
        <div class="my-auto"><h1>Edit Data lappengeluaran</h1> 
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
                        <?php foreach ($get_lappengeluaran as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('lappengeluaran/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                           

                              <div style="margin-top: 0px" class="form-group">
                                <label>tanggal</label>
                                <input class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran" type="date" placeholder="tgl_pengeluaran" value="<?php echo $key->tgl_pengeluaran; ?> ">
                            </div>

                            


                            <div style="margin-top: " class="form-group">
                                            <label>id lappenggajian</label>
                                            <select class="form-control" id="required" name='id_lappenggajian' data-placeholder="Pilih lappenggajian">
                                            <?php foreach ($lappenggajian as $key) { ?>
                                                 <?php echo "<option value='".$key->id_lappenggajian."'>".$key->id_lappenggajian."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                            <div class="form-group">

                               <div style="margin-top: " class="form-group">
                                            <label>id transaksibhn</label>
                                            <select class="form-control" id="required" name='id_transaksibhn' data-placeholder="Pilih transaksibhn">
                                            <?php foreach ($transaksibhn as $key) { ?>
                                                 <?php echo "<option value='".$key->id_transaksibhn."'>".$key->id_transaksibhn."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                            <div class="form-group">

                               <div style="margin-top: " class="form-group">
                                            <label>id produksi</label>
                                            <select class="form-control" id="required" name='id_produksi' data-placeholder="Pilih produksi">
                                            <?php foreach ($produksi as $key) { ?>
                                                 <?php echo "<option value='".$key->id_produksi."'>".$key->id_produksi."</option>" ?>
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