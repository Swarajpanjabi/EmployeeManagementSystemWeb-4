<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //important to call parent constructor
        $this->load->model('Auth_model');
        $this->load->model('Employee_model');
    }
    public function employee()
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

    public function hod()
    {
        // echo "Hello";
        $data['dept_id'] = $this->session->userdata('dept_id');
        $data['dept'] = "";

        // print_r( $data['dept_id']);

        switch ( $data['dept_id']) {
          case "1":
            $data['dept']= "Computer";
            break;
          case "2":
            $data['dept'] = "IT";
            break;
          case "3":
            $data['dept'] = "Mechanical";
            break;
          case "4":
            $data['dept'] = "Civil";
            break;
          case "5":
            $data['dept'] = "Electrical";
            break;
          case "6":
            $data['dept'] = "Electronics";
            break;
          case "7":
            $data['dept'] = "Pharmacy";
            break;
          case "8":
            $data['dept'] = "Chemical";
            break;
          case "9":
            $data['dept'] = "Plastic Polymer";
            break;
          default:
            $data['dept']= "Computer";  
        switch ($data['dept_id']) {
            case "1":
                $data['dept'] = "Computer";
                break;
            case "2":
                $data['dept'] = "Electrical";
                break;
            case "3":
                $data['dept'] = "IT";
                break;
            default:
                $data['dept'] = "Computer";
        }

        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        
        $data['current_user'] = $current_user;
        $data['department'] = $department['dept_name'];
        $data['organization'] = $organization['org_name'];

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/hod/hod_sidebar.php', $data);
        $this->load->view('dashboard/hod/hod_dashboard.php', $data);
        $this->load->view('templates/footer.php');
    }
  }
    public function principal()
    {

        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/principle/principle_sidebar.php');
        $this->load->view('dashboard/principle/principal_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }

    public function registrar()
    {
        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/registrar/registrar_sidebar.php');
        $this->load->view('dashboard/registrar/registrar_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }

    public function admin()
    {

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/admin/admin_sidebar.php');
        $this->load->view('dashboard/admin/admin_dashboard.php');
        $this->load->view('templates/footer.php');
    }
    public function joint_director()
    {

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/joint_director/joint_director_sidebar.php');
        $this->load->view('dashboard/joint_director/joint_director_dashboard.php');
        $this->load->view('templates/footer.php');
    }
    public function director()
    {
        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/director/director_sidebar.php');
        $this->load->view('dashboard/director/director_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }
    public function faculty()
    {
        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/faculty/faculty_sidebar.php');
        $this->load->view('dashboard/faculty/faculty_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }
    public function non_teaching_faculty()
    {

        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/non_teaching_faculty/non_teaching_faculty_sidebar.php');
        $this->load->view('dashboard/non_teaching_faculty/non_teaching_faculty_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }
    public function non_teaching_officials()
    {

        //get session of user
        $current_user_id = $this->session->userdata('user_id');

        $current_user = $this->Auth_model->get_employee_by_id($current_user_id);

        $department = $this->Employee_model->get_department_by_id($current_user['dept_id']);
        $organization = $this->Employee_model->get_organization_by_id($current_user['org_id']);

        // echo "Hello";
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('dashboard/non_teaching_officials/non_teaching_officials_sidebar.php');
        $this->load->view('dashboard/non_teaching_officials/non_teaching_officails_dashboard.php', array('current_user' => $current_user, 'department' => $department['dept_name'], 'organization' => $organization['org_name']));
        $this->load->view('templates/footer.php');
    }

}