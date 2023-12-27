<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UjrohType extends CI_Controller
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
    $this->load->model('Ujroh_type_model');

    $this->load->helper('menu_active_helper');
  }

  public function index()
  {
    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();
    $data['ujroh_type'] = $this->Ujroh_type_model->get_all();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('administrasi/ujroh_type/index', $data);
    $this->load->view('template/footer');
  }

  public function new()
  {
    $data['informasi_text'] = $this->Informasi_text_model->get_information_text();

    $this->form_validation->set_rules('name', "Nama Ujroh", "required");
    $this->form_validation->set_rules('price', "Nominal Ujroh", "required|numeric");

    $this->form_validation->set_message('required', "%s tidak boleh kosong.");
    $this->form_validation->set_message('numeric', "%s harus diisi berupa angka.");

    $user_input = array(
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'price' => $this->input->post('price'),
    );

    if ($this->form_validation->run() != false) {
      $this->db->insert('ujroh_type', $user_input);

      $this->session->set_flashdata("success", "Data Tipe Ujroh Berhasil Ditambahkan !");
      redirect('UjrohType');
    } else {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar');
      $this->load->view('administrasi/ujroh_type/new');
      $this->load->view('template/footer');
    }
  }

  public function edit($id)
  {
    $data['row'] = $this->Ujroh_type_model->get_by_id($id);

    if ($data['row']) {
      $data['informasi_text'] = $this->Informasi_text_model->get_information_text();

      $this->form_validation->set_rules('name', "Nama Ujroh", "required");
      $this->form_validation->set_rules('price', "Nominal Ujroh", "required|numeric");

      $this->form_validation->set_message('required', "%s tidak boleh kosong.");
      $this->form_validation->set_message('numeric', "%s harus diisi berupa angka.");

      $user_input = array(
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'price' => $this->input->post('price'),
      );

      if ($this->form_validation->run() != false) {
        $this->db->where('id', $id);
        $this->db->update('ujroh_type', $user_input);

        $this->session->set_flashdata("success", "Data Tipe Ujroh Berhasil Diubah !");
        redirect('UjrohType');
      } else {
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view("administrasi/ujroh_type/edit");
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
    $count = $this->db->select('*')->from('ujroh_type')->where('id', $id)->count_all_results();

    if ($count > 0) {
      $this->db->where('id', $id);
      $this->db->delete('ujroh_type');

      $this->session->set_flashdata("success", "Data Tipe Ujroh Berhasil Dihapus !");
      redirect('UjrohType');
    } else {
      $data['heading'] = "404 Page Not Found";
      $data['message'] = "The page you requested was not found.";
      $this->load->view('errors/html/error_404', $data);
    }
  }
}
