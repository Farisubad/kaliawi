<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}
		$this->load->model('M_penduduk');
	}


	// menampilakan seluruh data permohonan di masyarakat
	public function index()
	{
		// $data['pelayanan'] = $this->m_dashboard->notif();
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
		$this->session->userdata('ses_id')])->row_array();
		$where = $this->session->userdata('ses_id');
		$data['mpelayanan'] = $this->M_penduduk->pelayanan_penduduk($where);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar', $data);
		$this->load->view('masyarakat/m_pelayanan/data_mpelayanan', $data);
		$this->load->view('template/footer');
	}

	// menambah pengajuan layanan
	public function tambah()
	{
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['jenis_surat'] = $this->M_penduduk->get('jenis_pelayanan');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar', $data);
		$this->load->view('masyarakat/m_pelayanan/tambah_mpelayanan');
		$this->load->view('template/footer');
	}

	//  tambah data ke dalam db dengan form validation
	public function tambahdata()
	{

		$id_pelayanan = $this->input->post('id_pelayanan');
		$jenis_id = $this->input->post('jenis_id');
		$syarat = $_FILES['syarat'];
		if ($syarat = '') {
		} else {
			$config['upload_path'] = './assets/file';
			$config['allowed_types'] = 'pdf';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('syarat')) {
				$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Gagal File Tidak PDF!');
				$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
				$this->session->userdata('ses_id')])->row_array();
				$data['jenis_surat'] = $this->M_penduduk->get('jenis_pelayanan');
				// var_dump($data);
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('template/topbar', $data);
				$this->load->view('masyarakat/m_pelayanan/tambah_mpelayanan', $data);
				$this->load->view('template/footer');
				//die();
			} else {
				$syarat = $this->upload->data('file_name');
				$data = array(
					'm_id' => $this->session->userdata('ses_id'),
					'tanggal_pelayanan' => date('Y-m-d'),
					'jenis_id' => $jenis_id,
					'status_p' => 'Diproses',
					'a_id' => '1',
					'syarat' => $syarat

				);


				$this->M_penduduk->input_data($data, 'pelayanan');
				$this->session->set_flashdata('succses', 'Tambah Data Berhasil.');
				// var_dump($data);
				redirect('permohonan');
			}
		}
	}

	public function aksi_download($file)
	{

		force_download('assets/file/' . $file, NULL);
	}
}
