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
<?php if($this->session->flashdata('alerthapus')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?= $this->session->flashdata('alerthapus');?>
</div>
<?php endif ?>
    <div class="row x_title">
    <div class="col-md-6">
    <h3>Dashboard</h3>
    </div>
    </div>
<div class="col-md-9 col-sm-9 col-xs-12"></div>
      <div class="row x_title">
      <center><img style="max-width:100%;height: auto;" src="<?php echo base_url().'assets/images/logo-subaga.PNG'; ?>"></center>
      </div>
          <div class="col-md-12">
            <div class="row x_title" style="background-color: white;">
            <div class="col-md-6"> 
            <center><img style="max-width:100%;height: 160px;" src="<?php echo base_url().'assets/images/TAP.PNG'; ?>"></center>
            </div><div class="col-md-6"> 
            <h3>TappingBox adalah sebuah perangkat capture untuk menangkap data transasksi, yang diletakkan di antara Cash Register Kasir.</h3>
            </div> 
            </div>
          </div>
          <div class="col-md-12">
            <div class="row x_title" style="background-color: white;">
            <div class="col-md-6"> 
            <center><img style="max-width:100%;height: 160px;" src="<?php echo base_url().'assets/images/RTU.PNG'; ?>"></center>
            </div><div class="col-md-6"> 
            <h3>TappingBox miniRTU adalah multi-purpose RTU dan dilengkapi dengan aplikasi Dashboard untuk log dan trending.</h3>
            </div> 
            </div>
          </div>
            <div class="col-md-12">
            <div class="row x_title" style="background-color: white;">
            <div class="col-md-6"> 
            <center><img style="max-width:100%;height: 160px;" src="<?php echo base_url().'assets/images/PDT.PNG'; ?>"></center>
            </div><div class="col-md-6"> 
            <h3>PDT adalah Portable Data Terminal Perangkat ini dirancang secara minimalis namun memberikan ragam fitur canggih bertransaksi, dari melakukan transaksi sampai dengan memonitoring transaksi.</h3>
            </div> 
            </div>
          </div>
              <div class="col-md-12">
            <div class="row x_title" style="background-color: white;">
            <div class="col-md-6"> 
            <center><img style="max-width:100%;height: 160px;" src="<?php echo base_url().'assets/images/logo-subaga.PNG'; ?>"></center>
            </div><div class="col-md-6"> 
            <h3>Logo Subaga adalah.</h3>
            </div> 
            </div>
          </div>
</div>
            </div>

          </div>
          <br />
          </div>
        </div>
        <!-- /page content -->
