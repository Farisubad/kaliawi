<?php
defined('BASEPATH') or exit('No direct script access allowed');

class D_layanan extends CI_Controller
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

    // menampilkan seluruh data jenis pelayanan di masyarakat
    // public function index()
    // {       $data['users'] = $this->db->get_where('masyarakat', ['nik' =>
    //     $this->session->userdata('ses_id')])->row_array();
    //      $data['user'] = $this->db->get_where('admin', ['nik' =>
    //     $this->session->userdata('ses_id')])->row_array();
    //     $data['data_permohonan'] = $this->m_penduduk->tampil_data('jenis_pelayanan');
    //     $this->load->view('template/header');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('template/topbar', $data);
    //     $this->load->view('masyarakat/m_permohonan/data_mpermohonan', $data);
    //     $this->load->view('template/footer');
    // }

    public function index()
    {       $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
       $this->session->userdata('ses_id')])->row_array();
       $data['user'] = $this->db->get_where('admin', ['id_a' =>
       $this->session->userdata('ses_id')])->row_array();
         $data['data_permohonan'] = $this->m_penduduk->tampil_data('jenis_pelayanan');
         $this->load->view('template/header');
         $this->load->view('template/sidebar');
         $this->load->view('template/topbar', $data);
         $this->load->view('masyarakat/m_layanan/data_layanan', $data);
         $this->load->view('template/footer');
     }

    //download file 
		public function aksi_download($file)
		{
	
			force_download('assets/file/' . $file, NULL);
		}

}



