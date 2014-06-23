<?php

class Laboratories extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('laboratory_model','laboratory');
		$this->load->model('laboratory_head_model','laboratory_head');
	}

	public function index(){
		$data['laboratories'] = $this->laboratory->all();
		$data['title'] = 'Explore';
		$data['main_content'] = 'laboratory/index';
		$data['page'] = 'all';
		$this->load->view('main_layout', $data);
	}

	/* REST Methods */
	public function view($labid = 0){
		$data['laboratory'] = $this->laboratory->get($labid);
		$data['lab_head'] = $this->laboratory->get_laboratory_head($labid);
		$data['faculty'] = $this->laboratory->get_all_faculty($labid);
		$data['graduates'] = $this->laboratory->get_all_graduates($labid);
		$data['notification'] = $this->session->flashdata('notification');
		$data['title'] = 'Laboratories';
		$data['main_content'] = 'laboratory/index';
		$data['page'] = 'view';
		$this->load->view('main_layout', $data);
	}

	public function create(){
		$faculty_username = $this->input->post('faculty');
		$laboratory_info['name'] = $this->input->post('laboratory');
		$laboratory_info['description'] = $this->input->post('description');

		if($this->laboratory->create($laboratory_info, $faculty_username)){
			$msg = 'You have successfully created a laboratory!';
		}
		else{
			$msg = 'Error creating laboratory!';
		}
		
		$this->session->set_flashdata('notification',$msg);
		redirect('admin/laboratories');
	}

	public function destroy(){
		$lab_id = $this->input->post('lab_id');
		if($this->laboratory->destroy($lab_id)){
			$msg = "Deletion successful!";
		}
		else{
			$msg = "Deletion failed!";
		}
		$this->session->set_flashdata('notification',$msg);
		redirect('admin/laboratories');
	}
}