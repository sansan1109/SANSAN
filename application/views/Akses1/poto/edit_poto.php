 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">


  <div class="row x_title">
  <div class="col-md-6">
  <h3>Edit Photo</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <div class="table-responsive">
 <?php
        $no = 1;
        foreach ($absen as $e){
?>

<?php if ($e->gambar=='0.png'): ?>
<form action="<?php echo base_url().'Dashboard_admin/tambah_poto'?>" method="post" enctype="multipart/form-data">
<?php endif ?>

<?php if ($e->gambar!='0.png'): ?>
<form action="<?php echo base_url().'Dashboard_admin/update_poto'?>" method="post" enctype="multipart/form-data">
<?php endif ?>


<div class="form-group">
    <label>Gambar</label>
    <br>
    <?php
      if(isset($e->gambar)){
        echo '<input type="hidden" name="old_pict" value="'.$e->gambar.'">';
        echo '<img src="'.base_url().'/assets/upload/'.$e->gambar.'" width="30%">';
      }
    ?>
    <br>
    <input name="image" type="file" class="form-control" required oninvalid="this.setCustomValidity('Poto belum dimasukkan')" oninput="setCustomValidity('')"/>
  </div>
  <label>Kode Poto</label>
    <input class="form-control" type="text" name="kd_absen" value="<?php echo $e->kd_absen; ?>" readonly>

<?php
$no = 1;
foreach ($poto_acc as $f){
?>
<label>Nama Wajib Pajak</label>
<input class="form-control" name="nama_wp" type="text" value="<?php echo $f->nama_wp; ?>" readonly>
<label>Device ID</label>
<input class="form-control" type="text" value="<?php echo $f->id_device; ?>" disabled>
<label>Tanggal Absen</label>
<input class="form-control" type="text" value="<?php echo $f->tgl_absen; ?>" disabled>
<label>Implementor</label>
<input class="form-control" type="text" value="<?php echo $f->nama_user; ?>" disabled>
<?php } ?>
    </div>
    <div class="form-group">
      <?php echo validation_errors(); ?>
      <br>
    <input type="submit" value="simpan" class="btn btn-primary">
  </div>
  <?php } ?>
</form>


</div>       
  </div>         
</div> </div>           
</div></div><br /></div></div>
