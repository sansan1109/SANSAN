 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">

  <div class="row x_title">
  <div class="col-md-6">
  <h3>Edit Daily</h3>
  </div>
  </div>    
<div class="jumbotron" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
  <?php foreach ($daily as $key) { ?>
  <br>
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
      
      <tr>
        <td width="200px">Tanggal Daily</td>
        <td><?php echo $key->tgl_daily;?></td>
      </tr>
      <tr>
        <td width="200px">Implementor</td>
        <td><?php echo $key->nama_user;?></td>
      </tr>
       <tr>
        <td width="200px">Lokasi</td>
        <td><?php echo $key->nama_kota;?></td>
      </tr>
      <tr>
        <td width="200px">Kegiatan</td>
        <td><?php echo $key->aktivitas;?></td>
      </tr>
     <tr>
        <td width="200px">Keterangan</td>
        <td><?php echo $key->ket_aktivitas;?></td>
      </tr>
    </table>

  <?php } ?>

 <a class="btn btn-primary" data-toggle="modal" data-target="#EditDaily" role="button">Edit Daily</a>
</div>
</div>



<div id="EditDaily" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Daily</h4>
  </div>
  <div class="modal-body">


<?php foreach ($daily as $a) { ?>

<form action="<?php echo base_url().'Dashboard_admin/edit_daily_act'; ?>" method="post">
   <div class="form-group">
  <input class="form-control" type="text" name="kd_daily" value="<?php echo $a->kd_daily; ?>" readonly>
</div>
   <div class="form-group">
    <label>Tanggal Daily</label>
  <input class="form-control" id="datepicker" type="text" name="tgl_daily" value="<?php echo $a->tgl_daily; ?>">
</div>
   <div class="form-group">
    <label>Lokasi</label>
   <input class="form-control" type="text" name="nama_kota" value="<?php echo $a->nama_kota; ?>">
  </div>
   <div class="form-group">
    <label>Kegiatan</label>
  <input class="form-control" type="text" name="aktivitas" value="<?php echo $a->aktivitas; ?>">
</div>
   <div class="form-group">
    <label>Keterangan</label>
   <input class="form-control" type="text" name="ket_aktivitas" value="<?php echo $a->ket_aktivitas; ?>">
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