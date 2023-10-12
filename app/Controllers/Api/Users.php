<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\InstructorModel;
use App\Models\EnrolledModel;
use App\Models\PostModel;
use App\Models\SubmissionFilesModel;
use CodeIgniter\API\ResponseTrait;

class Users extends BaseController
{
    use ResponseTrait;

    protected $user_model;
    protected $student_model;
    protected $instructor_model;
    protected $admin_model;
    protected $enroll_model;

    public function __construct() {
        $this->user_model = new UserModel;
        $this->admin_model = new AdminModel;
        $this->student_model = new StudentModel;
        $this->instructor_model = new InstructorModel;
        $this->enroll_model = new EnrolledModel;
    }

    public function getUsers($id = null) {

        if($id != null) {
            $this->user_model->where('id', $id);
        }

        $data = $this->user_model->findAll();


        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }

    public function getMyData() {
        $user_session = session()->get('user_session');
        $id = $user_session['id'];
        $role = $user_session['role'];
        
        try {
            switch($role) {
                case 1:
                case 2:
                    $model  = $this->user_model;
                    if($role == 1) {
                        $model->join('instructors', 'instructors.user_id = users.id');
                    } else if($role == 2) {
                        $model->join('students', 'students.user_id = users.id');
                    }
                    break;
                case 3:
                    $model = $this->admin_model;
                    break;
                default:
                    'err';
                    break;
            }
            $data = $model->find($id);
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];

            return $this->respond($response);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];

            return $this->respond($response);
        }

    }

    public function getOtherUsers() {
        $user_session = session()->get('user_session');
        $id = $user_session['id'];
        $role = $user_session['role'];
        switch($role) {
            case 1:
                $model  = $this->user_model;
                $model->join('instructors', 'instructors.user_id = users.id');
                $data = $model->where('users.id !=', $id)->find();
                break;
            case 2:
                $model  = $this->user_model;
                $model->join('students', 'students.user_id = users.id');
                $data = $model->where('users.id !=', $id)->find();
                break;
            case 3:
                $model = $this->admin_model;
                $data = $model->where('admins.id !=', $id)->find();
                break;
            default:
                'err';
                break;
        }
        
        try {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];

            return $this->respond($response);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];

            return $this->respond($response);
        }

    }

    public function getUserRole($id) {
        if(!empty($id)) {
            try {
                $role = $this->user_model->find($id)['role'];
                $role = user_role($role);

                $response = [
                    'status' => 200,
                    'role' => $role,
                ];

                return $this->respond($response);

            } catch (\Exception $e) {
                $response = [
                    'status' => 500,
                    'message' => 'error :' . strtolower($e->getMessage()),
                ];

                return $this->respond($response);
            }
        }
    }

    public function getStudents($id = null) {
        $this->user_model->select('
            users.*,
            students.firstname, students.lastname,
            students.contact, students.address,
            students.province, students.city,
            students.birthday, students.status,
            students.gender, students.avatar,
            students.banner, students.bio,
            students.fb_link, students.ig_link,
            students.twi_link
            
        ');
        $this->user_model->join('students', 'users.id = students.user_id');

        if($id != null) {
            $this->user_model->where('users.id', $id);
        }

        $this->user_model->where('role', 2);


        $data = $this->user_model->get()->getResult();

        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }

    public function getInstructors($id = null) {
        $this->user_model->select('
            users.*,
            instructors.firstname, instructors.lastname,
            instructors.contact, instructors.address,
            instructors.province, instructors.city,
            instructors.birthday, instructors.status,
            instructors.gender, instructors.avatar,
            instructors.banner, instructors.bio,
            instructors.fb_link, instructors.ig_link,
            instructors.twi_link
            
        ');
        $this->user_model->join('instructors', 'users.id = instructors.user_id');

        if($id != null) {
            $this->user_model->where('users.id', $id);
        }

        $this->user_model->where('role', 1);

        $data = $this->user_model->get()->getResult();

        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }

    public function getCoursesByID() {
        $uid = $this->getCurrentUser()['id'];
        $model = new EnrolledModel;
        $model->select(
            'enroll.id, courses.id as course_id, courses.code as course_code,
            courses.name as course_name, sections.id as section_id, sections.name as section_name, 
            years.id as year_id, years.name as year_name
            '
        );
        $model->join('courses', 'enroll.course_id = courses.id');
        $model->join('sections', 'enroll.section = sections.id');
        $model->join('years', 'enroll.year = years.id');
        $result = $model->where('user_id', $uid)->find();

        return $this->respond([
            'status' => 200,
            'message' => 'ok',
            'data' => $result
        ]);
    }

    public function getMasterlist() {

        $uid = $this->getCurrentUser()['id'];
        $cid = $this->request->getGet('course');
        $yid = $this->request->getGet('year');
        $sid = $this->request->getGet('section');
        
        try {
            $model = new EnrolledModel;
            $model->select(
                'users.username, users.email, students.firstname, students.lastname,
                students.avatar, students.banner, courses.name as course_name,
                courses.code as course_code
                '
            );
            $model->join('users', 'users.id = enroll.user_id', 'left');
            $model->join('students', 'students.user_id = enroll.user_id', 'left');
            $model->join('courses', 'courses.id = enroll.course_id');
            $model->where('enroll.course_id', $cid);
            $model->where('enroll.year', $yid);
            $model->where('enroll.section', $sid);
            $model->where('users.role', 2);
            $result = $model->find();
           
            return $this->respond([
                'status' => 200,
                'message' => 'ok',
                'data' => $result
            ]);

        } catch(\Exception $e) {
            print_r($e);
        }

    }

    public function getSubjectsByID() {

        $uid = $this->getCurrentUser()['id'];
        $course_id = $this->request->getGet('course');
        $section_id = $this->request->getGet('section');
        $year_id = $this->request->getGet('year');
        

        $model = new EnrolledModel;
        $model->select(
            'enroll.id, subjects.id as subject_id, 
            subjects.code as subject_code, subjects.name as subject_name,
            subjects.description as subject_description,
            courses.id as course_id, courses.code as course_code,
            courses.name as course_name, sections.id as section_id, sections.name as section_name, 
            years.id as year_id, years.name as year_name
            '
        );
        $model->join('subjects', 'enroll.course_id = subjects.course');
        $model->join('courses', 'enroll.course_id = courses.id');
        $model->join('sections', 'enroll.section = sections.id');
        $model->join('years', 'enroll.year = years.id');
        $model->where('user_id', $uid);
        $model->where('course_id', $course_id);
        $model->where('enroll.section', $section_id);
        $model->where('enroll.year', $year_id);
        $result = $model->findAll();

        return $this->respond([
            'status' => 200,
            'message' => 'ok',
            'data' => $result
        ]);

    }

    public function getPreviewSubmission() {
        $uid = $this->getCurrentUser()['id'];
        $cid = $this->request->getGet('course');
        $sid = $this->request->getGet('subject');
        $yid = $this->request->getGet('year');
        $pid = $this->request->getPost('pid');
        $secid = $this->request->getGet('section');
        
        try {
            $model = new EnrolledModel;
            $model->select('
                users.username, users.email, students.firstname, students.lastname,
                students.avatar, students.banner, courses.name as course_name,
                courses.code as course_code, subjects.name as subject_name, 
                subjects.code as subject_code,
                IF(submissions.post_id IS NULL, 0, 1) AS has_submission, submissions.id as submission_id
            ');

            $model->join('users', 'users.id = enroll.user_id');
            $model->join('courses', 'courses.id = enroll.course_id');
            $model->join('subjects', 'courses.id = subjects.course', 'left');
            $model->join('students', 'users.id = students.user_id', 'left');
            $model->join('submissions', 'submissions.user_id = users.id', 'left');
            $model->where('users.role', 2);
            $model->where('enroll.course_id', $cid);
            $model->where('enroll.section', $secid);
            $model->where('enroll.year', $yid);
            $model->where('subjects.id', $sid);


            $result = $model->find();

            return $this->respond([
                'status' => 200,
                'message' => 'ok',
                'data' => $result
            ]);
            

        } catch(\Exception $e) {
            print_r($e);
        }
    }

    public function getSubmission() {
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid');
        $subid = $this->request->getGet('subid');

        $data = [];
        try {
            $model = new PostModel;
            $model->select(
            '
                submissions.id, submissions.content, students.avatar, students.firstname,
                students.lastname, courses.name as course_name, courses.code as course_code,
                sections.name as section_name, years.name as year_name, subjects.name as subject_name,
                subjects.code as subject_code
            '
            );
            $model->join('submissions', 'submissions.post_id = posts.id');
            $model->join('students', 'students.user_id = submissions.user_id');
            $model->join('enroll', 'enroll.user_id = students.user_id');
            $model->join('courses', 'courses.id = enroll.course_id');
            $model->join('sections', 'sections.id = enroll.section');
            $model->join('years', 'years.id = enroll.year');
            $model->join('subjects', 'subjects.course = enroll.course_id');
            $model->where('posts.enroll_id', $eid);
            $model->where('posts.subject_id', $sid);
            $model->where('submissions.post_id', $pid);
            $model->where('submissions.id', $subid);
        

            $data['submission'] = $model->find()[0];

            $model = new SubmissionFilesModel;
            $model->where('post_id', $pid);
            $model->where('submission_id', $data['submission']['id']);

            $data['files'] = $model->find();

            return $this->respond([
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ]);
            
        } catch(\Exeption $e) {
            print_r($e->getMessage());
        }
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new UserModel;
        $model->select('
            users.id, users.email, users.username, users.role, instructors.firstname, instructors.lastname, 
            instructors.contact, instructors.address, instructors.province, 
            instructors.city, instructors.birthday, instructors.status, instructors.gender, 
            instructors.avatar, instructors.banner, instructors.bio, instructors.fb_link, instructors.ig_link, instructors.twi_link
        ');
        $model->join('instructors', 'users.id = instructors.user_id');
        $data = $model->find($uid);
        return $data;
    }

    public function getAdmins($id = null) {
        $data = $this->admin_model->findAll();

        if($id != null) {
            $this->admin_model->where('id', $id);
        }

        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }

    public function create_user($type) {
        switch($type) {
            case 'student':
            case 'instructor':
                $rules = [
                    'firstname' => ['rules' => 'required'],
                    'lastname' => ['rules' => 'required'],
                    'email' => ['rules' => 'required|valid_email|is_unique[users.email]'],
                    'contact' => ['rules' => 'required|min_length[11]|max_length[11]'],
                    'address' => ['rules' => 'required'],
                    'state' => ['rules' => 'required'],
                    'city' => ['rules' => 'required'],
                    'birthday' => ['rules' => 'required'],
                    'gender' => ['rules' => 'required'],
                    'username' => ['rules' => 'required|is_unique[users.username]'],
                    'password' => ['rules' => 'required|min_length[8]'],
                    'password_repeat' => ['rules' => 'required|min_length[8]|matches[password]'],
                ];                
                break;
            case 'admin':
                $rules = [
                    'firstname' => ['required'],
                    'lastname' => ['required'],
                    'email' => ['required', 'valid_email', 'is_unique[admins.email]'],
                    'gender' => ['required'],
                    'username' => ['required', 'is_unique[admins.username]'],
                    'password' => ['required', 'min_length[8]'],
                    'password_repeat' => ['required', 'min_length[8]', 'matches[password]'],
                ];
                break;
        
        }

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {
            
            switch($type) {
                case 'instructor':
                    $is_success = $this->addUser(1);
                    break;
                case 'student':
                    $is_success = $this->addUser(2);
                    break;
                case 'admin':
                    $is_success = $this->addAdmin();
                    break;
            }   

            if($is_success) {
                $response = [
                    'status' => 200,
                    'message' => 'account created.',
                ];
                return $this->respond($response);
            } else {
                $response = [
                    'status' => 500,
                    'message' => 'an error occurred while creating account.',
                ];
                return $this->respond($response);
            }

        }
    }


    public function addUser($role) {

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $role = $role;    
        $email = $this->request->getPost('email');
        $contact = $this->request->getPost('contact');
        $address = $this->request->getPost('address');
        $province = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $birthday = $this->request->getPost('birthday');
        $gender = $this->request->getPost('gender');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $avatar = '';
        $banner = 'banner-default.png';
        if($gender == 'male') {
            $avatar = 'male-default.jpg';
        } else if($gender == 'female') {
            $avatar = 'female-default.jpg';
        }

        // Manipulate data, store to an array.
        // Prepare the data to be passed to model

        $user_data = [
            'role' => $role,
            'username' => $username,
            'email' => strtolower($email),
            'password' => $hashed_password,
            'date_updated' => get_timestamp(),
            'date_created' => get_timestamp()
        ];

        // Call User Model

        if($this->user_model->insert($user_data)) {
            $inserted_id = $this->user_model->insertID();

            $info_data = [
                'user_id' => $inserted_id,
                'avatar' => $avatar,
                'banner' => $banner,
                'firstname' => strtolower($firstname),
                'lastname' => strtolower($lastname),
                'contact' => $contact,
                'address' => strtolower($address),
                'province' => strtolower($province),
                'city' => strtolower($city),
                'birthday' => $birthday,
                'gender' => $gender,
            ];

            $model = $role == 1 ? $this->instructor_model : ($role == 2 ? $this->student_model : '');

            if($model->insert($info_data)) {
                return true;
            } else {
                return false;
            }
        }

    }

    public function addAdmin() {

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $gender = $this->request->getPost('gender');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $avatar = '';
        $banner = 'banner-default.png';
        if($gender == 'male') {
            $avatar = 'male-default.jpg';
        } else if($gender == 'female') {
            $avatar = 'female-default.jpg';
        }

        $data = [
            'avatar' => $avatar,
            'banner' => $banner,
            'role' => 3,
            'firstname' => strtolower($firstname),
            'lastname' => strtolower($lastname),
            'email' => strtolower($email),
            'username' => $username,
            'password' => $hashed_password,
            'date_updated' => get_timestamp(),
            'date_created' => get_timestamp(),
        ];

        if($this->admin_model->insert($data)) {
            return true;
        } else {
            return false;
        }

    }

    public function update_user($type, $id) {
        switch($type) {
            case 'student':
            case 'instructor':
                return $this->updateUser($type, $id);
            case 'administrator':
                return $this->updateAdmin($id);
        }
    }

    public function updateUser($type, $id) {

        $rules = [
            'firstname' => ['rules' => 'required'],
            'lastname' => ['rules' => 'required'],
            'email' => ['rules' => 'required|valid_email'],
            'contact' => ['rules' => 'required|min_length[11]|max_length[11]'],
            'address' => ['rules' => 'required'],
            'state' => ['rules' => 'required'],
            'city' => ['rules' => 'required'],
            'birthday' => ['rules' => 'required'],
            'gender' => ['rules' => 'required'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors()
            ];

            return $this->respond($response);
        } else {
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $contact = $this->request->getPost('contact');
            $address = $this->request->getPost('address');
            $province = $this->request->getPost('state');
            $city = $this->request->getPost('city');
            $birthday = $this->request->getPost('birthday');
            $gender = $this->request->getPost('gender');

            $user_data = [
                'email' => strtolower($email),
                'date_updated' => get_timestamp()
            ];

            $info_data = [
                'firstname' => strtolower($firstname),
                'lastname' => strtolower($lastname),
                'contact' => $contact,
                'address' => strtolower($address),
                'province' => strtolower($province),
                'city' => strtolower($city),
                'birthday' => $birthday,
                'gender' => strtolower($gender),
            ];

            try {
                
                $find = $this->user_model->where(['id' => $id])->countAllResults();

                if($find > 0) {
                    $find_data = $this->user_model->find($id);
                    $role = $find_data['role'];
                    $model = $role == 1 ? $this->instructor_model : ($role == 2 ? $this->student_model : '');
                    
                    if($this->user_model->where('id', $id)->set($user_data)->update()
                        && $model->where('user_id', $id)->set($info_data)->update()) {
                        $response = [
                            'status' => 200,
                            'message' => $type . ' account #' .$id. ' updated' 
                        ];
                        return $this->respond($response);
                    }

                } else {
                    $response = [
                        'status' => 404,
                        'message' => $type . ' account #' .$id. ' does not exists' 
                    ];
                    return $this->respond($response);
                }
            } catch (\Exception $e) {
                $response = [
                    'status' => 500,
                    'message' => 'error: ' . strtolower($e->getMessage())
                ];   
                return $this->respond($response);
            }
        }
    }

    public function updateAdmin($id) {

        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $contact = $this->request->getPost('contact');
        $address = $this->request->getPost('address');
        $province = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $birthday = $this->request->getPost('birthday');
        $gender = $this->request->getPost('gender');


        $data = [
            'firstname' => strtolower($firstname),
            'lastname' => strtolower($lastname),
            'email' => strtolower($email),
            'contact' => $contact,
            'address' => strtolower($address),
            'province' => strtolower($province),
            'city' => strtolower($city),
            'birthday' => $birthday,
            'gender' => strtolower($gender),
        ];

        try {

            $find = $this->admin_model->where('id', $id)->countAllResults();

            if($find > 0) {
                if($this->admin_model->where('id', $id)->set($data)->update()) {
                    $response = [
                        'status' => 200,
                        'message' => 'admin account #' . $id . ' updated'
                    ];
                    return $this->respond($response);
                }
            } else {
                $response = [
                    'status' => 400,
                    'message' => 'admin account #' . $id . ' does not exists'
                ];
                return $this->respond($response);
            }

        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];
            return $this->respond($response);
        }
    
    }

    public function enroll_user($id) {
        
        $rules = [
            'course' => ['required', 'integer'],
            'section' => ['required', 'integer'],
            'year' => ['required', 'integer'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {

            $course = $this->request->getPost('course');
            $year = $this->request->getPost('year');
            $section = $this->request->getPost('section');
    
            $data = [
                'user_id' => $id,
                'course_id' => $course,
                'year' => $year,
                'section' => $section,
                'date_updated' => get_timestamp()
            ];

            try {

                $isExists = $this->user_model->where('id', $id)->countAllResults();

                if($isExists > 0) {
                    $user_role = $this->user_model->find($id)['role'];
                    if($user_role == 1) {
                        $isEnrolled = $this->enroll_model->where([
                            'user_id' => $id,
                            'course_id' => $course,
                            'year' => $year,
                            'section' => $section
                        ])->countAllResults();

                        if($isEnrolled > 0) {
                            $response = [
                                'status' => 500,
                                'message' => 'instructor account #' . $id . ' already enrolled woth the same class settings'
                            ];
                            return $this->respond($response);
                        } else {
                            if($this->enroll_model->insert($data)
                                && $this->user_model->where('id', $id)
                                    ->set(['is_enrolled' => 1])->update()) {
                                $response = [
                                    'status' => 200,
                                    'message' => 'instructor account #' . $id . ' enrolled'
                                ];
                                return $this->respond($response);
                            }
                        }
                    } else if($user_role == 2) {
                        $isEnrolled = $this->enroll_model->where([
                            'user_id' => $id
                        ])->countAllResults();

                        if($isEnrolled > 0) {
                            $response = [
                                'status' => 200,
                                'message' => 'student account #' . $id . ' already enrolled'
                            ];
                            return $this->respond($response);
                        } else {
                            if($this->enroll_model->insert($data)
                            && $this->user_model->where('id', $id)
                                ->set(['is_enrolled' => 1])->update()) {
                                
                                $response = [
                                    'status' => 200,
                                    'message' => 'student account #' . $id . ' enrolled'
                                ];

                                return $this->respond($response);
                            }
                        }
                    }
                } else {
                    $response = [
                        'status' => 404,
                        'message' => 'account #' . $id . ' does not exists'
                    ];
                    
                    return $this->respond($response);
                }

                

            } catch (\Exception $e) {
                $response = [
                    'status' => 500,
                    'message' => 'error : ' . strtolower($e->getMessage())
                ];
                return $this->respond($response);
            }

            

        }
    }

    public function update_enroll_user($id) {

        $course = $this->request->getPost('course');
        $year = $this->request->getPost('year');
        $section = $this->request->getPost('section');

        try {
            $isExists = $this->enroll_model->where('id', $id)->countAllResults();
            if($isExists > 0) {
                $enroll_id = $this->enroll_model->where('id', $id)->find()[0]['id'];

                $data = [
                    'course_id' => $course,
                    'year' => $year,
                    'section' => $section,
                    'date_updated' => get_timestamp()
                ];

                if($this->enroll_model->where('id', $enroll_id)
                    ->set($data)->update()) {
                    $response = [
                        'status' => 200,
                        'message' => 'account #' . $id . ' enrollment updated'
                    ];

                    return $this->respond($response);
                }

            } else {
                $response = [
                    'status' => 404,
                    'message' => 'account #' . $id . ' does not exists'
                ];

                return $this->respond($response);
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];

            return $this->respond($response);
        }

    }

}
