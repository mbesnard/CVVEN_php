<?php

class client_modele extends CI_model {

    public function __construct() {
        $this->load->database();
    }

    public function get_client_by_login_array($login) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour màj mdp 
        $rqt = $this->db->query("SELECT idClient, mdp FROM client WHERE login='" . $login . "'");
        $client = $rqt->row_array();
        return $client;
    }

    public function getAllClient() {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour màj mdp 
        $rqt = $this->db->query("SELECT * FROM client");
        $client = $rqt->result();
        return $client;
    }

    public function get_client_by_login($login) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour recup mdp
        $rqt = $this->db->query("SELECT idClient,login, mdp, admin FROM client WHERE login='" . $login . "'");
        $client = $rqt->row();
        return $client;
    }

    public function get_client_by_id($idClient) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour recup mdp
        $rqt = $this->db->query("SELECT mdp FROM client WHERE idClient=" . $idClient);
        $client = $rqt->row();
        return $client;
    }
    
//fonction pour ajouter une réservation 
    public function addClient($data) {
           
        $this->load->helper('url');
        $client = [
            "login" => $data['login'],
            "mdp" => $data['password'],
            "nom" => $data['nom'],
            "prenom" => $data['prenom'],
            "dateNaissance" => $data['datenaissance'],
            "adresse" => $data['adresse'],
            "ville" => $data['ville'],
            "codepostal" => $data['codepostal'],
            "numeroTelephone" => $data['telephone'],
            "adresseMail" => $data['email'],
        ];
        return $this->db->insert('client', $client); //insert
    }

    //retourne un client si l'authentification est OK sinon null
    public function getClientAuth($data) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour vérifier si le login et mdp correspond
        $rqt_clients = $this->db->query("SELECT idClient,login, mdp, admin FROM client");
        $clients = $rqt_clients->result();

        foreach ($clients as $client) {
            $login = $client->login;
            $mdp = $client->mdp;
//            echo '<pre>';
//            print_r($client);
//            echo '</pre>';

            if ($login == $data['login'] && $mdp == $data['password']) {
                return $client;
            }
        }
        return null;
    }

    //supprimer un client
    public function deleteClient($client) {
        if ($client->idClient != null) {
            return $this->db->simple_query("DELETE FROM client where idClient=" . $client->idClient);
        }
        if ($client->login != null) {
            return $this->db->simple_query("DELETE FROM client where login=" . $client->login);
        }
    }

    //met à jout le login du client
    public function updateClient($client) {
        $this->db->set('login', $client->username);
        $this->db->where('idClient', $client->idClient);
        return $this->db->update('client'); // gives UPDATE `client` SET `login` = 'client->username' WHERE `idClient` = $client->idClient
    }

}
