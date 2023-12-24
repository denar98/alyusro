<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
  }

  public function index()
  {
    $data['jemaah'] = $this->db->get("jemaah")->result();
    $data['informasi_text'] = $this->db->get("informasi_text")->row();
    $this->load->view('template/header.php', $data);
    $this->load->view('template/sidebar.php');
    $this->load->view('user/index.php', $data);
    $this->load->view('template/footer.php');
  }

  public function getAllUser()
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
      0 => 'nama_user',
      1 => 'nama_user',
      2 => 'email',
      3 => 'role',
      4 => 'terakhir_login',
    );
    if (!isset($valid_columns[$col])) {
      $order = null;
    } else {
      $order = $valid_columns[$col];
    }
    if ($order != null) {
      $this->db->order_by($order, $dir);
    }

    $x = 0;
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

    $users = $this->custom_model->getDataUsers();
    $data = array();
    $i = 1;
    foreach ($users->result() as $rows) {

      $data[] = array(
        $i,
        $rows->nama_user,
        $rows->email,
        $rows->role,
        $rows->terakhir_login,
        '<a href="#" class="btn btn-warning mr-1" onclick="getUser(' . $rows->id_user . ')" data-bs-toggle="modal" data-bs-target="#updateUser" title="Edit">Edit</a>
                 <a href="' . base_url() . 'User/deleteAction/' . $rows->id_user . '" class="btn btn-danger mr-1" title="Hapus">Hapus</a>'
      );

      $i++;
    }
    $total_users = $this->totalUsers();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $total_users,
      "recordsFiltered" => $total_users,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalUsers()
  {
    $query = $this->db->select('COUNT(*) as num')
      ->from('users')
      ->get();
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function addAction()
  {
    $nama_user = $this->input->post('nama_user');
    $id_jemaah = $this->input->post('id_jemaah');
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $role = $this->input->post('role');

    $data = array(
      'id_jemaah' => $id_jemaah,
      'nama_user' => $nama_user,
      'email' => $email,
      'password' => $password,
      'role' => $role,
    );
    $add = $this->crud_model->createData('users', $data);
    if ($add) {
      $this->session->set_flashdata("success", "Data User Berhasil Ditambahkan !");
      redirect('User');
    } else {
      $this->session->set_flashdata("error", "Menambah Data User Gagal !");
    }
  }

  public function updateAction()
  {
    $id_user = $this->input->post('id_user');
    $nama_user = $this->input->post('nama_user');
    $id_jemaah = $this->input->post('id_jemaah');
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $role = $this->input->post('role');

    $data = array(
      'id_jemaah' => $id_jemaah,
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

  public function getUser()
  {
    $id_user = $this->input->post('id_user');
    $where = "id_user=" . $id_user;
    $user = $this->crud_model->readData('*', 'users', $where)->row();
    echo json_encode($user);
  }
}
