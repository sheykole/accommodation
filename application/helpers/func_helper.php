<?php

function genReference($qtd)
{
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
	$Caracteres = 'Aw44DEFerHIJKtuueMOP64juuSTUVXWYZ0123456789et5rr';
	$QuantidadeCaracteres = strlen($Caracteres);
	$QuantidadeCaracteres--;
 
	$Hash=NULL;
 
	for($x=1;$x<=$qtd;$x++){
		$Posicao = rand(0,$QuantidadeCaracteres);
		$Hash .= substr($Caracteres,$Posicao,1);
	}
 
	return $Hash;
}
function dbInfo($model,$key,$value,$param=null)
{
   $CI = get_instance();
   loadModel($model);
   $std = $CI->$model->get(array($key=>$value),true);
   if($std)
   {
      if($param == null)
         return $std;
      else
         return $std->$param;
   }
   else
      return '';
}
function loadModel($value)
{
	$CI = get_instance();
	$CI->load->model($value);
}

	
function hash_pass($pass)
{
	return hash('sha256', $pass . SALT);
}


