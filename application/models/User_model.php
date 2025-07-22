<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_by_email($email) {
    return $this->db->get_where('user', ['email' => $email])->row();
  }

  public function get_by_id($id) {
    return $this->db->get_where('user', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('user', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('users', $data);
  }

  public function get_all_users() {
    return $this->db->get('user')->result;
  }

  public function delete($id) {
    return $this->db->delete('user', ['id' => $id]);
  }
} 