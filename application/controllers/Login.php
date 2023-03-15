<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
        $this->load->view('login');
    }

    function auth()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $cek_admin = $this->login_model->auth_admin($username, $password);

        if ($cek_admin->num_rows() > 0) { //jika login sebagai admin
            $data = $cek_admin->row_array();
            $this->session->set_userdata('masuk', TRUE);
            if ($data['level'] == 'admin') { //Akses admin
                $this->session->set_userdata('akses', 'admin');
                $this->session->set_userdata('ses_id', $data['id_a']);
				$this->session->set_userdata('ses_nik', $data['nik']);
                $this->session->set_userdata('ses_nama', $data['nama_admin']);
                redirect('dashboard');
            }
        } else { //jika login sebagai masyarakat
            $cek_masyarakat = $this->login_model->auth_masyarakat($username, $password);
            if ($cek_masyarakat->num_rows() > 0) {
                $data = $cek_masyarakat->row_array();
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('akses', 'masyarakat');
                $this->session->set_userdata('ses_id', $data['id_m']);
                $this->session->set_userdata('ses_nik', $data['nik']);
                $this->session->set_userdata('ses_ma', $data['m_id']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $this->session->set_userdata('ses_kk_id', $data['kk_id']);
                // var_dump($data);
                redirect('dashboard');
            } else {

                $url = base_url();
                echo $this->session->set_flashdata('danger', 'Username Atau Password Salah');
                redirect($url);
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}
