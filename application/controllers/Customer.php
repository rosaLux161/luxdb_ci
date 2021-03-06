<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    ############################################
    #   Methode zum Hinzufügen eines Kunden
    ############################################
    public function add($site = ""){
        if(strcmp($site, "sent") == 0){
            $this->load->model('customer_model');
            $customerid = $this->customer_model->add(
                array(
                    'surname' => $this->input->post('surname'),
                    'firstname' => $this->input->post('firstname'),
                    'gender' => $this->input->post('gender')
                )
            );
            $this->show($customerid);
        }else{
            $data['page_title'] = 'Kunden hinzufügen';
            $this->load->view('templates/header', $data);
            $this->load->view('customer/add');
            $this->load->view('templates/footer');
        }   
    }
    ############################################
    #   Methode zum Anzeigen eines Kunden
    ############################################
    public function show($id = 0){
        $data['page_title'] = 'Kundenanzeige';
        $this->load->model('customer_model');
        if($id != 0){
            $result = array(
                'result' => $this->customer_model->getCustomerById($id)
            );
        }else{
            $result = array(
                'result' => $this->customer_model->getCustomerById($this->input->post('id'))
            );
        }
        $this->load->view('templates/header', $data);
        $this->load->view('customer/show', $result);
        $this->load->view('templates/footer');
    }
    ############################################
    #   Methode zum Suchen eines Kunden
    ############################################
    public function search($site =""){
        $data['page_title'] = 'Kundensuche';
        $this->load->view('templates/header', $data);
        if(strcmp($site, "sent") == 0){
            $this->load->model('customer_model');
            $result = array(
                'result' => $this->customer_model->getCustomersBySurname($this->input->post('surname'))
            );
            $this->load->view('customer/search', $result);
        }else{
            $this->load->view('customer/search');
        }
        $this->load->view('templates/footer');
    }
    ############################################
    #   Methode zum Löschen eines Kunden
    ############################################
    public function delete(){
        $id = array(
            'id' => $this->input->post('id')
        );
        $this->load->model('customer_model');
        $this->customer_model->deleteCustomerById($id);
        $this->search();
    }
    ############################################
    #   Methode zum Aktualisieren eines Kunden
    ############################################   
    public function update(){
        $data['page_title'] = 'Kundenanzeige';
        $changes = array(
            'id' => $this->input->post('id'),
            'surname' => $this->input->post('surname'),
            'firstname' => $this->input->post('firstname'),
            'gender' => $this->input->post('gender'));
        $this->load->model('customer_model');
        $this->customer_model->update($changes);
        $this->show($this->input->post('id'));
    }
}