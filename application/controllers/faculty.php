<?php

class Faculty extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('faculty_model');	
	}
	
	public function index(){
		if($this->session->userdata('active_role') == 'faculty'){
			$data['title'] = 'Faculty';
			$data['main_content'] = 'faculty/index';
			$this->load->view('_main_layout_internal', $data);
		}
		else{
			$role = $this->session->userdata('active_role');
			redirect($this->session->userdata('active_role'));
		}
	}

	public function profile(){
		$username = $this->session->userdata('username');
		$data['user'] = $this->users_model->get_user_profile(0,$username);
		$data['faculty'] = $this->faculty_model->get_faculty_profile($this->session->userdata('active_id'));
		$data['roles'] = $this->session->userdata('role');
		$data['title'] = 'Faculty';
		$data['main_content'] = 'faculty/profile';
		$this->load->view('_main_layout_internal',$data);
	}

	public function experiments(){
		$data['fid'] = $this->session->userdata('active_id');
		$data['experiments'] = $this->get_all_experiments($data['fid']);
		$data['title'] = 'Faculty';
		$data['notification'] = $this->session->flashdata('notification');
		if(!$data['notification']){
			$data['notification'] = null;
		}
		$data['main_content'] = 'faculty/experiments';
		$this->load->view('_main_layout_internal',$data);
	}

	public function advisory(){
		$fid = $this->session->userdata('active_id');
		$data['title'] = 'Faculty';
		$data['main_content'] = 'faculty/advisory_experiments';
		$exp = $this->get_all_advisory_experiments($fid);
		if(isset($exp)){
			$data['experiments'] = $this->get_all_advised_experiments($exp);
			$data['requests'] = $this->get_all_request_experiments($exp);
		}

		$data['notification'] = $this->session->flashdata('notification');
		if(!$data['notification']){
			$data['notification'] = null;
		}

		$this->load->view('_main_layout_internal',$data);
	}

	public function laboratory(){
		$this->load->model('laboratories_model');
		$this->load->model('graduates_model');
		$fid = $this->session->userdata('active_id');
		$data['title'] = 'Faculty';
		$data['main_content'] = 'faculty/laboratories';
		$data['main_lab'] = $this->laboratories_model->get_faculty_laboratory($fid);
		if(isset($data['main_lab'])){
			$labid = $data['main_lab']->labid;
			$data['faculty_members'] = $this->faculty_model->get_all_lab_faculty($labid);
			$data['graduates'] = $this->graduates_model->get_all_lab_graduates($labid);
		}
		$data['laboratories'] = $this->laboratories_model->get_all_laboratories();
		$this->load->view('_main_layout_internal',$data);
	}

	public function confirm_experiment($eid = 0){
		if($eid == 0){
			redirect(''); //redirect somewhere if $eid was not supplied
		}
		$this->load->model('experiments_model');
		$info['is_published'] = "true";
		$fid = $this->session->userdata('active_id');
		if($this->experiments_model->advise_experiment($fid,$eid) && $this->experiments_model->update_experiment($eid,$info)){
			$msg = "You have successfully confirmed an experiment.";
		}
		else{
			$msg = "Confirming an experiment failed.";
		}
		$this->session->set_flashdata('notification',$msg);
		redirect('faculty/advisory');
		//Warning: Update of experiment happened before assigning it to be advised by the faculty
	}

	public function reject_experiment($eid = 0){
		if($eid == 0){
			redirect(''); //redirect somewhere if $eid was not supplied
		}
		$this->load->model('experiments_model');
		$fid = $this->session->userdata('active_id');
		if($this->experiments_model->reject_experiment($fid,$eid)){
			$msg = "You have successfully rejected an experiment.";
		}
		else{
			$msg = "Rejecting an experiment failed.";
		}
		$this->session->set_flashdata('notification',$msg);
		redirect('faculty/advisory');
		//Warning: Update of experiment happened before assigning it to be advised by the faculty
	}

	public function request_lab($labid = 0){
		if($labid == 0 || is_null($labid)){
			redirect('');
			//implement where to redirect if labid is 0 or none
		}
		$this->load->model('laboratories_model');
		$fid = $this->session->userdata('active_id');
		$status = $this->laboratories_model->request_faculty_lab($labid,$fid);
		if($status){
			$msg = "Request sent!";
		}
		else{
			$msg = "Error sending the request";
		}	
		$this->session->set_flashdata('notification',$msg);
		redirect(''); //implement where to redirect after a faculty request for a lab
	}

	public function view($username = null){
		if(is_null($username)){
			redirect('');
			//implement where to redirect if username is non-existent
		}

		$data['user'] = $this->users_model->get_user_profile(0,$username);

		if(is_null($data['user'])){
			redirect('');
			//implement where to redirect if user is non-existent
		}

		$data['faculty'] = $this->faculty_model->get_faculty_profile(0,$username);
		$fid = $data['faculty']->fid;
		$data['experiments'] = $this->get_all_experiments($fid);
		$data['title'] = 'Faculty';
		$data['main_content'] = 'faculty/view';
		$this->load->view('_main_layout', $data);
	}

	public function edit_faculty($uid = 0, $fid = 0){
		$data['title'] = 'Profile';
		$data['user_profile'] = $this->users_model->get_user_profile($uid);
		$data['faculty_profile'] = $this->faculty_model->get_faculty_profile($fid);
		$data['experiments'] = $this->get_all_experiments($fid);
		$data['main_content'] = 'contents/profile';
		$this->load->view('_main_layout_internal', $data);
	}

	public function view_experiment($fid = 0, $eid = 0){
		if($eid == 0 || $fid == 0){
			redirect('');
			//implement where to redirect if eid or gid is non-existent
		}
		$this->load->model('experiments_model');
		$data['experiment'] = $this->experiments_model->get_faculty_experiment($fid,$eid);
		$data['title'] = 'Faculty';
		$data['main_content'] = 'faculty/view_experiment';
		$this->load->view('_main_layout', $data);
	}
	
	private function get_all_experiments($fid = 0){
		$this->load->model('experiments_model');
		return $this->experiments_model->get_all_faculty_experiments($fid);
	}

	private function get_all_advisory_experiments($fid = 0){
		$this->load->model('experiments_model');
		return $this->experiments_model->get_all_advisory_experiments($fid);
	}

	private function get_all_request_experiments($list){
		$requests = [];
		foreach($list as $e){
			if($e->advise_status == 'f'){
				$requests[] = $e;
			}
		}
		if(empty($requests)){
			$requests = null;
		}
		return $requests;
	}

	private function get_all_advised_experiments($list){
		$advisory = [];
		foreach ($list as $e){
			if($e->advise_status == 't'){
				$advisory[] = $e;
			}
		}
		if(empty($advisory)){
			$advisory = null;
		}
		return $advisory;
	}
}