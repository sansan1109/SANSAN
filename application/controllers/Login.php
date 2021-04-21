<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){ 
		parent:: __construct();
		$this->load->model('Web_model');
		if($this->session->userdata('status') == 'sukseslogin'){
		redirect(base_url().'Dashboard');
		}else if($this->session->userdata('status') == 'sukseslogin1'){
		redirect(base_url().'Dashboard_admin');
		}
	}
	public function index(){
		$this->load->view('login');
	}
	public function login(){
  	 	$username=$this->input->post('username_user');
		$password=$this->input->post('password_user');
		$this->form_validation->set_rules('username_user','Username','trim|required');
		$this->form_validation->set_rules('password_user','Password','trim|required');
		if($this->form_validation->run()!=false){
			$where=array('username_user'=>$username,'password_user'=>md5($password));
			$data=$this->Web_model->edit_data($where, 'login_user');
			$d=$this->Web_model->edit_data($where, 'login_user')->row();
			$cek=$data->num_rows();	
			
			if($cek>0){
						if($d->username_user=='administator'&&'Administator'){
						$session = array(
							'id_user'=>$d->id_user,
							'nama_user'=>$d->nama_user,
							'gender_user'=>$d->gender_user,
							'email_user'=>$d->email_user,
							'hp_user'=>$d->hp_user,
							'tgl_lahir_user'=>$d->tgl_lahir_user,
							'username_user'=>$d->username_user,
							'status'=>'sukseslogin'
							);
						$this->session->set_userdata($session);
						redirect(base_url().'Dashboard');
						}else{
						$session = array(
							'id_user'=>$d->id_user,
							'nama_user'=>$d->nama_user,
							'gender_user'=>$d->gender_user,
							'email_user'=>$d->email_user,
							'hp_user'=>$d->hp_user,
							'tgl_lahir_user'=>$d->tgl_lahir_user,
							'username_user'=>$d->username_user,
							'status'=>'sukseslogin1'
							);
						$this->session->set_userdata($session);
						redirect(base_url().'Dashboard_admin');						
				}}else{
				$this->session->set_flashdata('alertlogingagal','<center>Login gagal! Username atau password salah.</center>');
				redirect(base_url().'Login?Login-salah');
				}
		}else{
			$this->session->set_flashdata('alertlogindulu','<center>Silahkan Isikan Username dan Password.</center>');
			redirect(base_url().'Login?Login-salah');
		}
	}

	public function login_darurat(){
		$this->load->view('login_darurat');
	}
	public function login_darurat_act(){
  	 	$username_user=$this->input->post('username_user');
		$password_backup_user=$this->input->post('password_backup_user');
		$this->form_validation->set_rules('username_user','Username','trim|required');
		$this->form_validation->set_rules('password_backup_user','Password','trim|required');
		if($this->form_validation->run()!=false){
			$where=array('username_user'=>$username_user,'password_backup_user'=>$password_backup_user);
			$data=$this->Web_model->edit_data($where,'login_user');
			$d=$this->Web_model->edit_data($where,'login_user')->row();
			$cek=$data->num_rows();
				if($cek>0){
						if($d->username_user=='administator'&&'Administator'){
						$session = array(
							'id_user'=>$d->id_user,
							'nama_user'=>$d->nama_user,
							'gender_user'=>$d->gender_user,
							'email_user'=>$d->email_user,
							'hp_user'=>$d->hp_user,
							'tgl_lahir_user'=>$d->tgl_lahir_user,
							'username_user'=>$d->username_user,
							'status'=>'sukseslogin'
							);
						$this->session->set_userdata($session);
						redirect(base_url().'Dashboard');
						}else{
						$session = array(
							'id_user'=>$d->id_user,
							'nama_user'=>$d->nama_user,
							'gender_user'=>$d->gender_user,
							'email_user'=>$d->email_user,
							'hp_user'=>$d->hp_user,
							'tgl_lahir_user'=>$d->tgl_lahir_user,
							'username_user'=>$d->username_user,
							'status'=>'sukseslogin1'
							);
						$this->session->set_userdata($session);
						redirect(base_url().'Dashboard_admin');						
				}}else{
				$this->session->set_flashdata('alertlogingagal','<center>Login gagal! Username atau password salah.</center>');
				redirect(base_url().'Login/login_darurat?Login-salah');
				}
		}else{
			$this->session->set_flashdata('alertlogindulu','<center>Silahkan Isikan Username dan Password.</center>');
			redirect(base_url().'Login/login_darurat?Login-salah');
		}
	}

}
