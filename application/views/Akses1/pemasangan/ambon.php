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
    <h3><?php echo "Pemasangan ".$b->nama_kota; ?></h3>

    </div>
    </div>
     <a href="<?php echo base_url('excel/export_excel/'.$b->kd_kota) ?>">
  <img src="<?php echo base_url().'assets/excel.png' ?>" style="width: 30px;float: right; ">
  </a>
  <div class="row x_title">
    <?php } ?>
</div>
    
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
       <tr>
        <th style="width: 100px;">Tanggal</th>
        <th style="width: 120px;">Implementor</th>
        <th>Metode</th>
        <th>ID Device</th>
        <th>Nama WP</th>
        <th>Alamat WP</th>
        <th>Hasil Pengecekkan</th>
        <th>Status</th>
        <th>Status Profiling</th>
        <th style="width: 100px;">Pilihan</th>
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
        <td><?php echo $a->metode ?></td>
        <td><?php echo $a->id_device ?></td>
        <td><?php echo $a->nama_wp ?></td>
        <td><?php echo substr($a->alamat_wp,0,10).'...' ?></td>
        <td><?php echo substr($a->hasil_pengecekkan,0,10).'...' ?></td>
        <td><?php echo $a->status ?></td>
        <td><?php echo $a->status_profiling ?></td>
        <td nowrap="nowrap">
           <?php 
        if($this->session->userdata('id_user')==$a->id_user){
           ?>
       <a class="btn btn-primary btn-xs" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/edit_absen/'.$a->kd_absen; ?>">Lihat</a><br/>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/hapus/'.$a->kd_absen; ?>">  Hapus</a>
        <?php }else{
        echo "";
       }  ?>
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
