<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller
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
        $this->load->model('m_dashboard');
    }

    // menampilkan seluruh data kk
    public function index()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        
        $data['kk'] = $this->M_penduduk->tampil_data('kartu_keluarga');
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kk/data_kk', $data);
        $this->load->view('template/footer');
    }

    // menambahkan kartu keluarga
    public function tambah()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kk/tambah_kk');
        $this->load->view('template/footer');
    }

   
    // tambah data ke db dengan validasi terlebih dahulu
     public function tambahdata()
    {

		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|is_unique[kartu_keluarga.no_kk]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt_rw', 'Rt / Rw', 'required');
		$this->form_validation->set_rules('desa_kelurahan', 'Desa / Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / kota', 'required');
	//jika inputan kosong maka akan kembali menampilkan form tambah kk
        if ($this->form_validation->run() == FALSE) {
			$data['pelayanan'] = $this->m_dashboard->notif();
			$data['admin'] = $this->db->get_where('admin', ['nik' =>
			$this->session->userdata('ses_id')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/kk/tambah_kk', $data);
			$this->load->view('template/footer');
		} 
        // jika benar maka akan menambahman data ke dalam db
        else {
            $no_kk = $this->input->post('no_kk');
            $alamat = $this->input->post('alamat');
            $rt_rw = $this->input->post('rt_rw');
            $desa_kelurahan = $this->input->post('desa_kelurahan');
            $kecamatan = $this->input->post('kecamatan');
			$provinsi = $this->input->post('provinsi');
			$kabupaten_kota = $this->input->post('kabupaten_kota');

            $data = array(
                'no_kk' => $no_kk,
                'alamat'=> $alamat,
                'rt_rw'=> $rt_rw,
                'desa_kelurahan'=> $desa_kelurahan,
                'kecamatan'=> $kecamatan,
                'provinsi'=> $provinsi,
				'kabupaten_kota'=> $kabupaten_kota,

            );
            $this->M_penduduk->input_data($data, 'kartu_keluarga');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
// var_dump($data);
            redirect('kartu_keluarga');
        
    }
}
// menampilkan halaman edit data kk
    function edit($id_kk)
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('id_kk' => $id_kk);
        $data['kk'] = $this->M_penduduk->edit_data($where, 'kartu_keluarga')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kk/edit_kk', $data);
        $this->load->view('template/footer');
    }

    //melakukan update data yang sudah di inputkan kedalam db
    public function update()
    {
        $id_kk = $this->input->post('id_kk');
		$no_kk = $this->input->post('no_kk');
		$alamat = $this->input->post('alamat');
		$rt_rw = $this->input->post('rt_rw');
		$desa_kelurahan = $this->input->post('desa_kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$provinsi = $this->input->post('provinsi');
		$kabupaten_kota = $this->input->post('kabupaten_kota');

		$data = array(
            'no_kk' => $no_kk,
			'alamat'=> $alamat,
			'rt_rw'=> $rt_rw,
			'desa_kelurahan'=> $desa_kelurahan,
			'kecamatan'=> $kecamatan,
			'provinsi'=> $provinsi,
			'kabupaten_kota'=> $kabupaten_kota,

		);
     $where = array(
        'id_kk' => $id_kk
        );
             $this->M_penduduk->update_data($where, $data, 'kartu_keluarga');
            $this->session->set_flashdata('succses', 'Data Berhasil diedit');
// var_dump($data);
            redirect('kartu_keluarga');
        
    }

    //menghapus data kk
        function hapus($id_kk)
    {
        $where = array('id_kk' => $id_kk);
        $this->M_penduduk->hapus_data($where, 'kartu_keluarga');
        $error = $this->db->error();
         if ($error['code'] != 0) {
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
           
            redirect('kartu_keluarga');
        } else {

            $this->session->set_flashdata('primary', 'Data Terhapus.');
         
          redirect('kartu_keluarga');
        }
    }

    // menampilkan detail kartu keluarga(admin)
    public function detail($id_kk)
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('id_kk' => $id_kk);
        $data['detail_kk'] = $this->M_penduduk->getDetail_KK($where);
        $data['detail_'] = $this->M_penduduk->getDetail_($where);
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kk/detail_kk', $data);
        $this->load->view('template/footer');
    }

    // menampilkan detail data keluarga di masyarakat



	public function m_detail()
    {
        $data['pelayanan'] = $this->m_dashboard->notif();
         $data['admin'] = $this->db->get_where('admin', ['id_a' =>
        $this->session->userdata('ses_id')])->row_array();
		$data['users'] = $this->db->get_where('masyarakat', ['id_m' =>
        $this->session->userdata('ses_id')])->row_array();
		$where = array('kk_id' => $this->session->userdata('ses_kk_id'));

        $data['detail_kk'] = $this->M_penduduk->getDetail_NOKK($where);
        $data['detail_'] = $this->db->get_where('kartu_keluarga', ['id_kk' =>
        $this->session->userdata('ses_kk_id')])->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/kk/detail_kk', $data);
        $this->load->view('template/footer');
        // var_dump($data);
    }
    // cetak kartu keluarga
     public function cetak_kk($id_kk)
    {
        $where = array('id_kk' => $id_kk);
        $data['detail_kk'] = $this->M_penduduk->getDetail_KK($where);
       $this->load->library('Pdf');
        $this->pdf->generate('admin/cetak/cetak_kk', $data, 'Data Laporan Anggota Keluarga', 'A4', 'potrait');
    }


}



