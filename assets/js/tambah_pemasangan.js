
$(document).ready(function(){ // Ketika halaman sudah diload dan siap
$("#btn-tambah-form-pemasangan").click(function(){ // Ketika tombol Tambah Data Form di klik
var jumlah = parseInt($("#jumlah-form-pemasangan").val()); // Ambil jumlah data form pada textbox jumlah-form
var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

// Kita akan menambahkan form dengan menggunakan append
// pada sebuah tag div yg kita beri id insert-form
$("#insert-form-pemasangan").append("<b>Pemasngan ke " + nextform + " :</b>" +
"<table class='table table-bordered'>" +
"<tr>"+
"<td>Nama Implementor</td>"+
"<td><select class='form-control' name='id_user[]' required><option value=''>Pilih Nama</option><?php $no = 1; foreach ($nama as $key) { ?><option value='<?php echo $key->id_user  ?>'><?php echo $key->nama_user  ?></option><?php } ?></select></td>"+
"</tr>"+
"<tr>"+
"<td>Tangal Absen</td>"+
"<td><input id='datepicker' class='form-control' type='text' name='tgl_absen[]' placeholder='MM/DD/YYYY' required></td>"+
"</tr>"+
"<tr>"+
"<td>Kegiatan</td>"+
"<td><select class='form-control' name='kegiatan_absen[]' required><option value=''>Pilih Kegiatan</option><option value='Pemasangan'>Pemasangan</option><option value='Maintenance'>Maintenance</option></select></td>"+
"</tr>"+
"<tr>"+
"<td>Nama Kota</td>"+
"<td><select class='form-control' name='kd_kota[]' required><option value=''>Pilih Kota</option><?php $no = 1; foreach ($kota as $key) { ?><option value='<?php echo $key->kd_kota  ?>'><?php echo $key->nama_kota  ?></option><?php }?></select></td>"+
"</tr>"+
"<tr>"+
"<td>ID Device</td>"+
"<td><input class='form-control' type='text' name='id_device[]' required></td>"+
"</tr>"+
"<tr>"+
"<td>Nama Wajib Pajak</td>"+
"<td><input class='form-control' type='text' name='nama_wp[]' required></td>"+
"</tr>"+
"<tr>"+
"<td>Catatan</td>"+
"<td><input class='form-control' type='text' name='catatan_absen[]' required></td>"+
"</tr>"+
"<tr>"+
"<td>Status</td>"+
"<td><select class='form-control' name='status[]' required><option value=''>Pilih Status</option><option value='Solved'>Solved</option><option value='Pending'>Pending</option></select></td>"+
"</tr>"+
"</tr>"+
"</table>");

$("#jumlah-form-pemasangan").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
});

// Buat fungsi untuk mereset form ke semula
$("#btn-reset-form-pemasangan").click(function(){
$("#insert-form-pemasangan").html(""); // Kita kosongkan isi dari div insert-form
$("#jumlah-form-pemasangan").val("1"); // Ubah kembali value jumlah form menjadi 1
});
});