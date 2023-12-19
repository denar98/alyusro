<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	//  public function __construct()
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
	// }
	//
	public function index()
	{
		$this->load->view('login/login.html');
		if ($this->session->userdata('login_status') == 'logged') {
			redirect('Dashboard');
		  }	}

	public function loginAction()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('login_model');

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$user = $this->login_model->loginCheck($email, $password);

		if (!empty($user)) {

			if($user->role == "Agen"){
				$data_agen = $this->db->select('*,agen.user_id_agen as user_id_agen_2')
				->from('users')
				->join('jemaah','users.id_jemaah = jemaah.id_jemaah')
				->join('agen','agen.user_id_jemaah = jemaah.user_id_jemaah')
				->where('users.email',$email)
				->where('users.password',$password)
				->get()
				->row();
	
			}
			//looping data user
			$session_data = array(
				'id_jemaah' => $user->id_jemaah,
				'id_user' => $user->id_user,
				'nama_user' => $user->nama_user,
				'email' => $user->email,
				'role' => $user->role,
				'user_id_agen' => $data_agen->user_id_agen_2,
				'login_status' => 'logged',
			);
			//buat session berdasarkan user yang login
			$this->session->set_userdata($session_data);
			redirect('Dashboard');

		} else {

			$this->session->set_flashdata("error", "Username atau Password Salah !");
			redirect('Login');

		}
	}

	public function logoutAction()
	{
		// hancurkan semua sesi
		$this->session->sess_destroy();
		redirect(site_url('Login/'));
	}
}