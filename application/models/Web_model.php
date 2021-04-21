<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web_model extends CI_Model{
	function  __construct(){
	parent:: __construct();
	}

function get_sub_category($kd_kota){
    $query = $this->db->get_where('absensi', array('kd_kota' => $kd_kota));
    return $query;
  }
function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}
function edit_data_profil($table,$where){
		return $this->db->get_where($table,$where);
	}
function get_data($table){ 
		return $this->db->get($table);
	}
function get_data_user($where,$table){ 
		$this->db->where($where);
		return $this->db->get($table);
	}
function insert_data($data,$table){
		$this->db->insert($table,$data);
	}
function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
function username($username_user){
		$sql = "SELECT username_user FROM login_user where username_user='$username_user'";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

public function kode_otomatis_user(){
    $this->db->select('right(id_user,3) as kode',false);
    $this->db->order_by('id_user','desc');
    $this->db->limit(1);
    $query = $this->db->get('login_user');
    if($query->num_rows()<>0){
      $data=$query->row();
      $kode=intval($data->kode)+1;
    }else{
      $kode=1;
    }
    $kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
    $kodejadi='2019'.$kodemax;
    return $kodejadi;
  	}
	public function save_batch($data){
		return $this->db->insert_batch('absensi', $data);
	}
}
