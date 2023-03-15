<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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

    public function index()
    {
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['penduduk'] = $this->m_penduduk->getDetail($where);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('masyarakat/profile/profile_masyarakat', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
		
        $where = array('id_m' => $this->session->userdata('ses_id'));
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
		$data['kartu'] = $this->m_penduduk->get_data('kartu_keluarga');
        $data['penduduk'] = $this->m_penduduk->edit_profile($where, 'masyarakat')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('masyarakat/profile/edit_masyarakat', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
		$id_m = $this->input->post('id_m');

            $nik = $this->input->post('nik');
			$kk_id = $this->input->post('kk_id');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $agama = $this->input->post('agama');
			

            $data = array(
				'nik' => $nik,
                'nama' => $nama,
				'kk_id' => $kk_id,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin'=> $jenis_kelamin,
                'agama'=> $agama,
                
                
            );
     $where = array(
		'id_m' => $id_m
        );
             $this->m_penduduk->update_data($where, $data, 'masyarakat');
            $this->session->set_flashdata('succses', 'Data Berhasil diedit');

            redirect('profile');
        
    }

        public function pw_masyarakat()
    {
         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('masyarakat/profile/editpassword',$data);
        $this->load->view('template/footer');
    }

    public function password()
    {
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
		$data['pelayanan'] = $this->m_dashboard->notif();
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/profile/editpw_admin',$data);
        $this->load->view('template/footer');
    }

    public function updatepw_masyarakat()
    {

         $data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();


        $this->form_validation->set_rules('pw_baru','password baru','required');
        $this->form_validation->set_rules('konfir_pw','konfirmasi password','required|matches[pw_baru]');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('masyarakat/profile/editpassword',$data);
            $this->load->view('template/footer');
        } else {
            $password = md5($this->input->post('pw_baru'));
            $data = array(
                'password' => $password,
   
    
            );
    
            $where = array(
                'id_m' => $this->session->userdata('ses_id')
            );


            $this->m_penduduk->update_data($where, $data, 'masyarakat');
            $this->session->set_flashdata('succses', 'Password Berhasil Di Ubah');
            redirect('dashboard');

        }

    }

        public function updatepw_admin()
    {

         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();


        $this->form_validation->set_rules('pw_baru','password baru','required');
        $this->form_validation->set_rules('konfir_pw','konfirmasi password','required|matches[pw_baru]');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/profile/editpw_admin',$data);
            $this->load->view('template/footer');
        } else {
            $password = md5($this->input->post('pw_baru'));
            $data = array(
                'password' => $password,
   
    
            );
    
            $where = array(
                'id_a' => $this->session->userdata('ses_id')
            );


            $this->m_penduduk->update_data($where, $data, 'admin');
            $this->session->set_flashdata('succses', 'Password Berhasil Di Ubah');
            redirect('dashboard');

        }



    }


}
