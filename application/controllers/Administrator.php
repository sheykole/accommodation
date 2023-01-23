<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->is_logged_in();
		$this->priviledge();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
		$this->load->helper('func_helper');
        $this->load->library('form_validation');	

    }
    function index()
    {
    	loadModel('apartment_m');
    	$data['list'] = $this->apartment_m->get();
    	$data['sold'] = $this->apartment_m->record_count(array('status'=>'sold'));
    	$data['all'] = $this->apartment_m->record_count();
    	$data['active'] = $this->apartment_m->record_count(array('status'=>'active'));
    	$data['inactive'] = $this->apartment_m->record_count(array('status'=>'inactive'));
        $data['title'] = 'Dashboard';
        $data['subview'] = 'administrator/dashboard';
        $this->load->view('administrator/layout',$data);
    }    
    function agents()
    {
    	loadModel('admin_m');
    	$data['list'] = $this->admin_m->get(array('type'=>'agent'),false);    	
        $data['title'] = 'Agents';
        $data['subview'] = 'administrator/users';
        $this->load->view('administrator/layout',$data);
    }
    function students()
    {
    	loadModel('admin_m');
    	$data['list'] = $this->admin_m->get(array('type'=>'student'),false);    	
        $data['title'] = 'Students';
        $data['subview'] = 'administrator/users';
        $this->load->view('administrator/layout',$data);
    }
   function accommodation()
    {
    	loadModel('apartment_m');
    	$data['list'] = $this->apartment_m->get();    	
        $data['title'] = 'Accommodation';
        $data['subview'] = 'administrator/accommodations';
        $this->load->view('administrator/layout',$data);
    }
    function getaccommodation($id)
    {
    	loadModel('apartment_m');
    	loadModel('image_m');
    	loadModel('feaacc_m');
    	$data['list'] = $this->apartment_m->get(array('id'=>$id),true);    	
    	$data['images'] = $this->image_m->get(array('acc_id'=>$data['list']->acc_id),false);    	
    	//print_r($data['images'] );die();
    	$data['faetures'] = $this->feaacc_m->get(array('acc_id'=>$data['list']->acc_id),false);    	
        $data['title'] = 'Accommodation';
        $data['subview'] = 'administrator/accommodation';
        $this->load->view('administrator/layout',$data);
    }
      function profile($id)
    {
    	loadModel('admin_m');
		$data['title'] = 'Update Profile';		
		$this->form_validation->set_rules('name','PAssword','trim|required');
		$this->form_validation->set_rules('phone','PAssword','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');	
		$this->form_validation->set_rules('status','Status','trim|required');	
		$this->form_validation->set_rules('type','Type','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');			
		if($this->form_validation->run() == true)
		{			
			
			$d = array(
						'name'=>$this->input->post('name'),
						'status'=>$this->input->post('status'),
						'type'=>$this->input->post('type'),
						'email'=>$this->input->post('email'),
						'phone'=>$this->input->post('phone'),
						'password'=>hash_pass($this->input->post('password')),						
					);
			$result = $this->admin_m->save($d);			 
			if($result)
			{

				$this->session->set_flashdata('item','Profile Uploaded');				
				redirect('administratoristrator/profile','refresh');
			}
		}	
		$data['profile'] =$this->admin_m->get(array('id'=>$id),true);
		$data['subview']='administrator/profile';
		$this->load->view('administrator/layout',$data);
    }
     function updateprofile()
    {
    	loadModel('admin_m');
		$data['title'] = 'Update Profile';		
		$this->form_validation->set_rules('name','PAssword','trim|required');
		$this->form_validation->set_rules('phone','PAssword','trim|required');
		$this->form_validation->set_rules('email','Name','trim|required');	
		$this->form_validation->set_rules('password','Password','trim|required');			
		if($this->form_validation->run() == true)
		{			
			
			$d = array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'phone'=>$this->input->post('phone'),
						'password'=>hash_pass($this->input->post('password')),						
					);
			$result = $this->admin_m->save($d);			 
			if($result)
			{

				$this->session->set_flashdata('item','Profile Uploaded');				
				redirect('agent/profile','refresh');
			}
		}	
		$data['profile'] =$this->admin_m->get(array('username'=>$this->session->userdata('username')),true);
		$data['subview']='admin/profile';
		$this->load->view('administrator/layout',$data);
    }
      function is_logged_in()
	{
		$is_loged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_loged_in) || $is_loged_in < 0)
		{
			redirect('login','refresh');
		}
	}	
	function priviledge()
	{		
		$usertype = $this->session->userdata('user_type');
		
		if (strtolower($usertype) !='super admin' )
		{
			redirect('login','refresh');
		}
	}
    
	public function logout(){
    	$this->session->sess_destroy();
    	redirect('login','refresh');;
	}

}
