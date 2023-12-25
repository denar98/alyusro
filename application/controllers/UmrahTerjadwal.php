<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UmrahTerjadwal extends CI_Controller
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
		$this->load->helper('menu_active_helper');
	}

	public function index()
	{
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('umrah_terjadwal/index.html');
		$this->load->view('template/footer.php');
	}
	public function detailListing($nik)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$rows_umrah_jemaah = $this->custom_model->getDetailListingUmrah($nik)->row();
		$pasangan_umrah = $this->db->where('user_id_jemaah = "' . $rows_umrah_jemaah->user_id_jemaah . '"')->get("pasangan_umrah")->row();
		$data['rows'] = $this->custom_model->getDetailListingUmrah($nik)->row();
		$data['jemaah'] = $this->db->where('user_id_jemaah != "-"')->get("jemaah")->result();
		if ($pasangan_umrah == "") {
			$parent_user_id_jemaah = '0';
		} else {
			$parent_user_id_jemaah = $pasangan_umrah->parent_user_id_jemaah;
		}
		$data['pasangan_umrah'] = $this->custom_model->getPasanganUmrah($rows_umrah_jemaah->user_id_jemaah, $parent_user_id_jemaah)->result();

		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('umrah_terjadwal/detail_listing.php', $data);
		$this->load->view('template/footer.php');
	}

	public function Listing()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('umrah_terjadwal/listing.php');
		$this->load->view('template/footer.php');
	}

	public function ListingJemaah()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('umrah_terjadwal/listing_jemaah.php');
		$this->load->view('template/footer.php');
	}

	public function Daftar()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('umrah_terjadwal/daftar.php', $data);
		$this->load->view('template/footer.php');
	}
	public function editListing($nik)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$data['nik'] = $nik;
		$data['jemaah'] = $this->custom_model->getAllUmrahTerjadwalByNik($nik)->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('umrah_terjadwal/edit.php', $data);
		$this->load->view('template/footer.php');
	}
	public function berangkatAction($id_umrah_jemaah)
	{

		$row = $this->custom_model->getDetailListingUmrahById($id_umrah_jemaah)->row();
		$row_paket = $this->db->where('id_paket_keberangkatan', $row->id_paket_keberangkatan)->get('paket_keberangkatan')->row();



		$data_ujroh = array(
			'tanggal' => Date('Y-m-d'),
			'jenis_ujroh' => $row->jenis_ujroh,
			'user_id_jemaah' => $row->user_id_referall,
			'nominal_ujroh' => $row_paket->nominal_ujroh,
			'no_reg_umrah_jemaah' => $row->no_reg_umrah_jemaah,
			'status' => 0
		);

		$data_umrah_jemaah = array(
			'status_umrah' => 2
		);

		$where = "id_umrah_jemaah=" . $id_umrah_jemaah;
		$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where);
		if ($update_umrah_jemaah) {
			$add_ujroh = $this->crud_model->createData('ujroh', $data_ujroh);
			$this->session->set_flashdata("success", "Jemaah Berhasil Diberangkatkan !");
			redirect('UmrahTerjadwal/Listing');
		} else {
			$this->session->set_flashdata("error", "Proses PemberangkatanUmrah Jemaah Gagal !");
		}
	}
	public function hapusPasanganUmrah($user_id_jemaah, $parent_nik)
	{
		$where = "user_id_jemaah='" . $user_id_jemaah . "'";
		$delete = $this->crud_model->deleteData('pasangan_umrah', $where);
		if ($delete) {
			$this->session->set_flashdata("success", "Pasangan Umrah Berhasil Dihapus !");
			redirect('UmrahTerjadwal/detailListing/' . $parent_nik);
		} else {
			$this->session->set_flashdata("error", "Menghapus Pasngan Umrah Gagal !");
		}
	}
	public function hapusListing($nik, $no_reg_umrah_jemaah)
	{
		//   $where = "nik_jemaah=" . $nik;
		$delete = $this->crud_model->deleteData('umrah_jemaah', "nik_jemaah=" . $nik);
		$delete = $this->crud_model->deleteData('jemaah', "nik=" . $nik);
		$delete = $this->crud_model->deleteData('kelengkapan_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah . "'");
		$delete = $this->crud_model->deleteData('manifestasi_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah . "'");
		$delete = $this->crud_model->deleteData('pendaftaran', "nik=" . $nik);
		$delete = $this->crud_model->deleteData('tagihan_pembayaran', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah . "'");


		if ($delete) {
			$this->session->set_flashdata("success", "Data User Berhasil Dihapus !");
			redirect('UmrahTerjadwal/ListingJemaah');
		} else {
			$this->session->set_flashdata("error", "Menghapus User Gagal !");
		}
	}
	public function gabungkanJemaah()
	{
		$parent_user_id_jemaah = $this->input->post('parent_user_id_jemaah');
		$user_id_jemaah = $this->input->post('user_id_jemaah');
		$status_hubungan = $this->input->post('status_hubungan');
		$nik = $this->input->post('nik');

		$cek_pasangan_umrah = $this->db->where('user_id_jemaah = "' . $parent_user_id_jemaah . '"')->get('pasangan_umrah')->row();
		if ($cek_pasangan_umrah->user_id_jemaah == "" || $cek_pasangan_umrah->user_id_jemaah == NULL) {

			$data_pasangan_umrah_parent = array(
				'parent_user_id_jemaah' => $parent_user_id_jemaah,
				'user_id_jemaah' => $parent_user_id_jemaah,
				'status_hubungan' => "Master",
			);
			$add_pasangan_umrah_parent = $this->crud_model->createData('pasangan_umrah', $data_pasangan_umrah_parent);
		}

		if ($cek_pasangan_umrah->user_id_jemaah != $cek_pasangan_umrah->parent_user_id_jemaah) {
			$data_pasangan_umrah = array(
				'parent_user_id_jemaah' => $cek_pasangan_umrah->parent_user_id_jemaah,
				'user_id_jemaah' => $user_id_jemaah,
				'status_hubungan' => $status_hubungan,
			);
		} else {

			$data_pasangan_umrah = array(
				'parent_user_id_jemaah' => $parent_user_id_jemaah,
				'user_id_jemaah' => $user_id_jemaah,
				'status_hubungan' => $status_hubungan,
			);
		}

		// $where = "user_id_jamaah=" . $user_id_jamaah;
		$add_pasangan_umrah = $this->crud_model->createData('pasangan_umrah', $data_pasangan_umrah);
		if ($add_pasangan_umrah) {
			$this->session->set_flashdata("success", "Jemaah Berhasil Digabungkan !");
			redirect('UmrahTerjadwal/detailListing/' . $nik);
		} else {
			$this->session->set_flashdata("error", "Jemaah Gagal Digabungkan !");
			redirect('UmrahTerjadwal/detailListing/' . $nik);
		}
	}
	public function editTiketAction()
	{

		$id_umrah_jemaah = $this->input->post('id_umrah_jemaah');
		$nomor_tiket = $this->input->post('nomor_tiket');
		$nik = $this->input->post('nik');

		$data_umrah_jemaah = array(
			'nomor_tiket' => $nomor_tiket
		);

		$where = "id_umrah_jemaah=" . $id_umrah_jemaah;
		$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where);
		if ($update_umrah_jemaah) {
			$this->session->set_flashdata("success", "Nomor Tiket Berhasil Di Ubah!");
			redirect('UmrahTerjadwal/detailListing/' . $nik);
		} else {
			$this->session->set_flashdata("error", "Nomor Tiket Gagal Di Ubah !");
		}
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
		$user_id_agen = $this->input->post('user_id_agen');
		$user_id_referall = $this->input->post('user_id_referall');
		$jenis_ujroh = $this->input->post('jenis_ujroh');
		$daftar_via = $this->input->post('daftar_via');
		$id_paket_keberangkatan = $this->input->post('paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_custom'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();

		if ($user_id_referall == '' || $user_id_referall == null) {
			$user_id_referall = $user_id_agen;
		}
		if ($last_id != null) {
			$last_id_jemaah = (int) substr($last_id->user_id_jemaah, 8, 4) + 1;
			if ($last_id_jemaah < 10) {
				$kode_id_jemaah = "000" . $last_id_jemaah;
			} else if ($last_id_jemaah < 100) {
				$kode_id_jemaah = "00" . $last_id_jemaah;
			} else if ($last_id_jemaah < 1000) {
				$kode_id_jemaah = "0" . $last_id_jemaah;
			} else if ($last_id_jemaah < 10000) {
				$kode_id_jemaah = $last_id_jemaah;
			}
		} else {
			$kode_id_jemaah = "0001";
		}

		$user_id_jamaah = $kode_kota . "-" . $kode_agen . "-" . $kode_id_jemaah;

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
			'type_jemaah' => 1,
			'user_id_jemaah' => '-',
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

		$data_umrah_jemaah = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'tanggal_daftar' => Date("Y-m-d"),
			'daftar_via' => $daftar_via,
			'nik_jemaah' => $nik,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
			'user_id_agen' => $user_id_agen,
			'user_id_referall' => $user_id_referall,
			'ktp_jemaah' => $foto_ktp,
			'jenis_umrah' => 1,
			'nominal_pembayaran' => $nominal_pembayaran,
			'total_saldo_jemaah' => '0',
			'status_pembayaran' => '0',
			'status_kelengkapan' => '0',
			'status_manifestasi' => '0',
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
			'status_umrah' => '0'
		);

		$data_pendaftaran = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'jenis_pendataran' => 1,
			'nik' => $nik,
			'tanggal' => Date("Y-m-d"),
			'status_pendaftaran' => '0'
		);
		$data_tagihan_pembayaran = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '1',
			'tanggal' => Date("Y-m-d"),
			'status' => '0'
		);

		$data_kelengkapan_umrah = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'petugas_pengirim' => '-'
		);
		$data_manifestasi_umrah = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
		);

		$check_nik = $this->db->where('nik', $nik)->get('jemaah')->row();
		if ($check_nik == null) {
			$query_jemaah = $this->crud_model->createData('jemaah', $data_jemaah);
		} else {
			$where = "nik=" . $nik;
			$query_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where);
		}

		if ($query_jemaah) {
			$add_umrah_jemaah = $this->crud_model->createData('umrah_jemaah', $data_umrah_jemaah);
			if ($add_umrah_jemaah) {
				$add_tagihan_pembayaran = $this->crud_model->createData('tagihan_pembayaran', $data_tagihan_pembayaran);
				$add_kelengkapan_umrah = $this->crud_model->createData('kelengkapan_umrah', $data_kelengkapan_umrah);
				$add_manifestasi_umrah = $this->crud_model->createData('manifestasi_umrah', $data_manifestasi_umrah);
				$add_pendaftaran = $this->crud_model->createData('pendaftaran', $data_pendaftaran);
				$this->session->set_flashdata("success", "Data Umrah Terjadwal Jemaah Berhasil Ditambahkan !");
				redirect('Invoice');
			} else {
				$this->session->set_flashdata("error", "Menambah Data Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Menambah Data Jemaah Gagal !");
		}
	}
	public function editAction()
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
		$user_id_agen = $this->input->post('user_id_agen');
		$user_id_referall = $this->input->post('user_id_referall');
		$jenis_ujroh = $this->input->post('jenis_ujroh');
		$daftar_via = $this->input->post('daftar_via');
		$id_paket_keberangkatan = $this->input->post('paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_custom'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();
		$currect_umrah_jemaah = $this->db->where('nik_jemaah', $nik)->get('umrah_jemaah')->row();

		if ($user_id_referall == '' || $user_id_referall == null) {
			$user_id_referall = $user_id_agen;
		}
		if ($last_id != null) {
			$last_id_jemaah = (int) substr($last_id->user_id_jemaah, 8, 4) + 1;
			if ($last_id_jemaah < 10) {
				$kode_id_jemaah = "000" . $last_id_jemaah;
			} else if ($last_id_jemaah < 100) {
				$kode_id_jemaah = "00" . $last_id_jemaah;
			} else if ($last_id_jemaah < 1000) {
				$kode_id_jemaah = "0" . $last_id_jemaah;
			} else if ($last_id_jemaah < 10000) {
				$kode_id_jemaah = $last_id_jemaah;
			}
		} else {
			$kode_id_jemaah = "0001";
		}

		$user_id_jamaah = $kode_kota . "-" . $kode_agen . "-" . $kode_id_jemaah;

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
			'type_jemaah' => 1,
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

		$data_umrah_jemaah = array(
			'daftar_via' => $daftar_via,
			'nik_jemaah' => $nik,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
			'user_id_agen' => $user_id_agen,
			'user_id_referall' => $user_id_referall,
			'ktp_jemaah' => $foto_ktp,
			'jenis_umrah' => 1,
			'nominal_pembayaran' => $nominal_pembayaran,
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
		);

		// echo $currect_umrah_jemaah->status_pembayaran;
		// exit();

		$where = "nik=" . $nik;
		$query_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where);

		if ($query_jemaah) {
			$where_umrah_jemaah = "nik_jemaah=" . $nik;
			$edit_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);
			if ($edit_umrah_jemaah) {
				$where_tagihan_pembayaran = "no_reg_umrah_jemaah='" . $currect_umrah_jemaah->no_reg_umrah_jemaah . "'";

				if ($currect_umrah_jemaah->nominal_pembayaran <= $nominal_pembayaran) {
					if ($currect_umrah_jemaah->status_pembayaran == 1) {
						$data_tagihan_pembayaran = array(
							'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
							'nominal_tagihan' => $nominal_pembayaran - $currect_umrah_jemaah->nominal_pembayaran,
							'jenis_tagihan' => '1',
							'tanggal' => Date("Y-m-d"),
							'status' => '0'
						);
						$add_tagihan_pembayaran = $this->crud_model->createData('tagihan_pembayaran', $data_tagihan_pembayaran);
					} else {
						$data_tagihan_pembayaran = array(
							'nominal_tagihan' => $nominal_pembayaran,
						);
						$edit_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran, $where_tagihan_pembayaran);
					}
				} else {
					$data_tagihan_pembayaran = array(
						'nominal_tagihan' => $nominal_pembayaran,
					);
					$edit_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran, $where_tagihan_pembayaran);
				}

				$this->session->set_flashdata("success", "Data Umrah Terjadwal Jemaah Di Edit Ditambahkan !");
				redirect('UmrahTerjadwal/Listing');
			} else {
				$this->session->set_flashdata("error", "Mengedit Data Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Mengedit Data Jemaah Gagal !");
		}
	}

	public function getAllUmrahTerjadwal()
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
			0 => 'umrah_jemaah.user_id_agen',
			1 => 'user_id_jemaah',
			2 => 'nama',
			3 => 'tanggal_keberangkatan',
			4 => 'status_booking',
			5 => 'total_saldo_jemaah',
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
		$tagihan_pembayaran = $this->custom_model->getAllUmrahTerjadwal();
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {
			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_jemaah,
				$rows->nama,
				$rows->tanggal_keberangkatan,
				$rows->status_booking,
				number_format($rows->total_saldo_jemaah),
				'<a href="' . base_url() . 'UmrahTerjadwal/editListing/' . $rows->nik . '" class="btn btn-warning mr-1"  title="Detail"><span> Edit </span></a> <a href="' . base_url() . 'UmrahTerjadwal/hapusListing/' . $rows->nik . '/' . $rows->no_reg_umrah_jemaah . '" class="btn btn-danger mr-1"  title="Hapus"><span> Hapus </span></a> <a href="' . base_url() . 'UmrahTerjadwal/detailListing/' . $rows->nik . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_validasi_pembayaran = $this->totalUmrahTerjadwal();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_pembayaran,
			"recordsFiltered" => $total_validasi_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function totalUmrahTerjadwal()
	{

		$query = $this->custom_model->getAllUmrahTerjadwalTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}
	public function getAllListingJemaah()
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
			0 => 'umrah_jemaah.user_id_agen',
			1 => 'user_id_jemaah',
			2 => 'nama',
			3 => 'tanggal_keberangkatan',
			4 => 'status_booking',
			5 => 'total_saldo_jemaah',
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
		$tagihan_pembayaran = $this->custom_model->getAllListingJemaah();
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {

			if ($rows->status_umrah == 0) {
				$status = "Non-Booking";
			} else if ($rows->status_umrah == 1) {
				$status = "Booking";
			} else {
				$status = "Sudah Berangkat";
			}

			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_jemaah,
				$rows->nama,
				$rows->tanggal_keberangkatan,
				$status,
				'<a href="' . base_url() . 'UmrahTerjadwal/editListing/' . $rows->nik . '" class="btn btn-warning mr-1"  title="Edit"><span> Edit </span></a> <a href="' . base_url() . 'UmrahTerjadwal/hapusListing/' . $rows->nik . '/' . $rows->no_reg_umrah_jemaah . '" class="btn btn-danger mr-1"  title="Hapus"><span> Hapus </span></a> <a href="' . base_url() . 'UmrahTerjadwal/detailListing/' . $rows->nik . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_validasi_pembayaran = $this->totalListingJemaah();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_pembayaran,
			"recordsFiltered" => $total_validasi_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalListingJemaah()
	{

		$query = $this->custom_model->getAllListingJemaahTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}
	public function export()
	{

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];
		$sheet->setCellValue('A1', "DATA UMRAH JEMAAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->applyFromArray($style_col); // Set bold kolom A1
		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A3', "ID PERWAKILAN"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B3', "ID AGEN"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('C3', "ID JEMAAH"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('D3', "NAMA JEMAAH"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('E3', "RENCANA BERANGKAT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('F3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('G3', "JUMLAH PEMBAYARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);
		$sheet->getStyle('F3')->applyFromArray($style_col);
		$sheet->getStyle('G3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $this->SiswaModel->view();
		$umrah_terjadwal = $this->custom_model->getAllUmrahTerjadwal()->result();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($umrah_terjadwal as $data) { // Lakukan looping pada variabel siswa
			$sheet->setCellValue('A' . $numrow, $data->user_id_agen);
			$sheet->setCellValue('B' . $numrow, $data->user_id_referall);
			$sheet->setCellValue('C' . $numrow, $data->user_id_jemaah);
			$sheet->setCellValue('D' . $numrow, $data->nama);
			$sheet->setCellValue('E' . $numrow, $data->tanggal_keberangkatan);
			$sheet->setCellValue('F' . $numrow, $data->status_booking);
			$sheet->setCellValue('G' . $numrow, $data->total_saldo_jemaah);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('G' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(25); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E
		$sheet->getColumnDimension('G')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Laporan Data Umrah Jemaah");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Umrah Jemaah.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}


	public function export_database_jemaah()
	{

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];
		$sheet->setCellValue('A1', "DATABASE JEMAAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->applyFromArray($style_col); // Set bold kolom A1
		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A3', "ID PERWAKILAN"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('B3', "ID JEMAAH"); // Set kolom A3 dengan tulisan "NO"
		$sheet->setCellValue('C3', "NAMA JEMAAH"); // Set kolom B3 dengan tulisan "NIS"
		$sheet->setCellValue('D3', "TANGGAL BERANGKAT"); // Set kolom C3 dengan tulisan "NAMA"
		$sheet->setCellValue('E3', "STATUS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A3')->applyFromArray($style_col);
		$sheet->getStyle('B3')->applyFromArray($style_col);
		$sheet->getStyle('C3')->applyFromArray($style_col);
		$sheet->getStyle('D3')->applyFromArray($style_col);
		$sheet->getStyle('E3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $this->SiswaModel->view();
		$umrah_terjadwal = $this->custom_model->getAllListingJemaah()->result();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($umrah_terjadwal as $data) { // Lakukan looping pada variabel siswa
			$sheet->setCellValue('A' . $numrow, $data->user_id_agen);
			$sheet->setCellValue('B' . $numrow, $data->user_id_jemaah);
			$sheet->setCellValue('C' . $numrow, $data->nama);
			$sheet->setCellValue('D' . $numrow, $data->tanggal_keberangkatan);
			$sheet->setCellValue('E' . $numrow, $data->status_booking);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(25); // Set width kolom A
		$sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D
		$sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$sheet->setTitle("Laporan Database Jemaah");
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Database Jemaah.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}
