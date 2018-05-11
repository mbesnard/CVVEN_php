<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentification extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->database();
    $this->load->model('client_modele');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('html');
    }

    public function index() {
        $data["titre"] = "Un titre";
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
        $this->form_validation->set_rules('login', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        $auth_form_data = $this->get_auth_form_data();
        array_merge($data, $auth_form_data);
        
        if ($this->form_validation->run() == FALSE) {     
            $this->load->view('log/login', $data);
        } else {
            // Client qui ne correspond pas à la db
            $client = $this->client_modele->getClientAuth($auth_form_data);
            if( $client == null ) {
            $data['message'] = "Nom d'utilisateur ou mot de passe incorrect";
            $this->load->view('log/login', $data);
            // Client qui correspond à la db    
            } else {
            //$login = $this->input->post('login');
            $sessiondata = array(
                    'login' => $client->login,
                    'admin' => $client->admin,
                    'idClient' => $client->idClient,
                    'client' => $client,
                    'loginuser' => TRUE);
            $this->session->set_userdata($sessiondata);
            //On charge le controller reservation
            if($client->admin){
                redirect('reservations/affichertout', 'refresh');
            }else{
                redirect('reservations/ajouter', 'refresh');
            }
            }
        }
    }
    
    //recuperation de données
    public function get_auth_form_data() {
        return [
            'login'             => $this->input->post('login'),
            'password'          => $this->input->post('password'),
        ];
    }
    
    //deconnexion
    public function logout() {
        $newdata = array(
            'username' => '',
            'password' => '',
            'loginuser' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('Welcome', 'refresh');
    }

}

?>