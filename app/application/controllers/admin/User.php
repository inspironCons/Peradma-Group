<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends cms_controller{

    function __construct(){
        parent::__construct();

        $this->load->helper(array('user_helper'));
        $this->load->model(array('User_model','User_detail_model'));
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

                $payload_user = array(
                    'username'  => $request['username'],
                    'password'  => bCrypt($request['password'],9),			
                    'email'      => $request['email'],						
                    'role'      => $request['role'],
                    'create_at' => date('Y-m-d H:i:s'),
                );

                $getID = $this->User_model->insert($payload_user);

                if(!empty($getID)){
                    $skill = explode(',', $request['skill']);
                    $parseSkill = json_encode($skill);
                    $payload_detail = array(
                        'user_id' => $getID,
                        'nama_depan' => $request['nama_depan'],
                        'nama_belakang'=> $request['nama_belakang'],
                        'tempat'=> $request['tempat'],
                        'tanggal_lahir'=> date("Y-m-d", strtotime($request['tanggal_lahir'])),
                        'handphone'=> $request['phone'],
                        'lokasi'=> $request['lokasi'],
                        'skill'=>$parseSkill,
                    );
                    
                    if($this->User_detail_model->insert($payload_detail)){
                        $result = array(
                            'code'=> '01',
                            'message' => 'Data successfully added',
                        );
                    }else{
                        $result = array(
                            'code'=> '03',
                            'message' => 'Success Create Data, but,Some data entered successfully',
                        );
                    }
                }else{
                    $result = array(
                        'code'=> '02',
                        'message' => 'Failure Create Data',
                    );
                }

                
                echo json_encode($result);

            }
        }
    }
}