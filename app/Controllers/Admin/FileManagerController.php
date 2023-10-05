<?php

namespace App\Controllers\Admin;

use CodeIgniter\Files\File;
use App\Controllers\BaseController;

class FileManagerController extends BaseController {

    protected $paths = [];

    public function __construct() {
        $this->paths = [
            'uploads' => 'uploads', 
        ];   
    }

    public function openFolder() {

        $display = [];
        $requestPath = rtrim(request()->getGet('open'), '/');

        $rootPath = FCPATH;
        $mainFolder = 'uploads';

        // IF PATH IS NOT VALID

        $allowedAccess = false;

        foreach ($this->paths as $key => $path) {
            if (strpos($requestPath . '/', $path) === 0 || empty($requestPath)) {
                $allowedAccess = true;
                break;
            } else {
                $allowedAccess = false;
            }
        }
        
        if ($allowedAccess) {
            if(!$requestPath) {
                foreach($this->paths as $key => $path) {
                    $dirPath = $this->sanitizePath($rootPath . $path);

                    $data = scandir($dirPath);
                    
                    $filtered_data = array_filter($data, function($item) {
                        return $item !== '.' && $item !== '..';
                    });

                    if(!empty($filtered_data)) {
                        foreach ($filtered_data as $key => $value) {
                            $display[] = [
                                'key' => $value,
                                'path' => $mainFolder. '/' . $value,
                                'type' => is_dir($dirPath . '/' . $value) ? 'dir' : 'file',
                                'size' => filesize($dirPath . '/' . $value),
                            ];
                        }
                    } else {
                        $display[] = [
                            'key' => $key,
                            'path' => $path,
                            'type' => '',
                            'size' => '',
                            'error' => true,
                            'message' => 'This folder is empty',
                        ];
                    }
                }
            } else {
                $dirPath = $this->sanitizePath($rootPath  .  $requestPath);            
                if(is_file($dirPath)) {
    
                    // HANDLE FILE OR OPEN TEXT EDITOR
                    $display = $this->openFile($dirPath, $requestPath);
                    
    
                } else if(is_dir($dirPath)) {
    
                    // GET DATA INSIDE THE FOLDER IF CURRENT PATH 
                    // IS A DIRECTORY

                    $data = scandir($dirPath);
                    $filtered_data = array_filter($data, function($item) {
                        return $item !== '.' && $item !== '..';
                    });

                    if(!empty($filtered_data)) {
                        foreach ($filtered_data as $key => $value) {
                            $display[] = [
                                'key' => $value,
                                'path' => $requestPath . '/' . $value,
                                'type' => is_dir($dirPath . '/' . $value) ? 'dir' : 'file',
                                'size' => filesize($dirPath . '/' . $value),
                            ];
                        }
                    } else {
                        $display[] = [
                            'key' => $key,
                            'path' => $path,
                            'type' => '',
                            'size' => '',
                            'error' => true,
                            'message' => 'This folder is empty',
                        ];
                    }
                }
            }
        } else {
            $display[] = [
                'key' => $key,
                'path' => $path,
                'type' => '',
                'size' => '',
                'error' => true,
                'message' => 'This folder is forbidden',
            ];
        }
        return $display;
    }

    public function openFile($path, $requestPath) {
        $content = file_get_contents($path);
        $short_ext = pathinfo($path, PATHINFO_EXTENSION);
        $ext = [
            'html' => 'html',
            'css' => 'css',
            'js' => 'javascript',
            'txt' => 'text',
            'sql' => 'sql',
            'php' => 'php',
            'png' => 'image',
            'jpg' => 'image',
            'gif' => 'image',
            'jpeg' => 'image'
        ];

        // $ext = $ext[$short_ext];
        if(array_key_exists($short_ext, $ext)) {
            $ext = $ext[$short_ext];
        } else {
            $ext = 'text';
        }

        return [
            'path' => str_replace('public', '', $requestPath),
            'type' => 'openFile',
            'ext' => $ext,
            'content' => $content,
            'size' => filesize($path),
        ];
    }

    public function sanitizePath($path) {
        $path = str_replace('\\', '/', $path);

        $absolutePath = realpath($path);
       
        if (strpos($absolutePath, FCPATH) === 0) {
            return $absolutePath;
        } else {
            return FCPATH;
        }
    }   

}