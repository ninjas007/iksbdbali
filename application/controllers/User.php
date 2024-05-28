<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'masukkan password untuk mengedit data',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            if (!password_verify($this->input->post('password'), $data['user']['password'])) { 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal update data profile</div>');
                redirect('user');   
            }

            $users = $this->db->get_where('user', ['email' => $email])->result_array();

            foreach ($users as $user) {
                if ($user['id'] != $data['user']['id']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email telah terdaftar, gagal update data</div>');
                    redirect('user');  
                }
            }

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
                
        
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file error! please refresh page</div>');
                    redirect('user');
                }
            }

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->where('id', $data['user']['id']);
            $this->db->update('user');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];

            $this->session->set_userdata($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
}
