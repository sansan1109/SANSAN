 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">
<?php   $id_user2 = $this->session->userdata('id_user');  ?>

  <div class="row x_title">
  <div class="col-md-12">
<?php if ($this->session->userdata('id_user')==$this->uri->segment('3')) { ?>

<a class="btn btn-primary btn-sm" href="<?php echo base_url().'Dashboard_admin/absensi_p'?>" style="margin-bottom: 15px;">Tambah Pemasangan</a>
<a class="btn btn-primary btn-sm" href="<?php echo base_url().'Dashboard_admin/absensi_m'?>" style="margin-bottom: 15px;">Tambah Mainten</a>
<a class="btn btn-primary btn-sm" href="<?php echo base_url().'Dashboard_admin/agenda'?>" style="margin-bottom: 15px;">Tambah Agenda Lainnya</a>
<a class="btn btn-warning btn-sm" href="<?php echo base_url().'Dashboard_admin/sakit'?>" style="margin-bottom: 15px;">Izin Sakit</a>
<a class="btn btn-info btn-sm" href="#" style="float: right; margin-bottom: 15px; background-color: #15a91a; border-color: #15a91a;">Pemasangan : <?php
echo $this->db->query("SELECT * FROM absensi WHERE id_user=$id_user2 AND kegiatan_absen='Pemasangan'")->num_rows(); ?></a>
<a class="btn btn-info btn-sm" href="#" style="float: right; margin-bottom: 15px; background-color: #15a91a; border-color: #15a91a;">Maintenance : <?php
echo $this->db->query("SELECT * FROM absensi WHERE id_user=$id_user2 AND kegiatan_absen='Maintenance'")->num_rows(); ?></a>
<a class="btn btn-info btn-sm" href="#" style="float: right; margin-bottom: 15px; background-color: #15a91a; border-color: #15a91a;">Sakit : <?php
echo $this->db->query("SELECT * FROM absensi WHERE id_user=$id_user2 AND kegiatan_absen='Sakit'")->num_rows(); ?></a>

<?php }else{echo ""; } ?>
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
        <td><?php echo $a->kegiatan_absen ?></td>
        <td><?php echo $a->nama_kota ?></td>
        <td><?php echo $a->id_device ?></td>
        <td><?php echo $a->nama_wp ?></td>
        <td nowrap="nowrap">
        <?php 
        if($this->session->userdata('id_user')==$a->id_user){
           ?>

       <a class="btn btn-primary btn-xs" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/edit_absen/'.$a->kd_absen; ?>">Edit</a><br/>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/hapus/'.$a->kd_absen; ?>"><span class="glyphicon glyphicon-remove"></span> Hapus</a>

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

               
</div></div></div><br /></div></div>
