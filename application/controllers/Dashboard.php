<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->load->model('custom_model');
		$this->load->helper('menu_active_helper');
	}

	public function index()
	{

		$data['jemaah_belum_bayar'] = $this->custom_model->getJemaahBelumLunas()->row();
		$data['jemaah_sudah_lunas'] = $this->custom_model->getJemaahSudahLunas()->row();
		$data['total_donatur'] = $this->custom_model->getTotalDonatur()->row();
		$data['total_donasi'] = $this->custom_model->getTotalDonasi()->row();
		$data['kelengkapan_belum_kirim'] = $this->custom_model->getKelengkapanBelumKirim()->row();
		$data['kelengkapan_sudah_kirim'] = $this->custom_model->getKelengkapanSudahKirim()->row();
		$data['manifestasi_belum_kirim'] = $this->custom_model->getManifestasiBelumKirim()->row();
		$data['manifestasi_sudah_kirim'] = $this->custom_model->getManifestasiSudahKirim()->row();
		$data['jemaah_sudah_berangkat'] = $this->custom_model->getJemaahSudahBerangkat()->row();
		$data['jemaah_januari'] = $this->custom_model->getJemaahSudahBerangkatJanuari()->row();
		$data['jemaah_februari'] = $this->custom_model->getJemaahSudahBerangkatFebruari()->row();
		$data['jemaah_maret'] = $this->custom_model->getJemaahSudahBerangkatMaret()->row();
		$data['jemaah_april'] = $this->custom_model->getJemaahSudahBerangkatApril()->row();
		$data['jemaah_mei'] = $this->custom_model->getJemaahSudahBerangkatMei()->row();
		$data['jemaah_juni'] = $this->custom_model->getJemaahSudahBerangkatJuni()->row();
		$data['jemaah_juli'] = $this->custom_model->getJemaahSudahBerangkatJuli()->row();
		$data['jemaah_agustus'] = $this->custom_model->getJemaahSudahBerangkatAgustus()->row();
		$data['jemaah_september'] = $this->custom_model->getJemaahSudahBerangkatSeptember()->row();
		$data['jemaah_november'] = $this->custom_model->getJemaahSudahBerangkatNovember()->row();
		$data['jemaah_oktober'] = $this->custom_model->getJemaahSudahBerangkatOktober()->row();
		$data['jemaah_desember'] = $this->custom_model->getJemaahSudahBerangkatDesember()->row();
		$data['jumlah_kuota'] = $this->custom_model->getJumlahKuota()->row();
		$data['kuota_januari'] = $this->custom_model->getJumlahKuotaJanuari()->row();
		$data['kuota_februari'] = $this->custom_model->getJumlahKuotaFebruari()->row();
		$data['kuota_maret'] = $this->custom_model->getJumlahKuotaMaret()->row();
		$data['kuota_april'] = $this->custom_model->getJumlahKuotaApril()->row();
		$data['kuota_mei'] = $this->custom_model->getJumlahKuotaMei()->row();
		$data['kuota_juni'] = $this->custom_model->getJumlahKuotaJuni()->row();
		$data['kuota_juli'] = $this->custom_model->getJumlahKuotaJuli()->row();
		$data['kuota_agustus'] = $this->custom_model->getJumlahKuotaAgustus()->row();
		$data['kuota_september'] = $this->custom_model->getJumlahKuotaSeptember()->row();
		$data['kuota_oktober'] = $this->custom_model->getJumlahKuotaOktober()->row();
		$data['kuota_november'] = $this->custom_model->getJumlahKuotaNovember()->row();
		$data['kuota_desember'] = $this->custom_model->getJumlahKuotaDesember()->row();
		$data['sisa_kuota'] = $this->custom_model->getSisaKuota()->row();
		$data['sisa_januari'] = $this->custom_model->getSisaKuotaJanuari()->row();
		$data['sisa_februari'] = $this->custom_model->getSisaKuotaFebruari()->row();
		$data['sisa_maret'] = $this->custom_model->getSisaKuotaMaret()->row();
		$data['sisa_april'] = $this->custom_model->getSisaKuotaApril()->row();
		$data['sisa_mei'] = $this->custom_model->getSisaKuotaMei()->row();
		$data['sisa_juni'] = $this->custom_model->getSisaKuotaJuni()->row();
		$data['sisa_juli'] = $this->custom_model->getSisaKuotaJuli()->row();
		$data['sisa_agustus'] = $this->custom_model->getSisaKuotaAgustus()->row();
		$data['sisa_september'] = $this->custom_model->getSisaKuotaSeptember()->row();
		$data['sisa_oktober'] = $this->custom_model->getSisaKuotaOktober()->row();
		$data['sisa_november'] = $this->custom_model->getSisaKuotaNovember()->row();
		$data['sisa_desember'] = $this->custom_model->getSisaKuotaDesember()->row();

		$data['informasi_text'] = $this->db->get("informasi_text")->row();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php');
		$this->load->view('dashboard/index.php', $data);
		$this->load->view('template/footer.php');
	}
}
