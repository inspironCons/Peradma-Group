<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends cms_controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array('user_helper'));
        $this->load->model(array('User_model'));
        $this->load->library(array());
    }

    public function index(){
        $this->app->view('pages/User');
    }

    public function action($method){
        global $GConfig;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if($method == 'GET'){
                // request
                $request = $this->input->post();
                if(!empty($request['id'])){
                    $query = $this->User_model->GET_USER_DETAIL($request['id']);
					echo json_encode(array(
                        'code'=>'01',
                        'status' => 'success',
                        'post_count'=>'2000',
                        'data' => $query
                    ));
                }else{
                    $offset = NULL;
                    
                    // untuk search
                  
                    $total_rows = $this->User_model->count();
                    $query = $this->User_model->GET_USER(NULL,$GConfig->_post_page,$offset,FALSE);
                    

                    $result = array(
                        'total_rows' => $total_rows, 
						'perpage' => $GConfig->_post_page,
						'record' => $query,
                    );
                    
                    echo json_encode($result);
                }
            }else if($method == "create"){
                $request = $this->input->post();

                $data = array(
                    'username' => 'admin_paradma',
                    'password' => bCrypt('123456',28),						
                    'role' => '1',						
                    'active'=>'0',
                    'create_at' => date('Y-m-d H:i:s'),							
                    'update_at' => date('Y-m-d H:i:s'),
                );

                if($this->user_model->insert($data)){
                    $result = array(
                        'code'=> '01',
                        'message' => 'berhasil ditambahkan',
                        'data' => $data,
                    );
                }else{
                    $result = array(
                        'code'=> '02',
                        'message' => 'gagal ditambahkan',
                        'request' => $data,
                    );
                }

                
                echo json_encode($result);

            }
        }
    }
}