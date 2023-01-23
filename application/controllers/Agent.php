<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

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
    	$id = dbInfo('admin_m','username',$this->session->userdata('username'),'id');
    	loadModel('apartment_m');
    	$data['list'] = $this->apartment_m->get(array('user_id'=>$id),false);
    	$data['sold'] = $this->apartment_m->record_count(array('user_id'=>$id,'status'=>'sold'));
    	$data['all'] = $this->apartment_m->record_count(array('user_id'=>$id));
    	$data['active'] = $this->apartment_m->record_count(array('user_id'=>$id,'status'=>'active'));
    	$data['inactive'] = $this->apartment_m->record_count(array('user_id'=>$id,'status'=>'inactive'));
        $data['title'] = 'Dashboard';
        $data['subview'] = 'admin/dashboard';
        $this->load->view('admin/layout',$data);
    }
    function messages()
    {
        $id = dbInfo('admin_m','username',$this->session->userdata('username'),'id');
        loadModel('message_m');
        $data['list'] = $this->message_m->get(array('agent_id'=>$id),false);
        $data['title'] = 'Messages';
        $data['subview'] = 'admin/messages';
        $this->load->view('admin/layout',$data);
    }
    
    function uploadAccommodation()
    {
    	loadModel('apartment_m');
    	loadModel('feature_m');
    	loadModel('feaacc_m');
    	loadModel('image_m');
    	$this->load->helper('form');
        $this->load->helper('file');
		$data['title'] = 'Academic Session';		
		$this->form_validation->set_rules('addr','Address','trim|required');
        $this->form_validation->set_rules('name','Name','trim|required');   
		$this->form_validation->set_rules('desc','Description','trim|required');	
		$this->form_validation->set_rules('town','Town','trim|required');	
		$this->form_validation->set_rules('state','State','trim|required');	
		$this->form_validation->set_rules('name','Name','trim|required');	
		$this->form_validation->set_rules('amount','Amount','trim|required');	
		$this->form_validation->set_rules('f1','Feature 1','trim|required');	
		$this->form_validation->set_rules('f2','Feature 2','trim|required');	
		$this->form_validation->set_rules('f3','Feature 3','trim|required');	
        $this->form_validation->set_rules('pix1','','callback_handle_upload33');
        $this->form_validation->set_rules('pix3','','callback_handle_upload22');
        $this->form_validation->set_rules('pix3','','callback_handle_upload3');
		$this->form_validation->set_rules('status','Status','trim|required');			
		if($this->form_validation->run() == true)
		{
			if($_FILES['pix1'])
            {
                $config =array();
                $config['upload_path'] = 'upload/apartments';
                $config['allowed_types'] = 'png|gif|jpg|pdf|doc|docx|csv';
                $config['max_size'] = '8000';
                $this->load->library('upload', $config);
                //$this->upload->initialize($config); // Important
                $this->upload->do_upload("pix1");
                $pt= $this->upload->data();
                $attachment1 = $pt['file_name']; 
            }
            if($_FILES['pix2'])
            {
                $config =array();
                $config['upload_path'] = 'upload/apartments';
                $config['allowed_types'] = 'png|gif|jpg|pdf|doc|docx|csv';
                $config['max_size'] = '8000';
                $this->load->library('upload', $config);
                $this->upload->do_upload("pix2");
                $pt= $this->upload->data();
                $attachment2 = $pt['file_name']; 
            }
            if($_FILES['pix3'])
            {
                $config =array();
                $config['upload_path'] = 'upload/apartments';
                $config['allowed_types'] = 'png|gif|jpg|pdf|doc|docx|csv';
                $config['max_size'] = '8000';
                $this->load->library('upload', $config);
                $this->upload->do_upload("pix3");
                $pt= $this->upload->data();
                $attachment3 = $pt['file_name']; 
            }
			//print_r($_POST);die();
			$acc_id = genReference(11);
			$d = array(
						'hostel_address'=>$this->input->post('addr'),
						'amount'=>$this->input->post('amount'),
						'info'=>$this->input->post('name'),
                        'state'=>$this->input->post('state'),
						'desc'=>$this->input->post('desc'),
						'town'=>$this->input->post('town'),
						'status'=>$this->input->post('status'),
						'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s'),
						'acc_id'=>$acc_id
					);
			$result = $this->apartment_m->save($d);
			 $this->image_m->save(array('path'=>$attachment1,'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			 $this->image_m->save(array('path'=>$attachment2,'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			 $this->image_m->save(array('path'=>$attachment3,'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			 $this->feaacc_m->save(array('feature'=>$this->input->post('f1'),'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			 $this->feaacc_m->save(array('feature'=>$this->input->post('f1'),'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			 $this->feaacc_m->save(array('feature'=>$this->input->post('f2'),'acc_id'=>$acc_id,'user_id'=>dbInfo('admin_m','username',$this->session->userdata('username'),'id'),'created_at'=>date('Y-m-d H:i:s')));
			if($result)
			{

				$this->session->set_flashdata('item','Accommodation Uploaded');				
				redirect('agent','refresh');
			}
		}	
		$data['features'] = $this->feature_m->get();
		$data['subview']='admin/uploadaccommodation';
		$this->load->view('admin/layout',$data);
    }
    function handle_upload33()
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['pix1']['name']);
        if(isset($_FILES['pix1']['name']) && $_FILES['pix1']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else{
                $this->form_validation->set_message('handle_upload33', 'Please select only png|gif|jpg file.');
                return false;
            }
        
        }
   }

   function handle_upload22()
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['pix2']['name']);
        if(isset($_FILES['pix2']['name']) && $_FILES['pix2']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else{
                $this->form_validation->set_message('handle_upload22', 'Please select only png|gif|jpg file.');
                return false;
            }
        
        }
   }

function handle_upload3()
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['pix3']['name']);
        if(isset($_FILES['pix3']['name']) && $_FILES['pix3']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else{
                $this->form_validation->set_message('handle_upload3', 'Please select only png|gif|jpg file.');
                return false;
            }
        
        }
   }
   function accommodation()
    {
    	$id = dbInfo('admin_m','username',$this->session->userdata('username'),'id');
    	loadModel('apartment_m');
    	$data['list'] = $this->apartment_m->get(array('user_id'=>$id),false);    	
        $data['title'] = 'Accommodation';
        $data['subview'] = 'admin/accommodations';
        $this->load->view('admin/layout',$data);
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
        $data['subview'] = 'admin/accommodation';
        $this->load->view('admin/layout',$data);
    }
      function profile()
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
		$this->load->view('admin/layout',$data);
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
		
		if (strtolower($usertype) !='agent' )
		{
			redirect('login','refresh');
		}
	}
    
	public function logout(){
    	$this->session->sess_destroy();
    	redirect('login','refresh');;
	}

}
