<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model {

    protected $db;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function generateReportDefaultDate($items) {
        switch($items) {
            case 'instructors':
                $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('instructors.firstname, instructors.lastname, instructors.contact');
                $builder->select('instructors.address, instructors.province, instructors.city, instructors.birthday');
                $builder->select('instructors.status, instructors.gender, users.date_created');
                $builder->join('instructors', 'users.id = instructors.user_id');
                $builder->where('role', 1);
                break;
            case 'students':
                $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('students.firstname, students.lastname, students.contact');
                $builder->select('students.address, students.province, students.city, students.birthday');
                $builder->select('students.status, students.gender, users.date_created');
                $builder->join('students', 'users.id = students.user_id');
                $builder->where('role', 2);
                break;
            case 'admins':
                $builder = $this->db->table('admins');
                $builder->select('admins.id, admins.username, admins.email, admins.is_active as ia, admins.is_enrolled as ie, admins.firstname, admins.lastname');
                $builder->select('admins.contact, admins.address, admins.province, admins.city, admins.birthday');
                $builder->select('admins.status, admins.gender, admins.date_created');                
                break;
            case 'courses':
                $builder = $this->db->table('courses');
                break;
            case 'subjects':
                $builder = $this->db->table('subjects');
                break;
            case 'sections':
                $builder = $this->db->table('sections');
                break;
            case 'years':
                $builder = $this->db->table('years');
                break;
            case 'categories':
                $builder = $this->db->table('categories');
                break;

        }
        $result = $builder->get()->getResult();
        return $result;
    }

    public function generateReportSpecificDate($items, $date) {
        switch($items) {
            case 'instructors':
                $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('instructors.firstname, instructors.lastname, instructors.contact');
                $builder->select('instructors.address, instructors.province, instructors.city, instructors.birthday');
                $builder->select('instructors.status, instructors.gender, users.date_created');
                $builder->join('instructors', 'users.id = instructors.user_id');
                $builder->where('role', 1);
                break;
            case 'students':
                $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('students.firstname, students.lastname, students.contact');
                $builder->select('students.address, students.province, students.city, students.birthday');
                $builder->select('students.status, students.gender, users.date_created');
                $builder->join('students', 'users.id = students.user_id');
                $builder->where('role', 2);
                break;
            case 'admins':
                $builder = $this->db->table('admins');
                $builder->select('admins.id, admins.username, admins.email, admins.is_active as ia, admins.is_enrolled as ie, admins.firstname, admins.lastname');
                $builder->select('admins.contact, admins.address, admins.province, admins.city, admins.birthday');
                $builder->select('admins.status, admins.gender, admins.date_created');                
                break;
            case 'courses':
                $builder = $this->db->table('courses');
                break;
            case 'subjects':
                $builder = $this->db->table('subjects');
                break;
            case 'sections':
                $builder = $this->db->table('sections');
                break;
            case 'years':
                $builder = $this->db->table('years');
                break;
            case 'categories':
                $builder = $this->db->table('categories');
                break;
        }

        $builder->where('date_created', $date);
        $result = $builder->get()->getResult();
        return $result;
    }

    public function generateReportTimespanDate($items, $from, $to) {
        switch ($items) {
            case 'instructors':
                $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('instructors.firstname, instructors.lastname, instructors.contact');
                $builder->select('instructors.address, instructors.province, instructors.city, instructors.birthday');
                $builder->select('instructors.status, instructors.gender, users.date_created');
                $builder->join('instructors', 'users.id = instructors.user_id');
                $builder->where('role', 1);
                break;
            case 'students':
                 $builder = $this->db->table('users');
                $builder->select('users.id, users.username, users.email, users.is_active as ia, users.is_enrolled as ie');
                $builder->select('students.firstname, students.lastname, students.contact');
                $builder->select('students.address, students.province, students.city, students.birthday');
                $builder->select('students.status, students.gender, users.date_created');
                $builder->join('students', 'users.id = students.user_id');
                $builder->where('role', 2);
                break;
            case 'admins':
                $builder = $this->db->table('admins');
                $builder->select('admins.id, admins.username, admins.email, admins.is_active as ia, admins.is_enrolled as ie, admins.firstname, admins.lastname');
                $builder->select('admins.contact, admins.address, admins.province, admins.city, admins.birthday');
                $builder->select('admins.status, admins.gender, admins.date_created');                
                break;
            case 'courses':
                $builder = $this->db->table('courses');
                break;
            case 'subjects':
                $builder = $this->db->table('subjects');
                break;
            case 'sections':
                $builder = $this->db->table('sections');
                break;
            case 'years':
                $builder = $this->db->table('years');
                break;
            case 'categories':
                $builder = $this->db->table('categories');
                break;
        }
        $builder->where('date_created >=', $from); // Changed from $from to $to
        $builder->where('date_created <=', $to); // Changed from $to to $from
        $result = $builder->get()->getResult();
        return $result;
    }

}
