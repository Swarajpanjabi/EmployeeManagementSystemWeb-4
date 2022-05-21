<?php
class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

     public function getTrainingTypes()
    {
        return $this->db->get("training_type")->result_array();
    }
 
    public function insert_training($data)
    {
        $this->db->insert('training', $data);
        return $this->db->insert_id() > 0;
    }

    public function get_applied_trainings($employee_id)
    {
        return $this->db->where('sevarth_id', $employee_id)->get("training")->result_array();
    }

    public function get_training_by_id($training_id){
        return $this->db->where('id', $training_id)->get("training")->row_array();
    }

    public function mark_training_complete($training_id, $pdf){
        $this->db->where('id', $training_id)->update('training', ['training_status_id' => '7', 'pdf' => $pdf]);
    }

    public function get_approved_trainings($employee_id)
    {
        return $this->db->where('sevarth_id', $employee_id)->where('training_status_id', '5')->get("training")->result_array();
    }

    public function complete_training($training_id, $pdf){
        $this->db->where('id', $training_id)->update('training', ['training_status_id' => '7', 'comp_certificate' => $pdf]);
    }

    public function get_department_by_id($dept_id){
        return $this->db->where('dept_id', $dept_id)->get("departments")->row_array();
    }
    public function get_organization_by_id($org_id){
        return $this->db->where('org_id', $org_id)->get("organization")->row_array();
    }
   
    
}