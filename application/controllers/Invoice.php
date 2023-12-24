<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
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
    if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Keuangan') {
      $this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
      redirect('Dashboard');
    }

    $this->load->model('datatable_model');
    $this->load->model('crud_model');
    $this->load->model('custom_model');
    $this->load->helper('menu_active_helper');
  }

  public function index()
  {
    if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Keuangan') {
      $this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
      redirect('Dashboard');
    }

    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('invoice/index.php');
    $this->load->view('template/footer.php');
  }
  public function tambahInvoice()
  {

    $data['pendaftaran'] = $this->db->get("pendaftaran")->result();
    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('invoice/tambah_invoice.php', $data);
    $this->load->view('template/footer.php');
  }
  public function detailInvoice($id_tagihan_pembayaran)
  {

    $data['rows'] = $this->custom_model->getDetailInvoice($id_tagihan_pembayaran)->row();

    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('invoice/detail_invoice.php', $data);
    $this->load->view('template/footer.php');
  }

  public function getAllInvoice()
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
      0 => 'tanggal_daftar',
      1 => 'jenis_tagihan',
      2 => 'agen.user_id_agen',
      3 => 'pendaftaran.no_registrasi',
      4 => 'jemaah.nama',
      5 => 'nominal_tagihan',
      6 => 'umrah_jemaah.no_rekening',
      7 => 'umrah_jemaah.atas_nama',
      8 => 'jemaah.user_id_jemaah'
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
    $users = $this->custom_model->getAllInvoice();
    $data = array();
    $i = 1;


    foreach ($users->result() as $rows) {
      $nomor_id = $rows->user_id_jemaah;
      $atas_nama = $rows->atas_nama;
      $no_rekening = $rows->no_rekening;
      $nama = $rows->nama;
      if ($rows->jenis_tagihan == 1) {
        $tujuan = "Umrah Terjadwal";
      } else if ($rows->jenis_tagihan == 2) {
        $tujuan = "Tabungan";
      } else if ($rows->jenis_tagihan == 3) {
        $tujuan = "Daftar Agen";
        $nomor_id = $rows->user_id_agen;
        $atas_nama = $rows->atas_nama_agen;
        $no_rekening = $rows->no_rekening_agen;
      } else if ($rows->jenis_tagihan == 4) {
        $tujuan = "Donasi	";
        // $nama = $rows->nama_donasi;
        $atas_nama = $rows->atas_nama_donasi;
        $no_rekening = $rows->no_rekening_donasi;
      }

      $data[] = array(
        $rows->tanggal,
        $tujuan,
        $nomor_id,
        $rows->no_registrasi,
        $nama,
        number_format($rows->nominal_tagihan),
        $no_rekening,
        $atas_nama,
        '<a href="' . base_url() . 'Invoice/detailInvoice/' . $rows->id_tagihan_pembayaran . '" class="btn btn-info mr-1" title="Detail">Detail</a>'
      );

      $i++;
    }

    $total_invoice = $this->totalInvoice();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $total_invoice,
      "recordsFiltered" => $total_invoice,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalInvoice()
  {
    $query = $this->db->select('COUNT(*) as num')
      ->from('tagihan_pembayaran')
      ->join("pendaftaran", "pendaftaran.no_registrasi = tagihan_pembayaran.no_reg_umrah_jemaah")
      ->join("jemaah", "pendaftaran.nik = jemaah.nik")
      ->join("umrah_jemaah", "umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("agen", "agen.nik_agen = jemaah.nik", "left")
      ->join("donasi", "donasi.nik = jemaah.nik", "left")
      ->order_by('tagihan_pembayaran.tanggal', 'desc')
      ->where("tagihan_pembayaran.status", 0)
      // ->limit(1)
      ->get();


    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function tambahInvoiceAction()
  {
    $no_registrasi = $this->input->post('no_registrasi');
    $tanggal = Date("Y-m-d");
    $nominal_tagihan = str_replace(",", "", $this->input->post('jumlah_pembayaran'));
    $jenis_tagihan = $this->input->post('jenis_tagihan');
    $status = 0;

    $data = array(
      'tanggal' => $tanggal,
      'no_reg_umrah_jemaah' => $no_registrasi,
      'nominal_tagihan' => $nominal_tagihan,
      'jenis_tagihan' => $jenis_tagihan,
      'status' => $status,
    );

    // $data_tabungan_umrah = array(
    // 	'no_reg_umrah_jemaah' => $no_registrasi,
    // 	'tanggal_menabung' => $tanggal,
    // 	'jumlah_menabung' => $nominal_tagihan,
    // 	'status_pembayaran' => '0',
    //   'goal_terakhir' => '-'
    // );

    $add = $this->crud_model->createData('tagihan_pembayaran', $data);
    if ($add) {
      // if($jenis_tagihan==2){
      //   $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah', $data_tabungan_umrah);
      // }
      $this->session->set_flashdata("success", "Data Invoice Berhasil Ditambahkan !");
      redirect('Invoice');
    } else {
      $this->session->set_flashdata("error", "Menambah Data Invoice Gagal !");
    }
  }

  public function updateAction()
  {
    $id_user = $this->input->post('id_user');
    $nama_user = $this->input->post('nama_user');
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $role = $this->input->post('role');

    $data = array(
      'nama_user' => $nama_user,
      'email' => $email,
      'password' => $password,
      'role' => $role,
    );

    $where = "id_user=" . $id_user;
    $update = $this->crud_model->updateData('users', $data, $where);
    if ($update) {
      $this->session->set_flashdata("success", "Data User Berhasil Diubah !");
      redirect('User');
    } else {
      $this->session->set_flashdata("error", "Mengubah Data User Gagal !");
    }
  }

  public function deleteAction($id_user)
  {
    $where = "id_user=" . $id_user;
    $delete = $this->crud_model->deleteData('users', $where);
    if ($delete) {
      $this->session->set_flashdata("success", "Data User Berhasil Dihapus !");
      redirect('User');
    } else {
      $this->session->set_flashdata("error", "Menghapus User Gagal !");
    }
  }

  public function getDataInvoice()
  {
    $no_registrasi = $this->input->post('no_registrasi');
    $rows = $this->custom_model->getDataInvoice($no_registrasi)->row();
    echo json_encode($rows);
  }
}
