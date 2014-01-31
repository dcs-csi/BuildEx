<?php

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admins_model');
	}

	public function index(){
		$data['title'] = 'Home';
		$data['main_content'] = 'home';
		$this->load->view('_main_layout', $data);	

		#Redirect to profile if logged in
		$this->loggedin() == False || redirect($this->session->userdata('role')[0]);
	}

	public function validate_user(){
		$this->load->library('form_validation');
		$this->load->model('users_model');
		$rules = $this->users_model->rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->users_model->is_valid_user($username, $password)){
				$this->users_model->set_session_data($username);
				$role = $this->session->userdata('role');
				$active_role = $this->session->userdata('active_role');

				if($active_role == 'faculty' && $this->users_model->confirmed_faculty() == "t")
					redirect('faculty');

				else if($active_role != 'faculty')
					redirect($active_role);

				else{
					$new_session['loggedin'] = FALSE;
					$this->session->set_userdata($new_session);
					redirect('');
				}
			}

			else
				echo "Cannot sign in.";
		}

		else
			echo "Invalid input.";
	}

	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}

	public function logout() {	
		$this->session->sess_destroy();
		redirect('');
	}

	public function reset(){
		$data['title'] = 'Reset Password';
		$data['main_content'] = 'forms/reset_password_form';
		$this->load->view('_main_layout', $data);			
	}

	function reset_password() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		if($this->form_validation->run() == TRUE) {
			$this->load->model('email_model');
			$email = $this->input->post('email');
			$reset = $this->email_model->edit_password($email);

			if($reset)
				echo "We just sent a temporary password to your email address.";
			else
				echo "We don't recognize that email. Please try again.";
		}

		else echo "Invalid input.";
	}
}