<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Kos_model');
    $this->load->model('Order_model');
  }

  public function index() {
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }

    $data['title'] = 'Profile';
    $data['user'] = $this->User_model->get_by_id($this->session->userdata('user_id'));
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('user/index', $data);
    $this->load->view('template/footer');
  }

  public function pesan($kos_id) {
    if (!$this->session->userdata('logged_in')) redirect('login');
    $data = [
      'user_id' => $this->session->userdata('user_id'),
      'kos_id' => $kos_id,
      'tanggal_pesan' => date('Y-m-d'),
      'catatan' => 'Auto via sistem'
    ];
    $this->Order_model->insert($data);
    redirect('riwayat');
  }

  public function riwayat() {
    if (!$this->session->userdata('logged_in')) redirect('login');

    $data['title'] = 'Riwayat Pemesanan';
    $data['orders'] = $this->Order_model->get_by_user($this->session->userdata('user_id'));
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('user/order', $data);
    $this->load->view('template/footer');
  }

  public function edit_profile() {
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }
    $user = $this->User_model->get_by_id($this->session->userdata('user_id'));
    
    if ($this->input->post()) {
      $data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email')
      ];
      if ($this->User_model->update($user_id, $data)) {
        $this->session->set_flashdata('success', 'Profile updated successfully.');
        redirect('user');
      } else {
        $this->session->set_flashdata('error', 'Failed to update profile.');
      }
    }
    
    $data['title'] = 'Edit Profile';
    $data['user'] = $user;
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('user/edit_profile', $data);
    $this->load->view('template/footer');
  }
}