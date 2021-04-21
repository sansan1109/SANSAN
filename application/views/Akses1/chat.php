<meta http-equiv="refresh" content="60">
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
<div class="col-md-12">
<h3>Forum Diskusi</h3></div></div>

		<div style="padding-bottom: 10px;">
				<?= $this->session->flashdata('done'); ?>
				<div class="panel panel-default">
					
					<div class="panel test" style="height: 400px; overflow-y: scroll; padding-left: 30px;">
					<?php foreach ($chat as $c){ ?>
						<?php if($c->pengirim == $this->session->userdata('nama_user')){ ?>
							<div class="col-md-12">
								<div class="col-md-6"></div>
								<div class="col-md-6"><div class="panel panel-success panel-comment pull-right">
									<div class="panel-heading test" style="width: 300px;word-break: break-all;text-align: right;">

										<strong style="opacity: .5; font-size: 12px; color: #4BD239"></strong>
										
<li class="dropdown" style="list-style-type: none;">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><small><?php echo date("d-M-Y H:i:s", strtotime($c->created_at)); ?></small>&nbsp;&nbsp;<span class="fa fa-chevron-down"></span></a>
<ul class="dropdown-menu dropdown-menu-right" style="padding-top: 6px;">
<li><a href="<?php echo base_url().'Dashboard_admin/hapus_chat/'.$c->id_chat ?>" style="text-align: end;"> Hapus Pesan</a></li>
</ul>
</li>

											<?php echo $c->teks; ?>
									</div>
								</div></div>
								
							</div>
						<?php } else { ?>
							<div>
								<div class="col-md-12">
								<div class="panel panel-warning panel-comment pull-left">
									<div class="panel-heading test" style="width: 300px; word-break: break-all;text-align: left;">
										<strong style="opacity: .5; font-size: 12px; color: #DCD15B"><?= $c->pengirim ?>:</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->created_at)); ?></small><br>
										<?php echo $c->teks ?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
					</div>
					
				</div>
		</div>


	<div class="row">
						<div>
							<form method="post" action="<?php echo base_url().'Dashboard_admin/kirim'; ?>">
								<div class="col-md-12">
									<div class="input-group">
										<input type="text" name="pesan" class="form-control" placeholder="Masukan Teks" autocomplete="off"/>
										<span class="input-group-btn">
											<input class="btn btn-success" type="submit" value="Kirim" >
										</span>
									</div>
								</div>
							</form>
						</div>
					</div>

</div></div></div><br /></div></div>