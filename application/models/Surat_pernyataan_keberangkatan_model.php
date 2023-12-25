<?php
class Surat_pernyataan_keberangkatan_model extends CI_Model
{
  public $table = 'surat_pernyataan_keberangkatan';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_by_keyword($limit = null, $start = null, $keyword = null)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('jemaah', 'jemaah.id_jemaah = surat_pernyataan_keberangkatan.jemaah_id');

    if (!empty($keyword)) {
      $this->db->like('user_id_jemaah', $keyword);
      $this->db->or_like('nama', $keyword);
    }

    $this->db->order_by('created_at', 'DESC');

    if (!empty($limit) || $limit == "") {
      $this->db->limit($limit, $start);
    }

    $results = $this->db->get()->result();
    return $results;
  }
}
