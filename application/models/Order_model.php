<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

   public function insert($data) {
    return $this->db->insert('pemesanan', $data);
  }

  public function get_by_user($user_id) {
    return $this->db
      ->select('pemesanan.*, kos.nama_kos')
      ->from('pemesanan')
      ->join('kos', 'pemesanan.kos_id = kos.id')
      ->where('pemesanan.user_id', $user_id)
      ->order_by('pemesanan.created_at', 'DESC')
      ->get()
      ->result();
  }

  public function upload_bukti($pemesanan_id, $filename) {
    $this->db->where('id', $pemesanan_id);
    return $this->db->update('pemesanan', [
      'bukti_transfer' => $filename,
      'status' => 'paid'
    ]);
  }

  public function get_by_id($id) {
    return $this->db->get_where('pemesanan', ['id' => $id])->row();
  }

}