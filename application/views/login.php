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
	<!-- Css Tambahan -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/ta1.css' ?>">
    <!-- Java Script -->
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dist_sweet/sweetalert2.all.min.js' ?>"></script>
 
 </head>
<body>
<div class="bg-tulips"></div>
	<div class="col-md-4 col-md-offset-4">
		<center><h2><br></h2><h2><br></h2></center>
			<!-- ALERT LOGIN -->
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
			 <?php if($this->session->flashdata('alertregister')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertregister');?>
            </div>
             <?php endif ?>
            <?php if($this->session->flashdata('alertlogout')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertlogout');?>
            </div>
             <?php endif ?>

            <!-- END ALERT -->
    <div class="outter-form-login-luar">
      <div class="outter-form-login-dalam">
        <form method="post" action="<?php echo base_url().'Login/login' ?>">
          <h3 class="text-center title-login">Login</h3><hr><br>
            <div class="form-group has-feedback">
              <input type="text" name="username_user" class="form-control" placeholder="Username"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
              <div class="form-group has-feedback">
              <input type="password" name="password_user"class="form-control" placeholder="Password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
			<br>
            <input type="submit" class="btn btn-block btn-custom-black" value="Login" />
			<br>
	  <div class="row">
                        <div class="col-xs-6" style="padding-right: 5px;">    
                            <a class="login btn btn-block btn-custom-black w-100" href="<?php echo base_url().'help/forgetpassword' ?>">Forget Password</a>              
                        </div>
                        <div class="col-xs-6"  style="padding-left: 5px;">
                            <a class="login btn btn-block btn-custom-black w-100" href="<?php echo base_url().'help/register' ?>">Register</a>
                        </div>
                    </div>
        </form>
      </div>
    </div>
    </div>
  </body>
</html>