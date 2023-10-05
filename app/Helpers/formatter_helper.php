<?php 

if(!function_exists('user_role')) {
    function user_role($role) {
        $roleString = '';
        switch($role) {
            case 1: 
                $roleString = 'instructor';
                break;
            case 2: 
                $roleString = 'student';
                break;
            default: 
                $roleString = 'administrator';
                break;
        }
        return $roleString;
    }
}

if(!function_exists('get_timestamp')) {
    function get_timestamp() {
        return date('Y-m-d');
    }
}

if(!function_exists('optimizeImageUpload')) {
    function optimizeImageUpload($path, $file, $filename) {
        $image = \Config\Services::image();
        $image->withFile($file)
        ->resize(800, 800, true, 'height')
        ->withResource()
        ->save($path . $filename, 50);
        return true;
    }   
}

if(!function_exists('format_filemanager')) {
    function format_filemanager($name, $display) {
        if($display['type'] === 'dir') {
            echo '
                <div class="col-3 mb-3">
                    <a href="filemanager?open='.$display['path'].'" class="text-decoration-none">
                        <div>
                            <i class="bx bx-folder"></i>
                            <span>'.ucfirst($name).'</span>
                        </div>  
                    </a>
                </div>
            ';
    
        } else  if($display['type'] === 'file') {
            echo '
            <div class="col-3 mb-3">
                <a href="filemanager?open='.$display['path'].'" class="text-decoration-none">
                    <div>
                        '.iconify($name).'
                        <span>'.$name.'</span>
                    </div>  
                </a>
            </div>
        ';
        }
    }
}

if(!function_exists('iconify')) {
    function iconify($file) {
        $ext = explode('.', $file);
        $ext = end($ext);
        switch($ext) {
            case 'html': 
                return '<i class="bx bxs-file-html"></i>';
                break;
            case 'css':
                return '<i class="bx bxs-file-css"></i>';
                break;
            case 'js':
                return '<i class="bx bxs-file-js"></i>';
                break;
            case 'json':
                return '<i class="bx bxs-file-json"></i>';
                break;
            case 'md':
                return '<i class="bx bxs-file-md"></i>';
                break;
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'tiff':
                return '<i class="bx bx-image" ></i>';
                break;
            case 'pdf':
                return '<i class="bx bxs-file-pdf"></i>';
                break;
            case 'docx':
                return  '<i class="bx bxs-file-doc"></i>';
                break;
            case 'ppt':
                return '<i class="bx bxs-slideshow"></i>';
                break;
            case 'sql':
                return '<i class="bx bx-data"></i>';
                break;
            default:
                return '<i class="bx bxs-file" ></i>';
                break;
        }
    }
}