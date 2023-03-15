<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('m_dashboard');
		$this->load->model('m_penduduk');
    }

    //menampilkan dashboard 
public function index()
	{
		$data['hasil']=$this->m_dashboard->Jum_kelamin();
		$data['jumlah'] = $this->m_dashboard->get_all_count();
		$data['count'] = $this->m_dashboard->count();
		$data['perempuan'] = $this->m_dashboard->count_perempuan();
		$data['masyarakat'] = $this->m_dashboard->count_masyarakat();
		$data['pelayanan'] = $this->m_dashboard->notif();
		 $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('template/topbar', $data);
		$this->load->view('template/index');
		$this->load->view('template/footer');
	}
	
		
}
