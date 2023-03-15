<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->load->model('m_penduduk');
        $this->load->model('m_dashboard');
        

    }

     public function index()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
        $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['penduduk'] = $this->m_penduduk->tampil_penduduk();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('admin/cetak/cetak_penduduk', $data);
        $this->load->view('template/footer');
    }

    public function pelayanan()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['surat'] = $this->m_penduduk->tampil_data('jenis_pelayanan');
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('admin/cetak/laporan_pelayanan', $data);
        $this->load->view('template/footer');
    }


    public function cetak_pdf()
    {
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['cetak_p'] = $this->m_penduduk->tampil_penduduk();
       $this->load->library('Pdf');
        $this->pdf->generate('admin/cetak/laporan_penduduk', $data, 'Data Laporan Penduduk', 'A4', 'landscape');
    }

    public function cetak_datapelayanan()
    {
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['cetak_p'] = $this->m_penduduk->cetak_pelayanan();
       $this->load->library('Pdf');
        $this->pdf->generate('admin/cetak/cetak_pelayanan', $data, 'Data Laporan Pegajuan', 'A4', 'landscape');
    }

    public function cetaktgl() {

        $this->load->library('Pdf');
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

        $data['cetak_p'] = $this->m_penduduk->tampil_by_date($tgl_awal, $tgl_akhir);  

        $this->pdf->generate('admin/cetak/cetak_pelayanan', $data, 'Data Laporan Pegajuan', 'A4', 'landscape');
    }

    public function cetak_persurat($id_jenis) {
        $data['nama_pelayanan'] = $this->db->get_where('jenis_pelayanan', ['id_jenis' =>
        $id_jenis])->row_array();

        $this->load->library('Pdf');
        $user = array('id_jenis' => $id_jenis);
   
        $data['pelayanan'] = $this->m_penduduk->cetak_pelayanansurat($user);


        $this->pdf->generate('admin/cetak/laporanpersurat', $data, 'Data Laporan Pegajuan', 'A4', 'potrait');
    }



  

}
