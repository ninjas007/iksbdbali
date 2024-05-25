<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar member';
        // $page = 0;
        // $limit = 100;

        $sql = "SELECT m.*, p.nama AS nama_pendidikan,
                    (SELECT nama 
                        FROM members 
                        WHERE id = m.pasangan_id) AS nama_pasangan,
                    (SELECT count(id) 
                        FROM members_anak ma WHERE ma.orang_tua_id = m.id) 
                        AS jml_anak
                FROM members m
                JOIN pendidikan p ON p.id = m.pendidikan_id
                WHERE m.is_anggota = 1 
                ORDER BY m.id DESC;";

        // query select data member
        $data['member'] = $this->db->query($sql)->result_array();

        // load datatable untuk daftar member untuk datatable library
        $data['links'] = [
			'<link href="' . base_url('assets/') . 'vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">'
		];

        // load script bantuan untuk datatable library
		$data['scripts'] = [
			'<script src="' . base_url('assets/') . 'vendor/datatables/jquery.dataTables.min.js"></script>',
			'<script src="' . base_url('assets/') . 'vendor/datatables/dataTables.bootstrap4.min.js"></script>'
		];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah member';

        // query select pendidikan
        $data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan")->result_array();

        // load script bantuan untuk datatable library
		$data['scripts'] = [
            '<script src="' . base_url('assets/') . 'js/member.js?v=' . time() . '"></script>',
		];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        // simpan data untuk menghapus pasangan dan anak
        $result = $this->db->get_where('members', ['id' => $id])->row_array();

        if ($result) {
        
            // Start transaction
            $this->db->trans_start();
        
            // Hapus data member
            $this->db->where('id', $id);
            $this->db->delete('members');
        
            // Hapus pasangan berdasarkan id yang dihapus
            $this->db->where('pasangan_id', $id);
            $this->db->delete('members');
        
            // Hapus anak-anak berdasarkan id yang dihapus
            $this->db->where('bapak_id', $id);
            $this->db->delete('members');
        
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
        
            // Redirect ke halaman member
            return redirect('member');
        } else {
            // Jika tidak ada hasil yang ditemukan, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ditemukan.</div>');
            return redirect('member');
        }
    }

    public function save()
    {
        $request = $this->input->post();

        $datamember = [
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
            'is_anggota' => 1
        ];

        // Start transaction
        $this->db->trans_start();

        $this->db->insert('members', $datamember);
        $resultId = $this->db->insert_id();

        // kalau status kawin dan ada nama pasangan
        if ($request['status'] == 'Kawin' && $request['namaPasangan'] != null && $resultId != null) {
            $ibuId = $this->insertPasangan($request, $resultId);

            // update status pasangan di table member
            $this->db->where('id', $resultId);
            $this->db->update('members', ['pasangan_id' => $ibuId]);
        }

        // kalau nama anak tidak kosong dan ada ibunya
        if (isset($request['namaAnak']) && $request['namaAnak'] != null && $ibuId != null) {
            $this->insertAnak($request, $resultId);
        }

        // Commit transaction
        $this->db->trans_complete();

        // Periksa apakah transaksi berhasil dilakukan
        if ($this->db->trans_status() === FALSE) {
            // Jika transaksi gagal, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan, Silakan Coba Lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');

          redirect('member');
        } else {
            // Jika transaksi berhasil, tampilkan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');

            redirect('member');
        }
    }

    public function insertPasangan($request, $pasanganId)
    {
        $dataPasangan = [
            'nama' => $request['namaPasangan'],
            'tempat_lahir' => $request['tempatLahirPasangan'],
            'tanggal_lahir' => $request['tanggalLahirPasangan'],
            'jenis_kelamin' => $request['jenisKelaminPasangan'],
            'agama' => $request['agamaPasangan'],
            'nomor_hp' => $request['nomorHpPasangan'],
            'alamat_asal' => $request['alamatAsalPasangan'],
            'alamat_domisili' => $request['alamatDomisiliPasangan'],
            'pekerjaan' => $request['pekerjaanPasangan'],
            'alamat_tempat_kerja' => $request['alamatTempatKerjaPasangan'],
            'pendidikan_id' => $request['pendidikanTerakhirPasangan'],
            'pendidikan_jurusan' => $request['jurusanPasangan'],
            'hobi' => $request['hobiPasangan'],
            'status' => 'Kawin',
            'pasangan_id' => $pasanganId
        ];

        // Ubah data ke dalam format SQL
        $columns = implode(", ", array_keys($dataPasangan));
        $values = "'" . implode("', '", $dataPasangan) . "'";

        $this->db->query("INSERT INTO members ($columns) VALUES ($values)");

        return $this->db->insert_id();
    }

    public function insertAnak($request, $orangTuaId)
    {
        $dataAnak = [];
        for ($i = 0; $i < count($request['namaAnak']); $i++) {
            $dataAnak[] = [
                'nama' => $request['namaAnak'][$i],
                'tempat_lahir' => $request['tempatLahirAnak'][$i],
                'tanggal_lahir' => $request['tanggalLahirAnak'][$i],
                'jenis_kelamin' => $request['jenisKelaminAnak'][$i],
                'agama' => $request['agamaAnak'][$i],
                'alamat_domisili' => $request['alamatDomisiliAnak'][$i],
                'pendidikan_id' => $request['pendidikanTerakhirAnak'][$i],
                'pendidikan_jurusan' => $request['jurusanAnak'][$i],
                'orang_tua_id' => $orangTuaId,
            ];
        }

        $this->db->insert_batch('members_anak', $dataAnak);

        return true;
    }
}