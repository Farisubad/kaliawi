<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
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

	// menampilkan seluruh data penduduk
	public function index()
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['nik' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['penduduk'] = $this->m_penduduk->tampil_penduduk();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/penduduk/data_penduduk', $data);
		$this->load->view('template/footer');
	}

	// menampilkan form cari kk
	public function tambah()
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['nik' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['kk'] = $this->m_penduduk->get('kartu_keluarga');
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/penduduk/cari_kk', $data);
		$this->load->view('template/footer');
	}

	// mencari data dari db terlebih dahulu 
	public function cari()
	{
		
		$data['admin'] = $this->db->get_where('admin', ['nik' =>
		$this->session->userdata('ses_id')])->row_array();
		$cari_kk_ = $this->input->get('id_kk');
		
		$data['kk'] = $this->db->get_where('kartu_keluarga', ['id_kk' =>
		$cari_kk_])->row_array();

		//jika data kk kosong maka kembali di form cari kk
		if (empty($data['kk'])) {
			$this->session->set_flashdata('danger', 'Data KK Tidak Terdaftar.');
			redirect('penduduk/tambah');
		} 
		// jika benar maka akan menambahkan data penduduk
		else {
			$data['pelayanan'] = $this->m_dashboard->notif();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/penduduk/tambah_penduduk', $data);
			$this->load->view('template/footer');
			// var_dump($data);
		}
	}

	// tambah data ke dalam db dengan form validation
	public function tambahdata()
	{
		$cari_kk_ = $this->input->post('id_kk');

		$data['kk'] = $this->db->get_where('kartu_keluarga',['id_kk'=>
		$cari_kk_])-> row_array();

		$this->form_validation->set_rules('nik', 'nik', 'required|is_unique[masyarakat.nik]');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
		$this->form_validation->set_rules('kedudukan', 'kedudukan', 'required');

		//jika inputan kosong maka akan kembali ke form tambah penduduk
		if ($this->form_validation->run() == FALSE) {
			$data['pelayanan'] = $this->m_dashboard->notif();
			$data['admin'] = $this->db->get_where('admin', ['nik' =>
			$this->session->userdata('ses_id')])->row_array();
			// $data['kk'] = $this->db->get_where('kartu_keluarga', ['id_kk' =>
			// $this->input->post('kk_id')])->row_array();
	// var_dump($data);
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/penduduk/tambah_penduduk', $data);
			$this->load->view('template/footer');
		} 
		// jika benar maka akan menambahkan data ke dalam db
		else {
			// $id_m = $this->input->post('id_m');
			$kk_id = $this->input->post('id_kk');
			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$password = md5($this->input->post('nik'));
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$agama = $this->input->post('agama');
			$status = $this->input->post('status');
			$pekerjaan = $this->input->post('pekerjaan');
			$kedudukan = $this->input->post('kedudukan');

			$data = array(
				// 'id_m' => $id_m,
				'kk_id' => $kk_id,
				'nik' => $nik,
				'nama' => $nama,
				'password' => $password,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' => $agama,
				'status' => $status,
				'pekerjaan' => $pekerjaan,
				'kedudukan' => $kedudukan,
				'level' => 'masyarakat',


			);
			$this->m_penduduk->input_data($data, 'masyarakat');

			$this->session->set_flashdata('primary', 'Data Berhasil Ditambahkan.');
			// var_dump($data);
			redirect('penduduk');
		}
	}

	// menampilkan halaman edit penduduk
	function edit($id_m)
	{
		$data['nama'] = $this->m_penduduk->get_data('masyarakat');
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['nik' =>
		$this->session->userdata('ses_id')])->row_array();
		$where = array('id_m' => $id_m);
		$data['kartu'] = $this->m_penduduk->get_data('kartu_keluarga');
		$data['penduduk'] = $this->m_penduduk->tampil_penduduk();
		$data['penduduk'] = $this->m_penduduk->edit_data($where, 'masyarakat')->result();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/penduduk/edit_penduduk', $data);
		$this->load->view('template/footer');
	} 

	// melakukan update data yang sudah diinputkan kedalam db 
	public function update()
    {
        $id_m = $this->input->post('id_m');
		
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$pekerjaan = $this->input->post('pekerjaan');
		$status = $this->input->post('status');
		$kedudukan = $this->input->post('kedudukan');


		$data = array(
           
			'nik'=> $nik,
			'nama'=> $nama,
			'tempat_lahir'=> $tempat_lahir,
			'tanggal_lahir'=> $tanggal_lahir,
			'jenis_kelamin'=> $jenis_kelamin,
			'agama'=> $agama,
			'pekerjaan'=> $pekerjaan,
			'status'=> $status,
			'kedudukan'=> $kedudukan,
			'level' => 'masyarakat',

		);
     $where = array(
        'id_m' => $id_m
        );
             $this->m_penduduk->update_data($where, $data, 'masyarakat');
            $this->session->set_flashdata('succses', 'Data Berhasil diedit');
//  var_dump($data);
            redirect('penduduk');
        
    }
	

	// menghapus data penduduk
	function hapus($id_m)
	{
		$where = array('id_m' => $id_m);
		$this->m_penduduk->hapus_data($where, 'masyarakat');
		$error = $this->db->error();

		// jika ada data di dalam db maka tidak dapat dihapus
		if ($error['code'] != 0) {
			$this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
			redirect('penduduk');
		} 
		// jika tidak ada maka terhapus
		else {

			$this->session->set_flashdata('primary', 'Data Terhapus.');
			redirect('penduduk');
		}
	}

	// menampilakn detail penduduk 
	public function detail($id_m)
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['nik' =>
		$this->session->userdata('ses_id')])->row_array();
		$where = array('id_m' => $id_m);
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['penduduk'] = $this->m_penduduk->getDetail($where);
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/penduduk/detail_penduduk', $data);
		$this->load->view('template/footer');
	}
}
