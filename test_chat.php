
<?= $this->session->flashdata('done'); ?>
				<div class="panel panel-default">
					
					<div class="panel test" style="height: 250px; overflow-y: scroll; padding-left: 30px; padding-right: 20px;">
					<?php foreach ($chat as $c){ ?>
						<?php if($c->pengirim == $this->session->userdata('nama_user')){ ?>
							<div class="col-md-12">
								<div class="panel panel-success panel-comment pull-right">
									<div class="panel-heading test" style="width: 300px;word-break: break-all;text-align: right;">

										<strong style="opacity: .5; font-size: 12px; color: #4BD239"></strong>
										
<li class="dropdown" style="list-style-type: none;">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small>&nbsp;&nbsp;<span class="fa fa-chevron-down"></span></a>
<ul class="dropdown-menu dropdown-menu-right" style="padding-top: 6px;">
<li><a href="<?php echo base_url().'Dashboard_admin/hapus_chat/'.$c->id_chat ?>" style="text-align: end;"> Hapus Pesan</a></li>
</ul>
</li>

											<?php echo $c->teks; ?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div>
								<div class="col-md-12">
								<div class="panel panel-warning panel-comment pull-left">
									<div class="panel-heading test" style="width: 300px; word-break: break-all;text-align: left;">
										<strong style="opacity: .5; font-size: 12px; color: #DCD15B"><?= $c->pengirim ?>:</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small><br>
										<?php echo $c->teks ?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
					</div>
					
				</div>
				
					