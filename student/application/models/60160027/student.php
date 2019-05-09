<?php
defined('BASEPATH') or exit('No direct script access allowed');
class student extends CI_Model
{
    public function getAllStudent()
    {
        $sql = "SELECT S.std_id AS id, S.std_code AS code, CONCAT(S.std_name,' ', S.std_lname) AS name, G.gd_name AS gender, M.ms_th AS status, S.std_age AS age, S.std_dob AS bdate
                FROM student AS S 
                LEFT JOIN gender AS G ON S.std_gd_id = G.gd_id
                LEFT JOIN marital_status AS M ON S.std_ms_id = M.ms_id
                ORDER BY CONVERT (code USING tis620)  ASC;";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function searchStudent($id)
    {
        $sql = "SELECT S.std_id AS id, S.std_code AS code, CONCAT(S.std_name,' ', S.std_lname) AS name, G.gd_name AS gender, M.ms_th AS status, S.std_age AS age, S.std_dob AS bdate
                FROM student AS S 
                LEFT JOIN gender AS G ON S.std_gd_id = G.gd_id
                LEFT JOIN marital_status AS M ON S.std_ms_id = M.ms_id
                WHERE S.std_code = '" . $id . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getGender()
    {
        $sql = "SELECT G.gd_name AS gender , G.gd_id AS id
                FROM gender AS G";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getStatus()
    {
        $sql = "SELECT M.ms_th AS status, M.ms_id AS id
                FROM marital_status AS M";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getPrefix()
    {
        $sql = "SELECT P.pf_id AS id, P.pf_name AS prefix
                FROM prefix AS P";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function addStudent($student)
    {
        $sql = "
        INSERT INTO student (std_code, std_pf_id, std_name, std_lname, std_dob, std_age, std_gd_id, std_ms_id) 
        VALUES('" . $student['std_code'] . "', '" . $student['std_pf_id'] . "', '" . $student['std_name'] . "', 
        '" . $student['std_lname'] . "', '" . $student['std_dob'] . "' ,'" . $student['std_age'] . "','" . $student['std_gd_id'] . "','" . $student['std_ms_id'] . "')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delStudent($id)
    {
        $query = $this->db->query("DELETE FROM student WHERE std_id = '" . $id . "' ");
        return $query; //$query->result();
    }

    public function searchId($id)
    {
        $sql = "SELECT *
                FROM student AS S 
                WHERE S.std_id = '" . $id . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function updateStudent($student)
    {
        $sql = "
        UPDATE student
        SET std_code = '" . $student['std_code'] . "', std_pf_id = '" . $student['std_pf_id'] . "', std_name = '" . $student['std_name'] . "', 
        std_lname = '" . $student['std_lname'] . "', std_dob = '" . $student['std_dob'] . "' , std_age = '" . $student['std_age'] . "', std_gd_id = '" . $student['std_gd_id'] . "',  std_ms_id = '" . $student['std_ms_id'] . "' 
        WHERE std_id = '" . $student['std_id'] . "'";
        $query = $this->db->query($sql);
        return $query;
    }
}
