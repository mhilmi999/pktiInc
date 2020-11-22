<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('welcome/redirecting');
			return;
		}
		$this->load->view('common/header');
		$this->load->view('common/footer');
	}

	public function login()
	{
		$this->load->view('login');
	}


	public function redirecting()
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		switch ($session_data['id_grup']) {
			case 1:
				redirect('PesertaCtl');
				break;
			case 2:
				redirect('PanitiaCtl');
				break;
				break;
			default:
				redirect('welcome');
				break;
		}

		return;
	}

	public function signup()
	{
		//$this->load->helper(array('form', 'url'));
		//$this->load->view('common/header');
		$this->load->view('signup', array("error" => ""));
		//$this->load->view('common/footer');
		return;
	}
}
