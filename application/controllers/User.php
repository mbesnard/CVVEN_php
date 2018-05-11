<?php

class User extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('client_modele');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->load->helper(array('form', 'url'));
        $client = $this->session->userdata('client');
        $datas["isAdmin"] = $client->admin;
        if(!$client->admin){
            $datas["login"] = $client->login;
        }else{
            $datas["login"] = '';
        }
        
        $datas["clients"] = $this->client_modele->getAllClient();
        
        if ($this->form_validation->run() == TRUE) {
            $client->login = $this->input->post('login');
            $this->client_modele->updateClient($client);
        }
        $this->load->view('reservations/menageUser', $datas);
    }
    
    /*supprime l'utilisateur*/
    public function deleteUser() {
        $loginUser = $this->input->post('loginUser');
        $client = $this->client_modele->get_client_by_login($loginUser);
        print_r($client);
        return $this->client_modele->deleteClient($client);
    }

}
