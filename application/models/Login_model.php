<?php
class Login_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function getLogin($user){
			$this->db->where('username', $user);
			$this->db->from('user');
			$query = $this->db->get();
			
			return $query->result();
		}
}