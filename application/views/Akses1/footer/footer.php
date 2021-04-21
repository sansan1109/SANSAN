
        <!-- footer content -->
        <footer style="background: #2a3f54;">
          <div class="pull-right">
            Hasan Fadillah @2019 - Bootstrap Admin Template
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<!-- Start Custom -->
<script type="text/javascript" src="<?php echo base_url().'vendors/jquery/dist/jquery.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/fastclick/lib/fastclick.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/nprogress/nprogress.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Chart.js/dist/Chart.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/gauge.js/dist/gauge.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/iCheck/icheck.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/skycons/skycons.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Flot/jquery.flot.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Flot/jquery.flot.pie.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Flot/jquery.flot.time.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Flot/jquery.flot.stack.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/Flot/jquery.flot.resize.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/flot.orderbars/js/jquery.flot.orderBars.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/flot-spline/js/jquery.flot.spline.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/flot.curvedlines/curvedLines.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/DateJS/build/date.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/jqvmap/dist/jquery.vmap.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/jqvmap/dist/maps/jquery.vmap.world.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/moment/min/moment.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vendors/bootstrap-daterangepicker/daterangepicker.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'build/js/custom.min.js'; ?>"></script>
<!-- END Custom Theme Scripts -->
<script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datepicker/jquery-ui.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables_datePicker.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/select2.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/emoji.js'; ?>"></script>
<script>
   $(document).ready(function() {
    <?php 
if(isset($absen)){
foreach ($absen as $key) { ?>
  $('#options').change(function() {
      if ($(this).val() === '<?php echo $key->kd_absen; ?>') {
      $('#test').attr('value', '<?php echo $key->nama_wp; ?>');
        $('#kd_inven').attr('value', '<?php echo $key->tgl_absen; ?>');
        $('#stok').attr('value', '<?php echo $key->alamat_wp; ?>');
      }
    });
<?php }} ?>
  });
</script>
<script type="text/javascript">

  $(document).ready(function() {
 $("#selUser").select2();
  })
  <?php foreach ($data as $key) { ?>
    $('#selUser').change(function() {
      if ($(this).val() === '<?php echo $key->id_device; ?>') {
        $('#nama_wp').attr('value', '<?php echo $key->nama_wp; ?>');
        $('#alamat_wp').attr('value', '<?php echo $key->alamat_wp; ?>');
        $('#status_profiling').attr('value', '<?php echo $key->status_profiling; ?>');
        $('#no_gsm').attr('value', '<?php echo $key->no_gsm; ?>');
        $('#vendor').attr('value', '<?php echo $key->vendor; ?>');
        $('#metode').attr('value', '<?php echo $key->metode; ?>');
        $('#jenis_wp').attr('value', '<?php echo $key->jenis_wp; ?>');
      }
    });
  <?php } ?>
</script>
<script>
   function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
</script>
  </body>
</html>
