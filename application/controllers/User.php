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

  public function pesan($id_kos) {
    if (!$this->session->userdata('logged_in')) redirect('login');
    $kos = $this->Kos_model->get_kos_by_id($id_kos);
    if (!$kos) show_404();

    if ($this->input->post()) {
      $durasi = (int) $this->input->post('durasi');
      $mulai = date('Y-m-d');
      $selesai = date('Y-m-d', strtotime("+{$durasi} months"));
      $kos = $this->Kos_model->get_kos_by_id($id_kos);

      $data = [
        'id_user' => $this->session->userdata('user_id'),
        'id_kos' => $id_kos,
        'id_user_pemilik' => $kos->id_user_pemilik,
        'durasi_sewa' => $durasi,
        'tanggal_mulai' => $mulai,
        'tanggal_selesai' => $selesai,
        'status' => 'pending'
      ];

      $this->Order_model->insert($data);
      redirect('user/riwayat');
    }

    $data['title'] = 'Pesan Kos';
    $data['kos'] = $kos;
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('user/form_pesan', $data);
    $this->load->view('template/footer');
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

  public function upload_bukti($id) {
    if (!$this->session->userdata('logged_in')) redirect('login');

    $order = $this->Order_model->get_by_id($id);
    if (!$order || $order->id_user != $this->session->userdata('user_id')) show_404();

    if ($_FILES && $_FILES['bukti']['name']) {
      $config['upload_path'] = './uploads/bukti/';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 2048;
      $config['file_name'] = 'bukti_' . time();

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('bukti')) {
        $data = $this->upload->data();
        $this->Order_model->upload_bukti($id, $data['file_name']);
        $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diunggah');
        redirect('user/riwayat');
      } else {
        $data['error'] = $this->upload->display_errors();
      }
    }

    $data['order'] = $order;
    $this->load->view('template/header', ['title' => 'Upload Bukti']);
    $this->load->view('template/navbar');
    $this->load->view('user/upload_bukti', $data);
    $this->load->view('template/footer');
  } 

  public function edit_profile() {
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }
    $user = $this->User_model->get_by_id($this->session->userdata('user_id'));
    
    if ($this->input->post()) {
      if (!$this->session->userdata('logged_in')) redirect('login');
    $user = $this->User_model->get_by_id($this->session->userdata('user_id'));
    if ($this->input->post()) {
      $update = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email')
      ];
      $this->User_model->update($user->id, $update);
      redirect('user');
    }
      $data['user'] = $user;
      $this->load->view('template/header', ['title' => 'Edit Profil']);
      $this->load->view('template/navbar');
      $this->load->view('user/edit_profil', $data);
      $this->load->view('template/footer');
    }
  }
}