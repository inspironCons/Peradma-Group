<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function get_template_directory($path, $dir_file){
		global $GConfig;

		$replace_path = str_replace('\\', '/', $path);
		$get_digit_doc_root = strlen($GConfig->_document_root);
		$full_path = substr($replace_path, $get_digit_doc_root);

		return $GConfig->_site_url.$full_path.'/'.$dir_file;
	}

	function get_template($view){
		$_this =& get_instance();

		return $_this->app->view($view);
	}

	function set_url($sub){
		$_this =& get_instance();
		if($_this->app->side == 'CMS'){
			return site_url('admin/'.$sub);
		}
		else{
			return site_url($sub);
		}	
		
	}

	function is_active_menu($page,$class){
		$_this =& get_instance();
		if($page == $_this->uri->segment(2)){
			return $class;
		}
	}

	function title(){
		$_this =& get_instance();
		global $GConfig;

		$array_page = array(
			'dashboard' => 'Dashboard'
		);

		$title = NULL;
		if($_this->app->side == 'CMS' && (array_key_exists($_this->uri->segment(2), $array_page))){
			return $array_page[$_this->uri->segment(2)].' : : '. $GConfig->_web_name ;
		}else{
			return $GConfig->_web_name;
		}
	}

	function rupiah($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	 
	}
