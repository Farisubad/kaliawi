<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelayanan extends CI_Controller
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

	// menampilkan seluruh data pelayanan
	public function index()
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['id_a' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['pelayanann'] = $this->m_penduduk->tampil_pelayanan();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/pelayanan/data_pelayanan', $data);
		$this->load->view('template/footer');
	}


	// menampilkan halaman pelayanan diterima/selesai
	public function pelayanan_selesai()
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['id_a' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['pelayanann'] = $this->m_penduduk->pelayanan_diterima();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/pelayanan/pelayanan_diterima', $data);
		$this->load->view('template/footer');
	}

	// menampilkan detail pelayanan yang diajukan msyakrat
	function detail($id_pelayanan)
	{
		$where = array('id_pelayanan' => $id_pelayanan);
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['id_a' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['jenis'] = $this->m_penduduk->get_data('jenis_pelayanan');
		$data['nama'] = $this->m_penduduk->get_data('masyarakat');
		$data['pelayanann'] = $this->m_penduduk->edit_data($where, 'pelayanan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/pelayanan/detail_pelayanan', $data);
		$this->load->view('template/footer');
	}

	// nemapilkan halaman tolak pelayanan
	function ditolak($id_pelayanan)
	{
		$where = array('id_pelayanan' => $id_pelayanan);
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['id_a' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['jenis'] = $this->m_penduduk->get_data('jenis_pelayanan');
		$data['nama'] = $this->m_penduduk->get_data('masyarakat');
		$data['pelayanann'] = $this->m_penduduk->edit_data($where, 'pelayanan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/pelayanan/tolak_pelayanan', $data);
		$this->load->view('template/footer');
	}


	public function balasan()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');
		$balasan = $this->input->post('balasan');

		$this->db->set('balasan', $balasan);
		$this->db->set('a_id', $this->session->userdata('ses_id'));
		$this->db->set('status_p', 'Ditolak');
		$this->db->where('id_pelayanan', $id_pelayanan);
		$this->db->update('pelayanan');
		$this->session->set_flashdata('succses', ' Data Telah Selesai Diproses.');

		redirect('pelayanan');
	}

	// download syarat 
	public function download_syarat($id)
	{
		$this->load->helper('download');
		$fileSyarat = $this->m_penduduk->downloadSyarat($id);
		$file = './assets/file/' . $fileSyarat['syarat'];
		force_download($file, NULL);
	}

	// menampilkan form edit pelayanan
	function edit($id_pelayanan)
	{
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['admin'] = $this->db->get_where('admin', ['id_a' =>
		$this->session->userdata('ses_id')])->row_array();

		$where = array('id_pelayanan' => $id_pelayanan);
		$data['pelayanann'] = $this->m_penduduk->edit_data($where, 'pelayanan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/pelayanan/edit_pelayanan', $data);
		$this->load->view('template/footer');
	}

	// melakukan updata data 
	public function update()
	{
		$id_pelayanan = $this->input->post('id_pelayanan');

		$upload_image = $_FILES['file']['name'];

		if ($upload_image) {
			$config['allowed_types']  = 'pdf';
			$config['max_size']       = 10048;
			$config['upload_path'] = './assets/file';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$old_file = $upload_image['name']['file'];
				if ($old_file != 'default.pdf') {

					unlink(FCPATH . '/assets/file' . $old_file);
				}
				$new_file = $this->upload->data('file_name');
				$this->db->set('file', $new_file);
				$this->db->set('a_id', $this->session->userdata('ses_id'));
				$this->db->set('status_p', 'Telah di Upload');
				$this->db->where('id_pelayanan', $id_pelayanan);
				$this->db->update('pelayanan');
				$this->session->set_flashdata('succses', ' Data Telah Selesai Diproses.');
				// var_dump($upload_image);
				redirect('pelayanan');
			} else {
				$this->session->set_flashdata('danger', ' File gagal uploud harus file PDF.');
				redirect('pelayanan/edit/' . $id_pelayanan);
			}
		}
	}




	// menghapus data pelayanan
	function hapus($id_pelayanan)
	{
		$where = array('id_pelayanan' => $id_pelayanan);
		$this->m_penduduk->hapus_data($where, 'pelayanan');
		$this->session->set_flashdata('primary', 'Data Terhapus.');
		redirect('pelayanan');
	}

	// 
	// public function acc($id_pelayanan)
	// {

	// 	$data = array(

	// 		'status_p' => 'Diproses'
	// 	);

	// 	$where = array(
	// 		'id_pelayanan' => $id_pelayanan
	// 	);

	// 	$this->m_penduduk->update_data($where, $data, 'pelayanan');
	// 	$this->session->set_flashdata('succses', 'Permohonan sedang diproses.');

	// 	redirect('pelayanan/');
	// }

	// public function tolak($id_pelayanan)
	// {

	// 	$data = array(

	// 		'status_p' => 'Ditolak'
	// 	);

	// 	$where = array(
	// 		'id_pelayanan' => $id_pelayanan
	// 	);

	// 	$this->m_penduduk->update_data($where, $data, 'pelayanan');
	// 	$this->session->set_flashdata('succses', 'Permohonan sedang ditolak.');

	// 	redirect('pelayanan/');
	// }

	// menampilkan halaman detail penolakan di masyarakat
	function detail_penolakan($id_pelayanan)
	{
		$where = array('id_pelayanan' => $id_pelayanan);
		$data['pelayanan'] = $this->m_dashboard->notif();
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
		$this->session->userdata('ses_id')])->row_array();
		$data['jenis'] = $this->m_penduduk->get_data('jenis_pelayanan');
		$data['nama'] = $this->m_penduduk->get_data('masyarakat');
		$data['pelayanann'] = $this->m_penduduk->edit_data($where, 'pelayanan')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('masyarakat/m_pelayanan/balasan_pelayanan', $data);
		$this->load->view('template/footer');
	}
}
