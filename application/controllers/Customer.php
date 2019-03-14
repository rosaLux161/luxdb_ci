<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function index()
	{
        $data['page_title'] = 'Startseite';
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function add(){
        $data['page_title'] = 'Kunden hinzufügen';
        $this->load->view('templates/header', $data);
        $this->load->view('customer/add');
        $this->load->view('templates/footer');
    }
    public function add_sent(){
        $data['page_title'] = 'Kunden hinzufügen';
        $set = array(
        'surname' => $this->input->post('surname'),
        'firstname' => $this->input->post('firstname'),
        'gender' => $this->input->post('gender'));
        $this->load->model('customer_model');
        $this->customer_model->saveCustomer($set);
        $this->load->view('templates/header', $data);
        $this->load->view("customer/add", $set);
        $this->load->view('templates/footer'); 
    }
    public function search(){
        $data['page_title'] = 'Kundensuche';
        $this->load->view('templates/header', $data);
        $this->load->view('customer/search');
        $this->load->view('templates/footer');
    }
    public function search_sent(){
        $data['page_title'] = 'Kundensuche';
        $this->load->model('customer_model');
        $result = array(
            'result' => $this->customer_model->getCustomerBySurname($this->input->post('surname'))
        );
        $this->load->view('templates/header', $data);;
        $this->load->view('customer/search', $result);
        
        $this->load->view('templates/footer');
    }
    public function show()
	{
        $data['page_title'] = 'Kundenanzeige';
        $this->load->model('customer_model');
        $result = array(
            'result' => $this->customer_model->getCustomerById($this->input->post('id'))
        );
        $this->load->view('templates/header', $data);
        $this->load->view('customer/show', $result);
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
        $data['page_title'] = 'Kundenanzeige';
        $set = array(
            'id' => $this->input->post('id'),
            'surname' => $this->input->post('surname'),
            'firstname' => $this->input->post('firstname'),
            'gender' => $this->input->post('gender'));
        $this->load->model('customer_model');
        $this->customer_model->updateCustomer($set);

        $result = array(
            'result' => $this->customer_model->getCustomerById($this->input->post('id'))
        );

        $this->load->view('templates/header', $data);
        $this->load->view("customer/show", $result);
        $this->load->view('templates/footer');


    }
}