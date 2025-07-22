<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

   public function insert($data) {
    return $this->db->insert('pesan', $data);
  }

  public function get_by_user($user_id) {
    return $this->db
      ->select('pesan.*, kos.nama_kos')
      ->from('pesan')
      ->join('kos', 'pesan.kos_id = kos.id')
      ->where('pesan.user_id', $user_id)
      ->order_by('pesan.created_at', 'DESC')
      ->get()
      ->result();
  }
}