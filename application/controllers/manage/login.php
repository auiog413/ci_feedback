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
		// admin => kh@2314..,
		$user_list = array(
			'admin' => 'c5e1f626cdd1c79951d15d9116ad5876'
		);

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->library('session');

		if($username && $password){
			if($user_list[trim($username)] == md5('sa@#$df' . $password . 'fd$#@as')){
				$this->session->set_userdata(array('isloggedin' => 'admin'));
				$this->load->helper('url');
				redirect('manage/feedback/view', 'location', 301);
			}
		}

		$this->load->view('manage/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */