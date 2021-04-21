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
  <h3>FORMULIR REMBESAN</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'Dashboard/rembesan_acc_act'; ?>">
<table class="table table-bordered">

  <?php foreach ($rembesan as $key) { ?>
  
<tr>
<td style="width: 20%;">Nama Implementor</td>
<td><input class="form-control" type="text" readonly value="<?php echo $key->nama_user ?>">
<input name="kd_r" value="<?php echo $key->kd_r ?>" hidden>
</td>
</tr>
<tr>
<td style="width: 20%;">Nominal</td>
<td><input class="form-control" type="text" readonly value="<?php echo "Rp. ".number_format($key->nominal) ?>"></td>
</tr>
<tr>
<td style="width: 20%;">Bukti Transfer</td>
<td><input class="form-control" type="file" name="image" required></td>
</tr>
    </table>
    <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>
<?php } ?>

               
</div></div></div><br /></div></div>
