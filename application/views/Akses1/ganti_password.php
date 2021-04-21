   <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <?php if($this->session->flashdata('passwordgagal')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('passwordgagal');?>
</div>
<?php endif ?>
<?php if($this->session->flashdata('passwordsukses')) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('passwordsukses');?>
</div>
<?php endif ?>
<div class="dashboard_graph">


  <div class="row x_title">
  <div class="col-md-6">
  <h3>Edit Password</h3>
  </div>
  </div>
<form method="post" action="<?php echo base_url().'Dashboard_admin/ganti_password_act' ?>">
<table class="table table-bordered">    

<tr>
  <td>Password Baru</td>
  <td><input type="password" class="form-control" name="password_user" id="pw1" placeholder="Password" required>
  Password Minimal 8 character.
  </td>
</tr>
<tr>
  <td>Password Baru Comfrim</td>
  <td><input type="password" class="form-control" id="pw2" placeholder="Re-Password">
  </td>
</tr>
</table>
<input type="submit" class="btn btn-primary" value="Simpan" />
</form> 
</div>

</div></div></div><br /></div></div>