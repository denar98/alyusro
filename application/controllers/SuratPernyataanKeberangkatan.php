<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratPernyataanKeberangkatan extends CI_Controller
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

    $this->load->library('form_validation');

    $this->load->model('Informasi_text_model');
    $this->load->model('Surat_pernyataan_keberangkatan_model');
    $this->load->model('Jemaah_model');
    $this->load->model('Kode_kota_model');
    $this->load->model('crud_model');

    $this->load->helper('menu_active_helper');
  }

  public function index()
  {
    // Load library
    $this->load->library('pagination');

    // Get keyword input
    if ($this->input->post()) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    // config
    $this->db->select('*');
    $this->db->from('surat_pernyataan_keberangkatan');
    $this->db->join('jemaah', 'jemaah.id_jemaah = surat_pernyataan_keberangkatan.jemaah_id');
    $this->db->like('user_id_jemaah', $data['keyword']);
    $this->db->or_like('nama', $data['keyword']);

    $config["total_rows"] = $this->db->count_all_results();
    $config["base_url"] = base_url() . 'SuratPernyataanKeberangkatan/index';
    $config["per_page"] = 10;
    $data["start"] = $this->uri->segment(3);

    // Initialize
    $this->pagination->initialize($config);

    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
    $data['surat_pernyataan_keberangkatan'] = $this->Surat_pernyataan_keberangkatan_model->get_by_keyword($config["per_page"], $data["start"], $data['keyword']);

    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('administrasi/surat_pernyataan_keberangkatan/index.php', $data);
    $this->load->view('template/footer.php');
  }

  public function new()
  {
    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
    $data['jemaah'] = $this->Jemaah_model->get_all();
    $data['kode_kota'] = $this->Kode_kota_model->get_all();

    $this->form_validation->set_rules('jemaah_id', "ID Jemaah", "required");
    $this->form_validation->set_message('required', "%s tidak boleh kosong.");

    $user_input = array(
      'jemaah_id' => $this->input->post('jemaah_id'),
    );

    if ($this->form_validation->run() != false) {
      $this->db->insert('surat_pernyataan_keberangkatan', $user_input);

      $this->session->set_flashdata("success", "Data Surat Pernyataan Berhasil Ditambahkan !");
      redirect('SuratPernyataanKeberangkatan');
    } else {
      $this->load->view('template/header.php', $data);
      $this->load->view('template/sidebar.php');
      $this->load->view('administrasi/surat_pernyataan_keberangkatan/new.php');
      $this->load->view('template/footer.php');
    }
  }

  public function edit($id)
  {
    $data['row_2'] = $this->Surat_pernyataan_keberangkatan_model->get_by_id($id);

    if ($data['row_2']) {
      $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
      $data['jemaah'] = $this->Jemaah_model->get_all();
      $data['kode_kota'] = $this->Kode_kota_model->get_all();

      $this->form_validation->set_rules('jemaah_id', "ID Jemaah", "required");
      $this->form_validation->set_message('required', "%s tidak boleh kosong.");

      $user_input = array(
        'jemaah_id' => $this->input->post('jemaah_id'),
      );

      if ($this->form_validation->run() != false) {
        $this->db->where('id', $id);
        $this->db->update('surat_pernyataan_keberangkatan', $user_input);

        $this->session->set_flashdata("success", "Data Surat Pernyataan Berhasil Diubah !");
        redirect('SuratPernyataanKeberangkatan');
      } else {
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php');
        $this->load->view("administrasi/surat_pernyataan_keberangkatan/edit");
        $this->load->view('template/footer.php');
      }
    } else {
      $data['heading'] = "Data Not Found.";
      $data['message'] = "Data surat pernyataan keberangkatan tidak ditemukan.";
      $this->load->view('errors/html/error_404', $data);
    }
  }

  public function destroy($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('surat_pernyataan_keberangkatan');

    $this->session->set_flashdata("success", "Data Surat Pernyataan Berhasil Dihapus !");
    redirect('SuratPernyataanKeberangkatan');
  }

  public function download($id)
  {
    $data['row'] = $this->Surat_pernyataan_keberangkatan_model->get_by_id($id);

    if ($data['row']) {
      $this->load->library('pdfgenerator');
      $data['title'] = "Surat Pernyataan Keberangkatan";
      $file_pdf = $data['title'];
      $paper = 'A4';
      $orientation = "potrait";
      $html = $this->load->view('administrasi/surat_pernyataan_keberangkatan/download', $data, true);
      $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    } else {
      echo "Data Not Found.";
    }
  }

  public function get_jemaah_by_id()
  {
    $jemaah_id = $this->input->post('jemaah_id');

    $data = $this->Jemaah_model->get_by_id($jemaah_id);
    echo json_encode($data);
  }
}
