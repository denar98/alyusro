<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalKeberangkatan extends CI_Controller
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
    if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
      $this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
      redirect('Dashboard');
    }
    $this->load->model('datatable_model');
    $this->load->model('crud_model');
    $this->load->model('custom_model');
  }

  public function index()
  {
    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.html',$data);
    $this->load->view('jadwal_keberangkatan/index.html');
    $this->load->view('template/footer.html');
  }

  public function getAllJadwalKeberangkatan()
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
      0 => 'tanggal_keberangkatan',
      1 => 'nama_paket',
      2 => 'harga_paket',
      3 => 'nominal_ujroh',
      4 => 'jumlah_kuota',
      5 => 'sisa_kuota',
    );
    if (!isset($valid_columns[$col])) {
      $order = null;
    } else {
      $order = $valid_columns[$col];
    }
    if ($order != null) {
      $this->db->order_by($order, $dir);
    }

    $x=0;
		foreach ($valid_columns as $sterm) // loop kolom 
    {
        if (!empty($search)) // jika datatable mengirim POST untuk search
        {
            if ($x === 0) // looping pertama
            {
                $this->db->group_start();
                $this->db->like($sterm, $search);
            } else {
                $this->db->or_like($sterm, $search);
            }
            if (count($valid_columns) - 1 == $x) //looping terakhir
                $this->db->group_end();
        }
        $x++;
    }

    $this->db->limit($length, $start);
    $jadwal_keberangkatan = $this->crud_model->readData('*', 'paket_keberangkatan');
    $data = array();
    $i = 1;
    foreach ($jadwal_keberangkatan->result() as $rows) {

      $data[] = array(
        $rows->tanggal_keberangkatan,
        $rows->nama_paket,
        number_format($rows->harga_paket),
        number_format($rows->nominal_ujroh),
        $rows->jumlah_kuota,
        $rows->sisa_kuota,
        '<a href="#" class="btn btn-warning mr-1" onclick="getJadwalKeberangkatan(' . $rows->id_paket_keberangkatan . ')" data-bs-toggle="modal" data-bs-target="#updateJadwalKeberangkatan" title="Edit">Edit</a>
                 <a href="' . base_url() . 'JadwalKeberangkatan/deleteAction/' . $rows->id_paket_keberangkatan . '" class="btn btn-danger mr-1" title="Hapus">Hapus</a>'
      );

      $i++;
    }
    $total_jadwal_keberangkatan = $this->totalJadwalKeberangkatan();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $total_jadwal_keberangkatan,
      "recordsFiltered" => $total_jadwal_keberangkatan,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalJadwalKeberangkatan()
  {
    $query = $this->db->select('COUNT(*) as num')
      ->from('paket_keberangkatan')
      ->get();
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function addAction()
  {
    $tanggal_keberangkatan = $this->input->post('tanggal_keberangkatan');
    $nama_paket = $this->input->post('nama_paket');
    $harga_paket = str_replace(",", "", $this->input->post('harga_paket'));
    $nominal_ujroh = str_replace(",", "", $this->input->post('nominal_ujroh'));
    $kuota_paket = $this->input->post('kuota_paket');

    $data = array(
      'tanggal_keberangkatan' => $tanggal_keberangkatan,
      'nama_paket' => $nama_paket,
      'harga_paket' => $harga_paket,
      'nominal_ujroh' => $nominal_ujroh,
      'jumlah_kuota' => $kuota_paket,
      'sisa_kuota' => $kuota_paket,
    );
    $add = $this->crud_model->createData('paket_keberangkatan', $data);
    if ($add) {
      $this->session->set_flashdata("success", "Data Jadwal Keberangkatan Berhasil Ditambahkan !");
      redirect('JadwalKeberangkatan');
    } else {
      $this->session->set_flashdata("error", "Menambah Data Jadwal Keberangkatan Gagal !");
    }

  }

  public function updateAction()
  {
    $id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
    $tanggal_keberangkatan = $this->input->post('tanggal_keberangkatan');
    $nama_paket = $this->input->post('nama_paket');
    $harga_paket = str_replace(",", "", $this->input->post('harga_paket'));
    $nominal_ujroh = str_replace(",", "", $this->input->post('nominal_ujroh'));
    $kuota_paket = $this->input->post('kuota_paket');

    $data = array(
      'tanggal_keberangkatan' => $tanggal_keberangkatan,
      'nama_paket' => $nama_paket,
      'harga_paket' => $harga_paket,
      'nominal_ujroh' => $nominal_ujroh,
      'jumlah_kuota' => $kuota_paket,
      'sisa_kuota' => $kuota_paket,
    );
    $where = "id_paket_keberangkatan=" . $id_paket_keberangkatan;
    $update = $this->crud_model->updateData('paket_keberangkatan', $data, $where);
    if ($update) {
      $this->session->set_flashdata("success", "Data Jadwal Keberangkatan Berhasil Diubah !");
      redirect('JadwalKeberangkatan');
    } else {
      $this->session->set_flashdata("error", "Mengubah Data Jadwal Keberangkatan Gagal !");
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

  public function getJadwalKeberangkatan()
  {
    $id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
    $where = "id_paket_keberangkatan=" . $id_paket_keberangkatan;
    $jadwal_keberangkatan = $this->crud_model->readData('*', 'paket_keberangkatan', $where)->row();
    echo json_encode($jadwal_keberangkatan);

  }
}