<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cms_controller extends MY_Controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array());
        $this->load->model(array());
        $this->load->library(array());

        $this->app->side = 'CMS';
        $this->app->template = 'AdminLte';
    }
}