<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
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
        $this->load->model('m_dashboard');
    }


    // data seluruh jenis pelayanan/surat
    public function index()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
          $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['surat'] = $this->m_penduduk->tampil_data('jenis_pelayanan');
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/surat/data_surat', $data);
        $this->load->view('template/footer');
    }

    // tambah data jenis pelayanan
    public function tambah()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
          $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/surat/tambah_surat');
        $this->load->view('template/footer');
    }

    // menggunakan form validation nama pelayanan agar masuk db
     public function tambahdata()
    {
        $this->form_validation->set_rules('nama_pelayanan', 'Nama Pelayanan', 'required');

        //jika kosong makan kembali ke tambah jenis pelayanan/tambah surat
        if ($this->form_validation->run() == FALSE) {
			$data['pelayanan'] = $this->m_dashboard->notif();
			$data['admin'] = $this->db->get_where('admin', ['nik' =>
			$this->session->userdata('ses_id')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/surat/tambah_surat', $data);
			$this->load->view('template/footer');
       } 
       //jika benar maka masuk db
    else {
        $nama_pelayanan = $this->input->post('nama_pelayanan');
            $syarat1 = $this->input->post('syarat1');
            $syarat2 = $this->input->post('syarat2');
            $syarat3 = $this->input->post('syarat3');
            $syarat4 = $this->input->post('syarat4');
            
            $data = array(
                'nama_pelayanan' => $nama_pelayanan,
                'syarat1' => $syarat1,
                'syarat2'=> $syarat2,
                'syarat3'=> $syarat3,
                'syarat4'=> $syarat4

            );
            $this->m_penduduk->input_data($data, 'jenis_pelayanan');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');

            redirect('surat');
        
        
    }
}

// halaman edit jenis pelayanan
    function edit($id_jenis)
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
          $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
    
        $where = array('id_jenis' => $id_jenis);
        $data['surat'] = $this->m_penduduk->edit_data($where, 'jenis_pelayanan')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/surat/edit_surat', $data);
        $this->load->view('template/footer');
    }

    // mengubah data yang sudah masuk db
    public function update()
    {
           $id_jenis = $this->input->post('id_jenis');
        $nama_pelayanan = $this->input->post('nama_pelayanan');
        
        $syarat1 = $this->input->post('syarat1');
        $syarat2 = $this->input->post('syarat2');
        $syarat3 = $this->input->post('syarat3');
        $syarat4 = $this->input->post('syarat4');
     

        $this->db->set('syarat1', $syarat1);
        $this->db->set('syarat2', $syarat2);
        $this->db->set('syarat3', $syarat3);
        $this->db->set('syarat4', $syarat4);

        $this->db->set('nama_pelayanan', $nama_pelayanan);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('jenis_pelayanan');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
            redirect('surat');
    }

    // menghapus data jenis pelayanan
        function hapus($id_jenis)
    {
        $where = array('id_jenis' => $id_jenis);
        $this->m_penduduk->hapus_data($where, 'jenis_pelayanan');
        $error = $this->db->error();
         if ($error['code'] != 0) {
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
            redirect('surat');
        } else {

            $this->session->set_flashdata('primary', 'Data Terhapus.');
          redirect('surat');
        }
    }

}



