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
		$u_config['upload_path'] = 'statics/fb_uploads/' . date('Y/m');
		$u_config['allowed_types'] = 'gif|jpg|png';
		$u_config['max_size'] = '2048';
		$u_config['encrypt_name'] = TRUE;
		$this->load->library('upload', $u_config);

		// 附件上传不成功
		if(! $this->upload->do_upload('attachment')){
			$error = array('errno' => 1, 'errmsg' => $this->upload->display_errors('', ''));
			if(md5($error['errmsg']) == '0890c0740e3e1c1869bbcc82c156de5e'){
				$attachments = '';
			}else{
				die(json_encode($error));
			}

		// 上传成功了
		}else{
			$u_data = $this->upload->data();
			$attachments = $u_config['upload_path'] . '/' . $u_data['file_name'];
		}

		// 插入数据库
		$this->load->helper('date', 'url');
		$sertarr = array(
			'feed_content' => $this->input->post('content'),
			'attachments'  => $attachments,
			'ip' 		   => $this->input->ip_address(),
			'datetime'     => now()
			);
		$this->db->insert('feedback_items', $sertarr);

		// 接口应答信息 json 格式
		die(json_encode(array('errno' => 0, 'msg' => 'success added.')));
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