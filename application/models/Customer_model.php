<?php
class Customer_model extends CI_Model {
        public function __construct(){
                $this->load->database();
        }
		public function add($insert){
            $this->db->insert('customer',$insert);
            $insertid = $this->db->insert_id();
            return  $insertid;
        }
        public function getCustomerById($id){
            $this->db->select('customerid, surname, firstname, gender');
            $this->db->from('customer');
            $this->db->where('customerid',$id);
            $result = $this->db->get();
            return $result->result();
        }
        public function getCustomersBySurname($surname){
            $this->db->select('customerid, surname, firstname, gender');
            $this->db->from('customer');
            $this->db->like('surname',$surname,'both');
            $result = $this->db->get();
            return $result->result();
        }
        public function update($insert){
            /*$s = $insert['surname'];
            $f = $insert['firstname'];
            $g = $insert['gender'];
            $this->db->where('customerid', $insert['id']);
            $insert = array(
                'surname' => $s,
                'firstname' => $f,
                'gender' => $g,
            );
            */
            $this->db->where('customerid', $insert['id']);
            $insert = array(
                'surname' => $insert['surname'],
                'firstname' => $insert['firstname'],
                'gender' => $insert['gender'],
            );
            $this->db->update('customer',$insert);
        }
        public function deleteCustomerById($id){
            $this->db->delete('customer', array('customerid' => $id['id'])); 
        }

}