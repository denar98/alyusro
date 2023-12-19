<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends CI_Controller
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
		if ($this->session->userdata('login_status') != 'logged') {
			$this->session->set_flashdata("error", 'Harap Login Untuk Mengakses Halaman Ini');
			redirect('Login');
		}
		$this->load->model('datatable_model');
		$this->load->model('crud_model');
		$this->load->model('custom_model');
		date_default_timezone_set('Asia/Jakarta');

	}

	public function Pembayaran()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keuangan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }

		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/pembayaran.html');
		$this->load->view('template/footer.html');
	}
	public function printPembayaran($id_tagihan_pembayaran)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keuangan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }

		  $data['rows'] = $this->custom_model->getDetailInvoice($id_tagihan_pembayaran)->row();
		  $data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		  $data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/print_pembayaran.html');
		$this->load->view('template/footer.html');
	}
	public function HistoryPembayaran()
	{
		if ($this->session->userdata('role') != 'Admin'  && $this->session->userdata('role') != 'Keuangan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/history_pembayaran.html');
		$this->load->view('template/footer.html');
	}

	public function detailPembayaran($id_tagihan_pembayaran)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen'  && $this->session->userdata('role') != 'Keuangan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['rows'] = $this->custom_model->getDetailInvoice($id_tagihan_pembayaran)->row();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/detail_pembayaran.html', $data);
		$this->load->view('template/footer.html');
	}

	public function getAllValidasiPembayaran()
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
			2 => 'umrah_jemaah.no_reg_umrah_jemaah',
			3 => 'nama',
			4 => 'tagihan_pembayaran.nominal_tagihan',
			// 5 => ''
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
		$tagihan_pembayaran = $this->custom_model->getAllValidasiPembayaran();
		$data = array();
		$i = 1;
		foreach ($tagihan_pembayaran->result() as $rows) {

			$user_id_agen = "-";
			$user_id_referall = "-";
			if($rows->jenis_tagihan!=4 && $rows->jenis_tagihan!=3){
				$user_id_agen = $rows->user_id_agen;
				$user_id_referall = $rows->user_id_referall;
			}
			$action = "";
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keuangan'){
				$action = '<a href="' . base_url() . 'Validasi/detailPembayaran/' . $rows->id_tagihan_pembayaran . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>';
			}
			
			$data[] = array(
				$user_id_agen,
				$user_id_referall,
				$rows->no_reg_umrah_jemaah,
				$rows->nama,
				number_format($rows->nominal_tagihan),
				$action
			);

			$i++;
		}
		$total_validasi_pembayaran = $this->totalValidasiPembayaran();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_pembayaran,
			"recordsFiltered" => $total_validasi_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalValidasiPembayaran()
	{

		$query = $this->custom_model->getAllValidasiPembayaranTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}
	public function getAllHistoryPembayaran()
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
			0 => 'tanggal_pembayaran',
			1 => 'tujuan_pembayaran',
			2 => 'umrah_jemaah.no_reg_umrah_jemaah',
			3 => 'nama',
			4 => 'jumlah',
			5 => 'umrah_jemaah.no_rekening',
			// 5 => ''
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
		$history_pembayaran = $this->custom_model->getAllHistoryPembayaran();
		$data = array();
		$i = 1;
		foreach ($history_pembayaran->result() as $rows) {



			if($rows->tujuan_pembayaran==1){
				$tujuan = "Umrah Terjadwal";
			}
			else if($rows->tujuan_pembayaran==2){
				$tujuan = "Tabungan Umrah";
			}
			else if($rows->tujuan_pembayaran==3){
				$tujuan = "Agen";
			}
			else if($rows->tujuan_pembayaran==4){
				$tujuan = "Donasi";
			}
			

			$data[] = array(
				$rows->tanggal_pembayaran,
				$tujuan,
				$rows->no_reg_umrah_jemaah,
				$rows->nama,
				number_format($rows->jumlah),
				$rows->nama_bank." | ".$rows->no_rekening ,
				// '<a href="' . base_url() . 'Validasi/detailPembayaran/' . $rows->id_history_pembayaran . '" class="btn btn-info mr-1"  title="Detail"><span> Detail </span></a>'
			);

			$i++;
		}
		$total_history_pembayaran = $this->totalHistoryPembayaran();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_history_pembayaran,
			"recordsFiltered" => $total_history_pembayaran,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalHistoryPembayaran()
	{

		$query = $this->custom_model->getAllHistoryPembayaranTotalRow();

		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function terimaPembayaranAction($id_tagihan_pembayaran)
	{
		$rows = $this->custom_model->getDetailInvoice($id_tagihan_pembayaran)->row();

		$saldo_jemaah = $rows->total_saldo_jemaah;
		$total_saldo_jemaah = $rows->total_saldo_jemaah + $rows->nominal_tagihan;

		$last_id = $this->db->limit(1)->where('user_id_jemaah != "-"')->order_by('id_jemaah', 'desc')->get("jemaah")->row();
		$kode_kota_row = $this->db->where('nama_kota', $rows->kota)->get("kode_kota")->row();
		$kode_agen = substr($rows->user_id_agen_referal, 4, 3);

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

		$user_id_jemaah = $kode_kota_row->kode_kota . "-" . $kode_agen . "-" . $kode_id_jemaah;
		$data_umrah_jemaah = array(
			'total_saldo_jemaah' => $total_saldo_jemaah,
			'status_pembayaran' => 1,
		);
		// echo $user_id_jemaah;
		// exit();

		if ($rows->jenis_umrah == 1) {
			$jenis_umrah = "Umrah Terjadwal";
		} else if ($rows->jenis_umrah == 2) {
			$jenis_umrah = "Tabungan Umrah";
			$data_umrah_jemaah = array(
				'total_saldo_jemaah' => $total_saldo_jemaah,
				'status_pembayaran' => 1,
				'terakhir_menabung' => $rows->tanggal,
			);

			$history_tabungan = $this->db->where('no_reg_umrah_jemaah',$rows->no_reg_umrah_jemaah)->order_by('id_tabungan_umrah_jemaah','desc')->limit(1)->get('tabungan_umrah_jemaah')->row();

	
			if($history_tabungan->saldo_tabungan != '' ){
				$saldo_tabungan = $history_tabungan->saldo_tabungan + $rows->nominal_tagihan;
			}else{
				$saldo_tabungan =  $rows->nominal_tagihan;
			}
			

			$data_tabungan_umrah = array(
				'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
				'tanggal_menabung' =>  $rows->tanggal,
				'jumlah_menabung' => $rows->nominal_tagihan,
				'saldo_tabungan' => $saldo_tabungan,
				'status_pembayaran' => '1',
			);
	
		}

		$data_jemaah = array(
			'user_id_jemaah' => $user_id_jemaah
		);

		$data_tagihan_pembayaran = array(
			'status' => 1
		);

		$data_ujroh = array(
			'tanggal' => $rows->tanggal,
			'jenis_ujroh' => $rows->jenis_ujroh,
			'user_id_jemaah' => $rows->user_id_referall,
			'jumlah_ujroh' => '700000',
			'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
			'status' => 0
		);

		$data_history_pembayaran = array(
			'tanggal_pembayaran' => $rows->tanggal,
			'id_tagihan_pembayaran' => $rows->id_tagihan_pembayaran,
			'tujuan_pembayaran' => $rows->jenis_umrah,
			'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
			'jumlah' => $rows->nominal_tagihan,
			'nama_bank' => $rows->nama_bank,
			'no_rekening' => $rows->no_rekening,
			'atas_nama' => $rows->atas_nama,
			'username' => $this->session->userdata('nama_user'),
		);
		$data_donasi = array(
			'status' => '1',
		);


		$where_tagihan_pembayaran = "id_tagihan_pembayaran='" . $rows->id_tagihan_pembayaran . "'";
		$update_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran, $where_tagihan_pembayaran);
		if ($update_tagihan_pembayaran) {

			$where_umrah_jemaah = "no_reg_umrah_jemaah='" . $rows->no_reg_umrah_jemaah . "'";
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);

			// if ($rows->jenis_umrah == 1 && $total_saldo_jemaah >= 1750000 && $rows->status_pembayaran == 0) {
			// 	$add_ujroh = $this->crud_model->createData('ujroh', $data_ujroh);
			// }
			if($rows->jenis_tagihan==2){
				$add_tabungan_umrah = $this->crud_model->createData('tabungan_umrah_jemaah', $data_tabungan_umrah);
			}

			$add_history_pembayaran = $this->crud_model->createData('history_pembayaran', $data_history_pembayaran);
     
	

			if($rows->jenis_tagihan==1 || $rows->jenis_tagihan!=2  || $rows->jenis_tagihan!=3 || $rows->jenis_tagihan!=4){
				if ($total_saldo_jemaah >= 2700000 && $rows->user_id_jemaah=="-") {
					$where_jemaah = "nik='" . $rows->nik . "'";
					$update_jemaah = $this->crud_model->updateData('jemaah', $data_jemaah, $where_jemaah);
				}
	
			}
			if($rows->jenis_tagihan==4){
					$where_donasi = "nik='" . $rows->nik . "'";
					$update_jemaah = $this->crud_model->updateData('donasi', $data_donasi, $where_donasi);
	
			}

			$this->session->set_flashdata("success", "Data Pembayaran Berhasil Diterima !");
			redirect('Validasi/printPembayaran/'.$id_tagihan_pembayaran);
		} else {
			$this->session->set_flashdata("error", "Data Pembayaran Gagal Diterima !");
		}
	}


	public function gantiTabunganAction()
	{
		$id_tagihan_pembayaran = $this->input->post('id_tagihan_pembayaran');
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$nominal_pembayaran = str_replace(",", "", $this->input->post('nominal_pembayaran'));
		$rows = $this->custom_model->getDetailInvoice($id_tagihan_pembayaran)->row();

		$saldo_jemaah = $rows->total_saldo_jemaah;
		$total_saldo_jemaah = $rows->total_saldo_jemaah + $nominal_pembayaran;

		$last_id = $this->db->limit(1)->order_by('id_jemaah', 'desc')->get("jemaah")->row();
		$kode_kota_row = $this->db->where('nama_kota', $rows->kota)->get("kode_kota")->row();
		$kode_agen = substr($rows->user_id_agen, 4, 3);

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

		$user_id_jamaah = $kode_kota_row->kode_kota . "-" . $kode_agen . "-" . $kode_id_jemaah;

		if ($rows->jenis_umrah == 1) {
			$jenis_umrah = "Umrah Terjadwal";
		} else if ($rows->jenis_umrah == 2) {
			$jenis_umrah = "Tabungan Umrah";
		}

		$data_jemaah = array(
			'user_id_jemaah' => $user_id_jamaah
		);

		$data_umrah_jemaah = array(
			'total_saldo_jemaah' => $total_saldo_jemaah,
			'jenis_umrah' => 2,
			'status_pembayaran' => 1,
			'target_paket_keberangkatan' => $id_paket_keberangkatan
		);
		$data_tagihan_pembayaran = array(
			'status' => 1,
			'jenis_tagihan' => 2
		);
		$data_ujroh_referal = array(
			'tanggal' => Date('Y-m-d'),
			'jenis_ujroh' => $rows->jenis_ujroh,
			'user_id_jemaah' => $rows->user_id_referall,
			'jumlah_ujroh' => '700000',
			'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
			'status' => 0
		);
		// $data_ujroh_agen = array(
		// 	'tanggal' => Date('Y-m-d'),
		// 	'jenis_ujroh' => $rows->jenis_ujroh,
		// 	'user_id_jemaah' => $rows->user_id_agen,
		// 	'jumlah_ujroh' => '700000',
		// 	'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
		// 	'status' => 0
		// );

		$data_history_pembayaran = array(
			'tanggal_pembayaran' => Date('Y-m-d'),
			'tujuan_pembayaran' => 2,
			'no_reg_umrah_jemaah' => $rows->no_reg_umrah_jemaah,
			'jumlah' => $nominal_pembayaran,
			'nama_bank' => $rows->nama_bank,
			'no_rekening' => $rows->no_rekening,
			'atas_nama' => $rows->atas_nama,
		);


		$where_tagihan_pembayaran = "id_tagihan_pembayaran='" . $rows->id_tagihan_pembayaran . "'";
		$update_tagihan_pembayaran = $this->crud_model->updateData('tagihan_pembayaran', $data_tagihan_pembayaran, $where_tagihan_pembayaran);
		if ($update_tagihan_pembayaran) {

			$where_umrah_jemaah = "no_reg_umrah_jemaah='" . $rows->no_reg_umrah_jemaah . "'";
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);

			$add_ujroh_referal = $this->crud_model->createData('ujroh', $data_ujroh_referal);
			$add_ujroh_agen = $this->crud_model->createData('ujroh', $data_ujroh_agen);

			$add_history_pembayaran = $this->crud_model->createData('history_pembayaran', $data_history_pembayaran);

			$this->session->set_flashdata("success", "Data Pembayaran Berhasil Diterima !");
			redirect('Validasi/Pembayaran');
		} else {
			$this->session->set_flashdata("error", "Data Pembayaran Gagal Diterima !");
		}

	}


	// Kelengkapan Umrah


	public function Kelengkapan()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Keberangkatan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		  $data['informasi_text'] = $this->db->get("informasi_text")->row();
		  $this->load->view('template/header.html',$data);
		$this->load->view('validasi/kelengkapan.html');
		$this->load->view('template/footer.html');
	}


	public function getValidasiKelengkapan($status)
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
			0 => 'user_id_agen',
			1 => 'user_id_jemaah',
			2 => 'nama'
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
		$kelengkapan_umrah = $this->custom_model->getValidasiKelengkapan($status);
		$data = array();
		$i = 1;
		foreach ($kelengkapan_umrah->result() as $rows) {

			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_jemaah,
				$rows->nama,
				'<a href="' . base_url() . 'Validasi/detailKelengkapan/' . $rows->id_kelengkapan . '" class="btn btn-info mr-1"  title="Cek Selengkapnya"><span> Detail </span></a>'

			);
			// '<a class="btn btn-warning" style="margin-left:10px !important;"  title="Print"><span> Print </span></a>',
			$i++;
		}
		$total_validasi_kelengkapan = $this->totalValidasiKelengkapan($status);
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_kelengkapan,
			"recordsFiltered" => $total_validasi_kelengkapan,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalValidasiKelengkapan($status)
	{
		$query = $this->custom_model->getValidasiKelengkapanTotalRow($status);
		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function detailKelengkapan($id_kelengkapan)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Keberangkatan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['rows'] = $this->custom_model->getDetailKelengkapan($id_kelengkapan)->row();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/detail_kelengkapan.html', $data);
		$this->load->view('template/footer.html');
	}

	public function updateKelengkapanAction()
	{
		$id_kelengkapan = $this->input->post('id_kelengkapan');
		$no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
		$mukena_bergo = $this->input->post('mukena_bergo');
		$seragam_batik = $this->input->post('seragam_batik');
		$sejadah = $this->input->post('sejadah');
		$tas_paspor = $this->input->post('tas_paspor');
		$buku_doa = $this->input->post('buku_doa');
		$souvenir = $this->input->post('souvenir');
		$koper_bagasi_cabin = $this->input->post('koper_bagasi_cabin');
		// $bantal_leher = $this->input->post('bantal_leher');
		$syal = $this->input->post('syal');
		$kain_ihrom = $this->input->post('kain_ihrom');
		$tas_sandal = $this->input->post('tas_sandal');
		$sabuk = $this->input->post('sabuk');
		$kerudung = $this->input->post('kerudung');
		$baju_koko = $this->input->post('baju_koko');
		$petugas_pengirim = $this->input->post('petugas_pengirim');
		$status_kelengkapan = 0;

		$kelengkapan_umrah_rows = $this->custom_model->getDetailValidasiKelengkapan($id_kelengkapan)->row();
		$jenis_kelamin = $kelengkapan_umrah_rows->jenis_kelamin;

		if ($jenis_kelamin == "Laki-Laki") {
			if ($seragam_batik != 0 || $sejadah != 0 || $tas_paspor != 0 || $buku_doa != 0 || $souvenir != 0 || $koper_bagasi_cabin != 0 || $syal != 0 || $kain_ihrom != 0 || $tas_sandal != 0 || $baju_koko != 0 || $sabuk != 0) {
				$status_kelengkapan = 1;
			}
			if ($seragam_batik != 0 && $sejadah != 0 && $tas_paspor != 0 && $buku_doa != 0 && $souvenir != 0 && $koper_bagasi_cabin != 0 && $syal != 0 && $kain_ihrom != 0 && $tas_sandal != 0 && $baju_koko != 0 && $sabuk != 0) {
				$status_kelengkapan = 2;
			}
		} else {
			if ($mukena_bergo != 0 || $sejadah != 0 || $tas_paspor != 0 || $buku_doa != 0 || $souvenir != 0 || $koper_bagasi_cabin != 0 || $syal != 0 || $tas_sandal != 0 || $kerudung != 0 || $sabuk != 0) {
				$status_kelengkapan = 1;
			}
			if ($mukena_bergo != 0 && $sejadah != 0 && $tas_paspor != 0 && $buku_doa != 0 && $souvenir != 0 && $koper_bagasi_cabin != 0 &&  $syal != 0 && $tas_sandal != 0 && $kerudung != 0 && $sabuk != 0) {
				$status_kelengkapan = 2;
			}
		}


		$data_umrah_jemaah = array(
			'status_kelengkapan' => $status_kelengkapan,
		);

		$data_kelengkapan_umrah = array(
			'mukena_bergo' => $mukena_bergo,
			'seragam_batik' => $seragam_batik,
			'sejadah' => $sejadah,
			'tas_paspor' => $tas_paspor,
			'buku_doa' => $buku_doa,
			'souvenir' => $souvenir,
			'koper_bagasi_cabin' => $koper_bagasi_cabin,
			'syal' => $syal,
			'kain_ihrom' => $kain_ihrom,
			'sabuk' => $sabuk,
			'tas_sandal' => $tas_sandal,
			'kerudung' => $kerudung,
			'baju_koko' => $baju_koko,
			'petugas_pengirim' => $petugas_pengirim,
		);



		$where_kelengkapan_umrah = "id_kelengkapan='" . $id_kelengkapan . "'";
		$update_kelengkapan_umrah = $this->crud_model->updateData('kelengkapan_umrah', $data_kelengkapan_umrah, $where_kelengkapan_umrah);
		if ($update_kelengkapan_umrah) {

			$where_umrah_jemaah = "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah . "'";
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);

			$this->session->set_flashdata("success", "Data Kelengkapan Berhasil Diupdate !");
			redirect('Validasi/detailKelengkapan/' . $id_kelengkapan);
		} else {
			$this->session->set_flashdata("error", "Data Kelengkapan Gagal Diupdate !");
			redirect('Validasi/detailKelengkapan/' . $id_kelengkapan);
		}

	}


	public function Manifestasi()
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Keberangkatan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/manifestasi.html');
		$this->load->view('template/footer.html');
	}

	public function detailManifestasi($id_manifestasi_umrah)
	{
		if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Agen' && $this->session->userdata('role') != 'Keberangkatan') {
			$this->session->set_flashdata("error", 'Anda Tidak Memiliki Mengakses Ke Halaman Ini');
			redirect('Dashboard');
		  }
		$data['rows'] = $this->custom_model->getDetailManifestasi($id_manifestasi_umrah)->row();
		$data['paket_keberangkatan'] = $this->db->get("paket_keberangkatan")->result();
		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.html',$data);
		$this->load->view('validasi/detail_manifestasi.html', $data);
		$this->load->view('template/footer.html');
	}


	public function getAllValidasiManifestasi()
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
			0 => 'user_id_agen',
			1 => 'user_id_jemaah',
			2 => 'nama',
			3 => 'total_saldo_jemaah',
			4 => 'status_booking',
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
		$kelengkapan_umrah = $this->custom_model->getValidasiManifestasi();
		$data = array();
		$i = 1;
		foreach ($kelengkapan_umrah->result() as $rows) {

			if ($rows->status_booking == "Non-Booking") {
				$color_class = "danger";
			} else {
				$color_class = "success";
			}

			$data[] = array(
				$rows->user_id_agen,
				$rows->user_id_jemaah,
				$rows->nama,
				number_format($rows->total_saldo_jemaah),
				'<span class="text-' . $color_class . '">' . $rows->status_booking . '</span>',
				'<a href="' . base_url() . 'Validasi/detailManifestasi/' . $rows->id_manifestasi_umrah . '" class="btn btn-info mr-1"  title="Cek Selengkapnya"><span> Detail </span></a>'

			);
			// '<a class="btn btn-warning" style="margin-left:10px !important;"  title="Print"><span> Print </span></a>',
			$i++;
		}
		$total_validasi_manifestasi = $this->totalValidasiManifestasi();
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $total_validasi_manifestasi,
			"recordsFiltered" => $total_validasi_manifestasi,
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function totalValidasiManifestasi()
	{
		$query = $this->custom_model->getValidasiManifestasiRow();
		$result = $query->row();
		if (isset($result))
			return $result->num;
		return 0;
	}

	public function updateManifestasiAction()
	{
		$id_manifestasi_umrah = $this->input->post('id_manifestasi_umrah');
		$total_saldo_jemaah = $this->input->post('total_saldo_jemaah');
		$no_reg_umrah_jemaah = $this->input->post('no_reg_umrah_jemaah');
		$paspor = $this->input->post('paspor');
		$vaksin_covid = $this->input->post('vaksin_covid');
		$vaksin_meningitis = $this->input->post('vaksin_meningitis');
		$surat_nikah = $this->input->post('surat_nikah');
		$fotocopy_ktp = $this->input->post('fotocopy_ktp');
		$id_paket_keberangkatan = $this->input->post('id_paket_keberangkatan');
		$status_manifestasi = 0;

		// if ($id_paket_keberangkatan == 'null') {
		// 	$id_paket_keberangkatan = 0;
		// }

		$manifestasi_umrah_rows = $this->custom_model->getDetailManifestasi($id_manifestasi_umrah)->row();
		$status_pernikahan = $manifestasi_umrah_rows->status_pernikahan;



		if ($status_pernikahan == "Menikah") {
			if ($paspor != 0 && $vaksin_covid != 0 && $vaksin_meningitis != 0  && $surat_nikah != 0 && $fotocopy_ktp != 0) {
				$status_manifestasi = 1;
				if ($id_paket_keberangkatan != 0 && $total_saldo_jemaah >= 10200000) {
					$status_manifestasi = 2;
				}
			}
		} else {

			if ($paspor != 0 && $vaksin_covid != 0 && $vaksin_meningitis != 0 && $fotocopy_ktp != 0) {
				$status_manifestasi = 1;
				if ($id_paket_keberangkatan != 0 && $total_saldo_jemaah >= 10200000) {
					$status_manifestasi = 2;
				}
			}
		}



		if ($id_paket_keberangkatan == '') {
			$data_umrah_jemaah = array(
				'status_manifestasi' => $status_manifestasi,
			);
		}
		else{
			$data_umrah_jemaah = array(
				'status_manifestasi' => $status_manifestasi,
				'id_paket_keberangkatan' => $id_paket_keberangkatan,
			);

		}


		$data_manifestasi_umrah = array(
			'paspor' => $paspor,
			'vaksin_covid' => $vaksin_covid,
			'vaksin_meningitis' => $vaksin_meningitis,
			'surat_nikah' => $surat_nikah,
			'fotocopy_ktp' => $fotocopy_ktp,
		);



		$where_manifestasi_umrah = "id_manifestasi_umrah='" . $id_manifestasi_umrah . "'";
		$update_manifestasi_umrah = $this->crud_model->updateData('manifestasi_umrah', $data_manifestasi_umrah, $where_manifestasi_umrah);
		if ($update_manifestasi_umrah) {

			$where_umrah_jemaah = "no_reg_umrah_jemaah='" . $no_reg_umrah_jemaah . "'";
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);

			$this->session->set_flashdata("success", "Data Manifestasi Berhasil Diupdate !");
			redirect('Validasi/detailManifestasi/' . $id_manifestasi_umrah);
		} else {
			$this->session->set_flashdata("error", "Data Manifestasi Gagal Diupdate !");
		}

	}

	public function submitManifestasiAction($id_manifestasi_umrah)
	{
		$manifestasi_umrah_rows = $this->custom_model->getDetailManifestasi($id_manifestasi_umrah)->row();

		
		if ($manifestasi_umrah_rows->status_manifestasi == 0) {
			$this->session->set_flashdata("error", "Data Manifestasi Belum Lengkap!");
			redirect('Validasi/detailManifestasi/' . $id_manifestasi_umrah);
		} else if ($manifestasi_umrah_rows->status_manifestasi == 1) {
			$this->session->set_flashdata("error", "Paket Keberangkatan Belum di Pilih!");
			redirect('Validasi/detailManifestasi/' . $id_manifestasi_umrah);
		} else {
			$data_umrah_jemaah = array(
				'status_manifestasi' => 2,
				'status_umrah' => 1,
				'status_booking' => 'Booking'
			);
 
			$row_paket = $this->db->where('id_paket_keberangkatan',$manifestasi_umrah_rows->id_paket_keberangkatan)->get('paket_keberangkatan')->row();
			$row_subsidi_agen = $this->db->get('subsidi_agen')->row();
			$sisa_kuota= $row_paket->sisa_kuota-1;
			$kuota_masuk= $row_paket->kuota_masuk+1;

			$data_kuota_paket = array(
				'sisa_kuota' => $sisa_kuota,
				'kuota_masuk' => $kuota_masuk,
			);

			$data_ujroh = array(
				'tanggal' => Date('Y-m-d'),
				'jenis_ujroh' => $manifestasi_umrah_rows->jenis_ujroh,
				'user_id_jemaah' => $manifestasi_umrah_rows->user_id_referall,
				'nominal_ujroh' => $row_paket->nominal_ujroh,
				'no_reg_umrah_jemaah' => $manifestasi_umrah_rows->no_reg_umrah_jemaah,
				'status' => 0
			);
			$data_detail_subsidi_agen = array(
				'tanggal' => Date('Y-m-d'),
				'user_id_agen' => $manifestasi_umrah_rows->user_id_agen,
				'nominal_subsidi' => $row_subsidi_agen->nominal_subsidi_agen,
				'no_reg_umrah_jemaah' => $manifestasi_umrah_rows->no_reg_umrah_jemaah,
				'status' => 0
			);

			$where_umrah_jemaah = "no_reg_umrah_jemaah='" . $manifestasi_umrah_rows->no_reg_umrah_jemaah . "'";
			$where_paket = "id_paket_keberangkatan='" . $manifestasi_umrah_rows->id_paket_keberangkatan . "'";
			$update_umrah_jemaah = $this->crud_model->updateData('umrah_jemaah', $data_umrah_jemaah, $where_umrah_jemaah);

			
			if ($update_umrah_jemaah) {
				$update_paket = $this->crud_model->updateData('paket_keberangkatan', $data_kuota_paket, $where_paket);
				$add_ujroh = $this->crud_model->createData('ujroh', $data_ujroh);
				$add_detail_subsidi_agen = $this->crud_model->createData('detail_subsidi_agen', $data_detail_subsidi_agen);
				$this->session->set_flashdata("success", "Data Manifestasi Berhasil Disubmit !");
				redirect('Validasi/detailManifestasi/' . $id_manifestasi_umrah);
			} else {
				$this->session->set_flashdata("error", "Data Manifestasi Gagal Disubmit !");
				redirect('Validasi/detailManifestasi/' . $id_manifestasi_umrah);
			}
		}
	}

}