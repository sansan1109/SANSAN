 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">  
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th style="width: 100px;">ID User</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Nomor HP</th>
        <th>Tanggal Lahir</th>
        <th style="width: 100px;">Pilihan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($anggota as $a) {
      ?>
      <tr>
        <td><?php echo $a->id_user ?></td>
        <td><?php echo $a->nama_user ?></td>
        <td><?php echo $a->email_user ?></td>
        <td><?php echo $a->hp_user ?></td>
        <td><?php echo $a->tgl_lahir_user ?></td>
        <td nowrap="nowrap">
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard/hapus_anggota/'.$a->id_user; ?>"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
<?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>       
  </div>

               
</div></div></div><br /></div></div>
