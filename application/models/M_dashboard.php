<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_dashboard extends CI_Model
    {
public function count()
        {
            $laki = $this->db->query("SELECT * FROM masyarakat WHERE jenis_kelamin='Laki-laki'")->num_rows();
            $pelayanan = $this->db->get('pelayanan')->num_rows();
  
            $count = [
                'masyarakat' => $laki,
                'pelayanan' => $pelayanan,
            ];
            return $count;
        }

        public function count_perempuan()
        {
           $perempuan = $this->db->query("SELECT * FROM masyarakat WHERE jenis_kelamin='Perempuan'")->num_rows();
  
            $count = [
                'masyarakat' => $perempuan,
            ];
            return $count;
        }
        public function notif()
        {
           $pelayanan = $this->db->query("SELECT * FROM pelayanan WHERE status_p='Diproses'")->num_rows();
  
            $count = [
                'pelayanan' => $pelayanan,
            ];
            return $count;
        }

        public function count_masyarakat()
        {
            $masyarakat = $this->db->get('masyarakat')->num_rows();
  
            $count = [
                'masyarakat' => $masyarakat,
            ];
            return $count;
        }


        public function Jum_agama()
        {
            $this->db->group_by('agama');
            $this->db->select('agama');
            $this->db->select("count(*) as total");
            return $this->db->from('masyarakat')
              ->get()
              ->result();
        }
		public function Jum_kelamin()
        {
            $this->db->group_by('jenis_kelamin');
            $this->db->select('jenis_kelamin');
            $this->db->select("count(*) as total");
            return $this->db->from('masyarakat')
              ->get()
              ->result();
        }
        public function Jum_pekerjaan()
        {
            $this->db->group_by('pekerjaan_id');
            $this->db->select('pekerjaan_id');
            $this->db->select("count(*) as total");
            return $this->db->from('masyarakat')
              ->get()
              ->result();
        }
    
		public function get_all_count()       
		{
			$kartu_keluarga = $this->db->get('kartu_keluarga')->num_rows();
			$jenis_pelayanan = $this->db->get('jenis_pelayanan')->num_rows();

	
	
			$count = [
				'kartu_keluarga' => $kartu_keluarga,
				'jenis_pelayanan' => $jenis_pelayanan,

				
			];
			return $count;
		}
    }
