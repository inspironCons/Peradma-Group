<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends cms_controller{
    function __construct(){
        parent::__construct();

        $this->load->helper(array('user_helper'));
        $this->load->model(array('User_model','User_detail_model'));
        $this->load->library(array());
    }

    public function index(){
        $this->app->view('pages/booking_buku');
    }

    public function action($method){

    }
}