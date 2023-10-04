<?php

namespace App\Controllers\Api\Bulk;

use App\Controllers\BaseController;
use CodeIgniter\Api\ResponseTrait;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\InstructorModel;
use App\Models\AdminModel;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\SectionModel;
use App\Models\YearModel;
use Config\Services;


class UploadFile extends BaseController {

    use ResponseTrait;

    protected $session;
    protected $type, $result;
    protected $user_session;

    public function __construct() {
        $this->session = Services::session();
        $this->user_session = session()->get('user_session_data');
        helper(['date_helper', 'role_helper']);
    }

    public function index() {
        $file = $this->session->get('parsed_content');
        $result = $file['result'];
        $type = $file['type'];
        if(is_array($result) && (!empty($result) && $result !== null)) {
            $this->type = $type;
            $this->result = $result;
            return $this->respond($this->prepareData());
        }    
    }

    public function prepareData() {

        $parsed_data = $this->result["data"];
        $title_data = $this->result["title"];
        $newArray = [];
        
        foreach ($parsed_data as $subArray) {
            $newSubArray = [];
        
            foreach ($subArray as $key => $value) {
                if (isset($title_data[$key])) {
                    $newSubArray[$title_data[$key]] = $value;
                }
            }
        
            $newArray[] = $newSubArray;
        }
    
        // PERFORM VALIDATION BASED ON TARGET

        $validation_error = $this->validation($newArray);


        if(!$validation_error) {
            $test = $this->uploadBulk($newArray);
            return $test;
        } else {
            $filename = $this->filterErrorBulk($newArray, $validation_error);
            return [
                'status' => 500,
                'error' => $validation_error,
                'suggested_data' => $filename
            ];
        }
        

    }

    public function validation($data) {

        $type = $this->type;
        $user_model = new UserModel();
        $course_model = new CourseModel();
        $subject_model = new SubjectModel();
        $section_model = new SectionModel();
        $year_model = new YearModel();

        $error = [];
    
        foreach ($data as $item) {
            if (($type === 'students' || $type === 'instructors') 
                && $user_model->where('username', $item['username'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'username',
                    'value' => $item["username"],
                    'message' => $item["username"] . ' already in use'
                ];
            }
    
            if (($type === 'students' || $type === 'instructors')
                && $user_model->where('email', $item['email'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'email',
                    'value' => $item["email"],
                    'message' => $item["email"] . ' already in use'
                ];
            }
    
            if ($type === 'courses' && 
                $course_model->where('code', $item['code'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'code',
                    'value' => $item["code"],
                    'message' => $item["code"] . ' already in use'
                ];
            }
    
            if ($type === 'courses' 
                && $course_model->where('name', $item['name'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'name',
                    'value' => $item["name"],
                    'message' => $item["name"] . ' already in use'
                ];
            }
    
            if ($type === 'subjects'
                && $subject_model->where('code', $item['code'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'code',
                    'value' => $item["code"],
                    'message' => $item["code"] . ' already in use'
                ];
            }
    
            if ($type === 'subjects' 
                && $subject_model->where('name', $item['name'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'name',
                    'value' => $item["name"],
                    'message' => $item["name"] . ' already in use'
                ];
            }
    
            if ($type === 'sections' 
                && $section_model->where('name', $item['name'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'name',
                    'value' => $item["name"],
                    'message' => $item["name"] . ' already in use'
                ];
            }
    
            if ($type === 'years' 
                && $year_model->where('name', $item['name'])->countAllResults() > 0) {
                $error[] = [
                    'field' => 'name',
                    'value' => $item["name"],
                    'message' => $item["name"] . ' already in use'
                ];
            }
        }
    
        return $error;
    }
    

    public function uploadBulk($data) {
        $type = $this->type;
        $user_model = new UserModel();
        $student_model = new StudentModel();
        $instructor_model = new InstructorModel();
        $admin_model = new AdminModel();
        $course_model = new CourseModel();
        $subject_model = new SubjectModel();
        $section_model = new SectionModel();
        $year_model = new YearModel();

        $newData = [];
    
        switch ($type) {
            case 'students':
            case 'instructors':
                $users_info = [];
                $users_data = [];
    
                foreach ($data as $dataItem) {
                    $avatar = strtolower($dataItem["gender"]) === 'male' ? 'male-default.jpg' : 'female-default.jpg';
                    $banner = 'default-banner.png';
                    $hashed_password = password_hash($dataItem["password"], PASSWORD_DEFAULT);
    
                    switch ($type) {
                        case 'instructors':
                            $role_id = '1';
                            break;
                        case 'students':
                            $role_id = '2';
                            break;
                    }
    
                    $users_info[] = [
                        'role' => $role_id,
                        'username' => $dataItem["username"],
                        'email' => strtolower($dataItem["email"]),
                        'password' => $hashed_password,
                        'is_active' => 0,
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp(),
                    ];
    
                    $users_data[] = [
                        'avatar' => $avatar,
                        'banner' => $banner,
                        'firstname' => $dataItem["firstname"],
                        'lastname' => $dataItem["lastname"],
                        'contact' => $dataItem["contact"],
                        'address' => $dataItem["address"],
                        'province' => $dataItem["province"],
                        'city' => $dataItem["city"],
                        'birthday' => $dataItem["birthday"],
                        'gender' => $dataItem["gender"]
                    ];

                }

                $newData = $users_info;

                
                try {
                    if($user_model->insertBatch($users_info)) {
                        $inserted_ids = $user_model->insertID();

                        $new_users_data = [];

                        foreach($users_data as $key => $data) {
                            $data['user_id'] = $inserted_ids + $key;
                            $new_users_data[] = $data;
                        }

                        $model = $type == 'students' ? $student_model : ($type == 'instructors' ? $instructor_model : '');

                        if($model->insertBatch($new_users_data)) {
                            $response = [
                                'status' => 200,
                                'message' => 'user accounts created'
                            ];
                        }

                        $response = [
                            'status' => 200,
                            'message' => $new_users_data
                        ];

                    }
                } catch (\Exception $e) {
                    $response = [
                        'status' => 500,
                        'message' => 'error: ' . strtolower($e->getMessage())
                    ];

                    return $this->respond($response);
                }
                break;
    
            case 'administrators':
    
                foreach ($data as $dataItem) {
                    $avatar = strtolower($dataItem["gender"]) === 'male' ? 'male-default.jpg' : 'female-default.jpg';
                    $banner = 'default-banner.png';
                    $hashed_password = password_hash($dataItem["password"], PASSWORD_DEFAULT);
    
                    $newData[] = [
                        'role' => $dataItem["role"],
                        'username' => $dataItem["username"],
                        'email' => $dataItem["email"],
                        'password' => $hashed_password,
                        'is_active' => 0,
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp(),
                        'avatar' => $avatar,
                        'banner' => $banner,
                        'firstname' => strtolower($dataItem["firstname"]),
                        'lastname' => strtolower($dataItem["lastname"]),
                        'contact' => $dataItem["contact"],
                        'address' => strtolower($dataItem["address"]),
                        'province' => strtolower($dataItem["province"]),
                        'city' => strtolower($dataItem["city"]),
                        'birthday' => $dataItem["birthday"],
                        'gender' => $dataItem["gender"],
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp(),
                    ];

                }    
    
                if ($admin_model->insertBatch($newData)) {
                    $response = [
                        'status' => 200,
                        'message' => 'admin accounts created'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'error' => 'something went wrong during insertion'
                    ];
                }
                break;
            case 'courses':
                foreach ($data as $dataItem) {
                    $newData[] = [
                        'code' => strtolower($dataItem["code"]),
                        'name' => strtolower($dataItem["name"]),
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp(),
                    ];
                }
    
                if ($course_model->insertBatch($newData)) {
                    $response = [
                        'status' => 200,
                        'message' => 'courses created'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'error' => 'something went wrong during insertion'
                    ];
                }
                break;
    
            case 'subjects':
                foreach ($data as $dataItem) {
                    $newData[] = [
                        'code' => strtolower($dataItem["code"]),
                        'course' => strtolower($dataItem["course"]),
                        'name' => strtolower($dataItem["name"]),
                        'description' => strtolower($dataItem["description"]),
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp()
                    ];
                }
    
                if ($subject_model->insertBatch($newData)) {
                    $response = [
                        'status' => 200,
                        'message' => 'subjects created'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'error' => 'something went wrong during insertion'
                    ];
                }
                break;
    
            case 'sections':
                foreach ($data as $dataItem) {
                    $newData[] = [
                        'name' => strtolower($dataItem["name"]),
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp()
                    ];
                }
    
                if ($section_model->insertBatch($newData)) {
                    $response = [
                        'status' => 200,
                        'message' => 'subjects created'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'error' => 'something went wrong during insertion'
                    ];
                }
                break;
            case 'years':
                foreach ($data as $dataItem) {
                    $newData[] = [
                        'name' => strtolower($dataItem["name"]),
                        'date_updated' => get_timestamp(),
                        'date_created' => get_timestamp()
                    ];
                }
    
                if ($year_model->insertBatch($newData)) {
                    $response = [
                        'status' => 200,
                        'message' => 'subjects created'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'error' => 'something went wrong during insertion'
                    ];
                }
                break;
    
            default:
                return [
                    'status' => 500,
                    'error' => 'invalid target'
                ];
        }
    
        foreach($newData as $data) {
            $type =  (isset($data["username"]) ? $data["username"] : $data["name"]);
        }

        return [
            'status' => 200,
            'message' => $response,
            'data' => $newData,
        ];
    }
    
    public function filterErrorBulk($data, $errors) {
        $type = $this->type;
        $filteredData = [];
    
        foreach ($data as $dataItem) {
            $isMatched = false;
    
            foreach ($errors as $error) {
                if (($type === 'students' || $type === 'instructors') &&
                    (($error['field'] === 'username' && $error['value'] === $dataItem['username']) ||
                    ($error['field'] === 'email' && $error['value'] === $dataItem['email']))) {
                    $isMatched = true;
                    break;
                }
    
                if (($type === 'courses' || $type === 'subjects') &&
                    (($error['field'] === 'code' && $error['value'] === $dataItem['code']) ||
                    ($error['field'] === 'name' && $error['value'] === $dataItem['name']))) {
                    $isMatched = true;
                    break;
                }
    
                if (($type === 'sections' || $type === 'years') &&
                    ($error['field'] === 'name' && $error['value'] === $dataItem['name'])) {
                    $isMatched = true;
                    break;
                }
            }
    
            if (!$isMatched) {
                $filteredData[] = $dataItem;
            }
        }
    
        if (empty($filteredData)) {
            return null;
        }

        $path = './uploads/suggested-data/';
    
        $all_files = glob($path . '*');

        foreach($all_files as $file) {
            if(is_file($file)) {
                unlink($file);
            }
        }

        $filename = 'filtered-bulk-data-' . time() . '.csv';
        $filepath =  $path . $filename;
        $fp = fopen($filepath, 'w');
    
        // Write the header row
        $header = array_keys($filteredData[0]);
        fputcsv($fp, $header);
    
        // Write the data rows
        foreach ($filteredData as $dataItem) {
            fputcsv($fp, $dataItem);
        }
    
        fclose($fp);
    
        return $filename;
    }
    

    




    

}