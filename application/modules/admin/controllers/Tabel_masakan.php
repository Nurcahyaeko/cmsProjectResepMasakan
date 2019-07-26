<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabel_masakan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_masakan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatabel_masakan=$this->Tabel_masakan_model->get_all();//panggil ke modell
      $datafield=$this->Tabel_masakan_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/tabel_masakan/tabel_masakan_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datatabel_masakan'=>$datatabel_masakan,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'tabel_masakan',
        'controller'=>'tabel_masakan'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/tabel_masakan/tabel_masakan_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_masakan/create_action',
        'module'=>'admin',
        'titlePage'=>'tabel_masakan',
        'controller'=>'tabel_masakan'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tabel_masakan_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/tabel_masakan/tabel_masakan_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_masakan/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'tabel_masakan',
        'controller'=>'tabel_masakan'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_masakan' => $this->input->post('nama_masakan',TRUE),
		'resep_masakan' => $this->input->post('resep_masakan',TRUE),
		'cara_masak' => $this->input->post('cara_masak',TRUE),
		'gambar_masakan' => $this->input->post('gambar_masakan',TRUE),
		'jenis_makanan' => $this->input->post('jenis_makanan',TRUE),
	    );

            $this->Tabel_masakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tabel_masakan'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_masakan', TRUE));
        } else {
            $data = array(
		'nama_masakan' => $this->input->post('nama_masakan',TRUE),
		'resep_masakan' => $this->input->post('resep_masakan',TRUE),
		'cara_masak' => $this->input->post('cara_masak',TRUE),
		'gambar_masakan' => $this->input->post('gambar_masakan',TRUE),
		'jenis_makanan' => $this->input->post('jenis_makanan',TRUE),
	    );

            $this->Tabel_masakan_model->update($this->input->post('id_masakan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tabel_masakan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tabel_masakan_model->get_by_id($id);

        if ($row) {
            $this->Tabel_masakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tabel_masakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tabel_masakan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_masakan', 'nama masakan', 'trim|required');
	$this->form_validation->set_rules('resep_masakan', 'resep masakan', 'trim|required');
	$this->form_validation->set_rules('cara_masak', 'cara masak', 'trim|required');
	$this->form_validation->set_rules('gambar_masakan', 'gambar masakan', 'trim|required');
	$this->form_validation->set_rules('jenis_makanan', 'jenis makanan', 'trim|required');

	$this->form_validation->set_rules('id_masakan', 'id_masakan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
