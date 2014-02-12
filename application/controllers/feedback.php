<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
		
		$this->load->helper(array('form','captcha','string'));
		$this->load->library('session');
	}
	
	/**
	 * 生成验证码
	 */
	private function generate_captcha(){
		$val_arr = array(
			'word' 			=> random_string('alnum', 4),
			'img_path' 		=> './statics/captcha/',
			'img_url' 		=> $this->config->item('base_url') . 'statics/captcha/',
		);
		
		$captcha = create_captcha($val_arr);
		$flash_session['word'] = $captcha['word'];
		$flash_session['file'] = $val_arr['img_path'] . $captcha['time'] . '.jpg';
		$this->session->set_flashdata('captcha', json_encode($flash_session));
		
		return $captcha['image'];
	}
	
	/**
	 * 验证用户填写的验证码
	 */
	private function validate_captcha($submited_captcha = ''){
		$captcha = json_decode($this->session->flashdata('captcha'), true);
		
		if(empty($captcha) || empty($submited_captcha)){
			return false;
		}
		
		if(file_exists($captcha['file']) && !is_dir($captcha['file'])){
			unlink($captcha['file']);
		}
		
		if(strtolower($submited_captcha) == strtolower($captcha['word'])){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 用户主动刷新验证码
	 */
	public function refresh_capthcha()
	{
		die($this->generate_captcha());
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
		$v_data['captcha_image'] = $this->generate_captcha();
		$v_data['base_url'] = $this->config->item('base_url');
		$this->load->view('upload_form', $v_data);
	}
	
	/**
	 * 添加反馈
	 *
	 * 对应下列URL地址:
	 *     http://example.com/index.php/feedback/add
	 */
	public function add(){
		
		// 验证码
		if(!$this->validate_captcha($this->input->post('captcha'))){
			die(json_encode(array('errno' => 3, 'errmsg' => 'captcha_code_error.')));
		}
		
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
			$attachments = '/' . $u_config['upload_path'] . '/' . $u_data['file_name'];
		}

		// 判定是否为空
		$content = $this->input->post('content');
		if(empty($content)){
			die(json_encode(array('errno' => 2, 'errmsg' => 'content_is_empty.')));
		}

		// 插入数据库
		$this->load->helper('date', 'url');
		$sertarr = array(
			'name' 		   => $this->input->post('name'),
			'title'		   => $this->input->post('title'),
			'email'		   => $this->input->post('email'),
			'phone'		   => $this->input->post('phone'),
			'qq' 		   => $this->input->post('qq'),
			'feed_content' => $content,
			'attachments'  => $attachments,
			'ip' 		   => $this->input->ip_address(),
			'datetime'     => now()
			);
		$this->db->insert('feedback_items', $sertarr);

		// 接口应答信息 json 格式
		die(json_encode(array('errno' => 0, 'msg' => 'success_added.')));
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
