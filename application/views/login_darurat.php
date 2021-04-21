<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<!-- Icon Title -->
	<link rel="shortcut icon" href="<?php echo base_url().'assets/img/Icon-Property.png' ?>">
	<!-- Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
    <!-- Java Script -->
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dist_sweet/sweetalert2.all.min.js' ?>"></script>
    <!-- Css Tambahan -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/ta1.css' ?>">
 </head>
<body style="background-image: url(../Tulips.JPG);color: rgb(195, 132, 0);background-size: cover;background-repeat:no-repeat;background-position:center;height:100vh;width:100vw;top:0 !important;bottom:0 !important;">
	<div class="col-md-4 col-md-offset-4">
		<center><h2><br></h2><h2><br></h2></center>
			<!-- ALERT LOGIN -->
			<?php if($this->session->flashdata('alertforget')) : ?>
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertforget');?>
            </div>
             <?php endif ?>
             <?php if($this->session->flashdata('alertlogingagal')) : ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertlogingagal');?>
            </div>
             <?php endif ?>
             <?php if($this->session->flashdata('alertlogindulu')) : ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertlogindulu');?>
            </div>
             <?php endif ?>
            <!-- END ALERT -->
    <div class="outter-form-login-luar">
      <div class="outter-form-login-dalam">
            <form method="post" action="<?php echo base_url().'Login/login_darurat_act' ?>">
             <h3 class="text-center title-login">Login Darurat</h3><hr><br>
            <div class="form-group has-feedback">
              <input type="text" name="username_user" class="form-control" placeholder="Username"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
              <div class="form-group has-feedback">
              <input type="password" name="password_backup_user"class="form-control" placeholder="Password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
			<br>
            <input type="submit" class="btn btn-block btn-custom-black" value="Login" />
			<br>
        </h4>
                </div>
            </form>
      </div>
    </div>
    </div>
  </body>
</html>