<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->general->cekPlayerLogin();
    }

    function index() {

        $data['content'] = 'player/dashboard/index';
        $this->load->view('player/player_template', $data);
    }

}

?>
