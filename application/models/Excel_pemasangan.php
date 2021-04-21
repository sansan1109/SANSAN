<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_pemasangan extends CI_Model {

public function __construct()
 {
 parent::__construct();
 $this->load->database();
 }
public function listing_absen($id_user) {
 $this->db->select('*');
 $this->db->from('login_user,absensi,kota');
 $this->db->where("absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota");
 $query = $this->db->get();
 return $query->result();
 }
public function listing_absen_admin() {
 $this->db->select('*');
 $this->db->from('login_user,absensi,kota');
 $this->db->where("absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota");
 $query = $this->db->get();
 return $query->result();
 }
 public function listing($kd_kota) {
 $this->db->select('*');
 $this->db->from('login_user,absensi,kota');
 $this->db->where("absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota AND absensi.kegiatan_absen='Pemasangan'");
 $query = $this->db->get();
 return $query->result();
 }

}
