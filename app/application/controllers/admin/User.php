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
                    $query = $this->User_model->get($post['id']);
					echo json_encode(array('status' => 'success', 'data' => $query));
                }else{
                    $offset = NULL;

                    $query = $this->User_model->get_by(NULL,$GConfig->_post_page,$offset,FALSE,'id_user,username,role,active,create_at,update_at');
                    $total_rows = $this->User_model->count();

                    $result = array(
						'record' => $query,
						'total_rows' => $total_rows, 
						'perpage' => $GConfig->_post_page,
                    );
                    
                    echo json_encode($result);
                }
            }else if($method == 'create'){
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

    public function create(){
        $data = array(
            'username' => 'admin_paradma',
            'password' => bCrypt('123456',9),						
            'role' => '1',						
            'active'=>'0',
            'create_at' => date('Y-m-d H:i:s'),							
            'update_at' => date('Y-m-d H:i:s'),
        );

        if($this->User_model->insert($data)){
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