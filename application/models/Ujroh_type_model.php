<?php
class Ujroh_type_model extends CI_Model
{
  public $table = 'ujroh_type';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('name', 'asc');

    $results = $this->db->get()->result();
    return $results;
  }

  public function get_by_id($id)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('id', $id);

    $results = $this->db->get()->row();
    return $results;
  }
}
