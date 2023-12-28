<?php
class Agen_model extends CI_Model
{
  public $table = 'agen';

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
    $query = $this->db->where('id_agen', $id)->get($this->table);
    $results = $query->result();
    return $results;
  }
}
