<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Api\Responsetrait;

class FileUploader extends BaseController
{

    use ResponseTrait;

    public function upload($type) {
        switch ($type) {
            case 'image':
                return $this->image_upload();
                break;
            case 'file':
                return $this->file_upload();
                break;
        }
    }

    public function image_upload() {
        $allowed_ext = ['jpeg', 'jpg', 'png', 'gif'];
        $path = './uploads/files/';
        $file = $this->request->getFile('upload');
        
        $ext = explode('.', $file->getName());
        $ext = end($ext);

        if(in_array($ext, $allowed_ext)) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                if(optimizeImageUpload($path, $file, $filename)) {
                    return $this->respond([
                        'uploaded' => 'true',
                        'message' => 'uploaded successfully'
                    ]);
                }
            } else {
                return $this->respond([
                    'status' => '500',
                    'message' => $file->getErrorString()
                ]);
            }
        } else {
            return $this->respond([
                'status' => '500',
                'message' => 'file must be image'
            ]);
        }

    }
}
