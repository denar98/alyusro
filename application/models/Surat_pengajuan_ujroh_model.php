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
    $this->db->select('surat_pengajuan_ujroh.*, agen.*, jemaah.*, agen.user_id_jemaah AS agen_id_jemaah');
    $this->db->from($this->table);
    $this->db->join('agen', 'agen.id_agen = surat_pengajuan_ujroh.perwakilan_id');
    $this->db->join('jemaah', 'jemaah.id_jemaah = surat_pengajuan_ujroh.jemaah_id');

    $results = $this->db->get()->result();
    return $results;
  }
}
