<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('pagination');
    
        $limit = 10;
        $offset = html_escape($this->input->get('per_page') ?? 0);

        $config['base_url'] = site_url('/blog');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->db->query("SELECT * FROM berita WHERE status = 1")->num_rows();
        $config['per_page'] = $limit;
        // $config['use_page_numbers'] = TRUE;

        // Custom pagination HTML
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '&lt;&lt;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        $year = htmlspecialchars($this->input->get('year')) ?? null;
        $month = htmlspecialchars($this->input->get('month')) ?? null;
        $search = htmlspecialchars($this->input->get('search')) ?? null;

        $this->db->select('berita.*, user.name as author');
        $this->db->from('berita');
        $this->db->join('user', 'berita.author_id = user.id');
        $this->db->where('status', 1);

        if (!empty($year) && !empty($month)) {
            $month = $this->getMonthFromString($month);

            if ($month != '') {
                $this->db->where('YEAR(created_at)', $year);
                $this->db->where('MONTH(created_at)', $month);
            } else {
                $this->load->view('frontend/404');
                return;
            }
        }

        if (!empty($search)) {
            $this->db->like('judul', $search);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $berita = $this->db->get()->result();


        $data['title'] = 'Daftar Berita';

        // query select data Berita
        $data['list_berita'] = $berita;
        $data['recents'] = $this->queryRecents();
        $data['arsip'] = $this->queryArsipGroupByDateAndYear();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/templates/footer');
    }

    public function detail($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('status', 1);
        $berita = $this->db->get('berita')->row();
        
        $data['berita'] = $berita ?? (object)[];

        if (empty($data['berita'])) {
            $this->load->view('frontend/404');
            return;
        }

        $data['recents'] = $this->queryRecents();
        $data['arsip'] = $this->queryArsipGroupByDateAndYear();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/single', $data);
        $this->load->view('frontend/templates/footer');
    }

    private function queryRecents()
    {
        return $this->db->query("SELECT * FROM berita WHERE status = 1 ORDER BY id DESC LIMIT 4")->result();
    }

    private function queryArsipGroupByDateAndYear()
    {
        $query = "SELECT 
            YEAR(created_at) as year, 
            DATE_FORMAT(created_at, '%M') as month, 
            COUNT(*) as total 
        FROM berita 
        WHERE status = 1
        GROUP BY year, 
        month
        ORDER BY 
            year DESC, 
            month DESC";

        return $this->db->query("$query")->result();
    }

    private function getMonthFromString(string $key)
    {
        $months = [
            'January' => '01',
            'February' => '02',
            'March' => '03',
            'April' => '04',
            'May' => '05',
            'June' => '06',
            'July' => '07',
            'August' => '08',
            'September' => '09',
            'October' => '10',
            'November' => '11',
            'December' => '12'
        ];

        return $months[ucfirst($key)] ?? '';
    }
}