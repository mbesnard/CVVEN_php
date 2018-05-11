<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }
    
    public function connexion() {
        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) { //validation fails
            $this->load->view('login_view');
        } else {//validation succeeds
            if ($this->input->post('btn_login') == "Login") { //check if username and password is correct
                $usr_result = $this->login_model->get_user($username, $password);
                if ($usr_result > 0) {
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("reservations/affichertout");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Mauvais identifiant ou mot de passe.</div>');
                    redirect('login/connexion');
                }
            } else {
                redirect('login/connexion');
            }
        }
    }

}

?>