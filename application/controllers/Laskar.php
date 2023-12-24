<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laskar extends CI_Controller
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
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('datatable_model');
		$this->load->model('crud_model');
		$this->load->model('custom_model');
		$this->load->helper('menu_active');
	}

	public function index()
	{
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('umrah_terjadwal/index.html');
		$this->load->view('template/footer.php');
	}
	public function Listing()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('laskar/listing.php');
		$this->load->view('template/footer.php');
	}
	public function detailLaskar($id_laskar)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$laskar_rows = $this->custom_model->getDetailLaskar($id_laskar)->row();
		$data['rows'] = $this->custom_model->getDetailLaskar($id_laskar)->row();

		$where_belum_bayar_ujroh = "user_id_jemaah='" . $laskar_rows->user_id_laskar . "' AND jenis_ujroh = 'Ujroh' AND status='0' ";
		$data['ujroh_belum_bayar'] = $this->db->select('SUM(nominal_ujroh) as nominal')->where($where_belum_bayar_ujroh)->get('ujroh')->row();

		$where_sudah_bayar_ujroh = "user_id_jemaah='" . $laskar_rows->user_id_laskar . "' AND jenis_ujroh = 'Ujroh' AND status='1' ";
		$data['ujroh_sudah_bayar'] = $this->db->select('SUM(nominal_ujroh) as nominal')->where($where_sudah_bayar_ujroh)->get('ujroh')->row();


		$data['rows_ujroh'] = $this->custom_model->getHistoryUjrohLaskar($laskar_rows->user_id_laskar)->result();

		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('laskar/detail_listing.php', $data);
		$this->load->view('template/footer.php');
	}

	public function Daftar()
	{
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['jemaah'] = $this->db->where('user_id_jemaah != "-"')->get("jemaah")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('laskar/daftar.html', $data);
		$this->load->view('template/footer.php');
	}
	public function TambahLaskar()
	{
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['jemaah'] = $this->db->where('user_id_jemaah != "-"')->get("jemaah")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('laskar/tambah_laskar.php', $data);
		$this->load->view('template/footer.php');
	}

	public function daftarAction()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$kode_kota = $this->input->post('kota');
		$kota = $this->input->post('nama_kota');
		$alamat = $this->input->post('alamat');
		$riwayat_penyakit = $this->input->post('riwayat_penyakit');
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$atas_nama = $this->input->post('atas_nama');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$status_pernikahan = $this->input->post('status_pernikahan');
		$user_id_jemaah = $this->input->post('user_id_jemaah');
		// $no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
		$paket_laskar = $this->input->post('paket_laskar');
		$daftar_via = $this->input->post('daftar_via');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('harga_paket_laskar'));

		$last_id = $this->db->limit(1)->order_by('id_laskar', 'desc')->get("laskar")->row();
		if ($last_id != null) {
			$last_id_laskar = (int) substr($last_id->user_id_laskar, 4, 3) + 1;

			if ($last_id_laskar < 9) {
				$kode_id_laskar = "00" . $last_id_laskar;
			} else if ($last_id_laskar < 99) {
				$kode_id_laskar = "0" . $last_id_laskar;
			} else if ($last_id_laskar < 999) {
				$kode_id_laskar = "" . $last_id_laskar;
			}
		} else {
			$kode_id_laskar = "001";
		}
		$kode_id_jemaah = substr($user_id_jemaah, 8, 4);
		$user_id_laskar = $kode_kota . "-" . $kode_id_laskar . "-" . $kode_id_jemaah;


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

		$file_name = str_replace('.', '', $nik);
		$config['upload_path'] = FCPATH . '/assets/ktp/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $file_name;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('ktp')) {
			$error = $this->upload->display_errors();
		} else {
			$uploaded_data = $this->upload->data();
			$foto_ktp = $uploaded_data['file_name'];
		}

		$data_jemaah = array(
			'type_jemaah' => 2,
			'nama' => $nama,
			'nik' => $nik,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'status_pernikahan' => $status_pernikahan,
			'pekerjaan' => $pekerjaan,
			'alamat' => $alamat,
			'kota' => $kota,
			'no_telp' => $no_telp,
			'email' => $email,
			'riwayat_penyakit' => $riwayat_penyakit,
		);

		$data_laskar = array(
			'user_id_laskar' => $user_id_laskar,
			'user_id_jemaah' => $user_id_jemaah,
			'no_reg_laskar' => $no_reg_umrah_jemaah,
			'nama_laskar' => $nama,
			'nik_laskar' => $nik,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'status_pernikahan' => $status_pernikahan,
			'pekerjaan' => $pekerjaan,
			'alamat_laskar' => $alamat,
			'kota_laskar' => $kota,
			'no_telp_laskar' => $no_telp,
			'email_laskar' => $email,
			'riwayat_penyakit' => $riwayat_penyakit,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
			'daftar_via' => $daftar_via,
			'paket_laskar' => $paket_laskar,
			'nominal_pembayaran' => $nominal_pembayaran,
			'status_pembayaran' => 0,
		);


		$data_tagihan_pembayaran = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '3',
			'tanggal' => Date("Y-m-d"),
			'status' => '0'
		);

		$data_pendaftaran = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'jenis_pendataran' => 3,
			'nik' => $nik,
			'tanggal' => Date("Y-m-d"),
			'status_pendaftaran' => '0'
		);

		$check_nik = $this->db->where('nik_laskar', $nik)->get('laskar')->row();
		if ($check_nik != null) {
			$this->session->set_flashdata("error", "NIK yang di masukan sudah terdaftar sebagai laskar !");
			redirect('Agen/Daftar');
			exit();
		} else {
			$query_laskar = $this->crud_model->createData('laskar', $data_laskar);
		}


		if ($query_laskar) {
			$where_jemaah = "nik='" . $nik . "'";
			$update_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where_jemaah);
			$query_tagihan = $this->crud_model->createData('tagihan_pembayaran', $data_tagihan_pembayaran);
			$add_pendaftaran = $this->crud_model->createData('pendaftaran', $data_pendaftaran);
			$this->session->set_flashdata("success", "Data Agen Berhasil Ditambahkan !");
			redirect('Agen/Daftar');
		} else {
			$this->session->set_flashdata("error", "Menambah Data Agen Gagal !");
		}
	}
	public function addAction()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$kode_kota = $this->input->post('kota');
		$kota = $this->input->post('nama_kota');
		$alamat = $this->input->post('alamat');
		$riwayat_penyakit = $this->input->post('riwayat_penyakit');
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$atas_nama = $this->input->post('atas_nama');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$status_pernikahan = $this->input->post('status_pernikahan');
		$user_id_jemaah = $this->input->post('user_id_jemaah');
		// $no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
		$paket_laskar = $this->input->post('paket_laskar');
		$daftar_via = $this->input->post('daftar_via');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('harga_paket_laskar'));

		$last_id = $this->db->limit(1)->order_by('id_laskar', 'desc')->get("laskar")->row();
		if ($last_id != null) {
			$last_id_laskar = (int) substr($last_id->user_id_laskar, 4, 3) + 1;

			if ($last_id_laskar < 9) {
				$kode_id_laskar = "00" . $last_id_laskar;
			} else if ($last_id_laskar < 99) {
				$kode_id_laskar = "0" . $last_id_laskar;
			} else if ($last_id_laskar < 999) {
				$kode_id_laskar = "" . $last_id_laskar;
			}
		} else {
			$kode_id_laskar = "001";
		}
		$kode_id_jemaah = substr($user_id_jemaah, 8, 4);
		$user_id_laskar = $kode_kota . "-" . $kode_id_laskar . "-" . $kode_id_jemaah . "-A";


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

		$file_name = str_replace('.', '', $nik);
		$config['upload_path'] = FCPATH . '/assets/ktp/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $file_name;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('ktp')) {
			$error = $this->upload->display_errors();
		} else {
			$uploaded_data = $this->upload->data();
			$foto_ktp = $uploaded_data['file_name'];
		}

		$data_jemaah = array(
			'type_jemaah' => 2,
			'nama' => $nama,
			'nik' => $nik,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'status_pernikahan' => $status_pernikahan,
			'pekerjaan' => $pekerjaan,
			'alamat' => $alamat,
			'kota' => $kota,
			'no_telp' => $no_telp,
			'email' => $email,
			'riwayat_penyakit' => $riwayat_penyakit,
		);

		$data_laskar = array(
			'user_id_laskar' => $user_id_laskar,
			'user_id_jemaah' => $user_id_jemaah,
			'no_reg_laskar' => $no_reg_umrah_jemaah,
			'nama_laskar' => $nama,
			'nik_laskar' => $nik,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'status_pernikahan' => $status_pernikahan,
			'pekerjaan' => $pekerjaan,
			'alamat_laskar' => $alamat,
			'kota_laskar' => $kota,
			'no_telp_laskar' => $no_telp,
			'email_laskar' => $email,
			'riwayat_penyakit' => $riwayat_penyakit,
			'nama_bank' => '-',
			'no_rekening' => '-',
			'atas_nama' => '-',
			'daftar_via' => '-',
			'paket_laskar' => '-',
			'nominal_pembayaran' => '0',
			'status_pembayaran' => 0,
		);


		$check_nik = $this->db->where('nik_laskar', $nik)->get('laskar')->row();
		if ($check_nik != null) {
			$this->session->set_flashdata("error", "NIK yang di masukan sudah terdaftar sebagai laskar !");
			redirect('Laskar/Daftar');
			exit();
		} else {
			$query_laskar = $this->crud_model->createData('laskar', $data_laskar);
		}


		if ($query_laskar) {
			$where_jemaah = "nik='" . $nik . "'";
			$update_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where_jemaah);
			$this->session->set_flashdata("success", "Data Agen Berhasil Ditambahkan !");
			redirect('Laskar/Daftar');
		} else {
			$this->session->set_flashdata("error", "Menambah Data Agen Gagal !");
		}
	}

	public function getAllJemaah()
	{
		$nik = $this->input->post('nik');
		$where = "nik=" . $nik;
		$user = $this->custom_model->getAlUmrahlJemaah($nik)->row();
		echo json_encode($user);
	}
	public function getAllLaskar()
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
			0 => 'laskar.user_id_laskar',
			1 => 'kota',
			2 => 'nama',

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
		$laskar = $this->custom_model->getAllLaskar();
		$data = array();
		$i = 1;
		foreach ($laskar->result() as $rows) {

			$where_total_ujroh = "user_id_jemaah='" . $rows->user_id_laskar . "' AND jenis_ujroh = 'Ujroh' ";
			$total_ujroh = $this->db->select('SUM(nominal_ujroh) as nominal_total_ujroh')->where($where_total_ujroh)->get('ujroh')->row();


			$data[] = array(
				$rows->user_id_laskar,
				$rows->kota,
				$rows->nama,
				// $rows->jumlah_jemaah,
				number_format($total_ujroh->nominal_total_ujroh),
				'<a href="' . base_url() . 'Laskar/detailLaskar/' . $rows->id_laskar . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_laskar = $this->totalLaskar();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_laskar,
			"recordsFiltered" => $total_laskar,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalLaskar()
	{

		$query = $this->custom_model->getAllLaskarTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function bayarUjrohAction($id_ujroh, $user_id_laskar, $nominal_ujroh)
	{
		$data_ujroh = array(
			'status' => 1,
		);
		$laskar_row = $this->db->where('user_id_laskar', $user_id_laskar)->get('laskar')->row();
		$last_saldo_laskar = $laskar_row->total_saldo_laskar;
		$currect_saldo_laskar = $last_saldo_laskar + $nominal_ujroh;
		$data_laskar = array(
			'total_saldo_laskar' => $currect_saldo_laskar,
		);


		$where_ujroh = 'id_ujroh=' . $id_ujroh;
		$query_ujroh = $this->crud_model->updateData('ujroh', $data_ujroh, $where_ujroh);


		if ($query_ujroh) {
			$where_laskar = "user_id_laskar='" . $user_id_laskar . "'";
			$update_jemaah = $this->crud_model->updateData('laskar', $data_laskar, $where_laskar);
			$this->session->set_flashdata("success", "Ujroh Berhasil Dibayarkan !");
			redirect('Laskar/detailLaskar/' . $laskar_row->id_laskar);
		} else {
			$this->session->set_flashdata("error", "Ujroh Gagal Dibayarkan !");
		}
	}
}
