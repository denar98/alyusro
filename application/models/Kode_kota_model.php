<?php
class Kode_kota_model extends CI_Model
{
  public $table = 'kode_kota';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $query = $this->db->get($this->table);
    $results = $query->result();
    return $results;
  }
}
