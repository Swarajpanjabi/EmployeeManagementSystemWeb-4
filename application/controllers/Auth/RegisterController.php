<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header.php');
        $this->load->view('auth/login.php');

        // $this->load->view('templates/navbar.php');
        // $this->load->view('templates/sidebar.php');
    }

    public function editDetails()
    {
        $sevarth_id = $this->session->userdata('user_id');
        $is_details_fill = $this->Auth_model->is_details_filled($sevarth_id);

        //if data is are not already filled then redirect to dashboard
        if (!$is_details_fill) {
            $this->session->set_flashdata('failure', 'You Need to Add your Details First');
            $this->navigate_to_dashboards($this->session->userdata('role_id'));
        }

        // $employee_details = $this->Auth_model->get_employee_details();
        $employee_details = $this->Auth_model->get_employee_details($this->session->userdata('user_id'));

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('dob', 'D.O.B', 'required');
        $this->form_validation->set_rules('cast', 'Cast', 'required');

        // $this->form_validation->set_rules('qualification', 'Qualification', 'required');
        $this->form_validation->set_rules('subcast', 'Sub_Cast', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('retirement_date', 'Retirement Date', 'required');
        // $this->form_validation->set_rules('experience', 'Experience', 'required');
        $this->form_validation->set_rules('aadhar_no', 'Aadhar No', 'required|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('pan_no', 'Pan No', 'required');
        $this->form_validation->set_rules('blood_grp', 'Blood Group', 'required');
        $this->form_validation->set_rules('identification_mark', 'Identification Mark', 'required');
        // $this->form_validation->set_rules('photo', 'Photo', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('alternate_contact_no', 'Alternate Contact No', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('pin_code', 'Pin Code', 'required|min_length[6]|max_length[6]');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php');
            $this->load->view('auth/editDetails.php', array("employee" => $employee_details));
        } else {

            $formArray = array();

            $formArray['first_name'] = $this->input->post('first_name');
            $formArray['middle_name'] = $this->input->post('middle_name');
            $formArray['last_name'] = $this->input->post('last_name');
            $formArray['dob'] = $this->input->post('dob');
            //get id from session

            $sevarth_id = $this->session->userdata('user_id');
            $formArray['sevarth_id'] = $sevarth_id;
            $formArray['qualification'] = $this->input->post('qualification');
            $formArray['cast'] = $this->input->post('cast');
            $formArray['subcast'] = $this->input->post('subcast');

            $designation_id = $this->input->post('designation');
            $formArray['designation'] = $designation_id;
            $formArray['retirement_date'] = $this->input->post('retirement_date');
            $formArray['experience'] = $this->input->post('experience');
            $formArray['aadhar_no'] = $this->input->post('aadhar_no');
            $formArray['pan_no'] = $this->input->post('pan_no');
            $formArray['blood_grp'] = $this->input->post('blood_grp');
            $formArray['identification_mark'] = $this->input->post('identification_mark');
            $formArray['photo'] = $this->input->post('photo');
            $formArray['contact_no'] = $this->input->post('contact_no');
            $formArray['alternative_contact_no'] = $this->input->post('alternate_contact_no');
            $formArray['address'] = $this->input->post('address');
            $formArray['city'] = $this->input->post('city');
            $formArray['pin_code'] = $this->input->post('pin_code');
            $formArray['state'] = $this->input->post('state');
            $formArray['country'] = $this->input->post('country');
            $formArray['gender'] = $this->input->post('gender');

            $insert_id = $this->Auth_model->editDetails($formArray, $sevarth_id);
            // if data of employees is edited
            if ($insert_id > 0) {
                // set flash message
                $this->session->set_flashdata('success', 'Your Details are Updated Successfully');
                // redirect to dashboard
                $this->navigate_to_dashboards($this->session->userdata('role_id'));
            } else {
                // set flash message
                $this->session->set_flashdata('failure', 'Something went wrong');
                // redirect to dashboard
                $this->navigate_to_dashboards($this->session->userdata('role_id'));
            }

        }
    }

    public function details()
    {

        $sevarth_id = $this->session->userdata('user_id');
        $is_details_fill = $this->Auth_model->is_details_filled($sevarth_id);
        //if data is already filled then redirect to dashboard
        if ($is_details_fill) {
            $this->session->set_flashdata('failure', 'You already filled your details');
            $this->navigate_to_dashboards($this->session->userdata('role_id'));
        } else {
            $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|alpha');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('dob', 'D.O.B', 'required|callback_dob_age_check');
            $this->form_validation->set_rules('cast', 'Cast', 'required');

            // $this->form_validation->set_rules('qualification', 'Qualification', 'required');
            $this->form_validation->set_rules('subcast', 'Sub_Cast', 'required');
            $this->form_validation->set_rules('designation', 'Designation', 'required');
            $this->form_validation->set_rules('retirement_date', 'Retirement Date', 'required|callback_retirement_check');
            // $this->form_validation->set_rules('experience', 'Experience', 'required');
            $this->form_validation->set_rules('aadhar_no', 'Aadhar No', 'required|min_length[12]|max_length[12]');
            $this->form_validation->set_rules('pan_no', 'Pan No', 'required');
            $this->form_validation->set_rules('blood_grp', 'Blood Group', 'required');
            $this->form_validation->set_rules('identification_mark', 'Identification Mark', 'required');
            // $this->form_validation->set_rules('photo', 'Photo', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact No', 'required|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('alternate_contact_no', 'Alternate Contact No', 'required|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('pin_code', 'Pin Code', 'required|min_length[6]|max_length[6]');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header.php');
                $this->load->view('auth/details.php');
            } else {

                $config = array(
                    'upload_path' => "uploads/experience", //path for upload
                    'allowed_types' => "*", //restrict extension
                    'max_size' => '300000',
                    'max_width' => '30000',
                    'max_height' => '30000',
                );
                $this->load->library('upload', $config);
                //experience pdf upload
                if (!$this->upload->do_upload('experience')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('failure', "experience ".$error);
                    $this->load->view('templates/header.php');
                    $this->load->view('auth/details.php');

                } else {

                    $experience = $this->upload->data('file_name');

                    $config = array(
                        'upload_path' => "uploads/qualification", //path for upload
                        'allowed_types' => "*", //restrict extension
                        'max_size' => '300000',
                        'max_width' => '30000',
                        'max_height' => '30000',
                    );
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('qualification')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('failure', $error);
                        $this->load->view('templates/header.php');
                        $this->load->view('auth/details.php');

                    } else {
                        $qualification = $this->upload->data('file_name');

                        $config = array(
                            'upload_path' => "uploads/profile", //path for upload
                            'allowed_types' => "jpg|png", //restrict extension
                            'max_size' => '300000',
                            'max_width' => '30000',
                            'max_height' => '30000',
                        );
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('photo')) {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('failure', $error);
                            $this->load->view('templates/header.php');
                            $this->load->view('auth/details.php');
                           

                        } else {
                            $profile = $this->upload->data('file_name');

                            $formArray = array();

                            $formArray['first_name'] = $this->input->post('first_name');
                            $formArray['middle_name'] = $this->input->post('middle_name');
                            $formArray['last_name'] = $this->input->post('last_name');
                            $formArray['dob'] = $this->input->post('dob');

                            $sevarth_id = $this->session->userdata('user_id');
                            $employee = $this->Auth_model->get_employee_by_id($sevarth_id);

                            $formArray['qualification'] = $qualification;
                            $formArray['sevarth_id'] = $sevarth_id;
                            $formArray['cast'] = $this->input->post('cast');
                            $formArray['subcast'] = $this->input->post('subcast');
                            $formArray['department_id'] = $employee['dept_id'];
                            $formArray['org_id'] = $employee['org_id'];

                            $designation_id = $this->input->post('designation');
                            $formArray['designation'] = $designation_id;
                            $formArray['retirement_date'] = $this->input->post('retirement_date');
                            $formArray['experience'] = $experience;
                            $formArray['aadhar_no'] = $this->input->post('aadhar_no');
                            $formArray['pan_no'] = $this->input->post('pan_no');
                            $formArray['blood_grp'] = $this->input->post('blood_grp');
                            $formArray['identification_mark'] = $this->input->post('identification_mark');
                            $formArray['photo'] = $profile;

                            $formArray['contact_no'] = $this->input->post('contact_no');
                            $formArray['alternative_contact_no'] = $this->input->post('alternate_contact_no');
                            $formArray['address'] = $this->input->post('address');
                            $formArray['city'] = $this->input->post('city');
                            $formArray['pin_code'] = $this->input->post('pin_code');
                            $formArray['state'] = $this->input->post('state');
                            $formArray['country'] = $this->input->post('country');
                            $formArray['gender'] = $this->input->post('gender');

                            $insert_id = $this->Auth_model->addDetails($formArray, $this->session->userdata("role_id"));

                            if ($insert_id > 0) {
                                //set flash data
                                $this->session->set_flashdata('success', 'Data Added Successfully');
                                $this->navigate_to_dashboards($this->session->userdata("role_id"));

                            } else {
                                $this->session->set_flashdata('failure', 'Some Error Occurred While Adding Data');
                                $this->navigate_to_dashboards($this->session->userdata("role_id"));
                            }

                        }

                    }

                }
            }

        }

    }

    public function dob_age_check($dob)
    {

        $date = explode("-", $dob);
        $selected_year = $date[0];
        $current_year = date('Y');

        $selected_age = $current_year - $selected_year;

        
        if ($selected_age < 22) {
            $this->form_validation->set_message('dob_age_check', 'Age is not valid');
            return false;
        } else {
            return true;
        }
    }
    
    public function retirement_check($dob)
    {

        $date = explode("-", $dob);
        $selected_year = $date[0];
        $current_year = date('Y');

        $selected_age =  $selected_year-$current_year;

        
        if ($selected_age < 0) {
            $this->form_validation->set_message('retirement_check', 'Retirement Date Should be greater than DOB');
            return false;
        } else {
            return true;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('dept_id');

        $this->session->set_flashdata('success', 'You are  successfully logged out');

        redirect('/login');

    }

    public function register()
    {

        //if user is already login
        if ($this->session->userdata('user_id') != null) {
            //check if user is not verified
            if ($this->Auth_model->is_verified_user($this->session->userdata('user_id')) == false) {
                $this->load_wait_until_verify();
            } else {
                $this->navigate_to_dashboards($this->session->userdata('role_id'));
            }

        } else {
            $this->form_validation->set_rules('sevarth_id', 'Sevarth ID', 'required|callback_sevarthID_check|min_length[12]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employees.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[15]');
            $this->form_validation->set_rules('name', 'User Name', 'required');
            $this->form_validation->set_rules('hint_question', 'Hint Question', 'required');
            $this->form_validation->set_rules('hint_answer', 'Hint Answer', 'required');
            $this->form_validation->set_rules('key', 'KEY', 'required|callback_key_check');

            $events = $this->Auth_model->getOrganization();
            $dept = $this->Auth_model->getDepartment();
            $role = $this->Auth_model->getRole();

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header.php');
                $this->load->view("auth/register.php", array('events' => $events, 'dept' => $dept, 'role' => $role));
            } else {

                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $role_id = $this->input->post('role_id');
                $org_id = $this->input->post('org_id');
                $dept_id = $this->input->post('dept_id');
                $name = $this->input->post('name');
                $sevarth_id = $this->input->post('sevarth_id');
                $hint_question = $this->input->post('hint_question');
                $hint_answer = $this->input->post('hint_answer');
                $hod_response = $this->Auth_model->get_hod($org_id, $dept_id);
                $principle_response = $this->Auth_model->get_principle($org_id);
                $director_response = $this->Auth_model->get_director($org_id);

                $loginArray = array(
                    'email' => $email,
                    'password' => $password,
                    'name' => $name,
                    'sevarth_id' => $sevarth_id,
                    'role_id' => $role_id,
                    'org_id' => $org_id,
                    'dept_id' => $dept_id,
                    'hint_question' => $hint_question,
                    'hint_answer' => $hint_answer,
                    "is_deleted" => 0
                );

                //if employee
                if ($role_id == 1 or $role_id == 2) {

                    if ($hod_response['result'] == false) {

                        $this->session->set_flashdata('failure', $hod_response['error']);
                        $this->load->view('templates/header.php');
                        $this->load->view("auth/register.php", array('events' => $events, 'dept' => $dept, 'role' => $role));

                    } else if ($principle_response['result'] == false) {
                        $this->session->set_flashdata('failure', $principle_response['error']);

                        $this->load->view('templates/header.php');
                        $this->load->view("auth/register.php", array('events' => $events, 'dept' => $dept, 'role' => $role));

                    } else if ($director_response['result'] == false) {
                        $this->session->set_flashdata('failure', $director_response['error']);

                        $this->load->view('templates/header.php');
                        $this->load->view("auth/register.php", array('events' => $events, 'dept' => $dept, 'role' => $role));

                    } else {
                        $loginArray['hod_id'] = $hod_response['id'];

                        if ($role_id == 2) {
                            $loginArray['hod_id'] = -1;
                        }

                        $loginArray['principle_id'] = $principle_response['id'];
                        $loginArray['director_id'] = $director_response['id'];

                        $this->Auth_model->create($loginArray);

                        $this->session->set_userdata('user_id', $sevarth_id);
                        $this->session->set_userdata('role_id', $role_id);
                        $this->session->set_flashdata('success', 'Account Created Successful');

                        $this->load_wait_until_verify();

                    }
                } else {

                    $loginArray['hod_id'] = -1;
                    $loginArray['principle_id'] = -1;

                    $this->Auth_model->create($loginArray);
                    $this->session->set_flashdata('success', 'You registered successfully');

                    $this->session->set_userdata('user_id', $sevarth_id);
                    $this->session->set_userdata('role_id', $role_id);
                    $this->session->set_flashdata('success', 'Account Created Successfully');

                    $this->load_wait_until_verify();

                }

            }

        }

    }

    public function load_wait_until_verify()
    {
        $this->load->view('templates/header.php');
        $this->load->view('auth/navbar.php');
        $this->load->view("auth/wait_until_verify");
    }

    public function login()
    {
        //if user is already login
        if ($this->session->userdata('user_id') != null) {

            //check if user is not verified
            if ($this->Auth_model->is_verified_user($this->session->userdata('user_id')) == false) {
                $this->load_wait_until_verify();

            } else {
                $this->navigate_to_dashboards($this->session->userdata('role_id'));
            }

        } else {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header.php');
                $this->load->view('auth/login.php');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $response = $this->Auth_model->login_user($email, $password);

                if ($response['result'] == false) {

                    $this->session->set_flashdata('failure', $response['error']);
                    $this->load->view('templates/header.php');
                    $this->load->view('auth/login.php');

                } else {

                    $user = $response['user'];

                    $this->session->set_userdata('user_id', $user->sevarth_id);
                    $this->session->set_userdata('role_id', $user->role_id);
                    $this->session->set_userdata('dept_id', $user->dept_id);
                    $this->session->set_userdata('user', $user);

                    $this->session->set_flashdata('success', 'Login Successful');

                    // if user if not verified
                    // 0->not verified 1->verified
                    if ($user->is_verified == 0) {
                        $this->load_wait_until_verify();
                    } else {
                        $this->navigate_to_dashboards($user->role_id);
                    }

                }
            }
        }

    }

    public function navigate_to_dashboards($role_id)
    {

        if ($role_id == 1) {
            redirect('home/HomeController/employee');
        } else if ($role_id == 2) {
            redirect('home/HomeController/hod');
        } else if ($role_id == 3) {
            redirect('home/HomeController/principal');
        } else if ($role_id == -1) {
            redirect('home/HomeController/admin');
        } else if ($role_id == 4) {
            redirect('home/HomeController/registrar');
        } else if ($role_id == 5) {
            redirect('home/HomeController/joint_director');
        } else if ($role_id == 6) {
            redirect('home/HomeController/director');
        } else if ($role_id == 7) {
            redirect('home/HomeController/faculty');
        } else if ($role_id == 8) {
            redirect('home/HomeController/non_teaching_officials');
        } else if ($role_id == 9) {
            redirect('home/HomeController/non_teaching_faculty');
        }

    }

    public function sevarthID_check($id)
    {

        if ($this->Auth_model->is_sevarth_id_exists($id)) {
            $this->form_validation->set_message('sevarthID_check', 'Sevarth ID Already Exists');
            return false;
        } else {
            return true;
        }
    }

    public function key_check($key)
    {

        if ($this->Auth_model->check_auth_key($key) == false) {
            $this->form_validation->set_message('key_check', 'Key is wrong');
            return false;
        } else {
            return true;
        }
    }

    public function forgot()
    {

        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot.php');
        } else {
            //if email id does not exist in database
            if ($this->Auth_model->is_email_exist($email) == false) {
                $this->session->set_flashdata('failure', "Email Id does not exist");
                $this->load->view('auth/forgot.php');
            } else {

                $employee = $this->Auth_model->get_employee($email);
                $this->session->set_userdata('email', $email);
                $this->load->view('auth/checkAnswer.php', array('question' => $employee->hint_question));

            }

        }
    }

    public function verify_answer()
    {

        $this->form_validation->set_rules('hint_answer', 'Answer', 'required');

        if ($this->form_validation->run() == false) {
            $email = $this->session->userdata('email');
            $employee = $this->Auth_model->get_employee($email);
            $this->load->view('auth/checkAnswer.php', array('question' => $employee->hint_question));

            //load view here
        } else {
            //if answer is same as entered answer
            $email = $this->session->userdata('email');
            $answer = $this->input->post('hint_answer');
            if ($this->Auth_model->check_answer
                ($email, $answer) == false) {
                $this->session->set_flashdata('failure', "Wrong Answer");
                // load your view here
                $employee = $this->Auth_model->get_employee($email);
                $this->load->view('auth/checkAnswer.php', array('question' => $employee->hint_question));
            } else {

                $this->Auth_model->check_answer($email, $answer);
                $this->load->view('auth/changePassword.php');

            }

        }

    }

    public function verify_email_id($sevarth_id)
    {
        $user = $this->Auth_model->verify_email_id($sevarth_id);

        $this->session->set_userdata('user_id', $user->sevarth_id);
        $this->session->set_userdata('role_id', $user->role_id);

        //navigate user to dashboard
        $this->navigate_to_dashboards($user->role_id);

    }

    public function changePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('new_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/changePassword.php');

            //load view here
        } else {

            $email = $this->session->userdata('email');
            $password = $this->input->post('password');
            $new_password = $this->input->post('new_password');

            if ($this->Auth_model->check_password
                ($email, $password) == false) {
                $this->session->set_flashdata('failure', "Wrong Answer");
                // load your view here
                $this->load->view('auth/changePassword.php');

            } else {
                $this->Auth_model->check_password($email, $password);

            }

        }
    }

}