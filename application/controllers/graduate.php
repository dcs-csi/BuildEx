<?php

class Graduate extends MY_Controller{
	
	public function index() {
		if(in_array('graduate',$this->session->userdata('role'))){
			$data['title'] = 'Graduate';
			$data['main_content'] = 'contents/graduate_body';
			$data['experiments'] = $this->get_all_experiments();
			$this->load->view('_main_layout', $data);
		}
		else{
			$role = $this->session->userdata('role');
			redirect($role[0]);
		}
	}

	public function get_all_experiments(){
		$this->load->model('experiments_model');
		$list = $this->experiments_model->get_users_experiments($this->session->userdata('id'));
		if($list == NULL)
			$list = array();
		
		return $list;
	}

	public function edit_graduate($gid = NULL){
		$this->load->model('graduates_model');
		$data['title'] = 'Profile';
		$data['profile'] = $this->graduates_model->get_graduate_profile($gid);
		$data['main_content'] = 'contents/profile';
		$this->load->view('_main_layout', $data);
	}
}