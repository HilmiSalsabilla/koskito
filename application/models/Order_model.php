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
      ->join('kos', 'pemesanan.kos_id = kos.id_kos')
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

  public function get_all_orders() {
    $this->db->select('p.*, u.name as nama_user, k.nama_kos, b.file_bukti')
            ->from('pemesanan p')
            ->join('users u', 'p.id_user = u.id')
            ->join('kos k', 'p.id_kos = k.id')
            ->join('bukti_pembayaran b', 'p.id = b.id_pemesanan', 'left')
            ->order_by('p.tanggal_mulai', 'DESC');
    return $this->db->get()->result();
  }

  public function update_status($id, $status) {
    return $this->db->where('id', $id)->update('pemesanan', ['status' => $status]);
  }

}