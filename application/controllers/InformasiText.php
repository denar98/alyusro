<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InformasiText extends CI_Controller
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
    if ($this->session->userdata('role') != 'Admin') {
      $this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
      redirect('Dashboard');
    }
    $this->load->model('datatable_model');
    $this->load->model('crud_model');
    $this->load->model('custom_model');
    $this->load->helper('menu_active_helper');
    $data['informasi_text'] = $this->db->get("informasi_text")->row();
  }

  public function index()
  {
    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('informasi_text/index.php', $data);
    $this->load->view('template/footer.php');
  }

  public function getAllInformasiText()
  {
    $draw = intval($this->input->post("draw"));
    $start = intval($this->input->post("start"));
    $length = intval($this->input->post("length"));
    $order = $this->input->post("order");
    $search = $this->input->post("search");
    $search = $search['value'];
    $col = 0;
    $dir = "";
    if (!empty($order)) {
      foreach ($order as $o) {
        $col = $o['column'];
        $dir = $o['dir'];
      }
    }

    if ($dir != "asc" && $dir != "desc") {
      $dir = "desc";
    }
    $valid_columns = array(
      0 => 'id_informasi_text',
      1 => 'isi_informasi_text',
    );
    if (!isset($valid_columns[$col])) {
      $order = null;
    } else {
      $order = $valid_columns[$col];
    }
    if ($order != null) {
      $this->db->order_by($order, $dir);
    }

    if (!empty($search)) {
      $x = 0;
      foreach ($valid_columns as $sterm) {
        if ($x == 0) {
          $this->db->like($sterm, $search);
        } else {
          $this->db->or_like($sterm, $search);
        }
        $x++;
      }
    }
    $this->db->limit($length, $start);
    $informasi_text = $this->crud_model->readData('*', 'informasi_text');
    $data = array();
    $i = 1;
    foreach ($informasi_text->result() as $rows) {

      $data[] = array(
        $rows->id_informasi_text,
        $rows->isi_informasi_text,
        '<a href="#" class="btn btn-warning mr-1" onclick="getInformasiText(' . $rows->id_informasi_text . ')" data-bs-toggle="modal" data-bs-target="#updateInformasiText" title="Edit">Edit</a>
                 '
      );

      $i++;
    }
    $total_informasi_text = $this->totalInformasiText();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $total_informasi_text,
      "recordsFiltered" => $total_informasi_text,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalInformasiText()
  {
    $query = $this->db->select('COUNT(*) as num')
      ->from('informasi_text')
      ->get();
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function addAction()
  {
    $isi_informasi_text = $this->input->post('isi_informasi_text');

    $data = array(
      'isi_informasi_text' => $isi_informasi_text,
    );
    $add = $this->crud_model->createData('informasi_text', $data);
    if ($add) {
      $this->session->set_flashdata("success", "Data Informasi Text Berhasil Ditambahkan !");
      redirect('InformasiText');
    } else {
      $this->session->set_flashdata("error", "Menambah Data Informasi Text Gagal !");
    }
  }

  public function updateAction()
  {
    $id_informasi_text = $this->input->post('id_informasi_text');
    $isi_informasi_text = $this->input->post('isi_informasi_text');

    $data = array(
      'isi_informasi_text' => $isi_informasi_text,
    );
    $where = "id_informasi_text=" . $id_informasi_text;
    $update = $this->crud_model->updateData('informasi_text', $data, $where);
    if ($update) {
      $this->session->set_flashdata("success", "Data Informasi Text Berhasil Diubah !");
      redirect('InformasiText');
    } else {
      $this->session->set_flashdata("error", "Mengubah Data  Informasi Text Gagal !");
    }
  }

  public function deleteAction($id_informasi_text)
  {
    $where = "id_informasi_text=" . $id_informasi_text;
    $delete = $this->crud_model->deleteData('informasi_text', $where);
    if ($delete) {
      $this->session->set_flashdata("success", "Data Informasi Text Berhasil Dihapus !");
      redirect('InformasiText');
    } else {
      $this->session->set_flashdata("error", "Menghapus Informasi Text Gagal !");
    }
  }

  public function getInformasiText()
  {
    $id_informasi_text = $this->input->post('id_informasi_text');
    $where = "id_informasi_text=" . $id_informasi_text;
    $informasi_text = $this->crud_model->readData('*', 'informasi_text', $where)->row();
    echo json_encode($informasi_text);
  }
}
