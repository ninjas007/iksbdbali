<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    private function queryGetData()
    {
        $sql = "SELECT m.*, p.nama AS nama_pendidikan,
                    (SELECT count(id) 
                        FROM anggota_anak ma WHERE ma.orang_tua_id = m.id) 
                        AS jml_anak
                FROM anggota m
                JOIN pendidikan p ON p.id = m.pendidikan_id
                ORDER BY m.id DESC;";

        // query select data anggota
        return $this->db->query($sql)->result_array();
    }

    public function index()
    {
        $data['title'] = 'Daftar anggota';
        $data['page'] = 'anggota';

        $data['anggota'] = $this->queryGetData();

        // load datatable untuk daftar anggota untuk datatable library
        $data['links'] = [
			'<link href="' . base_url('assets/') . 'vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">'
		];

        // load script bantuan untuk datatable library
		$data['scripts'] = [
			'<script src="' . base_url('assets/') . 'vendor/datatables/jquery.dataTables.min.js"></script>',
			'<script src="' . base_url('assets/') . 'vendor/datatables/dataTables.bootstrap4.min.js"></script>',
			'<script src="' . base_url('assets/') . 'js/dataTables.js"></script>'
		];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah anggota';

        // query select pendidikan
        $data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan")->result_array();

        // load script bantuan untuk datatable library
		$data['scripts'] = [
            '<script src="' . base_url('assets/') . 'js/anggota.js?v=' . time() . '"></script>',
		];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit anggota';

        $data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE id = $id")->row_array();
        $data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan")->result_array();
        $data['anak'] = $this->db->query("SELECT * FROM anggota_anak WHERE orang_tua_id = $id")->result_array();

        // load script bantuan untuk datatable library
        $data['scripts'] = [
            '<script src="' . base_url('assets/') . 'js/anggota.js?v=' . time() . '"></script>',
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        // simpan data untuk menghapus pasangan dan anak
        $result = $this->db->get_where('anggota', ['id' => $id])->row_array();

        if ($result) {
            // Start transaction
            $this->db->trans_start();
        
            // Hapus data anggota
            $this->db->where('id', $id);
            $this->db->delete('anggota');
        
            // Hapus anak-anak berdasarkan id yang dihapus
            $this->db->where('orang_tua_id', $id);
            $this->db->delete('anggota_anak');
        
            // Commit transaction
            $this->db->trans_complete();
        
            // Periksa apakah transaksi berhasil dilakukan
            if ($this->db->trans_status() === FALSE) {
                // Jika transaksi gagal, tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data. Silakan coba lagi.</div>');
            } else {
                // Jika transaksi berhasil, tampilkan pesan sukses
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data.</div>');
            }
        
            // Redirect ke halaman anggota
            return redirect('anggota');
        } else {
            // Jika tidak ada hasil yang ditemukan, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ditemukan.</div>');
            return redirect('anggota');
        }
    }

    public function save()
    {
        $request = $this->input->post();

        // Start transaction
        $this->db->trans_start();

        // save data diri
        $dataDiriId = $this->saveDataDiri($request);

        // save data anak
        $dataAnak = $this->saveAnak($request, $dataDiriId);

        // Commit transaction
        $this->db->trans_complete();

        // Periksa apakah transaksi berhasil dilakukan
        if ($this->db->trans_status() === FALSE || $dataAnak == 0) {
            // Jika transaksi gagal, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan, Silakan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');

          redirect('anggota');
        } else {
            // Jika transaksi berhasil, tampilkan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');

            redirect('anggota');
        }
    }

    private function saveDataDiri($request)
    {
        $dataAnggota = [
            'nama' => $request['nama'],
            'tempat_lahir' => $request['tempatLahir'],
            'tanggal_lahir' => $request['tanggalLahir'],
            'jenis_kelamin' => $request['jenisKelamin'],
            'agama' => $request['agama'],
            'nomor_hp' => $request['nomorHp'],
            'alamat_asal' => $request['alamatAsal'],
            'alamat_domisili' => $request['alamatDomisili'],
            'pekerjaan' => $request['pekerjaan'],
            'alamat_tempat_kerja' => $request['alamatTempatKerja'],
            'pendidikan_id' => $request['pendidikan'],
            'pendidikan_jurusan' => $request['jurusan'],
            'hobi' => $request['hobi'],
            'status' => $request['status'],
            'nama_pasangan' => $request['namaPasangan']
        ];

        // update data
        if (isset($request['id'])) {
            $setClause = [];
            foreach ($dataAnggota as $column => $value) {
                // Escape values to prevent SQL injection
                $escapedValue = $this->db->escape($value);
                $setClause[] = "$column = $escapedValue";
            }
            
            $setClause = implode(", ", $setClause);
            $id = $request['id'];
            $sql = "UPDATE anggota SET $setClause WHERE id = $id";
            $this->db->query($sql);
        } else {
            $this->db->insert('anggota', $dataAnggota);
            $id = $this->db->insert_id();
        }

        return $id;
    }

    public function saveAnak($request, $orangTuaId)
    {
        // kalau nama kosong atau orang tua id tidak ada
        if ($orangTuaId == null) {
            return 0;
        }

        // kalau update data hapus dulu data anak 
        if (isset($request['id'])) {
            $this->db->where('orang_tua_id', $orangTuaId);
            $this->db->delete('anggota_anak');
        }

        $dataAnak = [];
        for ($i = 0; $i < count($request['namaAnak']); $i++) {
            
            // skip jika tidak ada nama
            if ($request['namaAnak'][$i] == null) {
                continue;
            }

            $dataAnak[] = [
                'nama' => $request['namaAnak'][$i],
                'tempat_lahir' => $request['tempatLahirAnak'][$i],
                'tanggal_lahir' => $request['tanggalLahirAnak'][$i],
                'jenis_kelamin' => $request['jenisKelaminAnak'][$i],
                'agama' => $request['agamaAnak'][$i],
                'orang_tua_id' => $orangTuaId,
            ];
        }

        if (!empty($dataAnak)) {
            $this->db->insert_batch('anggota_anak', $dataAnak);
        }

        return 1;
    }

    public function detail()
    {
        $id = $this->uri->segment(3);

        // check anggota
        $anggota = $this->db->get_where('anggota', ['id' => $id])->row_array();
        if ($anggota == null) {
            redirect(404);
        }

        $anak = $this->db->get_where('anggota_anak', ['orang_tua_id' => $id])->result_array();

        $data = [
            'title' => 'Detail Anggota',
            'anggota' => $anggota,
            'anak' => $anak ?? [],
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/detail', $data);
        $this->load->view('templates/footer');
    }

    public function exportXls()
    {
        $data = $this->queryGetData();

        echo json_encode($data);
    }
}