<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //recuperer login + mdp
    function get_user($usr, $pwd) {
        $sql = "SELECT * FROM client WHERE login = '".$usr."' and mdp = '".$pwd."'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}

?>