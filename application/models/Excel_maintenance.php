<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_maintenance extends CI_Model {

public function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

 public function listing_mainten($kd_kota) {
 $this->db->select('*');
 $this->db->from('login_user,absensi,kota');
 $this->db->where("absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota AND absensi.kegiatan_absen='Maintenance'");
 $query = $this->db->get();
 return $query->result();
 }
}