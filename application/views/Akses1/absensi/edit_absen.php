 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">

  <div class="row x_title">
  <div class="col-md-6">
  <h3>Edit Absen</h3>
  </div>
  </div>    
<div class="jumbotron" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
  <?php foreach ($absensi as $key) { ?>
  <br>
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
      
      <tr>
        <td width="200px">Tanggal</td>
        <td><?php echo $key->tgl_absen;?></td>
      </tr>
      <tr>
        <td width="200px">Kegiatan</td>
        <td><?php echo $key->kegiatan_absen;?></td>
      </tr>
      <tr>
        <td width="200px">Kota</td>
        <td><?php echo $key->nama_kota;?></td>
      </tr>
      <tr>
        <td width="200px">Metode</td>
        <td><?php echo $key->metode;?></td>
      </tr>
      <tr>
        <td width="200px">ID Device</td>
        <td><?php echo $key->id_device;?></td>
      </tr>
      <tr>
        <td width="200px">No GSM</td>
        <td><?php echo $key->no_gsm;?></td>
      </tr>
      <tr>
        <td width="200px">Vendor</td>
        <td><?php echo $key->vendor;?></td>
      </tr>
      <tr>
        <td width="200px">Jenis Wajib Pajak</td>
        <td><?php echo $key->jenis_wp;?></td>
      </tr>
      <tr>
        <td width="200px">Nama Wajib Pajak</td>
        <td><?php echo $key->nama_wp;?></td>
      </tr>
      <tr>
        <td width="200px">Alamat Wajib Pajak</td>
        <td><?php echo $key->alamat_wp;?></td>
      </tr>
     <tr>
        <td width="200px">Hasil Pengecekkan</td>
        <td><?php echo $key->hasil_pengecekkan;?></td>
      </tr>
      <tr>
        <td width="200px">Catatan</td>
        <td><?php echo $key->catatan_absen;?></td>
      </tr>
      <tr>
        <td width="200px">Status</td>
        <td><?php echo $key->status;?></td>
      </tr>
      <tr>
        <td width="200px">Status Profiling</td>
        <td><?php echo $key->status_profiling;?></td>
      </tr>
    </table>

  <?php } ?>

  <br>
 <a class="btn btn-primary" data-toggle="modal" data-target="#EditAbsen" role="button">Edit Absensi</a>
</div>
</div>



<div id="EditAbsen" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Absen</h4>
  </div>
  <div class="modal-body">


<?php foreach ($absensi as $key) { ?>

<form action="<?php echo base_url().'Dashboard_admin/edit_absen_act'; ?>" method="post" enctype="multipart/form-data">
 <div class="form-group">
    <label>Tanggal</label>
<input id="datepicker" class="form-control" type="text" name="tgl_absen" value="<?php echo $key->tgl_absen; ?>" required>
</div>     
  <div class="form-group">
    <label>Kegiatan</label>
    <input type="text" name="kd_absen" value="<?php echo $key->kd_absen; ?>" hidden>
    <select class="form-control" name="kegiatan_absen" required oninvalid="this.setCustomValidity('Pilih Kegiatan')" oninput="setCustomValidity('')">
          <option value="">Pilih Kegiatan</option>
        <option value="Pemasangan">Pemasangan</option>
        <option value="Maintenance">Maintenance</option>
        </select>
  </div>
  <div class="form-group">
     <label>Kota</label></br>
     <select class="form-control" name="kd_kota" required oninvalid="this.setCustomValidity('Pilih Kota')" oninput="setCustomValidity('')">
          <option value="">Pilih Kota</option>
       <?php 
    $no = 1; 
    foreach ($kota as $a) { ?>
      <option value="<?php echo $a->kd_kota  ?>">
        <?php echo $a->nama_kota  ?>
      </option>
    <?php }?>
        </select>
   </div>
   <div class="form-group">
    <label>Metode</label>
   <input class="form-control" type="text" name="metode" value="<?php echo $key->metode; ?>">
  </div>
  <div class="form-group">
    <label>ID Device</label>
   <input class="form-control" type="text" name="id_device" value="<?php echo $key->id_device; ?>">
  </div>
<div class="form-group">
    <label>No GSM</label>
   <input class="form-control" type="text" name="no_gsm" value="<?php echo $key->no_gsm; ?>" onkeypress="return hanyaAngka(event)">
  </div>
  <div class="form-group">
    <label>Vendor</label>
   <input class="form-control" type="text" name="vendor" value="<?php echo $key->vendor; ?>">
  </div>
    <div class="form-group">
    <label>Jenis Wajib Pajak</label>
   <input class="form-control" type="text" name="jenis_wp" value="<?php echo $key->jenis_wp; ?>">
  </div>
  <div class="form-group">
    <label>Nama Wajib Pajak</label>
   <input class="form-control" type="text" name="nama_wp" value="<?php echo $key->nama_wp; ?>">
  </div>
  <div class="form-group">
    <label>Alamat Wajib Pajak</label>
   <input class="form-control" type="text" name="alamat_wp" value="<?php echo $key->alamat_wp; ?>">
  </div>
    <div class="form-group">
    <label>Hasil Pengecekkan</label>
   <input class="form-control" type="text" name="hasil_pengecekkan" value="<?php echo $key->hasil_pengecekkan; ?>">
  </div>
   <div class="form-group">
    <label>Catatan</label>
   <input class="form-control" type="text" name="catatan_absen" value="<?php echo $key->catatan_absen; ?>">
  </div>
   <div class="form-group">
    <label>Status</label>
  <select class="form-control" name="status" required oninvalid="this.setCustomValidity('Silahkan Masukkan Status')" oninput="setCustomValidity('')">
          <option value="">Pilih Status</option>
        <option value="Solved">Solved</option>
        <option value="Pending">Pending</option>
        </select>
  </div>
  <label>Status Profiling</label>
  <select class="form-control" name="status_profiling" required oninvalid="this.setCustomValidity('Silahkan Masukkan Status Profiling')" oninput="setCustomValidity('')">
          <option value="">Pilih Status Profiling</option>
        <option value="Belum">Belum</option>
        <option value="Sudah">Sudah</option>
        </select>
  </div>

  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
          <?php } ?>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div></div></div><br /></div></div>