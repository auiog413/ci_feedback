<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library(array('pagination', 'auth'));
		
		// 需要登陆
        $this->auth->need_login();
	}

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
		
	}

	public function view($page = 1)
	{
        // 配置分页开始
        // 分页链接
        $p_config['base_url'] = $this->config->item('base_url') . 'manage/feedback/view/'; 
        // 数据库中的数据总数
        $p_config['total_rows'] = $this->db->count_all_results('feedback_items'); 
        // 每页显示数量
        $p_config['per_page'] = 20;  
        // 放在你当前页码的前面和后面的“数字”链接的数量。
        $p_config['num_links'] = 3; 
        // 分页方法自动测定你 URI 的哪个部分包含页数。
        $p_config['uri_segment'] = 4; 
        // CI 在URL中默认使用偏移量来表示分页, 此选项设置CI在URL使用页码来表示分页
        $p_config['use_page_numbers'] = TRUE;

        // 分页链接样式设置开始
        // 第一页
        $p_config['first_link'] = '首页';
        $p_config['first_tag_open'] = '<li>';
        $p_config['first_tag_close'] = '</li>';
        // 当前页
        $p_config['cur_tag_open'] = '<li class="active"><a>';
        $p_config['cur_tag_close'] = '</a></li>';
        // 最后页
        $p_config['last_link'] = '末页';
		$p_config['last_tag_open'] = '<li>';
		$p_config['last_tag_close'] = '</li>';
		// 其他页面样式
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		// 下一页
		$p_config['next_link'] = '下一页';
		$p_config['next_tag_open'] = '<li>';
		$p_config['next_tag_close'] = '</li>';
		// 上一页
		$p_config['prev_link'] = '上一页';
		$p_config['prev_tag_open'] = '<li>';
		$p_config['prev_tag_close'] = '</li>';
		// 分页链接样式设置结束

        $this->pagination->initialize($p_config);
        $v_data['paging_string'] = $this->pagination->create_links();

        // 取结果的开始数
        $start = ($page - 1) * $p_config['per_page'];

        $this->db->order_by('datetime', 'desc');
        $v_data['fb_list'] = $this->db->get('feedback_items', $p_config['per_page'], $start);

        $v_data['start'] = $start;
        $v_data['perpage'] = $p_config['per_page'];
        $v_data['total'] = $p_config['total_rows'];
        $v_data['base_url'] = $this->config->item('base_url');

        $this->load->view('manage/feedback_view', $v_data);
	}
	
	/**
	 * 删除反馈
	 *
     * 对应地址:
     *     http://example.com/index.php/manage/feedback/remove/1,2,3,4,5
     *
     * 删除反馈需要登陆
	 */
	public function remove(){
		$ids = $this->input->post('ids');
		$ids_arr = explode(',', $ids);
		
		foreach($ids_arr as $key => $value){
			if (!empty($value) && is_numeric($value)){
				$this->db->where('id', $value);
				$this->db->select('attachments');
				$query = $this->db->get('feedback_items');
				$item = $query->row();
				if($item->attachments && file_exists('.'.$item->attachments)){
					unlink('.' . $item->attachments);
				}
				
				$this->db->delete('feedback_items', array('id' => $value));
			}
		}
		
		echo json_encode(array('ids' => $ids));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
