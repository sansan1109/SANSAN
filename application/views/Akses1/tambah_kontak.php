 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">


  <div class="row x_title">
  <div class="col-md-6">
  <h3>Formulir Tambah Kontak</h3>
  </div>
  </div>    
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <div class="row x_title">
  <form method="post" action="<?php echo base_url().'Dashboard_admin/save_tambah_kontak'; ?>">
    <!-- Buat tombol untuk menabah form data -->
<br><br>
    
    
    <table class="table table-bordered">
       <tr>
        <td>Nama Kontak</td>
        <td><input class="form-control" type="text" name="nama_kontak" required></td>
      </tr>
       <tr>
        <td>Nomor Kontak</td>
        <td><input class="form-control" type="text" name="nomor_kontak" required onkeypress="return hanyaAngka(event)"></td>
      </tr>
       <tr>
        <td>Nama Wajib Pajak</td>
        <td><input class="form-control" type="text" name="nama_wp" required></td>
      </tr>
       <tr>
        <td>Kota</td>
        <td><input class="form-control" type="text" name="kota" required></td>
      </tr>
    </table>

    <div id="insert-form"></div>
    
    <hr>
    <input type="submit" value="Simpan" class="btn btn-primary">
  </form>
  </div>

               
</div></div></div><br /></div></div>
