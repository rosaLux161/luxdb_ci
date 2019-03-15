<?php
class Customer_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function saveCustomer($insert){
            /*$insert = array(
                'surname' -> $surname,
                'firstname' -> $firstname,
                'gender' -> $gender
            );*/
            $this->db->insert('customer',$insert);
            $insertid = $this->db->insert_id();
            return  $insertid;
        }
        public function updateCustomer($insert){
            $s = $insert['surname'];
            $f = $insert['firstname'];
            $g = $insert['gender'];
            $this->db->where('customerid', $insert['id']);
            $insert = array(
                'surname' => $s,
                'firstname' => $f,
                'gender' => $g,
            );
            
            
            $this->db->update('customer',$insert);
        }
        public function deleteCustomerById($id){
            $this->db->delete('customer', array('customerid' => $id['id'])); 
        }
        public function getCustomerBySurname($surname){
            $this->db->select('customerid, surname, firstname, gender');
            $this->db->from('customer');
            $this->db->like('surname',$surname,'both');
            $query = $this->db->get();
            return $query->result();
        }
        public function getCustomerById($id){
            $this->db->select('customerid, surname, firstname, gender');
            $this->db->from('customer');
            $this->db->where('customerid',$id);
            $query = $this->db->get();
            return $query->result();
        }
}