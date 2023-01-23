<?php 
Class MY_Model extends CI_Model{
	
	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('func_helper');
	}
	function runUUID($uuid)
	{
		$this->db->where(array('id!='=>''));
		$this->db->set($uuid, 'UUID()', FALSE);
		$this->db->update($this->table);
		return true;
	}
	
	public function getLimit($d,$s,$i){
		$this->db->select($s);
		$this->db->where($d);
		$this->db->order_by($i,'DESC');
		$this->db->limit();
		$result = $this->db->get($this->table);
		return $query;
	}

	public function getLastInsertId($data){
	    $this->db->insert($this->table,$data);
	    return $this->db->insert_id();
    }
	function field_name()
	{
		$fields = $this->db->list_fields($this->table);
		return $fields;
	}
	// function insertPayment($data,$d,$trans_ref,$dt=null)
	// {
	// 	$adm = $this->load->database('adm',TRUE);
	// 	$this->db->trans_begin();
	// 	//update payment table
	// 	$adm->where($trans_ref);
	// 	$adm->insert($this->table,$data);
	// 	//insert into predata 
	// 	// if($dt !=null)
	// 	// {
	// 	// 	$adm->insert('predata',$dt);
	// 	// 	$id = $adm->insert_id();
	// 	// 	//generate form id
	// 	// 	//format of form
	// 	// 	$format = $this->genForm($id);
	// 	// 	$adm->where(array('id'=>$id));
	// 	// 	$adm->insert(array('form_no'=>$format));
	// 	// }
		
	// 	if ($adm->trans_status() === FALSE)
	// 	{
	// 		$adm->trans_rollback();
	// 		return false;			
	// 	}
	// 	else
	// 	{
	// 		$adm->trans_commit();
	// 		return true;
	// 	}
	// }
	function insertAcceptance($pD, $pW,$form_no,$year=null)
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();
		$adm->where($pW);
		$adm->update($this->table,$pD);			
		$adm->where(array('form_no'=>$form_no,'adm_year'=>$year));
		$adm->update('pre_data',array('accept_fee'=>1));		
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	function insertPayment($pD, $pW, $prD=null,$email=null,$admType='')
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();			
		//insert into predata 
		if($prD !=null)
		{
			$adm->where(array('adm_year'=>get_year()));
			//$this->db->like($a);
			//count all the applicants for that admission year
			$adm->where(array('adm_year'=>get_year(),'prog_id'=>$admType));
			$adm->from('pre_data');
			$c = $adm->count_all_results();	
			//echo 'count '. $c.'<br>';
			//echo 'adm type'.$admType.'<br>';
			//generate form no
			$format = genForm(($c+1),$admType);
			//echo 'form no'.$format;die();
			//insert the new record
			$prD['form_no'] = $format;
			$adm->set('reg_id', 'UUID()', FALSE);
			$adm->insert('pre_data',$prD);
			//$id = $adm->insert_id();
			//generate form id
			//format of form
			//$format = genForm($id,$admType);
			// $adm->where(array('id'=>$id));
			// $adm->update('pre_data',array('form_no'=>$format));
			$pD['form_no'] = $format;
			$adm->where($pW);		
			$adm->update($this->table,$pD);	
			// $adm->where(array('email'=>$email));
			// $adm->update('registration',array('form_no'=>$format,'payment'=>'approved','prog'=>$admType));
		}
		
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	// function insertPayment($pD, $pW, $prD=null,$email=null,$admType)
	// {
	// 	$adm = $this->load->database('adm',TRUE);
	// 	$this->db->trans_begin();
	// 	$adm->where($pW);
	// 	$adm->update($this->table,$pD);		
	// 	//insert into predata 
	// 	if($prD !=null)
	// 	{
	// 		$adm->insert('pre_data',$prD);
	// 		$id = $adm->insert_id();
	// 		//generate form id
	// 		//format of form
	// 		$format = genForm($id,$admType);
	// 		$adm->where(array('id'=>$id));
	// 		$adm->update('pre_data',array('form_no'=>$format));
	// 		$adm->where(array('email'=>$email));
	// 		$adm->update('registration',array('form_no'=>$format,'payment'=>'approved','prog'=>$admType));
	// 	}
		
	// 	if ($adm->trans_status() === FALSE)
	// 	{
	// 		$adm->trans_rollback();
	// 		return false;			
	// 	}
	// 	else
	// 	{
	// 		$adm->trans_commit();
	// 		return true;
	// 	}
	// }
	function saveprofile($preR,$preD,$admType)
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();
		//count all the students in the table in that admission year
		$adm->where(array('adm_year'=>get_year()));
		//$this->db->like($a);
		$adm->from('pre_data');
		$c = $adm->count_all_results();	
		$format = genForm(($c+1),$admType);
		$preD['form_no'] = $format;
		//$preR['form_no'] = $format;
		$adm->set('reg_id', 'UUID()', FALSE);
		$adm->insert('registration',$preR);
		$adm->set('reg_id', 'UUID()', FALSE);
		$adm->insert('pre_data',$preD);
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	function tuitionPayment($pD, $pW, $form_no=null,$year=null)
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();
		$adm->where($pW);
		$adm->update($this->table,$pD);	

		//check if the student has matric no
		$test = checkMatric($form_no,$year);
		if(!$test)
		{
			//count all the students in the table in that admission year
			$this->db->where(array('adm_year'=>get_year()));
			//$this->db->like($a);
			$this->db->from('student');
			$c = $this->db->count_all_results();			 
			//generate matric no
			$matric = genMatric(($c+1));
			$adm->where(array('form_no'=>$form_no,'adm_year'=>$year));
			$adm->update('pre_data',array('matric_no'=>$matric));
			//select the rows in predata
			$adm->select(array('form_no','id','matric_no','password','lastname','firstname','middlename','gender','state','dob','nationality','place_of_birth' ,'marital_status','pno','email','address','sec_pno', 'religion' ,'passport' , 'level',  'dept_id','prog_id','status','last_login','adm_year', 'comment','adm_status','approval_type','reg_id','reg_date','bloodgroup','genotype','lga','sname','saddr','spno','srelat','semail','nkname','nkaddr', 'nkpno','firstchoice','secondchoice','firstchoicecourse1','firstchoicecourse2', 'secondchoicecourse1','secondchoicecourse2','jamb1','jamb2','jamb3','jamb4','score1','score2','score3','score4','accept_fee','programme_id'));
			$adm->where(array('form_no'=>$form_no,'adm_year'=>$year));
			$q = $adm->get('pre_data')->row();
			//print_r($q);die();
			$this->db->insert('student',$q);
			//select the rows in payment
			$adm->select(array('pay_ref','ret_ref','total','trans_ref','memo','status','date','method','prog_id','rescode','tuition_type'));
			$adm->where($pW);
			$w = (array)$adm->get('payment')->row();
			$w['matric_no'] = $matric;
			$w['method'] = 'online';
			$w['session_id'] = currSession();
			//print_r($q);die();
			$this->db->insert('payment',$w);
			//insert payment in 
		}
		//update predata table
		
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	function tuitionPaymentPortalOut($pD, $pW)
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();
		$adm->where($pW);
		$adm->update($this->table,$pD);
		
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	function exemptPayment($prD=null,$email=null,$admType='')
	{
		$adm = $this->load->database('adm',TRUE);
		$this->db->trans_begin();	
		//insert into predata 
		if($prD !=null)
		{
			$adm->where(array('adm_year'=>get_year(),'prog_id'=>$admType));
			$adm->from('pre_data');
			$c = $adm->count_all_results();	
			//generate form no
			$format = genForm(($c+1),$admType);
			$prD['form_no'] = $format;
			$adm->set('reg_id', 'UUID()', FALSE);
			$adm->insert('pre_data',$prD);
			$adm->insert('exempted_applicants',array('form_no'=>$format,'adm_year'=>get_year(),'dateadded'=>date('Y-m-d H:i:s')));

			
		}
		
		if ($adm->trans_status() === FALSE)
		{
			$adm->trans_rollback();
			return false;			
		}
		else
		{
			$adm->trans_commit();
			return true;
		}
	}
	function sum($atr,$whr=null)
	{
		if($whr!=null)
			$this->db->where($whr);
		$this->db->select_sum($atr);
		$result = $this->db->get($this->table)->row();  
		return $result->amount;
	}
	function sum2($pW=null,$atr=null,$whr=null)
	{
		$adm = $this->load->database('adm',TRUE);
		if($whr!=null)
			$adm->where($pW);
		$adm->db->select_sum($atr);
		$result = $adm->db->get($this->table)->row();  
		return $result->amount;
	}
	function sumAdm($atr,$whr=null)
	{
		$adm = $this->load->database('adm',TRUE);
		if($whr!=null)
			$adm->where($whr);
		$adm->select_sum($atr);
		$result = $adm->get($this->table)->row();  
		return $result->total;
	}
	function sum3($atr,$whr=null)
	{
		if($whr!=null)
			$this->db->where($whr);
		$this->db->select_sum($atr);
		$result = $this->db->get($this->table)->row();  
		return $result->total;
	}
	function sumAtr($atr,$whr=null,$par=null)
	{
		if($whr!=null)
			$this->db->where($whr);
		$this->db->select_sum($atr);
		$result = $this->db->get($this->table)->row();  
		return $result->$par;
	}
	function insert_csv($data) {
        $this->db->insert($this->table, $data);
    }
	function getLastId($s,$i)
	{
		$this->db->select($s);
		$this->db->order_by($i,'DESC');
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query;
	}
	function update($data,$whr)
	{
		$this->db->where($whr);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
		
	}
	function save($data,$whr = null,$uuid=null)
	{
		//update
		if($whr != null)
		{
			$this->db->where($whr);
			$this->db->update($this->table,$data);
			return true;
		}
		//insert
		else
		{
			if($uuid !=null)
				$this->db->set($uuid, 'UUID()', FALSE);
			$this->db->insert($this->table,$data);
			return true;
		}
	}
	//
	function transInsert($data,$whr,$secTable,$id)
	{
		$this->db->trans_begin();
		$this->db->where($whr);
		$this->db->update('approved',$data);
		//$this->save($data,$whr);
		$this->copyApplicant($id,$secTable);
		//$this->delete_trans($whr,'approved');
		//$this->db->query("INSERT ".$this->table." SELECT * FROM ".$secTabable.' WHERE id='.$id);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
	
	//to copy from one table to another
	function copyApplicant($whr, $secTab)
	{
		$this->db->query("INSERT ".$this->table." SELECT * FROM ".$secTab.' WHERE id='.$whr);
	}
	// to return the insert ID
	function insert($data,$whr = null)
	{
		//update
		if($whr != null)
		{
			$this->db->where($whr);
			$this->db->update($this->table,$data);
			return true;
		}
		//insert
		else
		{
			$this->db->insert($this->table,$data);
			return $this->db->insert_id();
		}
	}
	function get_distinct($n,$w=NULL)
	{
		if($w == NULL)
		{
			$this->db->select($n);
			$this->db->distinct();
			//$this->db->where($d);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
		else
		{
			
			$this->db->select($n);
			$this->db->distinct();
			$this->db->where($w);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
	}
	function get($d = NULL,$single=false)
	{
		if($d == NULL)
		{
			$r = $this->db->get($this->table);
			if($r->num_rows() > 0 )
			{
				return $r->result();
			}
		}
		elseif($single == true){
			
			$this->db->where($d);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->row();
			}
		}
		else
		{
			$this->db->where($d);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
	}
	function get2($d = NULL,$single=false)
	{
		$adm = $this->load->database('adm',TRUE);
		if($d == NULL)
		{
			$r = $adm->get($this->table);
			if($r->num_rows() > 0 )
			{
				return $r->result();
			}
		}
		elseif($single == true){
			
			$adm->where($d);
			$result = $adm->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->row();
			}
		}
		else
		{
			$adm->where($d);
			$result = $adm->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
	}
	function get_few($d = null,$single=false,$s=NULL,$ss=NULL,$r='ASC')
	{
		if($d == null)
		{
			$this->db->select($s);
			$this->db->order_by($ss,$r);
			$r = $this->db->get($this->table);
			if($r->num_rows() > 0 )
			{
				return $r->result();
			}
		}
		elseif($single == true){
			$this->db->select($s);
			$this->db->where($d);
			$this->db->order_by($ss,$r);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->row();
			}
		}
		else
		{
			$this->db->select($s);
			$this->db->where($d);
			$this->db->order_by($ss,$r);
			$result = $this->db->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
	}
	function delete($id)
	{
		$this->db->where($id);
		$this->db->delete($this->table);
		return true;
	}
	function delete_trans($id,$tab)
	{
		$this->db->where($id);
		$this->db->delete($tab);
	}
	function join_q($w,$s,$a,$b,$c=false)
	{
		$this->db->select($s);
		$this->db->where($w);
		$this->db->join($a,$b);
		$query = $this->db->get($this->table);
		if($c == false)
		{
			return $query->result();
		}
		else
		{
			return $query->row();
		}
	}
	
	function count_all($a)
	{
		$this->db->where($a);
		//$this->db->like($a);
		$this->db->from($this->table);
		return $this->db->count_all_results();		
	}
	function count_employee($a)
	{
		//$this->db->or_where($a);
		$this->db->or_like('firstname',$a['firstname']);
		$this->db->or_like('lastname',$a['lastname']);
		$this->db->or_like('middlename',$a['middlename']);
		$this->db->where('unit',$a['unit']);
		$this->db->where('employee_id',$a['employee_id']);
		$this->db->where('employee_status',$a['employee_status']);
		$query = $this->db->get($this->table);
		 return $query->result();
		//return $this->db->count_all_results();		
	}
	function record_count($w = NULL) {
		if($w != NULL)
		{
			$this->db->where($w);
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		else
		{
			return $this->db->count_all($this->table);
		}
    }
	public function fetch_all($limit, $start,$sort=NULL,$by='ASC') {
        $this->db->order_by($sort,$by);
		$this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function fetch($w=null,$s=null,$limit=null,$sort=NULL,$by='ASC') {
	    $this->db->select($s);
	    if($w != null)
			$this->db->where($w);
		$this->db->order_by($sort,$by);
        $this->db->limit($limit);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   function getLastId2($s,$i)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->select($s);
		$adm->order_by($i,'DESC');
		$adm->limit(1);
		$query = $adm->get($this->table);
		return $query;
	}
	function update2($data,$whr)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->where($whr);
		$adm->update($this->table,$data);
		return $adm->affected_rows();
	}
	function save2($data,$whr = null,$uuid = null)
	{
		//$CI= &get_instance();
		$adm = $this->load->database('adm',TRUE);
		//update		
		if($whr != null)
		{
			$adm->where($whr);
			$adm->update($this->table,$data);
			return true;
		}
		//insert
		else
		{
			if($uuid !=null)
				$adm->set($uuid, 'UUID()', FALSE);
			$adm->insert($this->table,$data);
			return true;
		}
	}
	
	// to return the insert ID
	function insert2($data,$whr = null)
	{
		$adm = $this->load->database('adm',TRUE);
		//update
		if($whr != null)
		{
			$adm->where($whr);
			$adm->update($this->table,$data);
			return true;
		}
		//insert
		else
		{
			$adm->insert($this->table,$data);
			return $adm->insert_id();
		}
	}
	function get_distinct2($n)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->select($n);
		$adm->distinct();
		//$this->db->where($d);
		$result = $adm->get($this->table);
		if($result->num_rows() > 0 )
		{
			return $result->result();
		}
	}
	
	function get_few2($d = null,$single=false,$s=NULL,$ss=NULL,$r='ASC')
	{
		$adm = $this->load->database('adm',TRUE);
		if($d == null)
		{
			$adm->select($s);
			$adm->order_by($ss,$r);
			$r = $adm->get($this->table);
			if($r->num_rows() > 0 )
			{
				return $r->result();
			}
		}
		elseif($single == true){
			$adm->select($s);
			$adm->where($d);
			$adm->order_by($ss,$r);
			$result = $adm->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->row();
			}
		}
		else
		{
			$adm->select($s);
			$adm->where($d);
			$adm->order_by($ss,$r);
			$result = $adm->get($this->table);
			if($result->num_rows() > 0 )
			{
				return $result->result();
			}
		}
	}
	function delete2($id)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->where($id);
		$adm->delete($this->table);
		return true;
	}
	function join_q2($w,$s,$a,$b,$c=false)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->select($s);
		$adm->where($w);
		$adm->join($a,$b);
		$query = $adm->get($this->table);
		if($c == false)
		{
			return $query->result();
		}
		else
		{
			return $query->row();
		}
	}
	
	function count_all2($a)
	{
		$adm = $this->load->database('adm',TRUE);
		$adm->where($a);
		//$this->db->like($a);
		$adm->from($this->table);
		return $adm->count_all_results();		
	}
	function record_count2($w = NULL) 
	{
		$adm = $this->load->database('adm',TRUE);
		if($w != NULL)
		{
			$adm->where($w);
			$adm->from($this->table);
			return $adm->count_all_results();
		}
		else
		{
			return $adm->count_all($this->table);
		}
    }
	public function fetch_all2($limit, $start,$sort=NULL,$by='ASC') {
		$adm = $this->load->database('adm',TRUE);
        $adm->order_by($sort,$by);
		$adm->limit($limit, $start);
        $query = $adm->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   function sumAtr2($atr,$whr=null,$par=null)
	{
		$adm = $this->load->database('adm',TRUE);
		if($whr!=null)
			$adm->where($whr);
		$adm->select_sum($atr);
		$result = $adm->get($this->table)->row();  
		return $result->$par;
	}
   public function fetch2($w=null,$s=null,$limit=null,$sort=NULL,$by='ASC') {
   		$adm = $this->load->database('adm',TRUE);
	    $adm->select($s);
	    if($w != null)
			$adm->where($w);
		$adm->order_by($sort,$by);
       $adm->limit($limit);
        $query = $adm->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	public function show_data_by_date2($date,$c,$data) 
	{
		$adm = $this->load->database('adm',TRUE);
		$condition = $date." BETWEEN " . "'" . $data['from'] . "'" . " AND " . "'" . $data['to'] . "'";
		$adm ->select('*');
		$adm->where($c);
		$adm->where($condition);
		$adm->order_by($date,'DESC');
		$query = $adm->get($this->table);
		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	public function show_data_by_date($date,$c,$data) 
	{
		$condition = $date." BETWEEN " . "'" . $data['from'] . "'" . " AND " . "'" . $data['to'] . "'";
		$this->db->select('*');
		$this->db->where($c);
		$this->db->where($condition);
		$this->db->order_by($date,'DESC');
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	
		
	private function _get_datatables_query($search,$col)
    {
         
        $this->db->from($this->tab);
 
        $i = 0;
     
        foreach ($search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($col[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($search,$whr=null,$col=null)
    {
        $this->_get_datatables_query($search,$col);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    	if($whr != null)		
			$this->db->where($whr);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($search,$whr=null,$col=null)
    {
        $this->_get_datatables_query($search,$col);
        if($whr != null)
        	$this->db->where($whr);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_al($whr=null)
    {
    	if($whr != null)
        	$this->db->where($whr);
        $this->db->from($this->tab);
        return $this->db->count_all_results();
    }
	

	
}