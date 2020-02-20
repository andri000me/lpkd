<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

	public function index()
	{
		// $cekUser = $this->session->userdata('userSession');
		// if ($cekUser) {
			# code...

			$this->load->view('dashboard1');
		// }else{
			
		// 	//redirect('auth');
		// }
		
	}

	public function view2()
	{
		$this->load->view('h1.php');
	}


}
