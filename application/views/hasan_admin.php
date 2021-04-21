<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1">
<thead>

<tr>
<th>Nama Implementor</th>
<th>Tanggal</th>
<th>Kegiatan</th>
<th>Kota</th>
<th>Nama Wajib Pajak</th>
<th>Nama Vendor</th>
<th>Jenis Wajib Pajak</th>
<th>Alamat Wajib Pajak</th>
<th>ID Device</th>
<th>Metode</th>
<th>Nomor GSM</th>
<th>Hasil Pengecekkan</th>
<th>Catatan</th>
<th>Status</th>
<th>Status Profiling</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($absensi as $user) { ?>
<tr>
<td><?php echo $user->nama_user;		?></td>
<td><?php echo $user->tgl_absen;		?></td>
<td><?php echo $user->kegiatan_absen;	?></td>
<td><?php echo $user->nama_kota;		?></td>
<td><?php echo $user->nama_wp;			?></td>
<td><?php echo $user->vendor;			?></td>
<td><?php echo $user->jenis_wp;			?></td>
<td><?php echo $user->alamat_wp;		?></td>
<td><?php echo $user->id_device;		?></td>
<td><?php echo $user->metode;			?></td>
<td><?php echo $user->no_gsm;			?></td>
<td><?php echo $user->hasil_pengecekkan;?></td>
<td><?php echo $user->catatan_absen;	?></td>
<td><?php echo $user->status;			?></td>
<td><?php echo $user->status_profiling;	?></td>
 </tr>

<?php $i++; } ?>

</tbody>

</table>