<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('session');
    $this->load->helper('url');
  }

  public function login() {
    if ($this->input->post()) {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->User_model->get_by_email($email);

      if ($user && password_verify($password, $user->password)) {
        $this->session->set_userdata([
          'user_id' => $user->id,
          'name' => $user->name,
          'role' => $user->role,
          'email' => $user->email,
          'logged_in' => true
        ]);
        redirect(base_url());
      } else {
        $this->session->set_flashdata('error', 'Email atau password salah');
      }
    }
    $this->load->view('template/header', ['title' => 'Login']);
    $this->load->view('template/navbar');
    $this->load->view('auth/login');
    $this->load->view('template/footer');
  }

  public function register() {
    if ($this->input->post()) {
      $data = [
        'email' => $this->input->post('email'),
        'name' => $this->input->post('name'),
        'role' => $this->input->post('role'),
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
      ];
      $this->User_model->insert($data);
      redirect('login');
    }
    $this->load->view('template/header', ['title' => 'Daftar']);
    $this->load->view('template/navbar');
    $this->load->view('auth/register');
    $this->load->view('template/footer');
  }

  public function logout() {
    // Destroy the session to log out the user  
    $this->session->sess_destroy();
    redirect(base_url());
  }
}