<?php

class leave_model extends CI_model
{

    public function get_available_leaves($sevarth_id)
    {
        return $leave = $this->db->where("sevarth_id", $sevarth_id)->get('leave_available')->result_array()[0];  // SELECT * from users        
    }


    //leave_types.php
    public function getLeaveTypes()
    {
        return $leave = $this->db->get('leave_type')->result_array();  // SELECT * from users        
    }

    public function setLeaveTypes($data, $leave_type, $total_leaves)
    {
        $this->db->insert('leave_type', $data);
        $query = "ALTER TABLE leave_available ADD `$leave_type` varchar(255) ";
        $this->db->query($query);

        $query1 = "UPDATE leave_available SET `$leave_type` = $total_leaves ";
        $this->db->query($query1);
        return true;
    }

    public function delete_type($leave_id)
    {
        $leave_type = $this->db->where("leave_id", $leave_id)->get('leave_type')->result_array()[0]['leave_type'];
        // print_r($leave_type);
        $query = "ALTER TABLE leave_available DROP COLUMN `$leave_type`";
        $this->db->query($query);

        $this->db->delete('leave_type', ['leave_id'  => $leave_id]);

        return true;
    }

    //apply_leave.php
    //retrieve leave types in apply_leave (DropDown)
    // public function  fetchLeaveTypes()
    // {
    //     // return $leave = $this->db->get_where('leave_type',array('leave_type'=>'Casual Leave'));
    //     return $leave = $this->db->get('leave_type')->result_array('leave_type', 'total_leaves');
    // }

    public function fetchEmployeeDetails($sevarth_id)
    {
        // print_r($sevarth_id);
        return $leave = $this->db->where("sevarth_id", $sevarth_id)->get('employees')->result_array()[0];
        // print_r($leave);
    }

    public function postApplyLeave($data)
    {


        $leave = $this->db->where("sevarth_id", $data['sevarth_id'])->get('leave_available')->result_array()[0][$data['leave_type']];
        // print_r($leave);
        if ($leave >= $data['duration']) {
            $available = $leave - $data['duration'];
            $this->db->insert('leave_application', $data);

            print_r($available);
            $sevarth_id = $data['sevarth_id'];
            $leave_type = $data['leave_type'];
            $query = "UPDATE leave_available SET `$leave_type` = $available WHERE sevarth_id = $sevarth_id";
            $this->db->query($query);

            return true;
        }




        // return true;
    }

    public function getLeaveApplication()
    {
        return $leave = $this->db->where("leave_status", "Pending")->get('leave_application')->result_array();  // SELECT * from users  

    }

    public function getHistoryLeaveApplication($sevarth_id)
    {
        return $leave = $this->db->where("sevarth_id", $sevarth_id)->get('leave_application')->result_array();
    }
    public function delete_application($application_id)
    {
        return $this->db->delete('leave_application', ['application_id'  => $application_id]);
    }



    public function approve_leave($application_id)
    {
        $query = "UPDATE leave_application SET leave_status = 'Approved' WHERE application_id = $application_id ";
        $this->db->query($query);
    }

    public function reject_leave($application_id)
    {
        $query1 = "UPDATE leave_application SET leave_status = 'Rejected' WHERE application_id = $application_id ";
        $leave = $this->db->where("application_id", $application_id)->get('leave_application')->result_array()[0];


        // $output = $this->db->query($query1);
        $duration = $leave['duration'];
        $type = $leave['leave_type'];
        $sevarth_id = $leave['sevarth_id'];
        // print_r($duration);
        $available = $this->db->where("sevarth_id", $sevarth_id)->get('leave_available')->result_array()[0];
        $re = $available[$type];
        // print_r($re);
        $update = (int)$re + (int)$duration;
        // print_r($update);
        $query2 = "UPDATE leave_available SET `$type` = $update WHERE sevarth_id = $sevarth_id ";

        $this->db->query($query1);
        $this->db->query($query2);

    }
}
