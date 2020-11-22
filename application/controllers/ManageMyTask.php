<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageMyTask extends CI_Controller
{

	public function index()
	{
		echo '<h1>Hello World!!</h1>';

		//		$this->load->view('test', array('title' => 'Judul Baru'));
	}

	public function addNewTask($pesan = '')
	{
		$this->load->helper('form');
		$this->load->view(
			'editor/AddNewTask',
			array('msg' => $pesan)
		);
	}

	public function addingNewTask()
	{
		$this->load->helper(array('url', 'security'));
		$this->load->model('task');
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'judul',
			'Judul',
			'trim|min_length[2]|max_length[250]|xss_clean'
		);
		$this->form_validation->set_rules(
			'katakunci',
			'Kata kunci',
			'trim|min_length[2]|max_length[50]|xss_clean'
		);

		$res = $this->form_validation->run();
		if ($res == FALSE) {
			$msg = validation_errors();
			$this->load->view(
				'editor/AddNewTask',
				array('msg' => $msg)
			);
			return FALSE;
		}
		$id_task = $this->task->insertNewTask();
		redirect('managemytask/selectReviewer/' . $id_task);
	}
	/*
	public function selectReviewer($id_task = -1)
	{
		$this->load->model(array('task', 'reviewer'));
		$thetask = $this->task->getTheTask($id_task);
		$reviewers = $this->reviewer->getAllReviewers();

		$this->load->view(
			'editor/SelectPotentialReviewer',
			array(
				'task' => $thetask[0],
				'reviewers' => $reviewers
			)
		);
	}
}
*/

	function selectPotentialReviewer($id_task = -1)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		if ($session_data['nama_grup'] != 'editor') {
			redirect('welcome/redirecting');
		}
		//load model
		$this->load->model(array('reviewer'));
		//$this->load->model(array('task', 'reviewer'));
		//$tasks = $this->task->getTheTask($id_task);
		$reviewers = $this->reviewer->getAllReviewers();

		//$tasks=$this->task->getMyTask($session_data['id_user']);

		$this->load->view('common/header_editor', array(
			"nama_user" => $session_data['namalengkap'],
			"current_role" => $session_data['nama_grup']
		));
		$this->load->view('editor/selectpotential', array("reviewers" => $reviewers, "id_task" => $id_task));
		//biar bisa menampilkan nama2 reviewer, dengan membawa id_task sebelumnya
		$this->load->view('common/content');
		$this->load->view('common/footer');
		/*$this->load->view('editor/selectpotential', 
                array('task' => $thetask [0], 'reviewers' => $reviewers) );*/
	}

	function requestedTask($id_task = -1, $id_reviewer = -1)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('Welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		if ($session_data['nama_grup'] != 'editor') {
			redirect('Welcome/redirecting');
		}

		$this->load->model('Reviewer');
		$assignments = $this->Reviewer->getPotential($id_task, $id_reviewer);

		if (sizeof(array($assignments)) > 0) {
			$this->load->view('common/header_editor', array(
				"nama_user" => $session_data['namalengkap'],
				"current_role" => $session_data['nama_grup']
			));
			$this->load->view('editor/add_success');
			$this->load->view('common/content');
			$this->load->view('common/footer');
		}
	}
}
