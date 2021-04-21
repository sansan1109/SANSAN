 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">


  <div class="row x_title">
  <div class="col-md-6">
  <h3>Formulir Tambah Kota</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" action="<?php echo base_url().'Dashboard_admin/save_tambah_table'; ?>">
    <!-- Buat tombol untuk menabah form data -->
<br><br>
    
    
    <table class="table table-bordered">
       <tr>
        <td>Nama Kota</td>
        <td><input class="form-control" type="text" name="nama_kota" required></td>
      </tr>
    </table>

    <div id="insert-form"></div>
    
    <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>

               
</div></div></div><br /></div></div>
