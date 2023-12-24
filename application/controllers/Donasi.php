<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
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
		$this->load->model('datatable_model');
		$this->load->model('crud_model');
		$this->load->model('custom_model');
		$this->load->helper('menu_active_helper');
	}

	public function index()
	{
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('donasi/index.html');
		$this->load->view('template/footer.php');
	}
	public function Listing()
	{
		if ($this->session->userdata('role') != 'Admin') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}

		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('donasi/listing.php');
		$this->load->view('template/footer.php');
	}
	public function detailListing($id_donasi)
	{
		if ($this->session->userdata('role') != 'Admin') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}

		$data['rows'] = $this->db->where('id_donasi', $id_donasi)->get("donasi")->row();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('donasi/detail_listing.php', $data);
		$this->load->view('template/footer.php');
	}

	public function Daftar()
	{
		if ($this->session->userdata('role') != 'Admin') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}

		$data['jemaah'] = $this->db->get("jemaah")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('donasi/daftar.php', $data);
		$this->load->view('template/footer.php');
	}

	public function daftarAction()
	{
		$tanggal = Date("Y-m-d");
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$no_rekening = $this->input->post('no_rekening');
		$atas_nama = $this->input->post('atas_nama');
		$nama_bank = $this->input->post('nama_bank');
		$jumlah_donasi = str_replace(",", "", $this->input->post('jumlah_donasi'));

		$last_no_reg = $this->db->limit(1)->order_by('id_pendaftaran', 'desc')->get("pendaftaran")->row();
		if ($last_no_reg != null) {
			$last_no_reg_jemaah = (int) substr($last_no_reg->no_registrasi, 4, 6) + 1;
			if ($last_no_reg_jemaah < 9) {
				$kode_no_reg_jemaah = "00000" . $last_no_reg_jemaah;
			} else if ($last_no_reg_jemaah < 99) {
				$kode_no_reg_jemaah = "0000" . $last_no_reg_jemaah;
			} else if ($last_no_reg_jemaah < 999) {
				$kode_no_reg_jemaah = "000" . $last_no_reg_jemaah;
			} else if ($last_no_reg_jemaah < 9999) {
				$kode_no_reg_jemaah = "00" . $last_no_reg_jemaah;
			} else if ($last_no_reg_jemaah < 99999) {
				$kode_no_reg_jemaah = "0" . $last_no_reg_jemaah;
			} else if ($last_no_reg_jemaah < 999999) {
				$kode_no_reg_jemaah = $last_no_reg_jemaah;
			}
		} else {
			$kode_no_reg_jemaah = "000001";
		}
		$no_reg_umrah_jemaah = "AL-" . $kode_no_reg_jemaah;



		$data_donasi = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'tanggal_donasi' => $tanggal,
			'nama' => $nama,
			'nik' => $nik,
			'no_telp' => $no_telp,
			'email' => $email,
			'jumlah_donasi' => $jumlah_donasi,
			'status' => 0,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
		);

		$data_tagihan_pembayaran = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'nominal_tagihan' => $jumlah_donasi,
			'jenis_tagihan' => '4',
			'tanggal' => Date("Y-m-d"),
			'status' => '0'
		);


		$data_pendaftaran = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'jenis_pendataran' => 4,
			'nik' => $nik,
			'tanggal' => Date("Y-m-d"),
			'status_pendaftaran' => '0'
		);

		$query_donasi = $this->crud_model->createData('donasi', $data_donasi);

		if ($query_donasi) {
			$add_tagihan_pembayaran = $this->crud_model->createData('tagihan_pembayaran', $data_tagihan_pembayaran);
			$add_pendaftaran = $this->crud_model->createData('pendaftaran', $data_pendaftaran);
			$this->session->set_flashdata("success", "Data Donasi Berhasil Ditambahkan !");
			redirect('Donasi/Daftar');
		} else {
			$this->session->set_flashdata("error", "Menambah Data Donasi Gagal !");
			redirect('Donasi/Daftar');
		}
	}

	public function getAllDonasi()
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
			0 => 'tanggal_donasi',
			1 => 'no_registrasi',
			2 => 'nama',
			3 => 'jumlah_donasi',
			4 => 'status',
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
		$tagihan_pembayaran = $this->db->get('donasi');
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {

			if ($rows->status == 0) {
				$status = "Belum di Bayar";
			} else {
				$status = "Sudah di Bayar";
			}

			$data[] = array(
				$rows->tanggal_donasi,
				$rows->no_registrasi,
				$rows->nama,
				number_format($rows->jumlah_donasi),
				$status,
				'<a href="' . base_url() . 'Donasi/detailListing/' . $rows->id_donasi . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_donasi = $this->totalDonasi();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_donasi,
			"recordsFiltered" => $total_donasi,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalDonasi()
	{

		$query = $this->custom_model->getAllDonasiTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}
}
