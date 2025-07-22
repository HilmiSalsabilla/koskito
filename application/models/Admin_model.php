<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_by_username($username) {
    $query = $this->db->get_where('admin', ['username' => $username])->row();
  }

  public function get_all_admins() {
    $query = $this->db->get('admin');
    return $query->result();
  }

  public function insert($data) {
    return $this->db->insert('admin', $data);
  }

  public function update($id, $data) {
    return $this->db->update('admin', $data, ['id' => $id]);
  }

  public function delete($id) {
    return $this->db->delete('admin', ['id' => $id]);
  }
}