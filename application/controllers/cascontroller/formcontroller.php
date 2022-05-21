<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formcontroller extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('casmodel/formmodel');
    }

	public function index()
	{
		$this->load->view('Layouts/header');
		$this->load->view('casviews/formview');
		$this->load->view('Layouts/footer');
	}

	public function insert()
	{

		$this->form_validation->set_rules('Surname', 'Surname', 'required');
		$this->form_validation->set_rules('Firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('Middlename', 'Middlename', 'required');
		$this->form_validation->set_rules('Email', 'Email', 'required');
		// $this->form_validation->set_rules('Phone', 'Phone', 'required');
		// $this->form_validation->set_rules('DOB', 'DOB', 'required');
		// $this->form_validation->set_rules('Age', 'Age', 'required');
		// $this->form_validation->set_rules('Gender', 'Gender', 'required');
		// $this->form_validation->set_rules('DOJ', 'DOJ', 'required');
		// $this->form_validation->set_rules('EmployeeCode', 'EmployeeCode', 'required');
		// $this->form_validation->set_rules('Branch', 'Branch', 'required');
		// $this->form_validation->set_rules('Address', 'Address', 'required');
		// $this->form_validation->set_rules('State', 'State', 'required');
		// $this->form_validation->set_rules('City', 'City', 'required');
		// $this->form_validation->set_rules('Taluka', 'Taluka', 'required');
		// $this->form_validation->set_rules('Village', 'Village', 'required');
		// $this->form_validation->set_rules('Pincode', 'Pincode', 'required');
		// $this->form_validation->set_rules('Probession', 'Probession', 'required');
		// $this->form_validation->set_rules('GRNo', 'GRNo', 'required');
		// $this->form_validation->set_rules('InstituteName', 'InstituteName', 'required');
		// $this->form_validation->set_rules('ServiceStartDate', 'ServiceStartDate', 'required');
		// $this->form_validation->set_rules('ServiceEndDate', 'ServiceEndDate', 'required');
		// $this->form_validation->set_rules('TrainingName', 'TrainingName', 'required');
		// $this->form_validation->set_rules('SponsoredBy', 'SponsoredBy', 'required');
		// $this->form_validation->set_rules('Type', 'Type', 'required');
		// $this->form_validation->set_rules('Duration', 'Duration', 'required');
		// $this->form_validation->set_rules('StartDate', 'StartDate', 'required');
		// $this->form_validation->set_rules('EndDate', 'EndDate', 'required');
		// $this->form_validation->set_rules('CRStartDate', 'CRStartDate', 'required');
		// $this->form_validation->set_rules('CREndDate', 'CREndDate', 'required');
		// $this->form_validation->set_rules('Grade', 'Grade', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger"></div>');

		if ($this->form_validation->run()) {
			$ori_filename = $_FILES['userfile']['name'];
			$config = [
				'upload_path'   => './uploads/',
				'allowed_types' => 'jpg|gif|png',
				'overwrite'     => 1,
			];

			$ImageCount = count($_FILES['userfile']['name']);
			// printf($ImageCount);
			for ($i = 0; $i < $ImageCount; $i++) {
				$_FILES['file']['name']       = $_FILES['userfile']['name'][$i];
				$_FILES['file']['type']       = $_FILES['userfile']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['userfile']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['userfile']['error'][$i];
				$_FILES['file']['size']       = $_FILES['userfile']['size'][$i];

				// Load and initialize upload library
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('file')) {
					// Uploaded file data
					$this->upload->data();
					// $uploadImgData[$i]['userfile'] = $imageData['file_name'];
				}
			}

			// $image_path = $config['file_name'];
			// print_r($image_path);
			$data =
				[
					'Surname' => $this->input->post('Surname'),
					'Firstname' => $this->input->post('Firstname'),
					'Middlename' => $this->input->post('Middlename'),
					'Email' => $this->input->post('Email'),
					'Phone' => $this->input->post('Phone'),
					'Designation' => $this->input->post('Designation'),
					'DOB' => $this->input->post('DOB'),
					'Age' => $this->input->post('Age'),
					'Gender' => $this->input->post('Gender'),
					'DOJ' => $this->input->post('DOJ'),
					'EmployeeCode' => $this->input->post('EmployeeCode'),
					'Branch' => $this->input->post('Branch'),
					'Address' => $this->input->post('Address'),
					'State' => $this->input->post('State'),
					'City' => $this->input->post('City'),
					'Taluka' => $this->input->post('Taluka'),
					'Village' => $this->input->post('Village'),
					'Pincode' => $this->input->post('Pincode'),
					'Probession' => $this->input->post('Probession'),
					'GRNo' => $this->input->post('GRNo'),
					'InstituteName' => implode(',', $this->input->post('InstituteName')),
					'ServiceStartDate' => implode(',', $this->input->post('ServiceStartDate')),
					'ServiceEndDate' => implode(',', $this->input->post('ServiceEndDate')),
					'TrainingName' => implode(',', $this->input->post('TrainingName')),
					'SponsoredBy' => implode(',', $this->input->post('SponsoredBy')),
					'Type' => implode(',', $this->input->post('Type')),
					'Duration' => implode(',', $this->input->post('Duration')),
					'StartDate' => implode(',', $this->input->post('StartDate')),
					'EndDate' => implode(',', $this->input->post('EndDate')),
					'CRStartDate' => implode(',', $this->input->post('CRStartDate')),
					'CREndDate' => implode(',', $this->input->post('CREndDate')),
					'Grade' => implode(',', $this->input->post('Grade')),
				];
			$data['Proof'] = implode(',', $ori_filename);
			$this->formmodel->insertCas($data);
			$this->session->set_flashdata('status', 'Your form has been submitted successfully');

			$subject = 'Submitted';
			$message = 'Your form has been Successfully Submitted';
			$this->sendmail($data['Email'], $subject, $message);
			redirect(base_url('cascontroller/formcontroller/index'));
		} else {
			// $error = array('error' => $this->upload->display_errors());
			$this->index();
			// $this->load->view('Layouts/header');
			// $this->load->view('formview');
			// $this->load->view('Layouts/footer');
		}
	}

	public function status()
	{
		$id = 1;
		$this->load->view('Layouts/header');
		$data['status'] = $this->formmodel->viewStatus($id);
		$this->load->view('casviews/status',$data);
		$this->load->view('Layouts/footer');
	}

	public function principal()
	{
		$this->load->view('Layouts/header');
		$data['applications'] = $this->formmodel->getData();
		$this->load->view('casviews/principalview',$data);
		$this->load->view('Layouts/footer');
	}

	public function dto()
	{
		$this->load->view('Layouts/header');

		$data['applications'] = $this->formmodel->getData();

		$this->load->view('casviews/dtoview',$data);
		$this->load->view('Layouts/footer');
	}

	public function jd()
	{
		$this->load->view('Layouts/header');

		$data['applications'] = $this->formmodel->getData();
		
		$this->load->view('casviews/jdview',$data);
		$this->load->view('Layouts/footer');
	}



	public function updateStatus($id,$emailId)
	{
		if(!$this->formmodel->status($id))
		{
			$subject = 'Approved and Forwarded';
			$message = 'Dear user , Your form has been successfully approved 
						by Principal and Forwarded to Director';
			$this->sendmail($emailId,$subject,$message);
			redirect(base_url('cascontroller/formcontroller/principal'));
		}		
	}

	public function updatedto($id,$emailId)
	{
		if(!$this->formmodel->statusdto($id))
		{
			$subject = 'Approved and Forwarded';
			$message = 'Dear user , Your form has been successfully approved 
						by Director and Forwarded to Joint Director';
			$this->sendmail($emailId,$subject,$message);
			redirect(base_url('cascontroller/formcontroller/dto'));
		}
	}

	public function updatejd($id,$emailId)
	{
		if(!$this->formmodel->statusjd($id))
		{
			$subject = 'Approved';
			$message = 'Dear user , Your form has been successfully approved by Director';
			$this->sendmail($emailId,$subject,$message);
			redirect(base_url('cascontroller/formcontroller/jd'));
		}
	}

	public function principalreject($id)
	{
		$message = $this->input->post('message');
		if (!$this->formmodel->rejectform($id, $message)) {
			redirect(base_url('formcontroller/principal'));
		}
	}

	public function dtoreject($id)
	{
		$message = $this->input->post('message');
		if (!$this->formmodel->dtorejectform($id, $message)) {
			redirect(base_url('formcontroller/dto'));
		}
	}

	public function jdreject($id)
	{
		$message = $this->input->post('message');
		if (!$this->formmodel->jdrejectform($id, $message)) {
			redirect(base_url('formcontroller/jd'));
		}
	}

	public function sendmail($emailId,$subject,$message)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_timeout' => 60,
			'smtp_port' => 465,
			'smtp_user' => 'codingems123@gmail.com',
			'smtp_pass' => 'Pass@123',
			'charset' => 'utf-8',
			'mailtype' => 'html',
			'newline' => "\r\n",
		);
		$this->email->initialize($config);
		$this->email->from('ems@gmail.com', 'CAS');
		$this->email->to($emailId);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		// if($send)
		// {
		// 	echo "Success";
		// }
		// else
		// {
		// 	print_r($this->email->print_debugger());
		// }
	}

	public function viewDetails($id)
	{
		$data['view'] = $this->formmodel->viewForm($id);
		$this->load->view('casviews/principalviewForm',$data);
	}

	public function viewDetailsdto($id)
	{
		$data['view'] = $this->formmodel->viewForm($id);
		$this->load->view('casviews/dtoviewForm',$data);
	}

	public function viewDetailsjd($id)
	{
		$data['view'] = $this->formmodel->viewForm($id);
		$this->load->view('casviews/jdviewForm',$data);
	}

	public function revertPrincipal($id)
	{
		if(!$this->formmodel->revertChanges($id))
		{
			redirect(base_url('cascontroller/formcontroller/viewDetails/'.$id));
		}
	}

	public function revertDto($id)
	{
		if(!$this->formmodel->revertChangesDto($id))
		{
			redirect(base_url('cascontroller/formcontroller/viewDetailsdto/'.$id));
		}
	}

	public function revertJd($id)
	{
		if(!$this->formmodel->revertChangesJd($id))
		{
			redirect(base_url('cascontroller/formcontroller/viewDetailsjd/'.$id));
		}
	}

	public function otp()
	{
		$otp = rand(111111, 999999);
		$email = $this->input->post('email');

		$data = [
			'email' => $email,
			'otp' => $otp
		];

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_timeout' => 60,
			'smtp_port' => 465,
			'smtp_user' => 'codingems123@gmail.com',
			'smtp_pass' => 'Pass@123',
			'charset' => 'utf-8',
			'mailtype' => 'html',
			'newline' => "\r\n",
		);

		$subject = "OTP";
		$message = "Your OTP form Email Verification is $otp ";
		$this->email->initialize($config);
		$this->email->from('ems@gmail.com', 'OTP');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

		$this->formmodel->otp($data);
		echo $otp;
	}

	public function verifyotp()
	{
		$email = $this->input->post('email');
		$otp = $this->input->post('otp');
		if ($this->formmodel->verifyotp($email, $otp))
		{
			echo 'success';
		}
		else
		{
			echo 'error';
		}
	}

}