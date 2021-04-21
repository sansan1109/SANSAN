<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {	
function  __construct(){
	parent::__construct();
	$this->load->model('Web_model');
        $this->load->library('zip');
	if($this->session->userdata('status') != 'sukseslogin'){
		redirect(base_url().'login?pesan=belumlogin');
	}}	

public function download_zip(){
    	$this->load->library(array('MY_Zip', 'Zip'));
    	$kd_kota = $this->uri->segment('3');
    	$kd_kota1 = $this->db->query("SELECT gambar FROM absensi WHERE kd_kota=$kd_kota AND gambar!=''")->result();
    	
        foreach ($kd_kota1 as $key) {
			$path = FCPATH.'assets/upload/'.$key->gambar;
	        $this->zip->read_file($path);
        }
        $this->zip->download('dl-Laporan_Poto-'.$kd_kota);}
function index(){
		$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses/header/header',$data);
		$this->load->view('Akses/index');
		$this->load->view('Akses/footer/footer');}
function pemasangan($kd_kota){
	$data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	if ($kd_kota!='999') {
	$data['absensi'] = $this->db->query("SELECT login_user.id_user, login_user.nama_user, kota.nama_kota, absensi.id_device,absensi.metode, absensi.kd_absen, absensi.tgl_absen,absensi.alamat_wp, absensi.hasil_pengecekkan,absensi.status_profiling, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota AND absensi.kegiatan_absen='Pemasangan'")->result();
		
	}else {
		$data['absensi'] = $this->db->query("SELECT login_user.id_user, login_user.nama_user, kota.nama_kota, absensi.id_device,absensi.metode, absensi.kd_absen, absensi.tgl_absen,absensi.alamat_wp, absensi.hasil_pengecekkan,absensi.status_profiling, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota")->result();
	}
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/pemasangan',$data);
	$this->load->view('Akses/footer/footer');}
function maintenance($kd_kota){
	$data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
	if ($kd_kota!='999') {
	$data['absensi'] = $this->db->query("SELECT login_user.id_user, login_user.nama_user, kota.nama_kota, absensi.id_device,absensi.metode, absensi.kd_absen, absensi.tgl_absen,absensi.alamat_wp, absensi.hasil_pengecekkan,absensi.status_profiling, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota AND absensi.kegiatan_absen='Maintenance'")->result();
		
	}else {
		$data['absensi'] = $this->db->query("SELECT login_user.id_user, login_user.nama_user, kota.nama_kota, absensi.id_device,absensi.metode, absensi.kd_absen, absensi.tgl_absen,absensi.alamat_wp, absensi.hasil_pengecekkan,absensi.status_profiling, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND kota.kd_kota=$kd_kota")->result();
	}
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/mainten',$data);
	$this->load->view('Akses/footer/footer');}	
function logout(){
	$this->session->set_flashdata('alertlogout','<center>Anda telah Logout.</center>');
	$this->session->sess_destroy();
	redirect(base_url().'Login?Logout');}
function ganti_password(){		
		$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
		$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses/header/header',$data);
		$this->load->view('Akses/ganti_password');
		$this->load->view('Akses/footer/footer');}
function ganti_password_act(){
		$this->form_validation->set_rules('password_user', 'password_user', 'required|min_length[8]');
		$password_user	 = $this->input->post('password_user');
		if($this->form_validation->run()==false){
			$this->session->set_flashdata('passwordgagal','Password Minimal 8 character.');
			redirect('Dashboard_admin/ganti_password');
		}else{
			$where =array('id_user'=>$this->session->userdata('id_user'));
        	$data = array(
        	'password_user'=> md5($password_user)
        );
        	$this->Web_model->update_data($where,$data,'login_user');
        	$this->session->set_flashdata('passwordsukses','Password Berhasil Diganti.');
        	redirect(base_url().'Dashboard_admin/ganti_password?pasword-berhasil');}}
function kontak(){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/kontak',$data);
	$this->load->view('Akses/footer/footer');}
function tambah_kontak(){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/tambah_kontak',$data);
	$this->load->view('Akses/footer/footer');}
function save_tambah_kontak(){
	$nama_kontak 	= $this->input->post('nama_kontak');
	$nomor_kontak 	= $this->input->post('nomor_kontak');
	$nama_wp 		= $this->input->post('nama_wp');
	$kota 			= $this->input->post('kota');
 	$this->form_validation->set_rules('nama_kontak', 'nama_kontak', 'required');
	if($this->form_validation->run() != false){
		$data = array(
			
			'nama_kontak'=> $nama_kontak,
			'nomor_kontak'=> $nomor_kontak,
			'nama_wp'=> $nama_wp,
			'kota'=> $kota,
			
			);
		$this->Web_model->insert_data($data,'kontak');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/kontak');}else{
		$this->session->set_flashdata('alertgagal','Data tidak sesuai.');
		redirect(base_url().'Dashboard_admin/tambah_kontak');}}
function hapus_kontak($no){
	$where = array('no' => $no);
	$this->Web_model->delete_data($where,'kontak');
	$this->session->set_flashdata('alertgagal','Kota Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin/kontak');}
function edit_kontak($no){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak where no=$no")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/edit_kontak',$data);
	$this->load->view('Akses/footer/footer');}
function edit_kontak_act(){
	$no				= $this->input->post('no');
	$nama_kontak 	= $this->input->post('nama_kontak');
	$nomor_kontak 	= $this->input->post('nomor_kontak');
	$nama_wp 		= $this->input->post('nama_wp');
	$kota 			= $this->input->post('kota');
 	$this->form_validation->set_rules('nama_kontak','nama_kontak','required');
 	$this->form_validation->set_rules('no','no','required');
  	$this->form_validation->set_rules('nomor_kontak','nomor_kontak','required');
 	$this->form_validation->set_rules('nama_wp','nama_wp','required');
	if($this->form_validation->run() != false){		
		$where 	= array('no' => $no);
		$data = array(
			'nama_kontak'=> $nama_kontak,
			'nomor_kontak'=> $nomor_kontak,
			'nama_wp'=> $nama_wp,
			'kota'=> $kota,
			);
		$this->Web_model->update_data($where,$data,'kontak');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/kontak');
	}else{
		$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect (base_url().'Dashboard_admin/edit_kontak/'.$no);
	}
	}
function hapus($kd_absen){
		$where = array('kd_absen' => $kd_absen);
		$this->Web_model->delete_data($where,'absensi');
		$this->session->set_flashdata('alerthapus','Data sudah dihapus.');
		redirect (base_url().'Dashboard_admin');}
function poto($kd_kota){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['absen'] = $this->db->query("SELECT absensi.kd_absen, login_user.id_user, absensi.nama_wp, absensi.id_device, absensi.tgl_absen, login_user.nama_user, absensi.gambar FROM absensi,login_user WHERE login_user.id_user=absensi.id_user AND absensi.kd_kota=$kd_kota AND absensi.gambar!='' AND absensi.kegiatan_absen!='Maintenance'")->result();		
	$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/poto/poto',$data);
	$this->load->view('Akses/footer/footer');}
function anggota(){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();	
	$data['anggota'] = $this->db->query("select * from login_user where username_user!='administator'")->result();	
	$data['nama'] = $this->db->query("select * from login_user order by nama_user asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/anggota/hasan',$data);
	$this->load->view('Akses/footer/footer');}
function hapus_anggota($id_user){
	$where = array('id_user' => $id_user);
	$this->Web_model->delete_data($where,'login_user');
	$this->session->set_flashdata('alertgagal','User Sudah Dihapus.');
	redirect(base_url().'Dashboard/anggota');}
function rembesan(){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['rembesan'] = $this->db->query("select rembesan.kd_r,login_user.nama_user as nama_user,rembesan.excel,rembesan.nominal,rembesan.tgl_input,rembesan.tgl_tf,rembesan.gambar,rembesan.status from rembesan,login_user where login_user.id_user=rembesan.id_user order by kd_r desc")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/rembesan',$data);
	$this->load->view('Akses/footer/footer');}
function rembesan_acc($kd_r){
	$data['nama_user'] = $this->db->query("select * from login_user where nama_user!='Administator' GROUP by id_user ")->result();
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['rembesan'] = $this->db->query("select rembesan.kd_r,login_user.nama_user as nama_user,rembesan.excel,rembesan.nominal,rembesan.tgl_input,rembesan.tgl_tf,rembesan.gambar,rembesan.status from rembesan,login_user where login_user.id_user=rembesan.id_user and rembesan.kd_r=$kd_r")->result();
	$this->load->view('Akses/header/header',$data);
	$this->load->view('Akses/rembesan_acc',$data);
	$this->load->view('Akses/footer/footer');}
function rembesan_acc_act(){
		$this->form_validation->set_rules('kd_r','kd_r','required');
		if($this->form_validation->run() != false){
			$kd_r 		= $this->input->post('kd_r');
			$where 		= array('kd_r' => $kd_r);
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4096';
			$config['file_name'] = time();
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				$image=$this->upload->data();
				$data = array(
						'gambar'	=> $image['file_name'],
						'tgl_tf'	=> date('Y-m-d H:i:s'),
						'status'	=>'1'
				);
				$this->Web_model->update_data($where, $data, 'rembesan');
				$this->session->set_flashdata('alertsukses','Data telah di simpan.');
				redirect(base_url().'Dashboard/rembesan/');
			}
		}else{
			$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
			redirect(base_url().'Dashboard/rembesan/');
		}}


}?>