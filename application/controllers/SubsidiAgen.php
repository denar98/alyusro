<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubsidiAgen extends CI_Controller
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
  }

  public function index()
  {
    $data['subsidi_agen'] = $this->db->get("subsidi_agen")->row();

    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.html',$data);
    $this->load->view('subsidi_agen/index.html',$data);
    $this->load->view('template/footer.html');
  }
 
  public function getAllSubsidiAgen()
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
      0 => 'id_subsidi_agen',
      1 => 'nominal_subsidi_agen',
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
    $jadwal_keberangkatan = $this->crud_model->readData('*', 'subsidi_agen');
    $data = array();
    $i = 1;
    foreach ($jadwal_keberangkatan->result() as $rows) {

      $data[] = array(
        $rows->id_subsidi_agen,
        number_format($rows->nominal_subsidi_agen),
        '<a href="#" class="btn btn-warning mr-1" onclick="getSubsidiAgen(' . $rows->id_subsidi_agen . ')" data-bs-toggle="modal" data-bs-target="#updateSubsidiAgen" title="Edit">Edit</a>
                 '
      );

      $i++;
    }
    $total_subsidi_agen = $this->totalSubsidiAgen();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $total_subsidi_agen,
      "recordsFiltered" => $total_subsidi_agen,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalSubsidiAgen()
  {
    $query = $this->db->select('COUNT(*) as num')
      ->from('subsidi_agen')
      ->get();
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function addAction()
  {
    $nominal_subsidi_agen = str_replace(",", "", $this->input->post('nominal_subsidi_agen'));
   
    $data = array(
      'nominal_subsidi_agen' => $nominal_subsidi_agen,
    );
    $add = $this->crud_model->createData('subsidi_agen', $data);
    if ($add) {
      $this->session->set_flashdata("success", "Data Nominal Subsidi Agen Berhasil Ditambahkan !");
      redirect('SubsidiAgen');
    } else {
      $this->session->set_flashdata("error", "Menambah Data Nominal Subsidi Agen  Gagal !");
    }

  }

  public function updateAction()
  {
    $id_subsidi_agen = $this->input->post('id_subsidi_agen');
    $nominal_subsidi_agen = str_replace(",", "", $this->input->post('nominal_subsidi_agen'));

    $data = array(
      'nominal_subsidi_agen' => $nominal_subsidi_agen,
    );
    $where = "id_subsidi_agen=" . $id_subsidi_agen;
    $update = $this->crud_model->updateData('subsidi_agen', $data, $where);
    if ($update) {
      $this->session->set_flashdata("success", "Data Nominal Subsidi Agen Berhasil Diubah !");
      redirect('SubsidiAgen');
    } else {
      $this->session->set_flashdata("error", "Mengubah Data  Nominal Subsidi Agen Gagal !");
    }
  }

  public function deleteAction($id_paket_keberangkatan)
  {
    $where = "id_paket_keberangkatan=" . $id_paket_keberangkatan;
    $delete = $this->crud_model->deleteData('paket_keberangkatan', $where);
    if ($delete) {
      $this->session->set_flashdata("success", "Data Jadwal Keberangkatan Berhasil Dihapus !");
      redirect('JadwalKeberangkatan');
    } else {
      $this->session->set_flashdata("error", "Menghapus Jadwal Keberangkatan Gagal !");
    }
  }

  public function getSubsidiAgen()
  {
    $id_subsidi_agen = $this->input->post('id_subsidi_agen');
    $where = "id_subsidi_agen=" . $id_subsidi_agen;
    $subsidi_agen = $this->crud_model->readData('*', 'subsidi_agen', $where)->row();
    echo json_encode($subsidi_agen);

  }
}