 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">
<?php if($this->session->flashdata('alertgagal')) : ?>
<div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alertgagal');?>
</div>
<?php endif ?>
<?php if($this->session->flashdata('alertsukses')) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alertsukses');?>
</div>
<?php endif ?>
    <div class="row x_title">
    <div class="col-md-6">
        <?php
      
        $no = 1;
        foreach ($namaa_kota as $b) {
      ?>
    <h3><?php echo "Maintenance ".$b->nama_kota; ?></h3>

    </div>
    </div>
<div class="col-md-9 col-sm-9 col-xs-12"></div>
     
  <div class="row x_title">
   <a href="<?php echo base_url('excel/export_excel_mainten/'.$b->kd_kota) ?>">
  <img src="<?php echo base_url().'assets/excel.png' ?>" style="width: 30px; margin-bottom: 15px; float: right;">
  </a>

    <?php } ?>
   </div>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th style="width: 100px;">Tanggal</th>
        <th style="width: 120px;">Implementor</th>
        <th>Nama Kota</th>
        <th>ID Device</th>
        <th>Nama WP</th>
        <th>Alamat WP</th>
        <th>Catatan</th>
        <th style="width: 100px;">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($absensi as $a) {
      ?>
      <tr>
        <td><?php echo $a->tgl_absen ?></td>
        <td><?php echo $a->nama_user ?></td>
        <td><?php echo $a->nama_kota ?></td>
        <td><?php echo $a->id_device ?></td>
        <td><?php echo $a->nama_wp ?></td>
        <td><?php echo substr($a->alamat_wp,0,10).'...' ?></td>
        <td><?php echo substr($a->catatan_absen,0,5).'...' ?></td>
        <td><?php echo $a->status ?>
          <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>       
  </div>         
          
</div>
</div>
</div><br />
</div>
        <!-- /page content -->
