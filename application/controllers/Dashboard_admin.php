<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {	
function  __construct(){
	parent::__construct();
	$this->load->model('Web_model');
	$this->load->model('Chats');
        $this->load->library('zip');
	if($this->session->userdata('status') != 'sukseslogin1'){
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
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();	
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses1/header/header',$data);
		$this->load->view('Akses1/index');
		$this->load->view('Akses1/footer/footer');}
function logout(){
	$this->session->set_flashdata('alertlogout','<center>Anda telah Logout.</center>');
	$this->session->sess_destroy();
	redirect(base_url().'Login?Logout');}
function ganti_password(){		
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses1/header/header',$data);
		$this->load->view('Akses1/ganti_password');
		$this->load->view('Akses1/footer/footer');}
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
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/kontak',$data);
	$this->load->view('Akses1/footer/footer');}
function tambah_kontak(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/tambah_kontak',$data);
	$this->load->view('Akses1/footer/footer');}
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
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak where no=$no")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/edit_kontak',$data);
	$this->load->view('Akses1/footer/footer');}
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
		redirect (base_url().'Dashboard_admin/kontak');
	}else{
		redirect (base_url().'Dashboard_admin/edit_kontak/'.$no);
	}
	}
function hapus($kd_absen){
		$where = array('kd_absen' => $kd_absen);
		$this->Web_model->delete_data($where,'absensi');
		$this->session->set_flashdata('alerthapus','Data sudah dihapus.');
		redirect (base_url().'Dashboard_admin');}
function table(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kota2'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/pemasangan/table',$data);
	$this->load->view('Akses1/footer/footer');}
function tambah_table(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/pemasangan/tambah_table',$data);
	$this->load->view('Akses1/footer/footer');}
function save_tambah_table(){
	$nama_kota 			= $this->input->post('nama_kota');
 	$this->form_validation->set_rules('nama_kota', 'nama_kota', 'required');
	if($this->form_validation->run() != false){
		$data = array(
			
			'nama_kota'=> $nama_kota,
			
			);
		$this->Web_model->insert_data($data,'kota');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/table');}else{
		$this->session->set_flashdata('alertgagal','Data tidak sesuai.');
		redirect(base_url().'Dashboard_admin/tambah_table');}}
function hapus_table($kd_kota){
	$where = array('kd_kota' => $kd_kota);
	$this->Web_model->delete_data($where,'kota');
	$this->session->set_flashdata('alertgagal','Kota Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin/table');}
function edit_table($kd_kota){
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kota2'] = $this->db->query("select * from kota where kd_kota=$kd_kota")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/pemasangan/edit_table',$data);
	$this->load->view('Akses1/footer/footer');}
function edit_table_act(){
	$kd_kota			= $this->input->post('kd_kota');
	$nama_kota			= $this->input->post('nama_kota');	
 	$this->form_validation->set_rules('kd_kota','kd_kota','required');
	if($this->form_validation->run() != false){		
		$where 	= array('kd_kota' => $kd_kota);
		$data = array(
			'nama_kota'=> $nama_kota
			);
		$this->Web_model->update_data($where,$data,'kota');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/edit_table/'.$kd_kota);
	}else{
		$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect (base_url().'Dashboard_admin/table');
	}
	}
function daily(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kota2'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['daily'] = $this->db->query("select daily.kd_daily, login_user.nama_user, daily.tgl_daily, daily.nama_kota, daily.aktivitas, daily.ket_aktivitas, daily.id_user from daily,login_user where login_user.id_user=daily.id_user order by kd_daily asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/daily/daily',$data);
	$this->load->view('Akses1/footer/footer');}
function agenda(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kota2'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['daily'] = $this->db->query("select * from daily order by kd_daily asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/daily/tambah_daily');
	$this->load->view('Akses1/footer/footer');}
public function save_daily(){
	$id_user			= $this->session->userdata('id_user');
	$tgl_daily			= $this->input->post('tgl_daily');
	$nama_kota			= $this->input->post('nama_kota');
	$aktivitas			= $this->input->post('aktivitas');
	$ket_aktivitas		= $this->input->post('ket_aktivitas');
	$this->form_validation->set_rules('tgl_daily','Tanggal Daily','required');
	if($this->form_validation->run() != false){
		$data = array(
			'id_user'			=> $id_user,
			'tgl_daily'			=>date("Y-m-d",strtotime($tgl_daily)),
			'nama_kota'			=>$nama_kota,
			'aktivitas'			=>$aktivitas,
			'ket_aktivitas'		=>$ket_aktivitas,
			);
		$this->Web_model->insert_data($data,'daily');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/daily');
	}else{
	    $this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect(base_url().'Dashboard_admin/agenda');
	}
		}
function edit_daily($kd_daily){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kota2'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['daily'] = $this->db->query("select daily.kd_daily, login_user.nama_user, daily.tgl_daily, daily.nama_kota, daily.aktivitas, daily.ket_aktivitas, daily.id_user from daily,login_user where login_user.id_user=daily.id_user and kd_daily=$kd_daily")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/daily/edit_daily',$data);
	$this->load->view('Akses1/footer/footer');}
function edit_daily_act(){
	$id_user			= $this->session->userdata('id_user');
	$kd_daily			= $this->input->post('kd_daily');
	$tgl_daily			= $this->input->post('tgl_daily');
	$nama_kota			= $this->input->post('nama_kota');
	$aktivitas			= $this->input->post('aktivitas');
	$ket_aktivitas		= $this->input->post('ket_aktivitas');
	$this->form_validation->set_rules('tgl_daily','Tanggal Daily','required');
	if($this->form_validation->run() != false){		
		$where 	= array('kd_daily' => $kd_daily);
		$data = array(
			'id_user'=> $id_user,
			'tgl_daily'=> date("Y-m-d",strtotime($tgl_daily)),
			'nama_kota'=> $nama_kota,
			'aktivitas'=> $aktivitas,
			'ket_aktivitas'=> $ket_aktivitas,
			);
		$this->Web_model->update_data($where,$data,'daily');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/daily');
	}else{
		$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect (base_url().'Dashboard_admin/edit_daily/'.$kd_daily);
	}
	}
function hapus_daily($kd_daily){
	$where = array('kd_daily' => $kd_daily);
	$this->Web_model->delete_data($where,'daily');
	$this->session->set_flashdata('alertgagal','Data Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin/daily');}
function absen($id_user){
	$data['absensi'] = $this->db->query("SELECT login_user.id_user, kota.nama_kota, login_user.nama_user, absensi.id_device, absensi.kd_absen, absensi.tgl_absen, absensi.kegiatan_absen, absensi.nama_wp FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND absensi.id_user=$id_user")->result();		
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/absensi/hasan',$data);
	$this->load->view('Akses1/footer/footer');}
function absensi_p(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/absensi/absen_p',$data);
	$this->load->view('Akses1/footer/footer');}
public function absensi_p_act(){
	$id_user			= $this->session->userdata('id_user');
	$tgl_absen			= $this->input->post('tgl_absen');
	$kd_kota			= $this->input->post('kd_kota');
	$id_device			= $this->input->post('id_device');
	$nama_wp			= $this->input->post('nama_wp');
	$catatan_absen		= $this->input->post('catatan_absen');
	$alamat_wp			= $this->input->post('alamat_wp');
	$status				= $this->input->post('status');
	$vendor				= $this->input->post('vendor');
	$metode				= $this->input->post('metode');
	$no_gsm				= $this->input->post('no_gsm');
	$jenis_wp			= $this->input->post('jenis_wp');
	$hasil_pengecekkan	= $this->input->post('hasil_pengecekkan');
	$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required');
	if($this->form_validation->run() != false){
		$data = array(
			'id_user'			=> $id_user,
			'tgl_absen'			=>date("Y-m-d",strtotime($tgl_absen)),
			'kegiatan_absen'	=>'Pemasangan',
			'kd_kota'			=>$kd_kota,
			'id_device'			=>$id_device,
			'nama_wp'			=>$nama_wp,
			'catatan_absen'		=>$catatan_absen,
			'alamat_wp'         =>$alamat_wp,
			'status_profiling' 	=>'Belum',
			'status'			=>$status,
			'vendor'			=>$vendor,
			'metode'			=>$metode,
			'no_gsm'			=>$no_gsm,
			'jenis_wp'			=>$jenis_wp,
			'hasil_pengecekkan'	=>$hasil_pengecekkan,
			'gambar'			=>'0.png',
			);
		$this->Web_model->insert_data($data,'absensi');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/absensi_p/');
	}else{
	    $this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect(base_url().'Dashboard_admin');
	}
		}
function absensi_m(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['device'] = $this->db->query("SELECT id_device FROM absensi WHERE id_device!='-' GROUP BY id_device")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['data'] = $this->db->query("select * from absensi")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/absensi/absen_m',$data);
	$this->load->view('Akses1/footer/footer',$data);}
function get_sub_category(){
    $kd_kota = $this->input->post('id',TRUE);
    $data = $this->Web_model->get_sub_category($kd_kota)->result();
    echo json_encode($data);}
public function absensi_m_act(){
	$id_user			= $this->session->userdata('id_user');
	$tgl_absen			= $this->input->post('tgl_absen');
	$kd_kota			= $this->input->post('kd_kota');
	$id_device			= $this->input->post('id_device');
	$nama_wp			= $this->input->post('nama_wp');
	$catatan_absen		= $this->input->post('catatan_absen');
	$alamat_wp			= $this->input->post('alamat_wp');
	$status				= $this->input->post('status');
	$vendor				= $this->input->post('vendor');
	$metode				= $this->input->post('metode');
	$no_gsm				= $this->input->post('no_gsm');
	$jenis_wp			= $this->input->post('jenis_wp');
	$status_profiling	= $this->input->post('status_profiling');
	$hasil_pengecekkan	= $this->input->post('hasil_pengecekkan');
	$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required');
	if($this->form_validation->run() != false){
		$data = array(
			'id_user'			=> $id_user,
			'tgl_absen'			=>date("Y-m-d",strtotime($tgl_absen)),
			'kegiatan_absen'	=>'Maintenance',
			'kd_kota'			=>$kd_kota,
			'id_device'			=>$id_device,
			'nama_wp'			=>$nama_wp,
			'catatan_absen'		=>'-',
			'alamat_wp'         =>$alamat_wp,
			'status_profiling' 	=>$status_profiling,
			'status'			=>$status,
			'vendor'			=>$vendor,
			'metode'			=>$metode,
			'no_gsm'			=>$no_gsm,
			'jenis_wp'			=>$jenis_wp,
			'hasil_pengecekkan'	=>$hasil_pengecekkan,
			'gambar'			=>'0.png',
			);
		$this->Web_model->insert_data($data,'absensi');	
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/absensi_m/');
	}else{
	    $this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect(base_url().'Dashboard_admin');
	}
		}
function edit_absen($kd_absen){
	$id_user = $this->session->userdata('id_user');
	$data['absensi'] = $this->db->query("SELECT login_user.nama_user, kota.nama_kota, absensi.id_device, absensi.kd_absen, absensi.tgl_absen,absensi.metode,absensi.no_gsm,absensi.vendor, absensi.status_profiling, absensi.kegiatan_absen,absensi.hasil_pengecekkan, absensi.jenis_wp, absensi.alamat_wp, absensi.catatan_absen, absensi.nama_wp, absensi.status FROM login_user,absensi,kota WHERE absensi.id_user=login_user.id_user AND absensi.kd_kota=kota.kd_kota AND absensi.id_user=$id_user AND absensi.kd_absen=$kd_absen")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/absensi/edit_absen',$data);
	$this->load->view('Akses1/footer/footer');}
function edit_absen_act(){
	$kd_absen			= $this->input->post('kd_absen');
	$tgl_absen			= $this->input->post('tgl_absen');	
	$kegiatan_absen		= $this->input->post('kegiatan_absen');
	$kd_kota 			= $this->input->post('kd_kota');
	$id_device			= $this->input->post('id_device');
	$nama_wp	 		= $this->input->post('nama_wp');
	$alamat_wp	 		= $this->input->post('alamat_wp');
 	$catatan_absen 		= $this->input->post('catatan_absen');
	$status 			= $this->input->post('status');
	$vendor 			= $this->input->post('vendor');
	$metode 			= $this->input->post('metode');
	$no_gsm 			= $this->input->post('no_gsm');
	$jenis_wp 			= $this->input->post('jenis_wp');
	$hasil_pengecekkan 	= $this->input->post('hasil_pengecekkan');
	$status_profiling 	= $this->input->post('status_profiling');
 	$this->form_validation->set_rules('kegiatan_absen','Kegiatan','required');
	if($this->form_validation->run() != false){		
		$where 	= array('kd_absen' => $kd_absen);
		$data = array(
			'kegiatan_absen'=> $kegiatan_absen,
			'tgl_absen'=> date("Y-m-d",strtotime($tgl_absen)),
			'kd_kota'=> $kd_kota,
			'id_device'=> $id_device,
			'nama_wp'=> $nama_wp,
			'alamat_wp'=> $alamat_wp,
			'catatan_absen'=> $catatan_absen,
			'status'=> $status,
			'vendor'=>$vendor,
			'metode'=>$metode,
			'no_gsm'=>$no_gsm,
			'jenis_wp'=>$jenis_wp,
			'hasil_pengecekkan'=>$hasil_pengecekkan,
			'status_profiling'=>$status_profiling,
			);
		$this->Web_model->update_data($where,$data,'absensi');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/edit_absen/'.$kd_absen);
	}else{
		$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect (base_url().'Dashboard_admin/edit_absen/'.$kd_absen);
	}
	}
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
		$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/pemasangan/ambon',$data);
	$this->load->view('Akses1/footer/footer');}
function poto($kd_kota){
	$data['namaa_kota'] = $this->db->query("SELECT * FROM kota WHERE kd_kota=$kd_kota")->result();	
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['absen'] = $this->db->query("SELECT absensi.kd_absen, login_user.id_user, absensi.nama_wp, absensi.id_device, absensi.tgl_absen, login_user.nama_user, absensi.gambar FROM absensi,login_user WHERE login_user.id_user=absensi.id_user AND absensi.kd_kota=$kd_kota AND absensi.gambar!='' AND absensi.kegiatan_absen!='Maintenance'")->result();		
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/poto/poto',$data);
	$this->load->view('Akses1/footer/footer');}
function edit_poto($kd_absen){
		$where = array('kd_absen' => $kd_absen);
		$data['absen'] = $this->Web_model->edit_data($where,'absensi')->result();
		$data['poto_acc'] = $this->db->query("SELECT absensi.kd_absen, login_user.id_user, absensi.nama_wp, absensi.id_device, absensi.tgl_absen, login_user.nama_user, absensi.gambar FROM absensi,login_user WHERE login_user.id_user=absensi.id_user AND absensi.kd_absen=$kd_absen AND absensi.gambar!='' AND absensi.kegiatan_absen!='Maintenance'")->result();
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses1/header/header',$data);
		$this->load->view('Akses1/poto/edit_poto',$data);
		$this->load->view('Akses1/footer/footer');}
function update_poto(){
		$this->form_validation->set_rules('kd_absen','kd_absen','required');
		if($this->form_validation->run() != false){
			$kd_absen = $this->input->post('kd_absen');
			$nama_wp = $this->input->post('nama_wp');
			$where 	= array('kd_absen' => $kd_absen);
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4096';
			$config['file_name'] = $nama_wp;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				$image=$this->upload->data();
				$data = array(
						'gambar'	=> $image['file_name']
				);
				$this->Web_model->update_data($where, $data, 'absensi');
				unlink('./assets/upload/'.$this->input->post('old_pict', TRUE));
				$this->session->set_flashdata('alertsukses','Data telah di simpan.');
				redirect(base_url().'Dashboard_admin/edit_poto/'.$kd_absen);
			}
		}else{
			$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
			redirect(base_url().'Dashboard_admin/edit_poto/'.$kd_absen);
		}}
function hapus_poto($id){
	$where = array('kd_absen' => $id);
	$this->Web_model->delete_data($where,'absensi');
	$this->session->set_flashdata('alertgagal','Poto Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin');}
function tambah_poto(){
		$this->form_validation->set_rules('kd_absen','kd_absen','required');
		if($this->form_validation->run() != false){
			$kd_absen = $this->input->post('kd_absen');
			$nama_wp = $this->input->post('nama_wp');
			$where 	= array('kd_absen' => $kd_absen);
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '4096';
			$config['file_name'] = $nama_wp;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				$image=$this->upload->data();
				$data = array(
						'gambar'	=> $image['file_name']
				);
				$this->Web_model->update_data($where, $data, 'absensi');
				$this->session->set_flashdata('alertsukses','Data telah di simpan.');
				redirect(base_url().'Dashboard_admin/edit_poto/'.$kd_absen);
			}
		}else{
			$this->session->set_flashdata('alertgagal','Data gagal di simpan.');
			redirect(base_url().'Dashboard_admin/edit_poto/'.$kd_absen);
		}}
function sakit(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/absensi/sakit',$data);
	$this->load->view('Akses1/footer/footer');}
public function save_sakit(){
	
	$this->form_validation->set_rules('tgl_absen','Tanggal Absen','required');
	if($this->form_validation->run() != false){
	$id_user 		= $this->session->userdata('id_user');
	$nama_user 		= $this->session->userdata('nama_user');
	$tgl_absen		= $this->input->post('tgl_absen');
	$config['upload_path'] = './assets/upload/';
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['max_size'] = '4096';
	$config['file_name'] = date("Y-m-d",strtotime($tgl_absen)).'-'.$nama_user;
	$this->load->library('upload', $config);
	if($this->upload->do_upload('image')){	
		$image=$this->upload->data();
		$data = array(
			'id_user'			=>$id_user,
			'tgl_absen'			=>date("Y-m-d",strtotime($tgl_absen)),
			'kegiatan_absen'	=>'Sakit',
			'kd_kota'			=>'999',
			'id_device'			=>'-',
			'nama_wp'			=>'-',
			'catatan_absen'		=>'-',
			'alamat_wp'         =>'-',
			'status_profiling' 	=>'-',
			'status'			=>'-',
			'vendor'			=>'-',
			'metode'			=>'-',
			'no_gsm'			=>'-',
			'jenis_wp'			=>'-',
			'hasil_pengecekkan'	=>'-',
			'gambar'			=>$image['file_name']
			);
		$this->Web_model->insert_data($data,'absensi');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin');}
	}else{
	    $this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect(base_url().'Dashboard_admin');
	}
		}
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
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/mainten/ambon',$data);
	$this->load->view('Akses1/footer/footer');}
function rembesan(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['rembesan'] = $this->db->query("select rembesan.kd_r,login_user.nama_user as nama_user,rembesan.excel,rembesan.nominal,rembesan.tgl_input,rembesan.tgl_tf,rembesan.gambar,rembesan.status from rembesan,login_user where login_user.id_user=rembesan.id_user order by kd_r desc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/rembesan',$data);
	$this->load->view('Akses1/footer/footer');}
function input_rembesan(){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/input_rembesan',$data);
	$this->load->view('Akses1/footer/footer');}
public function rembesan_act(){
	$this->form_validation->set_rules('nominal','nominal','required');
	if($this->form_validation->run() != false){
	$id_user 		= $this->session->userdata('id_user');
	$nominal		= $this->input->post('nominal');
	$tgl_input		= date('Y-m-d H:i:s');
	$config['upload_path'] = './assets/upload/';
	$config['allowed_types'] = 'xlsx|xls|csv';
	$config['max_size'] = '100009600000';
	$config['file_name'] = time();
	$this->load->library('upload', $config);
	if($this->upload->do_upload('excel')){	
		$image=$this->upload->data();
		$data = array(
			'id_user'		=>$id_user,
			'tgl_input'		=>$tgl_input,
			'nominal'		=>$nominal,
			'excel'			=>$image['file_name'],
			'gambar'		=>'0.png',
			'status'		=>'0'
			);
		$this->Web_model->insert_data($data,'rembesan');
		$this->session->set_flashdata('alertsukses','Data telah di simpan.');
		redirect (base_url().'Dashboard_admin/rembesan');}
	}else{
	    $this->session->set_flashdata('alertgagal','Data gagal di simpan.');
		redirect(base_url().'Dashboard_admin/rembesan');
	}
	}
function hapus_rembesan($kd_r){
	$where = array('kd_r' => $kd_r);
	$this->Web_model->delete_data($where,'rembesan');
	$this->session->set_flashdata('alertgagal','Data Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin/rembesan');}
function edit_rembesan($kd_r){
	$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();
	$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
	$data['kontak'] = $this->db->query("select * from kontak order by nama_kontak asc")->result();
	$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
	$data['rembesan'] = $this->db->query("select rembesan.kd_r,login_user.nama_user as nama_user,rembesan.excel,rembesan.nominal,rembesan.tgl_input,rembesan.tgl_tf,rembesan.gambar,rembesan.status from rembesan,login_user where login_user.id_user=rembesan.id_user and rembesan.kd_r=$kd_r")->result();
	$this->load->view('Akses1/header/header',$data);
	$this->load->view('Akses1/edit_rembesan',$data);
	$this->load->view('Akses1/footer/footer');}
function chat(){
		$data['status'] = $this->Chats->get_stats()->result();
		$data['chat']   = $this->Chats->isi_chat()->result();
		$data['nama'] = $this->db->query("select * from login_user where username_user!='administator'")->result();	
		$data['kota'] = $this->db->query("select * from kota where kd_kota!='999' order by kd_kota asc")->result();
		$data['poto'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$data['mainten'] = $this->db->query("select * from kota order by kd_kota asc")->result();
		$this->load->view('Akses1/header/header',$data);
		$this->load->view('akses1/chat', $data);
		$this->load->view('Akses1/footer/footer');
	}
public function kirim() {
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$pesan = array(
				'pengirim' => $this->session->userdata('nama_user'),
				'waktu' => $date,
				'teks' => $this->input->post('pesan')
			 );
	 
	$this->db->insert('chat', $pesan);
	redirect (base_url('Dashboard_admin/chat'));
	}
function hapus_chat($id_chat){
	$where = array('id_chat' => $id_chat);
	$this->Web_model->delete_data($where,'chat');
	$this->session->set_flashdata('alertgagal','Chat Sudah Dihapus.');
	redirect(base_url().'Dashboard_admin/chat');}
}?>