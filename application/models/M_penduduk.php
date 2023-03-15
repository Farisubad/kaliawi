   <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class M_penduduk extends CI_Model
	{

		public function get_data($table, $data = null, $where = null)
		{
			if ($data != null) {
				return $this->db->get_where($table, $data)->row_array();
			} else {
				return $this->db->get_where($table, $where)->result_array();
			}
		}
		function input_data($data, $table)
		{
			$this->db->insert($table, $data);
		}

		function tampil_data($table)

		{

			return $this->db->get($table)->result_array();
		}

		function edit_data($where, $table)
		{
			return $this->db->get_where($table, $where);
		}
		function edit_profile($where, $table)
		{
			return $this->db->get_where($table, $where);
		}
		function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		function hapus_data($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

		function   getDetail($where)
		{
						$this->db->join('kartu_keluarga k', 'my.kk_id = k.id_kk');
			return $this->db->get_where('masyarakat my', $where)->result_array();
		}


		function tampil_penduduk()
		{
						$this->db->join('kartu_keluarga k', 'my.kk_id= k.id_kk');
			$this->db->order_by('id_kk', 'ASC');
			return $this->db->get('masyarakat my')->result_array();
		}


		function get_nokk($index_data = NULL)
		{

			$this->db->select('kartu_keluarga.*, masyarakat.kk_id AS id_kk, 
			masyarakat.kk_no, 
			masyarakat.nama, 
			masyarakat.alamat,
			masyarakat.tempat_lahir,
			masyarakat.tanggal_lahir,
			masyarakat.jenis_kelamin,
			masyarakat.agama,
			masyarakat.status,
			masyarakat.kedudukan');
			$this->db->join('masyarakat', 'kartu_keluarga.id_kk = masyarakat.id_no');
			$this->db->from('kartu_keluarga');
			if ($index_data != NULL) {
				$this->db->where('masyarakat.kk_id', $index_data);
			}
			$query = $this->db->get();
			return $query->result();
		}
		public function join3table()
		{

			$this->db->select('*');
			$this->db->from('masyarakat');
			$this->db->join('kartu_keluarga', 'kartu_keluarga.no_id = masyarakat.kk_id');
			
			$query = $this->db->get();
			return $query;
		}

		function join2()
		{
			$this->db->select('*');
			$this->db->from('masyarakat');
			$this->db->join('pelayanan', 'masyarakat.nik = pelayanan.nik_m');
			$this->db->join('kartu_keluarga', 'masyarakat.kk_id = kartu_keluarga.id_kk');
			$query = $this->db->get();
			return $query;
		}
		function tampil_pelayanan()
		{
			$this->db->join('jenis_pelayanan j', 'p.jenis_id = j.id_jenis');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			$this->db->where('status_p', 'Diproses');
			$this->db->order_by('id_pelayanan', 'DESC');
			return $this->db->get('pelayanan p')->result_array();
		}

		function cetak_pelayanan()
		{
			$this->db->join('jenis_pelayanan jp', 'p.id_suratpelayanan = jp.id_surat');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			return $this->db->get('pelayanan p')->result_array();
		}

		function cetak_pelayanansurat($user)
		{
			$this->db->join('jenis_pelayanan j', 'p.jenis_id = j.id_jenis');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			return $this->db->get_where('pelayanan p', $user)->result_array();
		}

		public function tampil_by_date($tgl_awal, $tgl_akhir)
		{
			$tgl_awal = $this->db->escape($tgl_awal);
			$tgl_akhir = $this->db->escape($tgl_akhir);
			$this->db->join('jenis_pelayanan j', 'p.jenis_id = j.id_jenis');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			$this->db->where('DATE(tanggal_pelayanan) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
			return $this->db->get('pelayanan p')->result_array(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}

		function pelayanan_penduduk($where)
		{
			$this->db->join('jenis_pelayanan jp', 'p.jenis_id = jp.id_jenis');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			$this->db->where('m_id', $where); 
			return $this->db->get('pelayanan p')->result_array();
		}

		function join2table()
		{
			$this->db->select('*');
			$this->db->from('pelayanan');
			$this->db->join('masyarakat', 'pelayanan.nik_m = masyarakat.nik');
			$this->db->join('jenis_pelayanan', 'pelayanan.jenis_id = jenis_pelayanan.id_jenis');
			$query = $this->db->get();
			return $query;
		}

		function pelayanan_diterima()
		{
			$this->db->join('jenis_pelayanan jp', 'p.jenis_id = jp.id_jenis');
			$this->db->join('masyarakat my', 'p.m_id = my.id_m');
			// $this->db->where('status_p', 'Telah Di Upload');
			return $this->db->get('pelayanan p')->result_array();
		}

		function get($table, $data = null, $where = null)
		{
			if ($data != null) {
				return $this->db->get_where($table, $data)->row_array();
			} else {
				return $this->db->get_where($table, $where)->result_array();
			}
		}

		function cari_kk($cari_kk_)
		{
			return $this->db->get_where('kartu_keluarga', $cari_kk_)->result_array();
		}

		function getDetail_KK($id_kk)
		{
			
			$this->db->join('kartu_keluarga k', 'my.kk_id = k.id_kk');
			return $this->db->get_where('masyarakat my', $id_kk)->result_array();
		}

		function getDetail_($id_kk)
		{

			return $this->db->get_where('kartu_keluarga', $id_kk)->result_array();
		}

		function getDetail_NOKK($id_kk)
		{
			
			$this->db->join('kartu_keluarga k', 'my.kk_id = k.id_kk');
			
			return $this->db->get_where('masyarakat my', $id_kk)->result_array();
		}

		function getDetail__KK($kk_id)
		{

			return $this->db->get('kartu_keluarga', $id_kk)->result_array();
			
		}

		public function downloadSyarat($id)
		{
			$query = $this->db->get_where('pelayanan', array('id_pelayanan' => $id));
			return $query->row_array();
		}
	}
