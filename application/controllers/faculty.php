<?php
class Faculty extends MY_Controller{
	
	public function index() {
		if(in_array('faculty',$this->session->userdata('role'))){
			$data['title'] = 'Faculty';
			$data['main_content'] = 'contents/faculty_body';
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

	public function edit_faculty($fid = NULL){
		$this->load->model('faculty_model');
		$data['title'] = 'Profile';
		$data['profile'] = $this->faculty_model->get_faculty_profile($fid);
		$data['main_content'] = 'contents/profile';
		$this->load->view('_main_layout', $data);
	}
}