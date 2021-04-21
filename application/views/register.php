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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datepicker/jquery-ui.min.css' ?>">
  <!-- Css Tambahan -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/ta1.css' ?>">
    <!-- Java Script -->
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/dist_sweet/sweetalert2.all.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/datepicker/jquery-ui.min.js'; ?>"></script>
 </head>
<body style="background-image: url(../Tulips.JPG);color: rgb(195, 132, 0);background-size: cover;background-repeat:no-repeat;background-position:center;height:100vh;width:100vw;top:0 !important;bottom:0 !important;">
	<div class="col-md-4 col-md-offset-4">
		<center><h2><br></h2><h2></h2></center>
			    <!-- ALERT LOGIN -->

             <?php if($this->session->flashdata('alertusersudahada')) : ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertusersudahada');?>
            </div>
             <?php endif ?>
             <?php if($this->session->flashdata('alertpassword8')) : ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $this->session->flashdata('alertpassword8');?>
            </div>
             <?php endif ?>

            <!-- END ALERT -->
    <div class="outter-form-login-luar">
      <div class="outter-form-login-dalam">
        <form method="post" enctype="multipart/form-data" action="register_act">
            <h3 class="text-center title-login">Register</h3>
            <hr>
            <br>
			<div class="form-group has-feedback">
            <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap')" oninput="setCustomValidity('')" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
            <select class="form-control" name="gender_user">
			<option value="Laki-Laki">Laki Laki</option>
			<option value="Perempuan">Perempuan</option>
			</select>
            <span class="glyphicon glyphicon-option-vertical form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
             <input type="email" class="form-control" name="email_user" placeholder="Email" required oninvalid="this.setCustomValidity('Masukan Alamat Email')" oninput="setCustomValidity('')"/>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
              <input type="text" class="form-control" name="hp_user" placeholder="Nomor Handphone" required oninvalid="this.setCustomValidity('Masukkan Nomor Handphone')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)"/>
              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
              <input id="datepicker" type="text" name="tgl_lahir_user" class="form-control" placeholder="Tanggal Lahir MM/DD/YYYY"  required oninvalid="this.setCustomValidity('Masukan Tanggal Lahir')" oninput="setCustomValidity('')" />
              <span class="glyphicon glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
              <input type="text" class="form-control" name="username_user" placeholder="Username" required oninvalid="this.setCustomValidity('Username Tidak boleh kosong')" oninput="setCustomValidity('')"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
              <input type="password" class="form-control" name="password_user" id="pw1" placeholder="Password" required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="setCustomValidity('')"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
			<div class="form-group has-feedback">
              <input type="password" class="form-control" id="pw2" placeholder="Re-Password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
	
    <br>
    <input type="submit" class="btn btn-block btn-custom-black" value="Register">

        </form>
      </div>
    </div>
    </div>
  </body>
  <script type="text/javascript">
        $('.alert-message').alert().delay(2000).slideUp('slow');

        window.onload = function () {
            document.getElementById("pw1").onchange = validatePassword;
            document.getElementById("pw2").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("pw2").value;
            var pass1=document.getElementById("pw1").value;
            if(pass1!=pass2)
                document.getElementById("pw2").setCustomValidity("Password Tidak Sama, Coba Lagi");
            else
                document.getElementById("pw2").setCustomValidity('');
        }

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
		$.datepicker.setDefaults({
		// showOn: "both",
		buttonImageOnly: true,
		buttonImage: "calendar.gif",
		buttonText: "Calendar"
	});
	$("#datepicker").datepicker({
	});
    </script>
</html>