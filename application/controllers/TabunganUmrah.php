<<<<<<< HEAD
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TabunganUmrah extends CI_Controller
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
	}

	public function index()
	{
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/index.html');
		$this->load->view('template/footer.html');

	}

	public function Listing()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/listing.html');
		$this->load->view('template/footer.html');

	}
	public function detailListing($nik)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['rows'] = $this->custom_model->getDetailListingTabunganUmrah($nik)->row();
		$data['rows_history'] = $this->custom_model->getHistoryTabunganUmrah($nik)->result();
	
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/detail_listing.html',$data);
		$this->load->view('template/footer.html');

	}
	public function Daftar()
	{

		if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/daftar.html', $data);
		$this->load->view('template/footer.html');
	}
	public function editListing($nik)
	{

		if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$data['tabungan_umrah'] = $this->custom_model->getDetailListingTabunganUmrah($nik)->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/edit.html', $data);
		$this->load->view('template/footer.html');
	}

	public function addSaldoAction(){
		$nik = $this->input->post('nik');
		$tanggal_menabung = $this->input->post('tanggal_menabung');
		$jumlah_menabung = str_replace(",", "", $this->input->post('jumlah_menabung'));

		$no_registrasi = $this->input->post('no_reg_umrah_jemaah');
		$tanggal = $tanggal_menabung;
		$nominal_tagihan = str_replace(",", "", $this->input->post('jumlah_menabung'));
		$jenis_tagihan = 2;
		$status = 0;
	
		$data = array(
		  'tanggal' => $tanggal,
		  'no_reg_umrah_jemaah' => $no_registrasi,
		  'nominal_tagihan' => $nominal_tagihan,
		  'jenis_tagihan' => $jenis_tagihan,
		  'status' => $status,
		);
	
		$add = $this->crud_model->createData('tagihan_pembayaran', $data);

		if ($add) {
			// if($jenis_tagihan==2){
			//   $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah', $data_tabungan_umrah);
			// }
			$this->session->set_flashdata("success", "Data Tabungan Berhasil Ditambahkan Silahkan Validasi Pembayaran !");
			redirect('Invoice/');
		  } else {
			$this->session->set_flashdata("error", "Menambah Data Tabungan Gagal !");
		  }
	}

	public function editSaldoAction(){
		$id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
		$nik = $this->input->post('nik');
		$tanggal_menabung = $this->input->post('tanggal_menabung');
		$jumlah_menabung = str_replace(",", "", $this->input->post('jumlah_menabung'));

		$no_registrasi = $this->input->post('no_reg_umrah_jemaah');
		$tanggal = $tanggal_menabung;
		$nominal_tagihan = str_replace(",", "", $this->input->post('jumlah_menabung'));
		$jenis_tagihan = 2;
		$status = 0;
	
		$add = $this->crud_model->createData('tagihan_pembayaran', $data);

		if ($add) {
			// if($jenis_tagihan==2){
			//   $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah', $data_tabungan_umrah);
			// }
			$this->session->set_flashdata("success", "Data Tabungan Berhasil Ditambahkan Silahkan Validasi Pembayaran !");
			redirect('Invoice/');
		  } else {
			$this->session->set_flashdata("error", "Menambah Data Tabungan Gagal !");
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
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_pembayaran'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();

		
		if($user_id_referall=='' || $user_id_referall == null){
			$user_id_referall = $user_id_agen;
		}
		
		if ($last_id != null) {
			$last_id_jemaah = (int) substr($last_id->user_id_jemaah, 8, 4) + 1;
			if ($last_id_jemaah < 9) {
				$kode_id_jemaah = "000" . $last_id_jemaah;
			} else if ($last_id_jemaah < 99) {
				$kode_id_jemaah = "00" . $last_id_jemaah;
			} else if ($last_id_jemaah < 999) {
				$kode_id_jemaah = "0" . $last_id_jemaah;
			} else if ($last_id_jemaah < 9999) {
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
			'jenis_umrah' => 2,
			'nominal_pembayaran' => $nominal_pembayaran,
			'total_saldo_jemaah' => '0',
			'status_pembayaran' => '0',
			'status_kelengkapan' => '0',
			'status_manifestasi' => '0',
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'target_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
			'status_umrah' => '0'
		);

		$data_tagihan_pembayaran = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '2',
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

		
		$data_pendaftaran = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'jenis_pendataran' => 2,
			'nik' => $nik,
			'tanggal' => Date("Y-m-d"),
			'status_pendaftaran' => '0'
		);

		
		$history_tabungan = $this->db->where('no_reg_umrah_jemaah',$no_reg_umrah_jemaah)->order_by('id_tabungan_umrah_jemaah','desc')->limit(1)->get('tabungan_umrah_jemaah')->row();

	
	
		$saldo_tabungan =  0;
		
		

		$data_tabungan_umrah = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'tanggal_menabung' =>  Date("Y-m-d"),
			'jumlah_menabung' => 0,
			'saldo_tabungan' => 0,
			'status_pembayaran' => '0',
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
				$add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah_jemaah', $data_tabungan_umrah);
				$this->session->set_flashdata("success", "Data Umrah Terjadwal Jemaah Berhasil Ditambahkan !");
				redirect('Invoice');
			} else {
				$this->session->set_flashdata("error", "Menambah Data Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Menambah Data Jemaah Gagal !");
		}
	}
	public function updateAction()
	{
		$id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
		$no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
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
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_pembayaran'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();

		
		if($user_id_referall=='' || $user_id_referall == null){
			$user_id_referall = $user_id_agen;
		}
		


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
			'tanggal_daftar' => Date("Y-m-d"),
			'daftar_via' => $daftar_via,
			'nik_jemaah' => $nik,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
			'user_id_agen' => $user_id_agen,
			'user_id_referall' => $user_id_referall,
			'ktp_jemaah' => $foto_ktp,
			'jenis_umrah' => 2,
			'nominal_pembayaran' => $nominal_pembayaran,
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'target_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
			'status_umrah' => '0'
		);

		$data_tagihan_pembayaran = array(
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '2',
			'tanggal' => Date("Y-m-d"),
			'status' => '0'
		);

		
	


			$where = "nik=" . $nik;
			$query_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where);
		

		if ($query_jemaah) {
			$where = "no_reg_umrah_jemaah=" . $nik;
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where);
			if ($update_umrah_jemaah) {
				$update_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran,$where );
				// $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah_jemaah', $data_tabungan_umrah);
				$this->session->set_flashdata("success", "Data Tabungan Umrah Jemaah Berhasil Diubah !");
				redirect('TabunganUmrah/Listing');
			} else {
				$this->session->set_flashdata("error", "Mengubah Data Tabungan Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Mengubah Data Tabungan Umrah Jemaah Gagal  !");
		}
	}

	public function getAllTabunganUmrah()
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
			1 => 'user_id_referall',
			2 => 'no_reg_umrah_jemaah',
			3 => 'nama',
			4 => 'terakhir_menabung',
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
		$tagihan_pembayaran = $this->custom_model->getAllTabunganUmrah();
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {


			
			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_referall,
				$rows->no_reg_umrah_jemaah,
				$rows->nama,
				$rows->terakhir_menabung,
				number_format($rows->total_saldo_jemaah),
				'<a href="' . base_url() . 'TabunganUmrah/editListing/' . $rows->nik . '" class="btn btn-warning mr-2" style="margin-right:5px;"  title="Edit"><span> Edit</span></a><a href="' . base_url() . 'TabunganUmrah/hapusListing/' . $rows->nik . '/'.$rows->no_reg_umrah_jemaah.'" class="btn btn-danger mr-2" style="margin-right:5px;"  title="Hapus"><span> Hapus</span></a><a href="' . base_url() . 'TabunganUmrah/detailListing/' . $rows->nik . '" class="btn btn-info ml-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_validasi_pembayaran = $this->totalTabunganUmrah();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_pembayaran,
			"recordsFiltered" => $total_validasi_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalTabunganUmrah()
	{

		$query = $this->custom_model->getAllTabunganUmrahTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function getHistoryMenabungById()
	{
	  $id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
	  $where = "id_tabungan_umrah_jemaah=" . $id_tabungan_umrah_jemaah;
	  $history_menabung = $this->crud_model->readData('*', 'tabungan_umrah_jemaah', $where)->row();
	  echo json_encode($history_menabung);
  
	}
	public function hapusListing($nik,$no_reg_umrah_jemaah)
	{
	//   $where = "nik_jemaah=" . $nik;
	  $delete = $this->crud_model->deleteData('umrah_jemaah', "nik_jemaah=" . $nik);
	  $delete = $this->crud_model->deleteData('jemaah', "nik=" . $nik);
	  $delete = $this->crud_model->deleteData('kelengkapan_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah ."'");
	  $delete = $this->crud_model->deleteData('manifestasi_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	  $delete = $this->crud_model->deleteData('pendaftaran', "nik=" . $nik);
	  $delete = $this->crud_model->deleteData('tagihan_pembayaran', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	  $delete = $this->crud_model->deleteData('tabungan_umrah_jemaah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");


	  if ($delete) {
		$this->session->set_flashdata("success", "Data Tabungan Umrah Berhasil Dihapus !");
		redirect('TabunganUmrah/Listing');
	  } else {
		$this->session->set_flashdata("error", "Menghapus Tabungan Umrah Gagal !");
	  }
	}
	public function jadiUmrahTerjadwal($no_reg_umrah_jemaah)
	{
	//   $where = "nik_jemaah=" . $nik;
	$data_umrah_jemaah = array(
		'jenis_umrah' => 1,
	);

	  $update = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	


	  if ($update) {
		$this->session->set_flashdata("success", "Data Berhasil Pindah Ke Umrah Terjadwal Berhasil !");
		redirect('UmrahTerjadwal/Listing');
	  } else {
		$this->session->set_flashdata("error", "Data Gagal Pindah Ke Umrah Terjadwal !");
	  }
	}
=======
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TabunganUmrah extends CI_Controller
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
	}

	public function index()
	{
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/index.html');
		$this->load->view('template/footer.html');

	}

	public function Listing()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/listing.html');
		$this->load->view('template/footer.html');

	}
	public function detailListing($nik)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		}
		$data['rows'] = $this->custom_model->getDetailListingTabunganUmrah($nik)->row();
		$data['rows_history'] = $this->custom_model->getHistoryTabunganUmrah($nik)->result();
	
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/detail_listing.html',$data);
		$this->load->view('template/footer.html');

	}
	public function Daftar()
	{

		if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/daftar.html', $data);
		$this->load->view('template/footer.html');
	}
	public function editListing($nik)
	{

		if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Admin Pendaftaran') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['kota'] = $this->db->get("kode_kota")->result();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['agen'] = $this->db->get("agen")->result();
		$data['laskar'] = $this->db->get("laskar")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$data['tabungan_umrah'] = $this->custom_model->getDetailListingTabunganUmrah($nik)->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('tabungan_umrah/edit.html', $data);
		$this->load->view('template/footer.html');
	}

	public function addSaldoAction(){
		$nik = $this->input->post('nik');
		$tanggal_menabung = $this->input->post('tanggal_menabung');
		$jumlah_menabung = str_replace(",", "", $this->input->post('jumlah_menabung'));

		$no_registrasi = $this->input->post('no_reg_umrah_jemaah');
		$tanggal = $tanggal_menabung;
		$nominal_tagihan = str_replace(",", "", $this->input->post('jumlah_menabung'));
		$jenis_tagihan = 2;
		$status = 0;
	
		$data = array(
		  'tanggal' => $tanggal,
		  'no_reg_umrah_jemaah' => $no_registrasi,
		  'nominal_tagihan' => $nominal_tagihan,
		  'jenis_tagihan' => $jenis_tagihan,
		  'status' => $status,
		);
	
		$add = $this->crud_model->createData('tagihan_pembayaran', $data);

		if ($add) {
			// if($jenis_tagihan==2){
			//   $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah', $data_tabungan_umrah);
			// }
			$this->session->set_flashdata("success", "Data Tabungan Berhasil Ditambahkan Silahkan Validasi Pembayaran !");
			redirect('Invoice/');
		  } else {
			$this->session->set_flashdata("error", "Menambah Data Tabungan Gagal !");
		  }
	}

	public function editSaldoAction(){
		$id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
		$nik = $this->input->post('nik');
		$tanggal_menabung = $this->input->post('tanggal_menabung');
		$jumlah_menabung = str_replace(",", "", $this->input->post('jumlah_menabung'));

		$no_registrasi = $this->input->post('no_reg_umrah_jemaah');
		$tanggal = $tanggal_menabung;
		$nominal_tagihan = str_replace(",", "", $this->input->post('jumlah_menabung'));
		$jenis_tagihan = 2;
		$status = 0;
	
		$add = $this->crud_model->createData('tagihan_pembayaran', $data);

		if ($add) {
			// if($jenis_tagihan==2){
			//   $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah', $data_tabungan_umrah);
			// }
			$this->session->set_flashdata("success", "Data Tabungan Berhasil Ditambahkan Silahkan Validasi Pembayaran !");
			redirect('Invoice/');
		  } else {
			$this->session->set_flashdata("error", "Menambah Data Tabungan Gagal !");
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
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_pembayaran'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();

		
		if($user_id_referall=='' || $user_id_referall == null){
			$user_id_referall = $user_id_agen;
		}
		
		if ($last_id != null) {
			$last_id_jemaah = (int) substr($last_id->user_id_jemaah, 8, 4) + 1;
			if ($last_id_jemaah < 9) {
				$kode_id_jemaah = "000" . $last_id_jemaah;
			} else if ($last_id_jemaah < 99) {
				$kode_id_jemaah = "00" . $last_id_jemaah;
			} else if ($last_id_jemaah < 999) {
				$kode_id_jemaah = "0" . $last_id_jemaah;
			} else if ($last_id_jemaah < 9999) {
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
			'jenis_umrah' => 2,
			'nominal_pembayaran' => $nominal_pembayaran,
			'total_saldo_jemaah' => '0',
			'status_pembayaran' => '0',
			'status_kelengkapan' => '0',
			'status_manifestasi' => '0',
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'target_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
			'status_umrah' => '0'
		);

		$data_tagihan_pembayaran = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '2',
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

		
		$data_pendaftaran = array(
			'no_registrasi' => $no_reg_umrah_jemaah,
			'jenis_pendataran' => 2,
			'nik' => $nik,
			'tanggal' => Date("Y-m-d"),
			'status_pendaftaran' => '0'
		);

		
		$history_tabungan = $this->db->where('no_reg_umrah_jemaah',$no_reg_umrah_jemaah)->order_by('id_tabungan_umrah_jemaah','desc')->limit(1)->get('tabungan_umrah_jemaah')->row();

	
	
		$saldo_tabungan =  0;
		
		

		$data_tabungan_umrah = array(
			'no_reg_umrah_jemaah' => $no_reg_umrah_jemaah,
			'tanggal_menabung' =>  Date("Y-m-d"),
			'jumlah_menabung' => 0,
			'saldo_tabungan' => 0,
			'status_pembayaran' => '0',
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
				$add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah_jemaah', $data_tabungan_umrah);
				$this->session->set_flashdata("success", "Data Umrah Terjadwal Jemaah Berhasil Ditambahkan !");
				redirect('Invoice');
			} else {
				$this->session->set_flashdata("error", "Menambah Data Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Menambah Data Jemaah Gagal !");
		}
	}
	public function updateAction()
	{
		$id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
		$no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
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
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_pembayaran'));
		$kode_agen = substr($user_id_agen, 4, 3);
		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();

		
		if($user_id_referall=='' || $user_id_referall == null){
			$user_id_referall = $user_id_agen;
		}
		


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
			'tanggal_daftar' => Date("Y-m-d"),
			'daftar_via' => $daftar_via,
			'nik_jemaah' => $nik,
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'atas_nama' => $atas_nama,
			'user_id_agen' => $user_id_agen,
			'user_id_referall' => $user_id_referall,
			'ktp_jemaah' => $foto_ktp,
			'jenis_umrah' => 2,
			'nominal_pembayaran' => $nominal_pembayaran,
			'id_paket_keberangkatan' => $id_paket_keberangkatan,
			'target_paket_keberangkatan' => $id_paket_keberangkatan,
			'jenis_ujroh' => $jenis_ujroh,
			'status_umrah' => '0'
		);

		$data_tagihan_pembayaran = array(
			'nominal_tagihan' => $nominal_pembayaran,
			'jenis_tagihan' => '2',
			'tanggal' => Date("Y-m-d"),
			'status' => '0'
		);

		
	


			$where = "nik=" . $nik;
			$query_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where);
		

		if ($query_jemaah) {
			$where = "no_reg_umrah_jemaah=" . $nik;
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where);
			if ($update_umrah_jemaah) {
				$update_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran,$where );
				// $add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah_jemaah', $data_tabungan_umrah);
				$this->session->set_flashdata("success", "Data Tabungan Umrah Jemaah Berhasil Diubah !");
				redirect('TabunganUmrah/Listing');
			} else {
				$this->session->set_flashdata("error", "Mengubah Data Tabungan Umrah Jemaah Gagal !");
			}
		} else {
			$this->session->set_flashdata("error", "Mengubah Data Tabungan Umrah Jemaah Gagal  !");
		}
	}

	public function getAllTabunganUmrah()
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
			1 => 'user_id_referall',
			2 => 'no_reg_umrah_jemaah',
			3 => 'nama',
			4 => 'terakhir_menabung',
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
		$tagihan_pembayaran = $this->custom_model->getAllTabunganUmrah();
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {


			
			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_referall,
				$rows->no_reg_umrah_jemaah,
				$rows->nama,
				$rows->terakhir_menabung,
				number_format($rows->total_saldo_jemaah),
				'<a href="' . base_url() . 'TabunganUmrah/editListing/' . $rows->nik . '" class="btn btn-warning mr-2" style="margin-right:5px;"  title="Edit"><span> Edit</span></a><a href="' . base_url() . 'TabunganUmrah/hapusListing/' . $rows->nik . '/'.$rows->no_reg_umrah_jemaah.'" class="btn btn-danger mr-2" style="margin-right:5px;"  title="Hapus"><span> Hapus</span></a><a href="' . base_url() . 'TabunganUmrah/detailListing/' . $rows->nik . '" class="btn btn-info ml-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_validasi_pembayaran = $this->totalTabunganUmrah();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_pembayaran,
			"recordsFiltered" => $total_validasi_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalTabunganUmrah()
	{

		$query = $this->custom_model->getAllTabunganUmrahTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function getHistoryMenabungById()
	{
	  $id_tabungan_umrah_jemaah = $this->input->post('id_tabungan_umrah_jemaah');
	  $where = "id_tabungan_umrah_jemaah=" . $id_tabungan_umrah_jemaah;
	  $history_menabung = $this->crud_model->readData('*', 'tabungan_umrah_jemaah', $where)->row();
	  echo json_encode($history_menabung);
  
	}
	public function hapusListing($nik,$no_reg_umrah_jemaah)
	{
	//   $where = "nik_jemaah=" . $nik;
	  $delete = $this->crud_model->deleteData('umrah_jemaah', "nik_jemaah=" . $nik);
	  $delete = $this->crud_model->deleteData('jemaah', "nik=" . $nik);
	  $delete = $this->crud_model->deleteData('kelengkapan_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah ."'");
	  $delete = $this->crud_model->deleteData('manifestasi_umrah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	  $delete = $this->crud_model->deleteData('pendaftaran', "nik=" . $nik);
	  $delete = $this->crud_model->deleteData('tagihan_pembayaran', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	  $delete = $this->crud_model->deleteData('tabungan_umrah_jemaah', "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");


	  if ($delete) {
		$this->session->set_flashdata("success", "Data Tabungan Umrah Berhasil Dihapus !");
		redirect('TabunganUmrah/Listing');
	  } else {
		$this->session->set_flashdata("error", "Menghapus Tabungan Umrah Gagal !");
	  }
	}
	public function jadiUmrahTerjadwal($no_reg_umrah_jemaah)
	{
	//   $where = "nik_jemaah=" . $nik;
	$data_umrah_jemaah = array(
		'jenis_umrah' => 1,
	);

	  $update = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah."'");
	


	  if ($update) {
		$this->session->set_flashdata("success", "Data Berhasil Pindah Ke Umrah Terjadwal Berhasil !");
		redirect('UmrahTerjadwal/Listing');
	  } else {
		$this->session->set_flashdata("error", "Data Gagal Pindah Ke Umrah Terjadwal !");
	  }
	}
>>>>>>> 379aab8623c9bb28c435af996a19c81665925d99
}