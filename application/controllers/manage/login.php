<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -  
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// root => admin
		$user_list = array(
			'root' => '4458c1b18f2723473f0d09dba0880653'
		);

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->library('session');

		$login_error = 0;
		if($username && $password){
			if($user_list[trim($username)] == md5('sa@#$df' . $password . 'fd$#@as')){
				$this->session->set_userdata(array('isloggedin' => 'root'));
				$this->load->helper('url');
				redirect('manage/feedback/view', 'location', 301);
			}else{
				$login_error = 1;
			}
		}else{
			$login_error = 1;
		}

		$this->load->view('manage/login', array('login_error' => $login_error));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */