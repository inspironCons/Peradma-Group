<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array('cookie','template_helper'));
        $this->load->model(array('User_model'));
        $this->load->library(array('App','form_validation','session'));
    }
}