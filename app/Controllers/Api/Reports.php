<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Api\ResponseTrait;
use App\Models\ReportModel;


class Reports extends BaseController {

    use ResponseTrait;

    public function index() {
    
        $report_category = $this->request->getPost('report_category');
        $report_item = $this->request->getPost('report_item');
        $report_date = $this->request->getPost('report_date');
        $default_date = $this->request->getPost('default_date');
        $specific_date = $this->request->getPost('specific_date');
        $timespan_date_from = $this->request->getPost('timespan_date_from');
        $timespan_date_to = $this->request->getPost('timespan_date_to');

        if($report_category === 'user-report') {
            switch($report_date) {
                case 'default':
                    $data = [
                        'report_item' => $report_item,
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportDefaultDate($data)
                    ]);
                    break;
                case 'specific':
                    $data = [
                        'report_item' => $report_item,
                        'specific_date' => $specific_date,
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportSpecificDate($data)
                    ]);
                    break;
                case 'timespan':
                    $data = [
                        'report_item' => $report_item,
                        'timespan_date_from' => $timespan_date_from,
                        'timespan_date_to' => $timespan_date_to
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportTimespanDate($data)
                    ]);
                    break;
            }
        } else if($report_category === 'class-course-report') {
            switch($report_date) {
                case 'default':
                    $data = [
                        'report_item' => $report_item,
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportDefaultDate($data)
                    ]);
                    break;
                case 'specific':
                    $data = [
                        'report_item' => $report_item,
                        'specific_date' => $specific_date,
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportSpecificDate($data)
                    ]);
                    break;
                case 'timespan':
                    $data = [
                        'report_item' => $report_item,
                        'timespan_date_from' => $timespan_date_from,
                        'timespan_date_to' => $timespan_date_to
                    ];
                    return $this->respond([
                        'status' => 200,
                        'data' => $this->generateReportTimespanDate($data)
                    ]);
                    break;
            }
        }
    }

    public function generateReportDefaultDate($data) {
        $report_item = $data['report_item'];

        $model = new ReportModel();

        switch($report_item) {
            case 'instructors':
                return $model->generateReportDefaultDate('instructors');
                break;
            case 'students':
                return $model->generateReportDefaultDate('students');
                break;
            case 'admins':
                return $model->generateReportDefaultDate('admins');
                break;
            case 'courses':
                return $model->generateReportDefaultDate('courses');
                break;
            case 'subjects': 
                return $model->generateReportDefaultDate('subjects');
                break;
            case 'sections':
                return $model->generateReportDefaultDate('sections');
                break;
            case 'years':
                return $model->generateReportDefaultDate('years');
                break;
            case 'categories':
                return $model->generateReportDefaultDate('categories');
                break;
        }
    }

    public function generateReportSpecificDate($data) {
        $report_item = $data['report_item'];
        $specific_date = $data['specific_date'];

        $model = new ReportModel();

        switch($report_item) {
            case 'instructors':
                return $model->generateReportSpecificDate('instructors', $specific_date);
                break;
            case 'students':
                return $model->generateReportSpecificDate('students', $specific_date);
                break;
            case 'admins':
                return $model->generateReportSpecificDate('admins', $specific_date);
                break;
            case 'courses':
                return $model->generateReportSpecificDate('courses', $specific_date);
                break;
            case 'subjects': 
                return $model->generateReportSpecificDate('subjects', $specific_date);
                break;
            case 'sections':
                return $model->generateReportSpecificDate('sections', $specific_date);
                break;
            case 'years':
                return $model->generateReportSpecificDate('years', $specific_date);
                break;
            case 'categories':
                return $model->generateReportSpecificDate('categories', $specific_date);
                break;
                
        }
    }

    public function generateReportTimespanDate($data) {
        $report_item = $data['report_item'];
        $from = $data['timespan_date_from'];
        $to = $data['timespan_date_to'];

        $model = new ReportModel();

        switch($report_item) {
            case 'instructors':
                return $model->generateReportTimespanDate('instructors', $from, $to);
                break;
            case 'students':
                return $model->generateReportTimespanDate('students', $from, $to);
                break;
            case 'admins':
                return $model->generateReportTimespanDate('admins', $from, $to);
                break;
            case 'courses':
                return $model->generateReportTimespanDate('courses', $from, $to);
                break;
            case 'subjects': 
                return $model->generateReportTimespanDate('subjects', $from, $to);
                break;
            case 'sections':
                return $model->generateReportTimespanDate('sections', $from, $to);
                break;
            case 'years':
                return $model->generateReportTimespanDate('years', $from, $to);
                break;
            case 'categories':
                return $model->generateReportTimespanDate('categories', $from, $to);
                break;
        }
    }

}
