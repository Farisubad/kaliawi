<?php
class Login_model extends CI_Model{
    //cek nik dan password admin
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
    //cek nim dan password masyarakat
    function auth_masyarakat($username,$password){
        $query=$this->db->query("SELECT * FROM masyarakat WHERE nik='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
}
