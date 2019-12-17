<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends cms_controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array());
        $this->load->model(array());
        $this->load->library(array());
    }

    function index(){
        $this->app->view('pages/User');
    }
}