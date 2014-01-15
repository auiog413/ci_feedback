<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

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
        $this->load->library('session');
        $this->load->library('pagination');
        $loggedin = $this->session->userdata('isloggedin');

        if(empty($loggedin) || $loggedin != 'admin'){
        	$this->load->helper('url');
        	redirect('/manage/login', 'location', 301);
        }

        // 配置分页
        $p_config['base_url'] = $this->config->item('base_url') . 'manage/feedback/view/';
        $p_config['total_rows'] = $this->db->count_all_results('feedback_items');
        $p_config['per_page'] = 20;
        $p_config['num_links'] = 3; // 放在你当前页码的前面和后面的“数字”链接的数量。
        $p_config['uri_segment'] = 4; // 分页方法自动测定你 URI 的哪个部分包含页数。
        $p_config['use_page_numbers'] = TRUE;
        // 第一页
        $p_config['first_link'] = '&lt;&lt;';
        $p_config['first_tag_open'] = '<li>';
        $p_config['first_tag_close'] = '</li>';
        // 当前页
        $p_config['cur_tag_open'] = '<li class="active"><a>';
        $p_config['cur_tag_close'] = '</a></li>';
        // 最后页
        $p_config['last_link'] = '&gt;&gt;';
		$p_config['last_tag_open'] = '<li>';
		$p_config['last_tag_close'] = '</li>';
		// 其他页面样式
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		// 下一页
		$p_config['next_link'] = '&gt;';
		$p_config['next_tag_open'] = '<li>';
		$p_config['next_tag_close'] = '</li>';
		// 上一页
		$p_config['prev_link'] = '&lt;';
		$p_config['prev_tag_open'] = '<li>';
		$p_config['prev_tag_close'] = '</li>';

        $this->pagination->initialize($p_config);
        $v_data['paging_string'] = $this->pagination->create_links();

        $start = ($page - 1) * $p_config['per_page'];

        $fb_lists = array();
        $v_data['fb_list'] = $this->db->get('feedback_items', $p_config['per_page'], $start);

        $v_data['start'] = $start;
        $v_data['perpage'] = $p_config['per_page'];
        $v_data['total'] = $p_config['total_rows'];

        $this->load->view('manage/feedback_view', $v_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */