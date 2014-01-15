<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/logout
	 *	- or -  
	 * 		http://example.com/index.php/logout/index
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
		$this->load->library('session');

		$this->session->set_userdata(array('isloggedin' => ''));
		$this->load->helper('url');
		redirect('manage/login', 'location', 301);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */