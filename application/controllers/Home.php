<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    ############################################
    #   Startseite anzeigen
    ############################################
	public function index()
	{
        $data['page_title'] = 'Startseite';
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
}