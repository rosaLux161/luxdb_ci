<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {
    ############################################
    #   Methode zum Hinzufügen eines Auftrags
    ############################################
    public function add($site = ""){
        if(strcmp($site, "sent") == 0){
            $data['page_title'] = 'Auftrag hinzugefügt';
            $this->load->model('contract_model');
            $set = array(
                'customerid' => $this->input->post('kid'),
                'details' => $this->input->post('details'));
                $this->contract_model->saveContract($set);
                $this->load->view('templates/header', $data);
                $this->load->view("contract/add", $set);
                $this->load->view('templates/footer');
        }else{
            $data['page_title'] = 'Auftrag hinzufügen';
            $this->load->view('templates/header', $data);
            $this->load->view('contract/add');
            $this->load->view('templates/footer');
        }
    }

    ############################################
    #   Methode zum Anzeigen eines Auftrags
    ############################################
    public function show($id = 0){
        $data['page_title'] = 'Auftragsanzeige';
        $this->load->model('contract_model');
        if($id != 0){
            $result = array(
                'result' => $this->contract_model->getContractById($id)
            );
        }else{
            $result = array(
                'result' => $this->contract_model->getContractById($this->input->post('id'))
            );
        }
        $this->load->view('templates/header', $data);
        $this->load->view('contract/show', $result);
        $this->load->view('templates/footer');
    }

    ############################################
    #   Methode zum Suchen eines Auftrags
    ############################################
    public function search($site =""){
        $data['page_title'] = 'Auftragssuche';
        $this->load->view('templates/header', $data);
        if(strcmp($site, "sent") == 0){
            $this->load->model('contract_model');
            $result = array(
                'result' => $this->contract_model->getContractById($this->input->post('aid'))
            );
            $this->load->view('contract/search', $result);
        }else{
            $this->load->view('contract/search');
        }
        $this->load->view('templates/footer');
    }

    ############################################
    #   Methode zum Löschen eines Auftrags
    ############################################
    public function delete(){
        $id = array(
            'id' => $this->input->post('aid')
        );
        $this->load->model('contract_model');
        $this->contract_model->deleteContractById($id);
        $this->search();
    }

    ############################################
    #   Methode zum Aktualisieren eines Auftrags
    ############################################   
    public function update(){
        $data['page_title'] = 'Auftragsanzeige';
        $set = array(
            'kid' => $this->input->post('kid'),
            'aid' => $this->input->post('aid'),
            'details' => $this->input->post('details'));
        $this->load->model('contract_model');
        $this->contract_model->updateContract($set);
        $this->show($this->input->post('aid'));
    }

    /*
    public function searchByCustomer(){
        $data['page_title'] = 'Auftragssuche nach Kunde';
        $this->load->view('templates/header', $data);
        $this->load->view('contract/searchbycustomer');
        $this->load->view('templates/footer');
    }
    public function searchByCustomer_sent(){
        $data['page_title'] = 'Auftragssuche';
        $this->load->model('contract_model');
        $result = array(
            'result' => $this->contract_model->getContractsByCustomer($this->input->post('surname'))
        );
        $this->load->view('templates/header', $data);;
        $this->load->view('contract/searchbycustomer', $result);
        
        $this->load->view('templates/footer');
    }*/

}