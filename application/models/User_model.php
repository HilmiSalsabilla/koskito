<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_by_email($email) {
    return $this->db->get_where('users', ['email' => $email])->row();
  }

  public function get_by_id($id) {
    return $this->db->get_where('users', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('users', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('users', $data);
  }

  public function get_all_users() {
    return $this->db->get('users')->result;
  }

  public function delete($id) {
    return $this->db->delete('users', ['id' => $id]);
  }
} 