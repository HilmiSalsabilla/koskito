<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('Kos_model');
    $this->load->model('User_model');
  }

  public function login() {
    if ($this->input->post()) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $admin = $this->Admin_model->get_by_username($username);

      if ($admin && password_verify($password, $admin->password)) {
        $this->session->set_userdata(['admin_logged_in' => true]);
        redirect('admin/dashboard');
      } else {
        $this->session->set_flashdata('error', 'Login gagal');
      }
    }
    $this->load->view('admin/login');
  }

  public function dashboard() {
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('admin');
    }
    $data['title'] = 'Admin Dashboard';
    $data['kos'] = $this->Kos_model->get_all_kos();
    $data['user'] = $this->User_model->get_all_users();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }

  public function form_kos($id = null) {
    if (!$this->session->userdata('admin_logged_in')) redirect('admin');

    $data['title'] = 'Form Kos';
    $data['kos'] = $id ? $this->Kos_model->get_kos_by_id($id) : null;
    $this->load->view('template/header', ['title' => 'Form Kos']);
    $this->load->view('template/navbar');
    $this->load->view('admin/form_kos', $data);
    $this->load->view('template/footer');
  }

  public function manage_users() {
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('admin');
    }
    $data['title'] = 'Manage Users';
    $data['user'] = $this->User_model->get_all_users();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('admin/manage_users', $data);
    $this->load->view('template/footer');
  }

  public function delete_user($id) {
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('admin');
    }
    if ($this->User_model->delete_user($id)) {
      $this->session->set_flashdata('success', 'User deleted successfully.');
    } else {
      $this->session->set_flashdata('error', 'Failed to delete user.');
    }
    redirect('admin/manage_users');
  }
}