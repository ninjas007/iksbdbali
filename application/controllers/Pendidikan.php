<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Pendidikan';
        $page = 0;
        $limit = 100;

        // query select data pendidikan
        $data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan ORDER BY id DESC LIMIT $page, $limit")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendidikan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah pendidikan';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendidikan/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pendidikan';
        $data['pendidikan'] = $this->db->get_where('pendidikan', ['id' => $id])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendidikan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function save()
    {
        // validasi input
        $this->form_validation->set_rules('nama', 'Nama Pendidikan', 'required|trim');

        // tambah data
        if ($this->input->post('is_tambah')) {
            $this->db->insert('pendidikan', [
                'nama' => $this->input->post('nama')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('pendidikan');
        } 
        // update data
        else {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('pendidikan', [
                'nama' => $this->input->post('nama')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengupdate data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('pendidikan');
        }
    }

    public function delete($id)
    {
        $this->db->delete('pendidikan', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('pendidikan');
    }
}