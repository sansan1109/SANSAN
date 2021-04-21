 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="dashboard_graph">
<?php if($this->session->flashdata('alertsukses')) : ?>
<div class="alert alert-primary alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alertsukses');?>
</div>
<?php endif ?>
  
  <div class="col-md-9 col-sm-9 col-xs-12"></div>
  <a class="btn btn-primary btn-md" href="<?php echo base_url().'Dashboard_admin/tambah_kontak'; ?>" style="margin-bottom: 15px; float: right;">Add Kontak</a>
  <div class="row x_title">

<h3>Konfigurasi Kontak</h3>
  </div>

  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
   <thead>
       <tr>
        <th>Nama Kontak</th>
        <th>Nomor Kontak</th>
        <th>Nama Wajib Pajak</th>
        <th>Kota</th>
        <th style="width: 50px;">Telpon</th>
        <th style="width: 100px;">Whatsapp</th>
        <th style="width: 100px;">Pilihan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($kontak as $a) {
      ?>
      <tr>
        <td><?php echo $a->nama_kontak ?></td>
        <td><?php echo $a->nomor_kontak ?></td>
        <td><?php echo $a->nama_wp ?></td>
        <td><?php echo $a->kota ?></td>   
<td>
<center>
<?php 

$hp0 = substr_replace($a->nomor_kontak,'62',0,1);
?>   
<a style="width: 70px;height: 24px;" href="<?php echo "tel:".$a->nomor_kontak ?>"> <img src="<?php echo base_url().'assets/tel.png' ?>"style="width: 30px;" ></a>
</center>
</td>   
<td>
<center>

<a style="width: 70px;height: 24px;" href="<?php echo "https://wa.me/".$hp0 ?>"> <img src="<?php echo base_url().'assets/wa.png' ?>"style="width: 30px;" ></a>
</center>
        </td>   
        <td nowrap="nowrap">
       <a class="btn btn-primary btn-xs" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/edit_kontak/'.$a->no; ?>">Lihat/Edit</a><br/>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-xs edit-record" style="width: 70px;height: 24px;" href="<?php echo base_url().'Dashboard_admin/hapus_kontak/'.$a->no; ?>">Hapus</a>

      <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>       
  </div>

               
</div></div></div><br /></div></div>
