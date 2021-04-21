<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">
       
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th style="width: 75px;">ID Device</th>
        <th>Nama Wajib Pajak</th>
        <th>Alamat Wajib Pajak</th>
        <th>Kota</th>
        <th style="width: 75px;">Pilihan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach ($device as $a) {
      ?>
      <tr>
        <td><?php echo $a->id_device ?></td>
        <td><?php echo $a->nama_wp ?></td>
        <td><?php echo $a->alamat_wp ?></td>
        <td><?php echo $a->nama_kota ?></td>
        <td nowrap="nowrap">
        <a class="btn btn-warning btn-xs" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/edit_device/'.$a->id_device; ?>"><span class="glyphicon glyphicon-remove"></span> Edit</a>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-warning btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/hapus_divisi/'.$a->id_device; ?>"><span class="glyphicon glyphicon-remove"></span> Hapus</a>
<?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>       
          
</div>
</div>
</div>
<br />
</div>
</div>
        <!-- /page content -->
