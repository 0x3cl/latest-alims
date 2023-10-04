<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\InstructorModel;
use App\Models\AdminModel;
use App\Models\EnrolledModel;   
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\YearModel;
use App\Models\SectionModel;


class Controls extends BaseController
{
    use ResponseTrait;

    public function enable($type) {
        $ids = $this->request->getVar('ids');
        switch($type) {
            case 'user': 
                return $this->enable_user($ids);
                break;
            case 'admin':
                return $this->enable_admin($ids);
            default:
                return 'exxx';
        }
    }

    public function disable($type) {
        $ids = $this->request->getVar('ids');
        switch($type) {
            case 'user': 
                return $this->disable_user($ids);
                break;
            case 'admin':
                return $this->disable_admin($ids);
            default:
                return 'exxx';
        }
    }

    public function delete($type) {
        $ids = $this->request->getVar('ids');
        switch($type) {
            case 'user': 
                return $this->delete_user($ids);
                break;
            case 'admin':
                return $this->delete_admin($ids);
                break;
            case 'course':
                return $this->delete_course($ids);
                break;
            case 'subject':
                return $this->delete_subject($ids);
                break;
            case 'section':
                return $this->delete_section($ids);
                break;
            case 'year':
                return $this->delete_year($ids);
                break;
            default:
                return 'exxx';
        }
    }


    // --------------------------------


    public function enable_user($ids) {
    
        $model = new UserModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->set(['is_active' => '1'])
                ->update();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' enabled'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' is already enabled'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'user account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function enable_admin($ids) {
    
        $model = new AdminModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->set(['is_active' => '1'])
                ->update();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' enabled'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' is already enabled'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'admin account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function disable_user($ids) {
    
        $model = new UserModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->set(['is_active' => '0'])
                ->update();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' disabled'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' is already disabled'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'user account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function disable_admin($ids) {
    
        $model = new AdminModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->set(['is_active' => '0'])
                ->update();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' disabled'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' is already disabled'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'admin account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_user($ids) {
    
        $user_model = new UserModel();
        $enroll_model = new EnrolledModel;
        
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $user_model->where('id', $id)
            ->countAllResults();

            $role = $user_model->where('id', $id)->find()[0]['role'];
            $user_type_model = $role == 1 ? new InstructorModel() : ($role == 2 ? new StudentModel() : '');

            if($isExists > 0) {
                $user_model->where('id', $id)
                ->delete();
                $enroll_model->where('user_id', $id)
                ->delete();
                $user_type_model->where('user_id', $id);

                $affected_user = $user_model->affectedRows();
                $affected_enroll = $enroll_model->affectedRows();
                $affected_user_type = $user_type_model->affectedRows();

                if($affected_user > 0 || $affected_enroll > 0 || $affected_user_type > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'user account #' .$id. ' deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'user account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_admin($ids) {
    
        $model = new AdminModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'admin account #' .$id. ' is already deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'admin account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_enroll($ids) {
    
        $model = new EnrolledModel;
        
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'enrolled account #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'enrolled account #' .$id. ' deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'enrolled account #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_course($ids) {
        $model = new CourseModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'course  #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'course  #' .$id. ' is already deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'course  #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_subject($ids) {

        $model = new SubjectModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'subject  #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'subject  #' .$id. ' is already deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'subject  #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_year($ids) {

        $model = new YearModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'year  #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'year  #' .$id. ' is already deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'year  #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

    public function delete_section($ids) {

        $model = new SectionModel();
        $response = [];

        foreach($ids as $id) {
            
            $isExists = $model->where('id', $id)
            ->countAllResults();

            if($isExists > 0) {
                $model->where('id', $id)
                ->delete();

                $affected = $model->affectedRows();

                if($affected > 0) {
                    $response[] = [
                        'status' => 200,
                        'message' => 'section  #' .$id. ' deleted'
                    ];
                } else {
                    $response[] = [
                        'status' => 200,
                        'message' => 'section  #' .$id. ' is already deleted'
                    ];
                }
            } else {
                $response[] = [
                    'status' => 200,
                    'message' => 'section  #' .$id. ' does not exists'
                ];
            }
        }

        return $this->respond($response);
    }

}
