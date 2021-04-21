 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">

  <div class="row x_title">
  <div class="col-md-6">
  <h3>Kontak</h3>
  </div>
  </div>    
<div class="jumbotron" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
  <?php foreach ($kontak as $key) { ?>
  <br>
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
      
      <tr>
        <td width="200px">Nama Kontak</td>
        <td><?php echo $key->nama_kontak;?></td>
      </tr>
      <tr>
        <td width="200px">Nomor Kontak</td>
        <td><?php echo $key->nomor_kontak;?></td>
      </tr>
       <tr>
        <td width="200px">Nama Wajib Pajak</td>
        <td><?php echo $key->nama_wp;?></td>
      </tr>
      <tr>
        <td width="200px">Kota</td>
        <td><?php echo $key->kota;?></td>
      </tr>
     
    </table>

  <?php } ?>

 <a class="btn btn-primary" data-toggle="modal" data-target="#EditKontak" role="button">Edit Kontak</a>
</div>
</div>



<div id="EditKontak" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Kontak</h4>
  </div>
  <div class="modal-body">


<?php foreach ($kontak as $key) { ?>

<form action="<?php echo base_url().'Dashboard_admin/edit_kontak_act'; ?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
  <input class="form-control" type="text" name="no" value="<?php echo $key->no; ?>" readonly>
</div>
   <div class="form-group">
    <label>Nama Kontak</label>
  <input class="form-control" type="text" name="nama_kontak" value="<?php echo $key->nama_kontak; ?>">
</div>
   <div class="form-group">
    <label>Nomor Kontak</label>
   <input class="form-control" type="text" name="nomor_kontak" value="<?php echo $key->nomor_kontak; ?>">
  </div>
   <div class="form-group">
    <label>Nama Wajib Pajak</label>
  <input class="form-control" type="text" name="nama_wp" value="<?php echo $key->nama_wp; ?>">
</div>
   <div class="form-group">
    <label>Kota</label>
   <input class="form-control" type="text" name="kota" value="<?php echo $key->kota; ?>">
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