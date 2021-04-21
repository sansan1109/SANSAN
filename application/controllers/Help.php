<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
	function __construct(){ 
		parent:: __construct();
	$this->load->model('Web_model');
	}
	public function register(){
		$this->load->view('register');
	}
	public function register_act(){
		$this->form_validation->set_rules('password_user', 'password_user', 'required|min_length[8]');
		$id_user		= $this->input->post('id_user');
		$nama_user		= $this->input->post('nama_user');
		$gender_user	= $this->input->post('gender_user');			
		$email_user		= $this->input->post('email_user');	
		$hp_user		= $this->input->post('hp_user');	
		$tgl_lahir_user	= $this->input->post('tgl_lahir_user');			
		$username_user	= $this->input->post('username_user');
		$password_user	= $this->input->post('password_user');
		$username_cek	= $this->Web_model->username($username_user);
		if($this->form_validation->run()== false){
			$this->session->set_flashdata('alertpassword8','Password Minimal 8 character.');
			redirect('help/register');

		}else if($username_cek > 0){
		$this->session->set_flashdata('alertusersudahada','Username sudah dipakai.');
		redirect('help/register');

        }else{
			$no_user = rand(1,9999);
        	$kode_unik = '2019';
        	$id_user = $kode_unik.sprintf("%03s",$no_user);
        	$data = array(
    		'id_user' => $this->Web_model->kode_otomatis_user(),
			'nama_user'=> $nama_user,
			'gender_user'=> $gender_user,
			'email_user'=> $email_user,
			'hp_user'=> $hp_user,
			'tgl_lahir_user'=> date("Y-m-d",strtotime($tgl_lahir_user)),
			'username_user'=> $username_user,
			'password_user'=> md5($password_user),
			'password_backup_user' =>'0'
			);
		$this->Web_model->insert_data($data,'login_user');
		$this->session->set_flashdata('alertregister','<center> Register success.</center>');
		redirect(base_url().'Login');
        }
	}
	public function forgetpassword(){
		$this->load->view('forgetpassword');

	}
	public function forgetpassword_act(){
		$this->form_validation->set_rules('username_user', 'Username', 'required');
		$this->form_validation->set_rules('email_user', 'Email', 'required');
		$username_user 	= $this->input->post('username_user');
		$email_user      = $this->input->post('email_user');
		$where_forget=array('username_user'=>$username_user,'email_user'=>$email_user);
		$data_forget=$this->Web_model->edit_data($where_forget,'login_user');
		$cek=$data_forget->num_rows();
		if($cek>0){
		$this->input->post('username_user');
		$this->input->post('email_user');
		
		$password_backup_user = random_string('alnum', 40);
		$this->session->set_flashdata('alertforget', 'Silahkan masukkan password baru anda dibawah ini.<br>'. $password_backup_user);
		
		$where =array('username_user'=>$username_user);
		$data = array(
		'password_backup_user' => $password_backup_user
	);

		$this->Web_model->update_data($where,$data,'login_user');
		redirect(base_url().'Login/login_darurat');

		}else{
			$this->session->set_flashdata('alertgagalforget','Username atau email tidak terdaftar.');
			redirect(base_url().'help/forgetpassword');
		}
	}
}