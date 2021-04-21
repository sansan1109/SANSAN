 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">


  <div class="row x_title">
  <div class="col-md-12">

  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <a href="<?php echo base_url().'excel/export_excel_absen/'.$this->uri->segment('3') ?>">
  <img src="<?php echo base_url().'assets/excel.png' ?>" style="width: 30px; margin-bottom: 15px; float: right;">
  </a>
  <div class="row x_title">
  </div>

  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th style="width: 100px;">Tanggal</th>
        <th>Implementor</th>
        <th>Kegiatan</th>
        <th>Nama Kota</th>
        <th>ID Device</th>
        <th>Nama Wajib Pajak</th>
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
        <td><?php echo $a->kegiatan_absen ?></td>
        <td><?php echo $a->nama_kota ?></td>
        <td><?php echo $a->id_device ?></td>
        <td><?php echo $a->nama_wp ?></td>    
<?php } ?>
      </tr>
    </tbody>
  </table>
</div>       
  </div>

               
</div></div></div><br /></div></div>
