<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Berita';
        $page = 0;
        $limit = 100;

        // query select data Berita
        $data['berita'] = $this->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT $page, $limit")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Berita';
        $data['page'] = 'js-berita';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Berita';
        $data['page'] = 'js-berita';
        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/edit', $data);
        $this->load->view('templates/footer');
    }

    private function prosesGambar()
    {
        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['gambar']['name'];
        $namaFile = 'berita-default.png';
        
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/berita/';

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                    
                $namaFile = $this->upload->data('file_name');

                // kalau edit
                if ($this->input->post('is_tambah') == 0) {
                    // hapus gambar
                    $berita = $this->db->get_where('berita', ['id' => $this->input->post('id')])->row_array();
                    if ($berita['gambar'] != 'berita-default.png') {
                        unlink(FCPATH . 'assets/img/berita/' . $berita['gambar']);
                    }
                }

                return [
                    'gambar' => $namaFile,
                    'status' => 1
                ];
            }

            return [
                'gambar' => $namaFile,
                'status' => 2
            ];
        } else {
            if ($this->input->post('is_tambah') == 0) {
                $berita = $this->db->get_where('berita', ['id' => $this->input->post('id')])->row_array();
                $namaFile = $berita['gambar'];
            }
        }

        return [
            'gambar' => $namaFile,
            'status' => 3
        ];
    }

    private function prosesSlug()
    {
        $judul = $this->input->post('judul');
        $slug = url_title($judul, 'dash', true);

        $query = $this->db->get_where('berita', ['slug' => $slug]);
        if ($query->num_rows() > 0) {
            $slug .= '-' . $query->num_rows();
        }

        return $slug;
    }

    public function save()
    {
        // validasi input
        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Berita', 'required|trim');

        $slug = $this->prosesSlug();
        $gambar = $this->prosesGambar();
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $status = $this->input->post('status');

        // tambah data
        if ($this->input->post('is_tambah') == 1) {
            $this->db->insert('berita', [
                'judul' => $judul,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
                'status' => $status,
                'created_at' => date('Y-m-d H:i:s'),
                'gambar' => $gambar['gambar'],
                'author_id' => $this->session->userdata('id')
            ]);

            if ($gambar['status'] == 2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil menambah data, namum foto gagal diproses<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('berita');
            }

        } 
        // update data
        else {
            $this->db->set('judul', $judul);
            $this->db->set('slug', $slug);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('status', $status);
            $this->db->set('updated_at', date('Y-m-d H:i:s'));
            $this->db->set('gambar', $gambar['gambar']);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('berita');

            // gagal update gambar
            if ($gambar['status'] == 2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil mengubah data, namum foto gagal diproses<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('berita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengupdate data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
                redirect('berita');
            }
        }
    }

    public function delete($id)
    {
        $berita = $this->db->get_where('berita', ['id' => $id])->row_array();
        $this->db->delete('berita', ['id' => $id]);
        $numRows = $this->db->affected_rows();

        if ($numRows > 0) {
            // hapus gambar
            if ($berita['gambar'] != 'berita-default.png') {
                unlink(FCPATH . 'assets/img/berita/' . $berita['gambar']);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
        }
        redirect('berita');
    }
}