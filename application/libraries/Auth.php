<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 验证类
 */
class Auth {
	
	private $_session_name = 'isloggedin';
	
	private $_users_list = array(
		'root' 	   => '4458c1b18f2723473f0d09dba0880653',  // admin
		'auioh413' => 'b840a8114cb4d6e7dc8a929bc396d3bf',  // fuckyou
		'auiog413' => '5921936e480dd60dc8d61d20c7438e62'   // 123456
	);
	
	private $_CI = null;
	
	public function __construct(){
		$this->_CI = &get_instance();
		
		$this->_CI->load->library('session');
        $this->_CI->load->helper('url');
	}
	
	// 需要登陆的地方
	public function need_login(){
		$loggedin = $this->_CI->session->userdata($this->_session_name);

        if(empty($loggedin)){
        	redirect('/manage/login', 'location', 301);
        }
	}
	
	//登入
	public function login($username = '', $password = ''){
		
		$login_error = 0;
		if($username && $password){
		//	die(md5('sa@#$df' . $password . 'fd$#@as'));  // 用于生成加密密码
			if($this->_users_list[trim($username)] == md5('sa@#$df' . $password . 'fd$#@as')){
				$this->_CI->session->set_userdata(array($this->_session_name => trim($username)));
				redirect('manage/feedback/view', 'location', 301);
			}else{
				$login_error = 1;
			}
		}else{
			if($this->_CI->input->post()){
				$login_error = 1;
			}
		}
		return $login_error;
	}
	
	// 登出
	public function logout(){
		$this->_CI->session->unset_userdata($this->_session_name);
		
		redirect('manage/login', 'location', 301);
	}
	
	public function get_logged_in(){
		return $this->_CI->session->userdata($this->_session_name);
	}
}
