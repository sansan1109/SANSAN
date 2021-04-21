<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

// Load database
 public function __construct() {
 parent::__construct();
 $this->load->model('Excel_pemasangan');
  $this->load->model('Excel_maintenance');
 }
public function export_excel_absen($id_user){
$data = array( 'title' => 'Absensi '.$id_user,'user' => $this->Excel_pemasangan->listing_absen($id_user));
$data['nama_user'] = $this->db->query("SELECT nama_user FROM login_user WHERE id_user=$id_user limit 1")->result();
$data['absensi'] = $this->db->query("SELECT login_user.nama_user, kota.nama_kota, absensi.id_device, absensi.kd_absen, absensi.tgl_absen, absensi.metode, absensi.no_gsm, absensi.vendor, absensi.status_profiling, absensi.kegiatan_absen, absensi.hasil_pengecekkan, absensi.jenis_wp, absensi.alamat_wp, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND absensi.id_user=$id_user Order By absensi.tgl_absen asc")->result();
 $this->load->view('hasan_absen',$data);
 }
public function export_excel_absen_admin(){
$data = array( 'title' => 'Absensi ','user' => $this->Excel_pemasangan->listing_absen_admin());
$data['absensi'] = $this->db->query("SELECT login_user.nama_user, kota.nama_kota, absensi.id_device, absensi.kd_absen, absensi.tgl_absen, absensi.metode, absensi.no_gsm, absensi.vendor, absensi.status_profiling, absensi.kegiatan_absen, absensi.hasil_pengecekkan, absensi.jenis_wp, absensi.alamat_wp, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota Order By absensi.tgl_absen asc")->result();
 $this->load->view('hasan_admin',$data);
 }

public function export_excel($kd_kota){
 $data = array( 'title' => 'Laporan Pemasangan '.$kd_kota,'user' => $this->Excel_pemasangan->listing($kd_kota));
 $data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
 $this->load->view('hasan_export',$data);
 }

 public function export_excel_mainten($kd_kota){
 $data = array( 'title' => 'Laporan Maintenance '.$kd_kota,'user' => $this->Excel_maintenance->listing_mainten($kd_kota));
 $data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
 $this->load->view('hasan_export_2',$data);
 }

}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */