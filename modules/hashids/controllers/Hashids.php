<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/hashids/vendor/autoload.php"; 
class Hashids extends Base_Controller 
{
	private $hashids='';
	function __construct()
	{
	    parent::__construct();
   		$this->config->load('hashids/encrypt', TRUE);
      	$config_encrypt=$this->config->item('encrypt');
      	$this->hashids = new Hashids\Hashids($config_encrypt['salt']);
	}
 	public function encrypt($plainText)
 	{
	 	return $this->hashids->encode($plainText);
 	}
 	public function decrypt($cipherText,$single_flag=TRUE)
 	{
 		if($single_flag == TRUE)
 		{
 			$single_decrypt = $this->hashids->decode($cipherText);
 			return $single_decrypt[0];
 		}
 		else
 		{
 			return $this->hashids->decode($cipherText);;
 		}
 	}

}
