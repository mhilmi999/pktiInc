<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApplicationCtl extends CI_Controller
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
	public function download($id_task = 0)
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		$this->load->model(array("task"));
		$this->load->helper('download');

		$task = $this->task->getTheTask($id_task);

		if (sizeof($task) <= 0) {
			echo "failed";
			return;
		}

		try {
			force_download('./berkas/' . $task[0]['file_location'], NULL);
			return;
		} catch (Exception $e) {
			echo 'Gagal mengunduh berkas.';
			return;
		}
	}
	public function downloadCompleted($id_assign = 0)
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		$this->load->model(array("task"));
		$this->load->helper('download');

		$task = $this->task->getTheAssignment($id_assign);

		// if (sizeof($task) <= 0) {
		// 	echo "failed";
		// 	return;
		// }

		try {
			force_download('./berkas/complete/' . $task, NULL);
			return;
		} catch (Exception $e) {
			echo 'Gagal mengunduh berkas.';
			return;
		}
	}
	public function downloadFile($id_assign = 0)
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('welcome/index');
		}
		$session_data = $this->session->userdata('logged_in');

		$this->load->model(array("task"));
		$this->load->helper('download');

		$task = $this->task->getTheBukti($id_assign);


		try {
			force_download('./berkas/bukti/' . $task, NULL);
			return;
		} catch (Exception $e) {
			echo 'Gagal mengunduh berkas.';
			return;
		}
	}
}
