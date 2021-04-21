 <!-- page content -->
<style>
#myImg {border-radius: 5px;cursor: pointer;transition: 0.3s;}
#myImg:hover {opacity: 0.7;}
.modal {display: none;position: fixed;z-index: 1;left: 0;top: 0;width: 100%;height: 100%;overflow: auto; 
background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.9);padding-top: 50px;}
.modal-content {margin: auto;display: block;width: 500px;max-width: 500px;}
#caption {margin: auto;display: block;width: 80%;max-width: 700px;text-align: center;color: #ccc;
  padding-top: 10px 0;height: 150px;}
.modal-content, #caption {  -webkit-animation-name: zoom;-webkit-animation-duration: 0.6s;
  animation-name: zoom;animation-duration: 0.6s;}
@-webkit-keyframes zoom {from {-webkit-transform:scale(0)} to {-webkit-transform:scale(1)}}
@keyframes zoom {from {transform:scale(0)} to {transform:scale(1)}}
.close {position: absolute;top: 15px;right: 35px;color: #f1f1f1;font-size: 40px;font-weight: bold;
  transition: 0.3s;}
.close:hover,
.close:focus {color: #bbb;text-decoration: none;cursor: pointer;}
@media only screen and (max-width: 700px){
  .modal-content { width: 100%;}
}
</style>

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

 <div class="col-md-9 col-sm-9 col-xs-12"></div>
 <div class="col-md-6"><h3>Request Rembesan</h3></div>
<div class="col-md-6" style="width: 100px; margin-bottom: 15px; float: right;margin-right: 15px;">
<a class="btn btn-primary btn-md" href="<?php echo base_url().'Dashboard_admin/input_rembesan'; ?>">Input Data</a></div>
<div class="row x_title"></div>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
       <tr>
        <th style="width: 200px;">Nama Impementor</th>
        <th>File Excel</th>
        <th style="width: 126px;">Jumlah Nominal</th>
        <th>Tanggal Pengajuan</th>
        <th>Tanggal Di Transfer</th>
        <th>Bukti Transfer</th>
        <th style="width: 150px;">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($rembesan as $rem) {
      ?>
      <tr>
        <td><?php echo $rem->nama_user ?></td>
        <td><center>
<a href="<?php echo base_url().'/assets/upload/'.$rem->excel; ?>">
<img src="<?php echo base_url().'assets/excel.png' ?>" style="width: 30px; "></a>
        </center></td>
        <td><?php echo "<h5> Rp. ".number_format($rem->nominal)."</h5>" ?></td>
        <td><?php echo "<h5>".$rem->tgl_input."</h5>" ?></td>
        <td><?php echo "<h5>".$rem->tgl_tf."</h5>" ?></td>
        <td><img id="<?php echo $rem->gambar; ?>" src="<?php  echo base_url().'/assets/upload/'.$rem->gambar; ?>" class="img-thumbnail box-produk-img" style="height: 50px;width: 50px;"></td>
        <td nowrap="nowrap">
          <center>
 

          
        <?php if ($rem->status=='0') {
          echo "
          <h3> Pending </h3>
          <a class='btn btn-danger btn-xs'  href='hapus_rembesan/$rem->kd_r'> Hapus</a>"; 
        }else{
          echo "<h3>Approved</h3>";
        } ?>
          </center>  
</td>
 </tr>
<div id="myModal2" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script>
            var modal = document.getElementById("myModal2");
              var img = document.getElementById("<?php echo $rem->gambar; ?>");
        var modalImg  = document.getElementById("img01");
      var captionText = document.getElementById("caption");
          img.onclick = function(){
  modal.style.display = "block";
        modalImg.src  = this.src;
captionText.innerHTML = this.alt;}
            var span  = document.getElementsByClassName("close")[0];
        span.onclick  = function() { 
 modal.style.display  = "none";}
</script>



      <?php } ?>
        
     
    </tbody>
  </table>
</div>     
  </div>         
          
</div>
</div>
</div>
</div><br />
</div>
        <!-- /page content -->
