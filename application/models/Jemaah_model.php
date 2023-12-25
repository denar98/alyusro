<?php
class Jemaah_model extends CI_Model
{
  public $table = 'jemaah';

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

  public function get_by_id($id)
  {
    $query = $this->db->where('id_jemaah', $id)->get($this->table);
    $results = $query->result();
    return $results;
  }
}
