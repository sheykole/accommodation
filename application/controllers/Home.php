<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent:: __construct();
     
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
		$this->load->helper('func_helper');
        $this->load->library('form_validation');	

    }
    function index()
    {
    	loadModel('apartment_m');
    	loadModel('image_m');
    	$data['list'] = $this->apartment_m->get_few(null,false,'*','created_at','desc');   	    	
        $data['title'] = 'Home';
        $this->load->view('home',$data);
    } 
    function apartments()
    {
    	loadModel('apartment_m');
    	loadModel('image_m');
    	$data['list'] = $this->apartment_m->get_few(null,false,'*','created_at','desc');   	    	
        $data['title'] = 'apartments';
        $this->load->view('home',$data);
    } 
    function apartment($id)
    {
    	loadModel('apartment_m');
    	loadModel('image_m');
    	loadModel('feaacc_m');
    	loadModel('message_m');
    	loadModel('rating_m');
    	if(isset($_POST['message']))
    	{
    		$this->form_validation->set_rules('msg','Message','trim|required');
	    	if($this->form_validation->run()==true)
	    	{
	    		$this->message_m->save(array('message'=>$this->input->post('msg'),
	    									'acc_id'=>$this->input->post('acc_id'),
	    									'agent_id'=>$this->input->post('agent_id'),
	    									'student_id'=>$this->session->userdata('username'),
	    									'dateadded'=>date('Y-m-d H:i:s')
	    								));
	    		$this->session->set_flashdata('item',"Message sent");
	    		redirect('home/apartment/'.$id.'#message','refresh');
	    	}
    	}
    	if(isset($_POST['review']))
    	{
    		$this->form_validation->set_rules('msg','Message','trim|required');
	    	if($this->form_validation->run()==true)
	    	{
	    		$this->rating_m->save(array('description'=>$this->input->post('msg'),
	    									'acc_id'=>$this->input->post('acc_id'),
	    									'student_id'=>$this->session->userdata('username'),
	    									'dateadded'=>date('Y-m-d H:i:s')
	    								));
	    		$this->session->set_flashdata('item',"Review saved");
	    		redirect('home/apartment/'.$id.'#message','refresh');
	    	}
    	}
    	$data['reviews'] = $this->rating_m->get(array('acc_id'=>$id),false);
    	$data['list'] = $this->apartment_m->get(array('acc_id'=>$id),true);   	    	
    	$data['images'] = $this->image_m->get(array('acc_id'=>$id),false);   	    	
    	$data['features'] = $this->feaacc_m->get(array('acc_id'=>$id),false);   	    	
        $data['title'] = 'Apartment';
        $this->load->view('apartment',$data);
    }   
    public function logout(){
    	$this->session->sess_destroy();
    	redirect('home','refresh');;
	}
}
