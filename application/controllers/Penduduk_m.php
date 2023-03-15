<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_m extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('m_penduduk');
    }


    // menampilkan seluruh data kelurga di masyarakat
    public function index()
    {
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['mpenduduk'] = $this->m_penduduk->tampil_penduduk();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar',$data);
        $this->load->view('masyarakat/m_penduduk/data_mpenduduk', $data);
        $this->load->view('template/footer');
    }

}



