<?php
class Surat_pengajuan_ujroh_model extends CI_Model
{
  public $table = 'surat_pengajuan_ujroh';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $this->db->select('surat_pengajuan_ujroh.*, surat_pengajuan_ujroh.id AS surat_pengajuan_ujroh_id, agen.*, jemaah.*, agen.user_id_jemaah AS agen_id_jemaah, ujroh_type.*, ujroh_type.name AS ujroh_name');
    $this->db->from($this->table);
    $this->db->join('agen', 'agen.id_agen = surat_pengajuan_ujroh.perwakilan_id');
    $this->db->join('jemaah', 'jemaah.id_jemaah = surat_pengajuan_ujroh.jemaah_id');
    $this->db->join('ujroh_type', 'ujroh_type.id = surat_pengajuan_ujroh.ujroh_type_id');
    $this->db->order_by('surat_pengajuan_ujroh.created_at', 'desc');

    $results = $this->db->get()->result();
    return $results;
  }

  public function get_by_id($id)
  {
    $this->db->select('
    surat_pengajuan_ujroh.*, surat_pengajuan_ujroh.id AS surat_pengajuan_ujroh_id, 
    
    agen.*, agen.tempat_lahir AS tempat_lahir_agen, agen.tanggal_lahir AS tanggal_lahir_agen,
    agen.user_id_jemaah AS agen_id_jemaah, 

    jemaah.*, jemaah.user_id_jemaah AS jemaah_id_jemaah,
    jemaah.tempat_lahir AS tempat_lahir_jemaah, jemaah.tanggal_lahir AS tanggal_lahir_jemaah, jemaah.pekerjaan AS pekerjaan_jemaah, jemaah.jenis_kelamin AS jenis_kelamin_jemaah, jemaah.status_pernikahan AS status_pernikahan_jemaah, jemaah.riwayat_penyakit AS riwayat_penyakit_jemaah,

    ujroh_type.*, ujroh_type.name AS ujroh_name');
    $this->db->from($this->table);
    $this->db->join('agen', 'agen.id_agen = surat_pengajuan_ujroh.perwakilan_id');
    $this->db->join('jemaah', 'jemaah.id_jemaah = surat_pengajuan_ujroh.jemaah_id');
    $this->db->join('ujroh_type', 'ujroh_type.id = surat_pengajuan_ujroh.ujroh_type_id');
    $this->db->where('surat_pengajuan_ujroh.id', $id);

    $results = $this->db->get()->row();
    return $results;
  }
}
