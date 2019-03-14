<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller {
	public function index()
	{
        $data['page_title'] = 'Startseite';
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function add(){
        $data['page_title'] = 'Auftrag hinzufügen';
        $this->load->view('templates/header', $data);
        $this->load->view('contract/add');
        $this->load->view('templates/footer');
    }
    public function add_sent(){
        $data['page_title'] = 'Kunden hinzufügen';
        $set = array(
        'customerid' => $this->input->post('kid'),
        'details' => $this->input->post('details'));
        $this->load->model('contract_model');
        $this->contract_model->saveContract($set);
        $this->load->view('templates/header', $data);
        $this->load->view("contract/add", $set);
        $this->load->view('templates/footer'); 
    }
    public function search(){
        $data['page_title'] = 'Auftragssuche';
        $this->load->view('templates/header', $data);
        $this->load->view('contract/search');
        $this->load->view('templates/footer');
    }
    public function search_sent(){
        $data['page_title'] = 'Kundensuche';
        $this->load->model('contract_model');
        $result = array(
            'result' => $this->contract_model->getContractById($this->input->post('aid'))
        );
        $this->load->view('templates/header', $data);;
        $this->load->view('contract/search', $result);
        
        $this->load->view('templates/footer');
    }
    public function show()
	{
        
        $data['page_title'] = 'Auftragsanzeige';
        $this->load->model('contract_model');
        $result = array(
            'result' => $this->contract_model->getContractById($this->input->post('id'))
        );
        $this->load->view('templates/header', $data);
        $this->load->view('contract/show', $result);
        $this->load->view('templates/footer');
    }
    public function delete(){
        $set = array(
            'id' => $this->input->post('id')
        );
        $this->load->model('customer_model');
        $this->customer_model->deleteCustomer($set);
        $this->search();
    }
    public function update(){
        $data['page_title'] = 'Auftragsanzeige';
        $set = array(
            'kid' => $this->input->post('kid'),
            'aid' => $this->input->post('aid'),
            'details' => $this->input->post('details'));
        $this->load->model('contract_model');
        $this->contract_model->updateContract($set);

        $result = array(
            'result' => $this->contract_model->getContractById($this->input->post('aid'))
        );

        $this->load->view('templates/header', $data);
        $this->load->view("contract/show", $result);
        $this->load->view('templates/footer');
    }
}