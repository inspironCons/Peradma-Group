<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends cms_controller{
    function __construct(){
        parent::__construct();

        $this->load->helper(array());
        $this->load->model(array());
        $this->load->library(array());
    }

    public function index(){
        $this->app->view('pages/booking/booking_buku');
    }

    public function create(){
        $this->app->view('pages/booking/booking_create');
    }

    public function action($method){
        global $GConfig;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if($method == 'GET'){

            }else if($method == 'create'){

            }else if($method == 'update'){

            }else if($method == 'delete'){

            }
        }
    }
}