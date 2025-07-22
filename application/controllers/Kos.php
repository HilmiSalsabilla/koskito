<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Kos_model');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['title'] = 'Daftar Kos';
    $data['kos_list'] = $this->Kos_model->get_all_kos();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('kos/index', $data);
    $this->load->view('template/footer');
  }

  public function search() {
    $keyword = $this->input->get('keyword');
    $data['kos_list'] = $this->Kos_model->search_kos($keyword);
    $data['title'] = 'Hasil Pencarian Kos';
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('kos/search_results', $data);
    $this->load->view('template/footer');
  }

  public function detail($id) {
    $data['kos'] = $this->Kos_model->get_kos_by_id($id);
    if (empty($data['kos'])) {
      show_404();
    }
    $data['title'] = 'Detail Kos';
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar');
    $this->load->view('kos/detail', $data);
    $this->load->view('template/footer');
  }

  public function view($id) {
    $data['kos'] = $this->Kos_model->get_kos_by_id($id);
    if (empty($data['kos'])) {
      show_404();
    }
    $this->load->view('kos/view', $data);
  }

}