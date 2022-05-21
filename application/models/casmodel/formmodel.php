<?php

class Formmodel extends CI_MODEL
{
    public function insertCas($data)
    {
        $this->db->insert('form', $data);
    }

    public function getData()
    {
        $query = $this->db->get('form');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function status($application_id)
    {
		$this->db->set('status', '1', FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function statusdto($application_id)
    {
		$this->db->set('status', '2', FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function statusjd($application_id)
    {
		$this->db->set('status', '3', FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function rejectform($application_id,$message)
    {
        $data = array(
            'status' => '4',
            'Text' => $message
        );
        
        $this->db->set($data, FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function dtorejectform($application_id,$message)
    {
        $data = array(
            'status' => '5',
            'Text' => $message
        );

        $this->db->set($data, FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function jdrejectform($application_id,$message)
    {
        $data = array(
            'status' => '6',
            'Text' => $message
        );

        $this->db->set($data, FALSE);
        $this->db->where('Id', $application_id);
        $this->db->update('form');
    }

    public function viewForm($id)
    {
        $query = $this->db->query("select * from form where Id=$id");
        return $query;
    }

    public function viewStatus($id)
    {
        $query = $this->db->query("select status from form where Id=$id");
        return $query;
    } 

    public function revertChanges($id)
    {
        $this->db->set('status', '0', FALSE);
        $this->db->where('Id', $id);
        $this->db->update('form');
    }

    public function revertChangesDto($id)
    {
        $this->db->set('status', '1', FALSE);
        $this->db->where('Id', $id);
        $this->db->update('form');
    }

    public function revertChangesJd($id)
    {
        $this->db->set('status', '2', FALSE);
        $this->db->where('Id', $id);
        $this->db->update('form');
    }

    public function otp($data)
    {
        $this->db->insert('otp',$data);
    }

    public function verifyotp($email,$otp)
    {
        $query = $this->db->where(['email' => $email,'otp' => $otp])
                 ->get('otp');

        if($query->num_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}



?>