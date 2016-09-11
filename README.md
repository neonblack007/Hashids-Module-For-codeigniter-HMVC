# Hashids-Module-For-codeigniter-HMVC
Hashids module for codeigniter HMVC

Hashids is a small open-source library that generates short, unique, non-sequential ids from numbers.
It converts numbers like 347 into strings like “yr8”, or array of numbers like [27, 986] into “3kTMd”.
You can also decode those ids back.

Example :-

class Site extends Controller 
{

	function __construct()
	{
		parent::Controller();
		$this->load->module('hashids'); // load module
	}
	
	function members_area()
	{
		modules::run('login/is_logged_in');
		$user_id=2;
		$data['id']=$user_id; // Normal Id 
		$encrypt_id = $this->hashids->encrypt($user_id); 
		// encrypt() function from hashid module will convert normal id into encrypted Id
		
		$data['encrypt_id']=$encrypt_id; // encrypted Id
		
		$decrypt_id = $this->hashids->decrypt($encrypt_id); 
		// decrypt() function will convert encrypted id back to normal id 
		
		$data['decrypt_id']=$decrypt_id; // Normal Id
		$this->load->view('logged_in_area',$data);
	}
}
