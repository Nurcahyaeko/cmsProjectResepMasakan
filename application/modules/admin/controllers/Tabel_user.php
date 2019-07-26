<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabel_user extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatabel_user=$this->Tabel_user_model->get_all();//panggil ke modell
      $datafield=$this->Tabel_user_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/tabel_user/tabel_user_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datatabel_user'=>$datatabel_user,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'tabel_user',
        'controller'=>'tabel_user'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/tabel_user/tabel_user_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_user/create_action',
        'module'=>'admin',
        'titlePage'=>'tabel_user',
        'controller'=>'tabel_user'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tabel_user_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/tabel_user/tabel_user_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_user/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'tabel_user',
        'controller'=>'tabel_user'
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
		'username_pengguna' => $this->input->post('username_pengguna',TRUE),
		'email_pengguna' => $this->input->post('email_pengguna',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Tabel_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tabel_user'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_pengguna', TRUE));
        } else {
            $data = array(
		'username_pengguna' => $this->input->post('username_pengguna',TRUE),
		'email_pengguna' => $this->input->post('email_pengguna',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Tabel_user_model->update($this->input->post('id_pengguna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tabel_user'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tabel_user_model->get_by_id($id);

        if ($row) {
            $this->Tabel_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tabel_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tabel_user'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('username_pengguna', 'username pengguna', 'trim|required');
	$this->form_validation->set_rules('email_pengguna', 'email pengguna', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
