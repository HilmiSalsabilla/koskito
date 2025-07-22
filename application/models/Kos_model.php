<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_kos() {
    return $this->db
      ->select('kos.*, kecamatan.nama as nama_kecamatan, kota.nama as nama_kota, provinsi.nama as nama_provinsi')
      ->from('kos')
      ->join('kecamatan', 'kos.kecamatan_id = kecamatan.id')
      ->join('kota', 'kos.kota_id = kota.id')
      ->join('provinsi', 'kos.provinsi_id = provinsi.id')
      ->order_by('kos.created_at', 'DESC')
      ->get()
      ->result();
  }

  public function search_kos($keyword) {
    $this->db->like('kos.nama', $keyword);
    $this->db->or_like('kos.alamat', $keyword);
    return $this->db
      ->select('kos.*, kecamatan.nama as nama_kecamatan, kota.nama as nama_kota, provinsi.nama as nama_provinsi')
      ->from('kos')
      ->join('kecamatan', 'kos.kecamatan_id = kecamatan.id')
      ->join('kota', 'kos.kota_id = kota.id')
      ->join('provinsi', 'kos.provinsi_id = provinsi.id')
      ->get()
      ->result();
  }

  public function get_kos_by_id($id) {
    return $this->db
      ->select('kos.*, kecamatan.nama as nama_kecamatan, kota.nama as nama_kota, provinsi.nama as nama_provinsi')
      ->from('kos')
      ->join('kecamatan', 'kos.kecamatan_id = kecamatan.id')
      ->join('kota', 'kos.kota_id = kota.id')
      ->join('provinsi', 'kos.provinsi_id = provinsi.id')
      ->where('kos.id', $id)
      ->get()
      ->row();
  }
}