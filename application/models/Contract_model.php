<?php
class Contract_model extends CI_Model {
    public function __construct(){
            $this->load->database();
    }
    public function getContractById($id){
        $this->db->select('contractid, details, customerid');
        $this->db->from('contract');
        $this->db->where('contractid',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getContractByCusId($id){
        $this->db->select('contractid, details, customer.customerid');
        $this->db->from('contract');
        $this->db->join('customer', 'customer.customerid = contract.customerid');
        $this->db->where('contract.customerid',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllContracts(){
        $this->db->select('contractid, details, customerid');
        $this->db->from('contract');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateContract($insert){
        $kid = $insert['kid'];
        $aid = $insert['aid'];
        $details = $insert['details'];
        $this->db->where('contractid', $insert['aid']);
        $insert = array(
            'contractid' => $aid,
            'customerid' => $kid,
            'details' => $details,
        );
        
        
        $this->db->update('contract',$insert);
    }
    public function saveContract($insert){
        $this->db->insert('contract',$insert);
    }
}