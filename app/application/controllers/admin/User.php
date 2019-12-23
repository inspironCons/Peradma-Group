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
                    
                    if(!empty($post['hal_aktif']) && $post['hal_aktif'] > 1){
						$offset = ($request['hal_aktif'] - 1) * $GConfig->_backend_perpage ;
					}
                    // untuk search
                    
                    if((!empty($request['filter'])) || (!empty($request['cari']))){
                    $query_search = "username LIKE '%".$request['cari']."' OR role_name LIKE '%".$request['cari']."%'";
                    $query_filterKosong = "username LIKE '%".$request['cari']."%' OR role_name LIKE '%".$request['cari']."%' HAVING deleted = '0'";
                        if($request['filter'] != ''){
                            if($request['filter'] == 'soft'){
                                $filter = 'soft';
                                @$total_rows = $this->User_model->Count_detail($query_search);
                                $query = $this->User_model->GET_USER($query_search,$GConfig->_post_page,$offset,FALSE);
                            }else if($request['filter'] == 'all'){
                                $filter = 'all';
                                @$total_rows = $this->User_model->Count_detail($query_search);
                                $query = $this->User_model->GET_USER(array($query_search),$GConfig->_post_page,$offset,FALSE);
                            }
                        }else{
                            $filter = 'filter kosong';

                            $total_rows = $this->User_model->Count_detail("username LIKE '%".$request['cari']."%' OR role_name LIKE '%".$request['cari']."%' GROUP BY deleted HAVING deleted = '0'");
                            $query = $this->User_model->GET_USER($query_filterKosong,$GConfig->_post_page,$offset,FALSE);
                        }
                    }else{
                        $filter = 'semua yang gak terdelete soft';
                        $total_rows = $this->User_model->count(array('deleted'=>'0'));
                        $query = $this->User_model->GET_USER(array('deleted'=>'0'),$GConfig->_post_page,$offset,FALSE);
                    }
                  
                    

                    $result = array(
                        'total_rows' => $total_rows, 
                        'perpage' => $GConfig->_post_page,
                        'filter'=>$filter,
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
                    
                    if($this->User_detail_model->insert($payload_detail) > 0){
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

            }else if($method == 'update'){
                $request = $this->input->post();
                
                $payload = array(
                    'username'  => $request['username'],
                    'password'  => bCrypt($request['password'],9),			
                    'email'      => $request['email'],						
                    'role'      => $request['role'],
                    'update_at' => date('Y-m-d H:i:s'),
                );
                if(!empty($request['id'])){
                    unset($payload['username']);
                    
                    if(!empty($request['passwod'])){
                        $payload['password'] = bCrypt($request['password'],9);
                    }else{
                        unset($payload['password']);
                    }

                    $getID = $request['id'];


                    $this->User_model->update($payload,array('id_user'=> $getID));


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
                        $update_detail = $this->User_detail_model->update($payload_detail,array('user_id'=> $getID));
                        
                        $result = array(
                            'code'=> '01',
                            'message' => 'Data successfully edited',
                        );
                }else{
                    $result = array(
                        'code'=> '02',
                        'message' => 'Ooops! please try again',
                    );
                }
                echo json_encode($result);
                
                
            }else if($method == 'delete'){
                $request = $this->input->post();

                if($request['type'] == 'soft'){
                    if(!empty($request['id'])){
                        $payload = array(
                            'deleted' => '1'
                        );
                        $this->User_model->update($payload,array('id_user'=> $request['id']));
    
                        $result = array(
                            'code'=> '01',
                            'message'=> 'Soft Delete Success'
                        );
                    }
                }else if($request['type'] == 'hard'){
                    $this->User_model->delete($request['id']);
                    $this->User_detail_model->delete_by(array('user_id'=>$request['id']));

                    $result = array(
                        'code'=> '01',
                        'message'=> 'Data delete permanently'
                    );
                }

                echo json_encode($result);
                
            }
        }
    }
}