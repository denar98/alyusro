<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratPengajuanUjroh extends CI_Controller
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

  public function __construct()
  {
    parent::__construct();

    date_default_timezone_set('Asia/Jakarta');

    if ($this->session->userdata('login_status') != 'logged') {
      $this->session->set_flashdata("error", 'Harap Login Untuk Mengakses Halaman Ini');
      redirect('Login');
    }

    // $this->load->library('form_validation');

    $this->load->model('Informasi_text_model');
    $this->load->model('Surat_pengajuan_ujroh_model');
    // $this->load->model('Jemaah_model');
    // $this->load->model('Kode_kota_model');
    // $this->load->model('crud_model');

    $this->load->helper('menu_active_helper');
  }

  public function index()
  {
    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
    $data['surat_pengajuan_ujroh'] = $this->Surat_pengajuan_ujroh_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('administrasi/surat_pengajuan_ujroh/index', $data);
    $this->load->view('template/footer');
  }

  public function new()
  {
    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('administrasi/surat_pengajuan_ujroh/new');
    $this->load->view('template/footer');
  }
}
