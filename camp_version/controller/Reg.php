<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__).'/Camp_controller.php');

class Reg extends Camp_controller
{

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('60160027/test');
	}

	public function viewStudent()
	{
		$student['student'] = $this->getAllStudent();
		$student['gender'] = $this->getGender();
		$student['status'] = $this->getStatus();
		$student['prefix'] = $this->getPrefix();
		$this->load->view('60160027/student-form', $student);
	}

	public function getAllStudent()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->student->getAllStudent();
		return $student;
	}

	public function searchStudent()
	{
		$search = $this->input->post('search');
		$this->load->model('60160027/student', 'student');
		$student['student'] = $this->student->searchStudent($search);
		$student['gender'] = $this->getGender();
		$student['status'] = $this->getStatus();
		//print_r($student);
		$this->load->view('60160027/student-form', $student);
	}

	public function addStudent()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->input->post();
		//print_r($student);
		if (!empty($student)) {
			$data = array(
				'std_code' => $this->input->post('code'),
				'std_pf_id' => $this->input->post('prefix'),
				'std_name' => $this->input->post('fname'),
				'std_lname' => $this->input->post('lanme'),
				'std_gd_id' => $this->input->post('gender'),
				'std_ms_id' => $this->input->post('status'),
				'std_dob' => $this->input->post('bdate'),
				'std_age' => $this->input->post('age'),
			);
			$this->student->addStudent($data);
			$this->viewStudent();
		}
	}

	public function getGender()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->student->getGender();
		return $student;
	}

	public function getStatus()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->student->getStatus();
		return $student;
	}

	public function getPrefix()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->student->getPrefix();
		return $student;
	}

	public function delStudent()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->input->post('id');
		//print_r($student);
		$this->student->delStudent($student);
		$this->viewStudent();
	}

	public function editStudent()
	{
		$this->load->model('60160027/student', 'student');
		$student['id'] = $this->input->post('id');
		$student['student'] = $this->student->searchId($student['id']);
		//print_r($student);
		$this->loadStudent($student['student']);
	}

	public function loadStudent($data)
	{
		$student['student'] = $this->getAllStudent();
		$student['gender'] = $this->getGender();
		$student['status'] = $this->getStatus();
		$student['prefix'] = $this->getPrefix();
		$student['data'] = $data;
		$this->load->view('60160027/student-edit', $student);
	}

	public function updateStudent()
	{
		$this->load->model('60160027/student', 'student');
		$student = $this->input->post();
		//print_r($student);
		if (!empty($student)) {
			$data = array(
				'std_id' => $this->input->post('id'),
				'std_code' => $this->input->post('code'),
				'std_pf_id' => $this->input->post('prefix'),
				'std_name' => $this->input->post('fname'),
				'std_lname' => $this->input->post('lanme'),
				'std_gd_id' => $this->input->post('gender'),
				'std_ms_id' => $this->input->post('status'),
				'std_dob' => $this->input->post('bdate'),
				'std_age' => $this->input->post('age'),
			);
			$this->student->updateStudent($data);
			$this->viewStudent();
		}
	}
}
