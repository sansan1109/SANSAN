 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">

  <div class="row x_title">
  <div class="col-md-6">
  <h3>Kota</h3>
  </div>
  </div>    
<div class="jumbotron" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;padding-bottom: 10px;">
  <?php foreach ($kota2 as $key) { ?>
  <br>
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
      
      <tr>
        <td width="200px">Kode Kota</td>
        <td><?php echo $key->kd_kota;?></td>
      </tr>
      <tr>
        <td width="200px">Nama Kota</td>
        <td><?php echo $key->nama_kota;?></td>
      </tr>
     
    </table>

  <?php } ?>

 <a class="btn btn-primary" data-toggle="modal" data-target="#EditAbsen" role="button">Edit Kota</a>
</div>
</div>



<div id="EditAbsen" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Kota</h4>
  </div>
  <div class="modal-body">


<?php foreach ($kota2 as $key) { ?>

<form action="<?php echo base_url().'Dashboard_admin/edit_table_act'; ?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
  <input class="form-control" type="text" name="kd_kota" value="<?php echo $key->kd_kota; ?>" readonly>
</div>
   <div class="form-group">
    <label>Nama Kota</label>
   <input class="form-control" type="text" name="nama_kota" value="<?php echo $key->nama_kota; ?>">
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