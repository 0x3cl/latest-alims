<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\BackupUtils;
use App\Models\UserModel;

class BackupController extends BaseController {

    protected $user_session;
    protected $db;
    public function __construct() {
        $this->user_session = session()->get('user_session_data');
        $this->db = \Config\Database::connect();
    }

    public function download($toBackup, $target = null) {
        
        switch($toBackup) {
            case 'database':
                $this->database_backup($target);
                break;
            case 'logs': 
                $this->logs_backup($target);
                break;
        }
        
    }

    public function database_backup($target) {

        $db = $this->db;

        $requestMethod = request()->getMethod();

        if($requestMethod === 'get') {
            $tables = [$target];
        } else if($requestMethod === 'post') {
            $tables = request()->getPost()['custom_table'];
        }

        $backupPath = FCPATH . 'uploads/backups/';
        $backupFile = $backupPath . 'database_backup_' . time()  . '.sql';
    
        if($tables[0] == 'all') {
            $query = $db->query('SHOW TABLES');
            $result = $query->getResult();
            foreach($result as $row) {
                $tables[] = reset($row);
                unset($tables[0]);
            }
           
            $tables = array_values($tables);

        } 

        $backupData = '';

        foreach ($tables as $table) {

            $query = $db->query('SHOW CREATE TABLE ' . $table);
            $result = $query->getRow();
    
            if (!empty($result)) {
                
                $backupData .= PHP_EOL . '-- Table structure for table `' . $table . '`' . PHP_EOL . PHP_EOL;
                $backupData .= $result->{'Create Table'} . ';' . PHP_EOL . PHP_EOL;
    
                $query = $db->query('SELECT * FROM ' . $table);
                $tableData = $query->getResultArray();

                $backupData .= '-- Dumping data for table `' . $table . '`' . PHP_EOL . PHP_EOL;

                if(count($tableData) > 0) {
                    foreach ($tableData as $row) {
                        $insertColumns = [];
                        $insertValues = [];
        
                        foreach ($row as $column => $value) {
                            $insertColumns[] = $column;
                            $insertValues[] = $db->escape($value);
                        }
        
                        $insertSQL = 'INSERT INTO ' . $table . ' (' . implode(', ', $insertColumns) . ') VALUES (' . implode(', ', $insertValues) . ');';
                        $backupData .= $insertSQL . PHP_EOL;
                    }
                } else {
                    $backupData .= '-- No dumped data in table `' . $table . '`' . PHP_EOL;
                }
                
            }
        }
    
        if (write_file($backupFile, $backupData)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
            header('Cache-Control: must-revalidate');
            header('Content-Length: ' . filesize($backupFile));
            readfile($backupFile);
            exit;
        } else {
            echo 'Backup failed';
        }

    
    }

    public function logs_backup($target) {
        
        $file = FCPATH . 'uploads/logs/administrators/'.$target;

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Cache-Control: must-revalidate');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
        

    }

}