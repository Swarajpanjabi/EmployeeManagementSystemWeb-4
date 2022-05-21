<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //important to call parent constructor
        $this->load->model('Employee_model');
        $this->load->model('leave_model');
    }
    public function index()
    {
        //get session of user
$current_user_id = $this->session->userdata('user_id');

$current_user = $this->Auth_model->get_employee_by_id($current_user_id);

$department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
$organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

       
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/employee/employee_sidebar.php');
        $this->load->view('dashboard/employee/employee_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));  
        $this->load->view('templates/footer.php');
    }

    public function clear_rules()
    {
        $this->_error_array = array();
        $this->_field_data = array();
        return $this;
    }

    public function apply_training()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('organization_name', 'Organization Name', 'required');
        $this->form_validation->set_rules('organized_by', 'Organized By', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() == false) {

            $training_types = $this->Employee_model->getTrainingTypes();

            $this->load->view('templates/header.php');
            $this->load->view('templates/navbar.php');
            $this->load->view('dashboard/employee/employee_sidebar.php');
            $this->load->view('dashboard/employee/apply_training.php', ['training_types' => $training_types]);
            $this->load->view('templates/footer.php');
        } else {

            $training_types = $this->Employee_model->getTrainingTypes();

            

            $config = array(
                'upload_path' => base_url()."uploads/apply_trainings", //path for upload
                'allowed_types' => "*", //restrict extension
                'max_size' => '300000',
                'max_width' => '30000',
                'max_height' => '30000',
            );

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pdf')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failure', $error);

                $this->load->view('templates/header.php');
                $this->load->view('templates/navbar.php');
                $this->load->view('dashboard/employee/employee_sidebar.php');
                $this->load->view('dashboard/employee/apply_training.php', ['training_types' => $training_types]);
                $this->load->view('templates/footer.php');
            } else {

                $name = $this->input->post('name');
                $organization_name = $this->input->post('organization_name');
                $organization_by = $this->input->post('organized_by');
                $duration = $this->input->post('duration');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $training_type = $this->input->post('training_type');
                $apply_to = $this->input->post('apply_to');
                $pdf = $this->upload->data('file_name');

                //get current user
                $sevarth_id = $this->session->userdata('user_id');
                $user = $this->Auth_model->get_employee_by_id($sevarth_id);
                $array_start_date = explode('-', $start_date);
                $array_end_date = explode('-', $end_date);


             

                

                $data = array(
                    'sevarth_id' => $sevarth_id,
                    'name' => $name,
                    'org_name' => $organization_name,
                    'organized_by' => $organization_by,
                    'duration' => $duration,
                    'start_date' => $array_start_date[2] . "-" . $array_start_date[1] . "-" . $array_start_date[0],
                    'end_date' => $array_end_date[2] . "-" . $array_end_date[1] . "-" . $array_end_date[0],
                    'training_type' => $training_type,
                    'apply_letter' => $pdf,
                    'hod_id' => $user['hod_id'],
                    'principal_id' => $user['principle_id'],
                    'training_status_id' => $apply_to,
                );

                if ($data['end_date'] == $data['start_date']) {
                    $this->session->set_flashdata('failure', 'Start Date should not equal to end date');

                    $this->load->view('templates/header.php');
                    $this->load->view('templates/navbar.php');
                    $this->load->view('dashboard/employee/employee_sidebar.php');
                    $this->load->view('dashboard/employee/apply_training.php', ['training_types' => $training_types]);
                    $this->load->view('templates/footer.php');

                    
                }else if($data['end_date'] == $data['start_date']){
                    $this->session->set_flashdata('failure', 'Start Date should not less than end date');

                    $this->load->view('templates/header.php');
                    $this->load->view('templates/navbar.php');
                    $this->load->view('dashboard/employee/employee_sidebar.php');
                    $this->load->view('dashboard/employee/apply_training.php', ['training_types' => $training_types]);
                    $this->load->view('templates/footer.php');

                }else{
                   
                    if ($this->Employee_model->insert_training($data)) {
                        $this->session->set_flashdata('success', 'Training Applied Successfully');
                        redirect('Employee/EmployeeController/index');
                    } else {
                        $this->session->set_flashdata('failure', 'Unable to Apply Training');
                        redirect('Employee/EmployeeController/apply_training');
                    }

                }

            

            }
        }
    }

    public function add_completed_training()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('organization_name', 'Organization Name', 'required');
        $this->form_validation->set_rules('organized_by', 'Organized By', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() == false) {

            $training_types = $this->Employee_model->getTrainingTypes();

            $this->load->view('templates/header.php');
            $this->load->view('templates/navbar.php');
            $this->load->view('dashboard/employee/employee_sidebar.php');
            $this->load->view('dashboard/employee/add_completed_training.php', ['training_types' => $training_types]);
            $this->load->view('templates/footer.php');
        } else {

            $training_types = $this->Employee_model->getTrainingTypes();

            $config = array(
                'upload_path' => "uploads/training_certificates", //path for upload
                'allowed_types' => "*", //restrict extension
                'max_size' => '300000',
                'max_width' => '30000',
                'max_height' => '30000',
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pdf')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failure', $error);

                $this->load->view('templates/header.php');
                $this->load->view('templates/navbar.php');
                $this->load->view('dashboard/employee/employee_sidebar.php');
                $this->load->view('dashboard/employee/add_completed_training.php', ['training_types' => $training_types]);
                $this->load->view('templates/footer.php');
            } else {

                $name = $this->input->post('name');
                $organization_name = $this->input->post('organization_name');
                $organization_by = $this->input->post('organized_by');
                $duration = $this->input->post('duration');
                $start_date = $this->input->post('start_date');
                $end_date = $this->input->post('end_date');
                $training_type = $this->input->post('training_type');
                $apply_to = $this->input->post('apply_to');
                $pdf = $this->upload->data('file_name');
                $array_start_date = explode('-', $start_date);
                $array_end_date = explode('-', $end_date);

                //get current user
                $sevarth_id = $this->session->userdata('user_id');
                $user = $this->Auth_model->get_employee_by_id($sevarth_id);

                $data = array(
                    'sevarth_id' => $sevarth_id,
                    'name' => $name,
                    'org_name' => $organization_name,
                    'organized_by' => $organization_by,
                    'duration' => $duration,
                    'start_date' => $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0],
                    'end_date' => $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0],
                    'training_type' => $training_type,
                    'comp_certificate' => $pdf,
                    'hod_id' => $user['hod_id'],
                    'principal_id' => $user['principle_id'],
                    'training_status_id' => 7,
                );

                if ($this->Employee_model->insert_training($data)) {
                    $this->session->set_flashdata('success', 'Training Added Successfully');
                    redirect('Employee/EmployeeController/index');
                } else {
                    $this->session->set_flashdata('failure', 'Unable to Add Training');
                    redirect('Employee/EmployeeController/apply_training');
                }
            }
        }
    }

    public function show_applied_trainings()
    {
        $sevarth_id = $this->session->userdata('user_id');
        $trainings = $this->Employee_model->get_applied_trainings($sevarth_id);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/employee/employee_sidebar.php');
        $this->load->view('dashboard/employee/show_applied_trainings.php', ['trainings' => $trainings]);
        $this->load->view('templates/footer.php');
    }

    public function complete_training()
    {
        $sevarth_id = $this->session->userdata('user_id');
        $trainings = $this->Employee_model->get_approved_trainings($sevarth_id);

        $training_id = $this->input->post('training');

        if ($training_id == null) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/navbar.php');
            $this->load->view('dashboard/employee/employee_sidebar.php');
            $this->load->view('dashboard/employee/complete_training.php', ['trainings' => $trainings]);
        } else {

            $config = array(
                'upload_path' => "uploads/training_certificates", //path for upload
                'allowed_types' => "*", //restrict extension
                'max_size' => '300000',
                'max_width' => '30000',
                'max_height' => '30000',
            );
            $this->load->library('upload', $config);

            //experience pdf upload
            if (!$this->upload->do_upload('certificate')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('failure', $error);
                $this->load->view('templates/header.php');
                $this->load->view('templates/navbar.php');
                $this->load->view('dashboard/employee/employee_sidebar.php');
                $this->load->view('dashboard/employee/complete_training.php', ['trainings' => $trainings]);
            } else {

                $certificate = $this->upload->data('file_name');
                $this->Employee_model->complete_training($training_id, $certificate);

                $this->session->set_flashdata('success', "Training Completed Successfully");
                $this->load->view('templates/header.php');
                $this->load->view('templates/navbar.php');
                $this->load->view('dashboard/employee/employee_sidebar.php');
                $this->load->view('dashboard/employee/complete_training.php', ['trainings' => $trainings]);
            }
        }
    }

    public function mark_training_complete($training_id)
    {
        $training = $this->Employee_model->get_training_by_id($training_id);

        $config = array(
            'upload_path' => "uploads/training_certificates", //path for upload
            'allowed_types' => "*", //restrict extension
            'max_size' => '300000',
            'max_width' => '30000',
            'max_height' => '30000',
        );
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pdf')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('failure', $error);

            $this->load->view('dashboard/employee/complete_training.php', $training);
        } else {

            $pdf = $this->upload->data('file_name');

            $this->Employee_model->mark_training_complete($training_id, $pdf);
            $this->session->set_flashdata('success', "Training Completed Successfully");

            redirect('Employee/EmployeeController/show_applied_trainings');
        }
    }


    public function apply_leave()
    {
        // $data = array();
        // $leave = $this->leave_model->get_available_leaves("123456789013");
        // $data["leaves"] = $leave;

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/employee/employee_sidebar.php');
        //Leave Types
        $leave = $this->leave_model->getLeaveTypes();
        // $data = array();
        $data['leave_types'] = $leave;

        //Employee Details
        $employee = $this->leave_model->fetchEmployeeDetails($this->session->userdata('user_id')); //GPA2  Passed the Sevarth ID
        $data['employees_details'] = $employee;

        $available_leave = $this->leave_model->get_available_leaves($this->session->userdata('user_id'));
        $data["available_leave"] = $available_leave;


        // print_r($data["available_leave"]);
        $this->load->view('dashboard/employee/apply_leave.php', $data);
    }

    //Submitting the leave application
    public function post_apply_leave()
    {
        // $this->load->model('leave_model');
        if ($this->input->post('submit') != NULL) {
            // POST data
            $data['sevarth_id'] = $this->input->post('sevarth_id');
            $data['full_name'] = $this->input->post('full_name');
            $data['leave_type'] = $this->input->post('leave_type');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
            $diff = date_diff($date1, $date2);
            $data['duration'] = $diff->format("%a") + 1;
            // $duration = $data['duration'];
            // $leave_type = $data['leave_type'];
            $data['leave_reason'] = $this->input->post('leave_reason');

            //sending to model
            $leave = $this->leave_model->postApplyLeave($data);
            // print_r($data);
            if ($leave == true) {
                redirect('/apply_leave');
            } else {
                echo "<script type='text/javascript'>
                alert('You have no available leaves');
                </script>";

                $leave = $this->leave_model->getLeaveTypes();
                // $data = array();
                $data['leave_types'] = $leave;

                //Employee Details
                $employee = $this->leave_model->fetchEmployeeDetails($this->session->userdata('user_id')); //GPA2  Passed the Sevarth ID
                $data['employees_details'] = $employee;

                $this->load->view('templates/header.php');
                $this->load->view('templates/navbar.php');
                $this->load->view('dashboard/employee/employee_sidebar.php');
                $this->load->view('dashboard/employee/apply_leave.php', $data);
            }
        }
    }
    //End of APPLY LEAVE

    public function leave_history()
    {
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/employee/employee_sidebar.php');
        $leave = $this->leave_model->getHistoryLeaveApplication($this->session->userdata('user_id')); //GPAMTCM05  //GPA2
        $data = array();
        $data['leave_application'] = $leave;
        // print_r($data);
        $this->load->view('dashboard/employee/leave_history', $data);
    }

    public function delete_application($application_id)
    {
        $this->leave_model->delete_application($application_id);
        redirect(base_url('leave_history'));
    }
}

// const val TRAINING_ALL_STATUS = 0
// const val TRAINING_APPLIED_TO_HOD = 1
// const val TRAINING_APPLIED_TO_PRINCIPLE = 2
// const val TRAINING_APPROVED_BY_HOD = 3
// const val TRAINING_DECLINE_BY_HOD = 4
// const val TRAINING_APPROVED_BY_PRINCIPAL = 5
// const val TRAINING_DECLINED_BY_PRINCIPLE = 6
// const val TRAINING_COMPLETED = 7