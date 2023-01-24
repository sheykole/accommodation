<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('func_helper');
		$this->load->helper('form');
	}
	function index()
	{
		loadModel('admin_m');
		$data['title'] = "Admin - Login";
		$data[]="";
		if($_POST)
		{
			//$ip =$_SERVER['REMOTE_ADDR'];
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run() == true)
			{
				//echo 'here';die();	
				$username = $this->input->post('username', TRUE);
				$password = hash_pass($this->input->post('password'));
				$data = array('username' => $username, 'password'=>$password);
				
				//check the status of the user
						$result = $this->admin_m->get($this->security->xss_clean($data),true);
				//print_r($result);die();
						if($result)
						{
						

									
									$data = array(
										'username'=>$result->username,
										'name' =>$result->name,
										'user_type' =>$result->type,
										'is_logged_in'=>1,
										'verify'=>0
									);
									$this->session->set_userdata($data);
									if($result->type == 'super admin')
									{										

										$this->session->set_userdata($data);
										redirect('administrator','refresh');
									}
									else if($result->type == 'agent')
									{
										$this->session->set_userdata($data);
										redirect('agent','refresh');
									}
									else if($result->type == 'student')
									{
										$this->session->set_userdata($data);
										redirect('home','refresh');
									}
									
								// }

								// else
								// 	$this->session->set_flashdata('warn',"Unauthorized location. You can't login from this location.");	
								
								
							}
							else
							{
								$this->session->set_flashdata('warn',"Invalid login details, try again");
							}
			}
		}
		$this->load->view('login',$data);
	}	
		function register()
		{

			loadModel('admin_m');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[admin.email]',array('is_unique'=>'Email Address already in use.'));
			$this->form_validation->set_rules('pno', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]|alpha_dash',array('is_unique'=>'Username already in use.'));
			$this->form_validation->set_rules('conpass', 'Confirm Password', 'trim|required|matches[password]');
			if($this->form_validation->run() == true)
			{				
				
					
					$d= array(
						'type'=>$this->input->post('type'),
						'username' =>strtolower($this->input->post('username')),
    					'name' => $this->input->post('name'),					
    					'phone' => $this->input->post('pno'),	
						'email' => strtolower($this->input->post('email')),	
						'password' => hash_pass($this->input->post('password'))
					);
					$this->admin_m->save($d);					
				$this->session->set_flashdata('item',"Registration successful.");
				
				redirect('login','refresh');

			}
			$data[]="";
			$this->load->view('register',$data);
		}

	function reveal()
	{
		echo hash_pass('12345678');
	}
	
	
}

