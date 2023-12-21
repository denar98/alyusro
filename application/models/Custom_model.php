<?php

class Custom_model extends CI_Model
{

  public function getPasanganUmrah($user_id_jemaah,$parent_user_id_jemaah)
  {
    // code...


    $query = $this->db->select('jemaah.*,umrah_jemaah.*,pasangan_umrah.*')
            ->from('umrah_jemaah')
            ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->join("pasangan_umrah","jemaah.user_id_jemaah = pasangan_umrah.user_id_jemaah")
            ->where("pasangan_umrah.parent_user_id_jemaah = '".$user_id_jemaah."' OR pasangan_umrah.parent_user_id_jemaah='".$parent_user_id_jemaah."'")
            // ->where("pasangan_umrah.user_id_jemaah != '".$user_id_jemaah."'")
            ->get();


    return $query;
  }
  public function getAlUmrahlJemaah($nik)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->where("jemaah.nik",$nik)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getAllAgen()
  {
    // code...
    $query = $this->db->select('jemaah.*,agen.*')
             ->from('jemaah')
             ->join("agen","agen.nik_agen = jemaah.nik")
            //  ->join("umrah_jemaah","umrah_jemaah.user_id_agen = agen.user_id_agen","left")
             ->get();
    return $query;
  }
  public function getAllAgenTotalRow()
  {
    // code...
    $query = $this->db->select('COUNT(*) as num')
             ->from('jemaah')
             ->join("agen","agen.nik_agen = jemaah.nik")
             ->get();
    return $query;
  }
  public function getAllLaskar()
  {
    // code...
    $query = $this->db->select('jemaah.*,laskar.*')
             ->from('jemaah')
             ->join("laskar","laskar.nik_laskar = jemaah.nik")
            //  ->join("umrah_jemaah","umrah_jemaah.user_id_referall = laskar.user_id_laskar","left")
             ->get();
    return $query;
  }
  public function getAllLaskarTotalRow()
  {
    // code...
    $query = $this->db->select('COUNT(*) as num')
             ->from('jemaah')
             ->join("laskar","laskar.nik_laskar = jemaah.nik")
             ->get();
    return $query;
  }
  public function getAllTabunganUmrah()
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
      $query = $this->db->select('jemaah.*,umrah_jemaah.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            //  ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah","right")
             ->where("jenis_umrah",2)
             ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
             ->get();
             // ->order_by('order_id', 'DESC')


    }
    else{
      $query = $this->db->select('jemaah.*,umrah_jemaah.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            //  ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah","right")
             ->where("jenis_umrah",2)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    }


    
    return $query;
  }
  public function getAllTabunganUmrahTotalRow()
  {

    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
      $query = $this->db->select('COUNT(*) as num')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            //  ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah","right")
             ->where("jenis_umrah",2)
             ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
             ->get();
             // ->order_by('order_id', 'DESC')


    }
    else{
      $query = $this->db->select('COUNT(*) as num')
      ->from('jemaah')
      ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
     //  ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah")
      ->where("jenis_umrah",2)
      // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
      // ->limit(1)
      ->get();
      // ->order_by('order_id', 'DESC')
    }

    // code...
   
    return $query;
  }

  public function getDetailListingUmrah($nik)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
             ->where("jemaah.nik",$nik)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getDetailAgen($id_agen)
  {
    // code...
    $query = $this->db->select('jemaah.*,agen.*,COUNT(umrah_jemaah.id_umrah_jemaah) as jumlah_jemaah')
        ->from('jemaah')
        ->join("agen","agen.nik_agen = jemaah.nik")
        ->join("umrah_jemaah","umrah_jemaah.user_id_agen = agen.user_id_agen")
        ->where("agen.id_agen",$id_agen)
        ->get();
    return $query;
  }
  public function getDetailLaskar($id_laskar)
  {
    // code...
    $query = $this->db->select('jemaah.*,laskar.*,COUNT(umrah_jemaah.id_umrah_jemaah) as jumlah_jemaah')
        ->from('jemaah')
        ->join("laskar","laskar.nik_laskar = jemaah.nik")
        ->join("umrah_jemaah","umrah_jemaah.user_id_referall = laskar.user_id_laskar")
        ->where("laskar.id_laskar",$id_laskar)
        ->get();
    return $query;
  }
  public function getDetailListingTabunganUmrah($nik)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*,tabungan_umrah_jemaah.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
             ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah")
             ->where("jemaah.nik",$nik)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getHistoryTabunganUmrah($nik)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*,tabungan_umrah_jemaah.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
             ->join("tabungan_umrah_jemaah","tabungan_umrah_jemaah.no_reg_umrah_jemaah = umrah_jemaah.no_reg_umrah_jemaah")
             ->where("jemaah.nik",$nik)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getHistoryUjrohAgen($user_id_agen)
  {
    // code...
    $query = $this->db->select('ujroh.nominal_ujroh,ujroh.tanggal,agen.user_id_agen,jemaah.user_id_jemaah,jemaah.nama,ujroh.status,ujroh.jenis_ujroh,ujroh.id_ujroh')
             ->from('ujroh')
             ->join("agen","ujroh.user_id_jemaah = agen.user_id_agen")
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = ujroh.no_reg_umrah_jemaah")
             ->join("jemaah","jemaah.nik = umrah_jemaah.nik_jemaah")
             ->where("ujroh.user_id_jemaah",$user_id_agen)
             ->get();
    return $query;
  }
  public function getHistoryUjrohLaskar($user_id_laskar)
  {
    // code...
    $query = $this->db->select('ujroh.nominal_ujroh,ujroh.tanggal,laskar.user_id_laskar,jemaah.user_id_jemaah,jemaah.nama,ujroh.status,ujroh.jenis_ujroh,ujroh.id_ujroh')
             ->from('ujroh')
             ->join("laskar","ujroh.user_id_jemaah = laskar.user_id_laskar")
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = ujroh.no_reg_umrah_jemaah")
             ->join("jemaah","jemaah.nik = umrah_jemaah.nik_jemaah")
             ->where("ujroh.user_id_jemaah",$user_id_laskar)
             ->get();
    return $query;
  }
  public function getHistorySubsidiAgen($user_id_agen)
  {
    // code...
    $query = $this->db->select('detail_subsidi_agen.nominal_subsidi,detail_subsidi_agen.tanggal,agen.user_id_agen,jemaah.user_id_jemaah,jemaah.nama,detail_subsidi_agen.status,detail_subsidi_agen.id_detail_subsidi_agen')
             ->from('detail_subsidi_agen')
             ->join("agen","detail_subsidi_agen.user_id_agen = agen.user_id_agen")
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = detail_subsidi_agen.no_reg_umrah_jemaah")
             ->join("jemaah","jemaah.nik = umrah_jemaah.nik_jemaah")
             ->where("detail_subsidi_agen.user_id_agen",$user_id_agen)
             ->get();
    return $query;
  }

  public function getDetailListingUmrahById($id_umrah_jemaah)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
             ->where("umrah_jemaah.id_umrah_jemaah",$id_umrah_jemaah)
             // ->order_by('umrah_jemaah.id_umrah_jemaah','desc')
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }

  public function getAllValidasiPembayaran()
  {
    // code...

    $query = $this->db->select('jemaah.*,umrah_jemaah.*,tagihan_pembayaran.*,pendaftaran.*, agen.no_rekening as no_rekening_agen, agen.atas_nama as atas_nama_agen')
            ->from('tagihan_pembayaran')
            ->join("pendaftaran","pendaftaran.no_registrasi = tagihan_pembayaran.no_reg_umrah_jemaah")
            ->join("jemaah","pendaftaran.nik = jemaah.nik")
            ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->join("agen","agen.nik_agen = jemaah.nik","left")
            ->where("tagihan_pembayaran.status","0")
            ->order_by('tagihan_pembayaran.tanggal','desc')
            // ->like("nominal_tagihan","10000000")
            ->get();


    return $query;
  }
  public function getAllHistoryPembayaran()
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,history_pembayaran.*,pendaftaran.*, agen.no_rekening as no_rekening_agen, agen.atas_nama as atas_nama_agen')
    ->from('history_pembayaran')
    ->join("pendaftaran","pendaftaran.no_registrasi = history_pembayaran.no_reg_umrah_jemaah")
    ->join("jemaah","pendaftaran.nik = jemaah.nik")
    ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("agen","agen.nik_agen = jemaah.nik","left")
    ->order_by('history_pembayaran.tanggal_pembayaran','desc')
    // ->like("nominal_tagihan","10000000")
    ->get();
    


    return $query;
  }
  public function getAllUmrahTerjadwal()
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
    ->from('umrah_jemaah')
    ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan", "left")
    ->where("umrah_jemaah.jenis_umrah",1)
    ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
    ->get();
    }
    else{
    
      $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
      ->from('umrah_jemaah')
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan", "left")
      // ->order_by('tagihan_pembayaran.tanggal','desc')
      ->where("umrah_jemaah.jenis_umrah",1)
      // ->limit(1)
      ->get();
    }

    return $query;
  }
  public function getAllUmrahTerjadwalByNik($nik)
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
    ->from('umrah_jemaah')
    ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
    ->where("umrah_jemaah.jenis_umrah",1)
    ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
    ->where("umrah_jemaah.nik_jemaah",$nik)
    ->get();
    }
    else{
    
      $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
      ->from('umrah_jemaah')
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan")
      // ->order_by('tagihan_pembayaran.tanggal','desc')
      ->where("umrah_jemaah.jenis_umrah",1)
      ->where("umrah_jemaah.nik_jemaah",$nik)
      // ->limit(1)
      ->get();
    }

    return $query;
  }

  
  public function getAllListingJemaah()
  {
    // code...

    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
    ->from('umrah_jemaah')
    ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
    // ->order_by('tagihan_pembayaran.tanggal','desc')
    ->where("umrah_jemaah.jenis_umrah",1)
    ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
    ->get();
    }
    else{
    
      
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,paket_keberangkatan.*')
    ->from('umrah_jemaah')
    ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
    // ->order_by('tagihan_pembayaran.tanggal','desc')
    ->where("umrah_jemaah.jenis_umrah",1)
    // ->where("umrah_jemaah.status_umrah",2)
    // ->limit(1)
    ->get();
    }

    


    return $query;
  }
  public function getAllUmrahTerjadwalTotalRow()
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
      $query = $this->db->select('COUNT(*) as num')
    ->from('umrah_jemaah')
    ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
    ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
    ->where("umrah_jemaah.jenis_umrah",1)
    ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
    ->get();
    }
    else{
    
      $query = $this->db->select('COUNT(*) as num')
      ->from('umrah_jemaah')
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
      // ->order_by('tagihan_pembayaran.tanggal','desc')
      ->where("umrah_jemaah.jenis_umrah",1)
      // ->limit(1)
      ->get();
    }


    


    return $query;
  }
  public function getAllListingJemaahTotalRow()
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      
      $query = $this->db->select('COUNT(*) as num')
      ->from('umrah_jemaah')
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
      // ->order_by('tagihan_pembayaran.tanggal','desc')
      ->where("umrah_jemaah.jenis_umrah",1)
      ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
      ->get();

    }
    else{
      $query = $this->db->select('COUNT(*) as num')
      ->from('umrah_jemaah')
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->join("paket_keberangkatan","umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan","left")
      // ->order_by('tagihan_pembayaran.tanggal','desc')
      ->where("umrah_jemaah.jenis_umrah",1)
      // ->where("umrah_jemaah.status_umrah",2)
      // ->limit(1)
      ->get();
    }




    return $query;
  }
  public function getAllDonasiTotalRow()
  {
    // code...


    $query = $this->db->select('COUNT(*) as num')
            ->from('donasi')
            ->get();


    return $query;
  }
  public function getAllValidasiPembayaranTotalRow()
  {
    // code...
    $query = $this->db->select('COUNT(*) as num')
            ->from('tagihan_pembayaran')
            ->join("pendaftaran","pendaftaran.no_registrasi = tagihan_pembayaran.no_reg_umrah_jemaah")
            ->join("jemaah","pendaftaran.nik = jemaah.nik")
            ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->join("agen","agen.nik_agen = jemaah.nik","left")
            ->order_by('tagihan_pembayaran.tanggal','desc')
            ->where("tagihan_pembayaran.status",0)
           ->get();
    return $query;
  }
  public function getAllHistoryPembayaranTotalRow()
  {
    // code...
    $query = $this->db->select('COUNT(*) as num')
            ->from('history_pembayaran')
            ->join("pendaftaran","pendaftaran.no_registrasi = history_pembayaran.no_reg_umrah_jemaah")
            ->join("jemaah","pendaftaran.nik = jemaah.nik")
            ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->join("agen","agen.nik_agen = jemaah.nik","left")
            ->order_by('history_pembayaran.tanggal_pembayaran','desc')
            // ->like("nominal_tagihan","10000000")
            ->get();
    return $query;
  }

  public function getDetailValidasiKelengkapan($id_kelengkapan)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,kelengkapan_umrah.*')
             ->from('kelengkapan_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
             ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->where("kelengkapan_umrah.id_kelengkapan",$id_kelengkapan)
             ->get();
    return $query;
  }


  public function getValidasiKelengkapan($status)
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Keberangkatan"){
      $query = $this->db->select('jemaah.*,umrah_jemaah.*,kelengkapan_umrah.*')
      ->from('kelengkapan_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_kelengkapan",$status)
      ->where("umrah_jemaah.status_pembayaran","1")
      ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
      ->get();
    }
    else{
      $query = $this->db->select('jemaah.*,umrah_jemaah.*,kelengkapan_umrah.*')
      ->from('kelengkapan_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_kelengkapan",$status)
      ->where("umrah_jemaah.status_pembayaran","1")
      ->get();
    }

    return $query;
  }

  public function getValidasiKelengkapanTotalRow($status)
  {
    // code...
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin" && $this->session->userdata('role') != "Keberangkatan"){
      $query = $this->db->select('COUNT(*) as num')
      ->from('kelengkapan_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_kelengkapan",$status)
      ->where("umrah_jemaah.status_pembayaran","1")
      ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
      ->get();
    }
    else{
      $query = $this->db->select('COUNT(*) as num')
      ->from('kelengkapan_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_kelengkapan",$status)
      ->where("umrah_jemaah.status_pembayaran","1")
      ->get();
    }

    return $query;
  }

  public function getAllInvoice()
  {
    // code...
    $query = $this->db->select('donasi.nama as nama_donasi, donasi.no_rekening as no_rekening_donasi, donasi.nama_bank as nama_bank_donasi,donasi.atas_nama as atas_nama_donasi,jemaah.*,umrah_jemaah.*,tagihan_pembayaran.*,pendaftaran.*,agen.user_id_agen as user_id_agen, agen.no_rekening as no_rekening_agen, agen.atas_nama as atas_nama_agen,tagihan_pembayaran.tanggal as tanggal')
             ->from('tagihan_pembayaran')
             ->join("pendaftaran","pendaftaran.no_registrasi = tagihan_pembayaran.no_reg_umrah_jemaah")
             ->join("jemaah","pendaftaran.nik = jemaah.nik")
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("agen","agen.nik_agen = jemaah.nik","left")
             ->join("donasi","donasi.nik = jemaah.nik","left")
             ->order_by('tagihan_pembayaran.tanggal','desc')
             ->where("tagihan_pembayaran.status",0)
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getDetailInvoice($id_tagihan_pembayaran)
  {
    // code...
    $query = $this->db->select('donasi.nama as nama_donasi, donasi.no_rekening as no_rekening_donasi, donasi.nama_bank as nama_bank_donasi,donasi.atas_nama as atas_nama_donasi,jemaah.*,umrah_jemaah.*,umrah_jemaah.user_id_agen as user_id_agen_referal ,tagihan_pembayaran.*,agen.nominal_pembayaran as harga_paket_agen,agen.paket_agen as paket_agen,agen.user_id_agen as user_id_agen, agen.no_rekening as no_rekening_agen, agen.atas_nama as atas_nama_agen,pendaftaran.*,tagihan_pembayaran.tanggal as tanggal')
            ->from('tagihan_pembayaran')
            ->join("pendaftaran","pendaftaran.no_registrasi = tagihan_pembayaran.no_reg_umrah_jemaah")
            ->join("jemaah","pendaftaran.nik = jemaah.nik")
            ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->join("agen","agen.nik_agen = jemaah.nik","left")
            ->join("donasi","donasi.nik = jemaah.nik","left")
            ->where('id_tagihan_pembayaran',$id_tagihan_pembayaran)
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getDetailKelengkapan($id_kelengkapan)
  {
    // code...


   $query = $this->db->select('jemaah.*,umrah_jemaah.*,kelengkapan_umrah.*')
            ->from('kelengkapan_umrah')
            ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
            ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
            ->where("kelengkapan_umrah.id_kelengkapan",$id_kelengkapan)
            ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }


  public function getValidasiManifestasi()
  {
    // code...

    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
      $query = $this->db->select('jemaah.*,umrah_jemaah.*,manifestasi_umrah.*')
      ->from('manifestasi_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_pembayaran","1")
      ->where("umrah_jemaah.status_kelengkapan","2")
      ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
      ->get();

    }
    else{

      $query = $this->db->select('jemaah.*,umrah_jemaah.*,manifestasi_umrah.*')
      ->from('manifestasi_umrah')
      ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
      ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
      ->where("umrah_jemaah.status_pembayaran","1")
      ->where("umrah_jemaah.status_kelengkapan","2")
      ->get();

    }

    return $query;
  }


  public function getValidasiManifestasiRow()
  {
    
    $user_id_agen_logged = $this->session->userdata('user_id_agen');
    if($this->session->userdata('role') != "Admin"){
   
   
    // code...
    $query = $this->db->select('COUNT(*) as num')
             ->from('manifestasi_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
             ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->where("umrah_jemaah.status_pembayaran","1")
             ->where("umrah_jemaah.status_kelengkapan","2")
             ->where("umrah_jemaah.user_id_agen",$user_id_agen_logged)
             ->get();
    }
    else{

    // code...
    $query = $this->db->select('COUNT(*) as num')
             ->from('manifestasi_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
             ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->where("umrah_jemaah.status_pembayaran","1")
             ->where("umrah_jemaah.status_kelengkapan","2")
             ->get();

    }

    
    return $query;
  }

  public function getDetailManifestasi($id_manifestasi_umrah)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*,manifestasi_umrah.*')
             ->from('manifestasi_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
             ->join("jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->where("manifestasi_umrah.id_manifestasi_umrah",$id_manifestasi_umrah)
             ->get();
    return $query;
  }
  public function getDataUsers()
  {
    $this->db->select('users.*');
    $this->db->from('users');
    // $this->db->order_by('order_id', 'DESC');
    return $this->db->get();
  }

  
  public function getDataInvoice($no_registrasi)
  {
    // code...
    $query = $this->db->select('jemaah.*,umrah_jemaah.*, umrah_jemaah.user_id_agen as user_id_agen_referal, umrah_jemaah.no_rekening as no_rekening_umrah, umrah_jemaah.atas_nama as atas_nama_umrah, umrah_jemaah.nama_bank as nama_bank_umrah,pendaftaran.*,paket_keberangkatan.*,agen.*,agen.user_id_agen as id_agen')
             ->from('pendaftaran')
             ->join("jemaah","pendaftaran.nik = jemaah.nik")
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","paket_keberangkatan.id_paket_keberangkatan = umrah_jemaah.id_paket_keberangkatan","left")
             ->join("agen","agen.nik_agen = jemaah.nik","left")
             ->where("pendaftaran.no_registrasi",$no_registrasi)
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getJemaahBelumLunas()
  {
    // code...
    $query = $this->db->select('COUNT(id_jemaah) as jemaah_belum_bayar')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","paket_keberangkatan.id_paket_keberangkatan = umrah_jemaah.id_paket_keberangkatan","left")
             ->where("umrah_jemaah.total_saldo_jemaah < paket_keberangkatan.harga_paket")
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getJemaahSudahLunas()
  {
    // code...
    $query = $this->db->select('COUNT(id_jemaah) as jemaah_sudah_lunas')
             ->from('jemaah')
             ->join("umrah_jemaah","umrah_jemaah.nik_jemaah = jemaah.nik")
             ->join("paket_keberangkatan","paket_keberangkatan.id_paket_keberangkatan = umrah_jemaah.id_paket_keberangkatan","left")
             ->where("umrah_jemaah.total_saldo_jemaah >= paket_keberangkatan.harga_paket")
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getTotalDonatur()
  {
    // code...
    $query = $this->db->select('COUNT(id_donasi) as total_donatur')
             ->from('donasi')
             ->where("status",1)
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getTotalDonasi()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_donasi) as total_donasi')
             ->from('donasi')
             ->where("status",1)
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getKelengkapanBelumKirim()
  {
    // code...
    $query = $this->db->select('COUNT(id_kelengkapan) as kelengkapan_belum_kirim')
             ->from('kelengkapan_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
             ->where("umrah_jemaah.status_kelengkapan != 2")
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getKelengkapanSudahKirim()
  {
    // code...
    $query = $this->db->select('COUNT(id_kelengkapan) as kelengkapan_sudah_kirim')
             ->from('kelengkapan_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = kelengkapan_umrah.no_reg_umrah_jemaah")
             ->where("umrah_jemaah.status_kelengkapan = 2")
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getManifestasiBelumKirim()
  {
    // code...
    $query = $this->db->select('COUNT(id_manifestasi_umrah) as manifestasi_belum_kirim')
             ->from('manifestasi_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
             ->where("umrah_jemaah.status_manifestasi != 2")
             // ->limit(1)
             ->get();
             // ->order_by('order_id', 'DESC')
    return $query;
  }
  public function getManifestasiSudahKirim()
  {
    // code...
    $query = $this->db->select('COUNT(id_manifestasi_umrah) as manifestasi_sudah_kirim')
             ->from('manifestasi_umrah')
             ->join("umrah_jemaah","umrah_jemaah.no_reg_umrah_jemaah = manifestasi_umrah.no_reg_umrah_jemaah")
             ->where("umrah_jemaah.status_manifestasi = 2")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkat()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_sudah_berangkat')
             ->from('umrah_jemaah')
             ->where("umrah_jemaah.status_umrah = 2")
             ->get();
    return $query;
  }
  public function getJumlahKuota()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as jumlah_kuota')
             ->from('paket_keberangkatan')
             ->get();
    return $query;
  }
  public function getJumlahKuotaJanuari()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_januari')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 1")
             ->get();
    return $query;
  }
  public function getJumlahKuotaFebruari()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_februari')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 2")
             ->get();
    return $query;
  }
  public function getJumlahKuotaMaret()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_maret')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 3")
             ->get();
    return $query;
  }
  public function getJumlahKuotaApril()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_april')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 4")
             ->get();
    return $query;
  }
  public function getJumlahKuotaMei()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_mei')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 5")
             ->get();
    return $query;
  }
  public function getJumlahKuotaJuni()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_juni')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 6")
             ->get();
    return $query;
  }
  public function getJumlahKuotaJuli()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_juli')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 7")
             ->get();
    return $query;
  }
  public function getJumlahKuotaAgustus()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_agustus')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 8")
             ->get();
    return $query;
  }
  public function getJumlahKuotaSeptember()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_september')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 9")
             ->get();
    return $query;
  }
  public function getJumlahKuotaOktober()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_oktober')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 10")
             ->get();
    return $query;
  }
  public function getJumlahKuotaNovember()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_november')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 11")
             ->get();
    return $query;
  }
  public function getJumlahKuotaDesember()
  {
    // code...
    $query = $this->db->select('SUM(jumlah_kuota) as kuota_desember')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 12")
             ->get();
    return $query;
  }
  public function getSisaKuota()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_kuota')
             ->from('paket_keberangkatan')
             ->get();
    return $query;
  }
  public function getSisaKuotaJanuari()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_januari')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 1")
             ->get();
    return $query;
  }
  public function getSisaKuotaFebruari()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_februari')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 2")
             ->get();
    return $query;
  }
  public function getSisaKuotaMaret()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_maret')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 3")
             ->get();
    return $query;
  }

  public function getSisaKuotaApril()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_april')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 4")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaMei()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_mei')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 5")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaJuni()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_juni')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 6")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaJuli()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_juli')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 7")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaAgustus()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_agustus')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 8")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaSeptember()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_september')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 9")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaOktober()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_oktober')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 10")
             ->get();
    return $query;
  }
  
  public function getSisaKuotaNovember()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_november')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 11")
             ->get();
    return $query;
  }
  public function getSisaKuotaDesember()
  {
    // code...
    $query = $this->db->select('SUM(sisa_kuota) as sisa_desember')
             ->from('paket_keberangkatan')
             ->where("DATE_FORMAT(tanggal_keberangkatan,'%m')  = 12")
             ->get();
    return $query;
  }
  
  public function getJemaahSudahBerangkatJanuari()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_januari')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 1")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatFebruari()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_februari')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 2")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatMaret()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_maret')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 3")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatApril()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_april')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 4")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatMei()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_mei')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 5")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatJuni()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_juni')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 6")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatJuli()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_juli')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 7")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatAgustus()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_agustus')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 8")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatSeptember()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_september')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 9")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatOktober()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_oktober')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 10")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatNovember()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_november')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 11")
             ->get();
    return $query;
  }
  public function getJemaahSudahBerangkatDesember()
  {
    // code...
    $query = $this->db->select('COUNT(id_umrah_jemaah) as jemaah_desember')
             ->from('umrah_jemaah')
             ->join('paket_keberangkatan','umrah_jemaah.id_paket_keberangkatan = paket_keberangkatan.id_paket_keberangkatan')
             ->where("umrah_jemaah.status_umrah = 2")
             ->where("DATE_FORMAT(paket_keberangkatan.tanggal_keberangkatan,'%m')  = 12")
             ->get();
    return $query;
  }
}
