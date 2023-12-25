<?php
class Informasi_text_model extends CI_Model
{
  public $table = 'informasi_text';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_information_text()
  {
    $row = $this->db->get($this->table)->row();
    return $row;
  }
}
