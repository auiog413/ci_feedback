<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
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
		$this->load->helper('form');
		$this->load->view('upload_form');
	}

	/**
	 * 添加反馈
	 *
	 * 对应下列URL地址:
	 *     http://example.com/index.php/feedback/add
	 */
	public function add(){
		// 附件上传
		$config['upload_path'] = './statics/fb_uploads/' . date('Y/m');
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload('attachment')){
			$error = array('error' => $this->upload->display_errors());
   			$this->load->view('upload_form', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
   	 		$this->load->view('upload_success', $data);
		}
		//$this->input->post('content');
	}

	/**
	 * 删除反馈
	 *
     * 对应地址:
     *     http://example.com/index.php/feedback/remove/1,2,3,4,5
     *
     * 删除反馈需要登陆
	 */
	public function remove($ids = ''){

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */