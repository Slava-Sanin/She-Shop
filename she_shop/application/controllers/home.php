<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index(){
	       
    $this->data['content'] = $this->load->view('content/home', null, true);
   
		$this->load->view('templates/main', $this->data);
    
	}
    
}
