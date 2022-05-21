<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //important to call parent constructor
        $this->load->model('Admin_model');
        $this->load->model('leave_model');
    }
    public function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('dashboard/admin/admin_dashboard.php');
        $this->load->view('templates/footer.php');
    }

    public function show_verifications()
    {
        $principle_for_verification_from_admin = $this->Admin_model->get_roles_for_verification();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/admin/admin_sidebar.php');
        $this->load->view("dashboard/admin/show_verifications.php", array('principle_for_verification_from_admin' => $principle_for_verification_from_admin));
    }

    public function accept_principle_request($employee_id)
    {
        $this->Admin_model->accept_role_request($employee_id);

        redirect("/Admin/AdminController/show_verifications");
    }
    public function decline_principle_request($employee_id)
    {
        $this->Admin_model->decline_role_request($employee_id);

        redirect("/Admin/AdminController/show_verifications");
    }

    public function delete_employee($employee_id)
    {
        $this->Admin_model->delete($employee_id);
        redirect('Admin/AdminController/show_employees');
    }

    public function show_employees()
    {
        $sevarth_id = $this->session->userdata('user_id');
        $employees = $this->Admin_model->get_employees($sevarth_id);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/admin/admin_sidebar.php');
        $this->load->view("dashboard/admin/show_employees.php", array('employees' => $employees));
    }

    //Fetching Leave Types
    public function leave_types()
    {
        $leave = $this->leave_model->getLeaveTypes();
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/admin/admin_sidebar.php');
        $data = array();
        $data['leave_types'] = $leave;
        // print_r($data);
        $this->load->view('dashboard/admin/leave_types', $data);
    }

    //Adding Leave Types
    public function post_leave_types()
    {
        // Check form submit or not
        print_r($this->input->post());
        if ($this->input->post('submit') != NULL) {

            // POST data
            $leave_type = $this->input->post('leave_type');
            $total_leaves = $this->input->post('total_leaves');
            $data['leave_type'] = $this->input->post('leave_type');
            $data['leave_description'] = $this->input->post('leave_description');
            $data['total_leaves'] = $this->input->post('total_leaves');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');

            $date1 = date_create($data['start_date']);
            $date2 = date_create($data['end_date']);
            $diff = date_diff($date1, $date2);
            $duration = $diff->format("%a") + 1;
            print_r($duration);
            if ($duration == 365 || $duration == 366) {
                //sending to model
                $leave = $this->leave_model->setLeaveTypes($data, $leave_type, $total_leaves);
                print_r($data);
                if ($leave == true) {
                    redirect('/leave_types');
                } else {
                    echo "Insert error !";
                }
            } else {
                echo "<script type='text/javascript'>
                alert('Please Enter Leave duration of 1 year');
                </script>";

                $leave = $this->leave_model->getLeaveTypes();
                $data = array();
                $data['leave_types'] = $leave;
                // print_r($data);
                $this->load->view('leave/leave_types', $data);
            }
        }
    }

    //Deleting Leave Type
    public function delete_type($leave_id)
    {
        $this->leave_model->delete_type($leave_id);
        redirect(base_url('leave_types'));
    }
}
