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
    setlocale(LC_TIME, 'id_ID');

    if ($this->session->userdata('login_status') != 'logged') {
      $this->session->set_flashdata("error", 'Harap Login Untuk Mengakses Halaman Ini');
      redirect('Login');
    }

    $this->load->library('form_validation');

    $this->load->model('Informasi_text_model');
    $this->load->model('Surat_pengajuan_ujroh_model');
    $this->load->model('Jemaah_model');
    $this->load->model('Agen_model');
    $this->load->model('Ujroh_type_model');

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
    $data['jemaah'] = $this->Jemaah_model->get_all();
    $data['perwakilan'] = $this->Agen_model->get_all();
    $data['ujroh_type'] = $this->Ujroh_type_model->get_all();

    $this->form_validation->set_rules('perwakilan_id', "ID Perwakilan", "required");
    $this->form_validation->set_rules('jemaah_id', "ID Jemaah", "required");
    $this->form_validation->set_rules('ujroh_type_id', "Tipe Ujroh", "required");

    $this->form_validation->set_message('required', "%s tidak boleh kosong.");

    $user_input = array(
      'perwakilan_id' => $this->input->post('perwakilan_id'),
      'jemaah_id' => $this->input->post('jemaah_id'),
      'ujroh_type_id' => $this->input->post('ujroh_type_id'),
    );

    if ($this->form_validation->run() != false) {
      $this->db->insert('surat_pengajuan_ujroh', $user_input);

      $this->session->set_flashdata("success", "Data Surat Pengajuan Ujroh Berhasil Ditambahkan !");
      redirect('SuratPengajuanUjroh');
    } else {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar');
      $this->load->view('administrasi/surat_pengajuan_ujroh/new');
      $this->load->view('template/footer');
    }
  }

  public function edit($id)
  {
    $data['row_2'] = $this->Surat_pengajuan_ujroh_model->get_by_id($id);

    if ($data['row_2']) {
      $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
      $data['jemaah'] = $this->Jemaah_model->get_all();
      $data['perwakilan'] = $this->Agen_model->get_all();
      $data['ujroh_type'] = $this->Ujroh_type_model->get_all();

      $this->form_validation->set_rules('perwakilan_id', "ID Perwakilan", "required");
      $this->form_validation->set_rules('jemaah_id', "ID Jemaah", "required");
      $this->form_validation->set_rules('ujroh_type_id', "Tipe Ujroh", "required");

      $this->form_validation->set_message('required', "%s tidak boleh kosong.");

      $user_input = array(
        'perwakilan_id' => $this->input->post('perwakilan_id'),
        'jemaah_id' => $this->input->post('jemaah_id'),
        'ujroh_type_id' => $this->input->post('ujroh_type_id'),
      );

      if ($this->form_validation->run() != false) {
        $this->db->where('id', $id);
        $this->db->update('surat_pengajuan_ujroh', $user_input);

        $this->session->set_flashdata("success", "Data Surat Pengajuan Ujroh Berhasil Diubah !");
        redirect('SuratPengajuanUjroh');
      } else {
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view("administrasi/surat_pengajuan_ujroh/edit");
        $this->load->view('template/footer');
      }
    } else {
      $data['heading'] = "404 Page Not Found";
      $data['message'] = "The page you requested was not found.";
      $this->load->view('errors/html/error_404', $data);
    }
  }

  public function destroy($id)
  {
    $count = $this->db->select('*')->from('surat_pengajuan_ujroh')->where('id', $id)->count_all_results();

    if ($count > 0) {
      $this->db->where('id', $id);
      $this->db->delete('surat_pengajuan_ujroh');

      $this->session->set_flashdata("success", "Data Surat Pengajuan Ujroh Dihapus !");
      redirect('SuratPengajuanUjroh');
    } else {
      $data['heading'] = "404 Page Not Found";
      $data['message'] = "The page you requested was not found.";
      $this->load->view('errors/html/error_404', $data);
    }
  }

  public function download($id)
  {
    $data['row'] = $this->Surat_pengajuan_ujroh_model->get_by_id($id);

    if ($data['row']) {
      $this->load->library('pdfgenerator');
      $data['title'] = "Surat Pengajuan Ujroh";
      $file_pdf = $data['title'];
      $paper = 'A4';
      $orientation = "potrait";
      $html = $this->load->view('administrasi/surat_pengajuan_ujroh/download', $data, true);
      $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    } else {
      $data['heading'] = "404 Page Not Found";
      $data['message'] = "The page you requested was not found.";
      $this->load->view('errors/html/error_404', $data);
    }
  }

  public function get_jemaah_by_id()
  {
    $jemaah_id = $this->input->post('jemaah_id');

    $data = $this->Jemaah_model->get_by_id($jemaah_id);
    echo json_encode($data);
  }
}
