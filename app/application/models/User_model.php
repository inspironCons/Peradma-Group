<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
	
	protected $_table_name = 'user';
	protected $_primary_key = 'id_user';
	protected $_order_by = 'id_user';
    protected $_order_by_type = 'DESC';
    
    function __construct() {
		parent::__construct();
	}	

	public $rules = array(
		'username' => array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'trim|required'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'password', 
			'rules' => 'trim|required|callback_password_check'
		)
    );
    

	public $rules_update = array(
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
    );
    
    public $rules_register = array(
		'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|callback_username_check'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	public function GET_USER_DETAIL($id){
		$this->db->select('{PRE}user.* , {PRE}role.role_name,{PRE}user_detail.nama_depan,{PRE}user_detail.nama_belakang,{PRE}user_detail.tempat,{PRE}user_detail.tanggal_lahir,{PRE}user_detail.handphone,{PRE}user_detail.lokasi,{PRE}user_detail.skill');
		$this->db->join('{PRE}role','{PRE}user.role = {PRE}role.id_role','LEFT');
		$this->db->join('{PRE}user_detail','{PRE}user.id_user = {PRE}user_detail.user_id','left');
		return parent::get($id);
	}

	public function GET_USER($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL){
		$this->db->select('{PRE}user.id_user, {PRE}user.username, {PRE}user.active, {PRE}user.create_at, {PRE}user.update_at,{PRE}user.images_path, {PRE}role.role_name');
		$this->db->join('{PRE}role','{PRE}user.role = {PRE}role.id_role','left');
		$this->db->group_by('{PRE}user.id_user');
		return parent::get_by($where,$limit,$offset,$single,$select);
	}

	
	
}