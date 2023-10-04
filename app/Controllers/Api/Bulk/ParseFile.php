<?php

namespace App\Controllers\Api\Bulk;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use App\Controllers\BaseController;
use CodeIgniter\Api\ResponseTrait;
use Config\Services;

class ParseFile extends BaseController {


    use ResponseTrait;

    protected $session;

    public function __construct() {
        $this->session = Services::session();
    }

    public function index() {
        $file = $this->request->getFile('file');
        $type = $this->request->getPost('type');
        
        $allowedExtensions = ['csv', 'xlsx', 'xls', 'json'];
        $extension = pathinfo($file->getName(), PATHINFO_EXTENSION);

        if ($file->isValid()) {
            
            if (in_array($extension, $allowedExtensions)) {
                switch ($extension) {
                    case 'csv':
                        $response = $this->parseCSV($type, $file);
                        break;
                    case 'xlsx':
                    case 'xls':
                        $response = $this->convertXLSXtoCSV($file);
                        break;
                    case 'json':
                        $response = $this->convertJSONtoCSV($file);
                        break;
                }

                if ($response['status'] == 200) {
                    $data = [
                        'type' => $type,
                        'result' => $response
                    ];
                    $this->session->set('parsed_content', $data);
                    return $this->respond($response);
                } else {
                    return $this->respond($response);
                }

            } else {
                echo json_encode([
                    'status' => 500,
                    'message' => 'invalid file extension'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 500,
                'message' => 'failed to parse file'
            ]);
        }
    }

    public function parseCSV($type, $file) {
        $csv_data = fopen($file->getPathname(), 'r');
        if ($csv_data !== false) {
            $array = [];
            while (($data = fgetcsv($csv_data)) !== false) {
                $array[] = $data; 
            }
            
            $cols = $array[0];
            unset($array[0]);
            $array = array_values($array);
            
            fclose($csv_data); 
    
            if($this->validateMatchColumns($type, $cols)) {
                return [
                    'status' => 200,
                    'data' => $array,
                    'title' => $cols,
                    'message' => 'file parsed successully'
                ];
            } else {
                return [
                   'status' => 500,
                    'data' => null,
                   'message' => 'invalid file content. make sure file is for ' . $type
                ];
            }
                        
        } else {
            return [
                'status' => 500,
                'data' => [],
                'message' => 'failed to parse file'
            ];
        }
    }
    
    public function convertXLSXtoCSV($file) {

        $spreadsheet = IOFactory::load($file->getPathname());
        $csvWriter = new Csv($spreadsheet);
        $csvWriter->setDelimiter(',');
    
        // Create a temporary file to store the CSV data
        $tempFilePath = tempnam(sys_get_temp_dir(), 'csv');
    
        // Save the XLSX file as CSV
        $csvWriter->save($tempFilePath);
    
        // Read the CSV file contents
        $csvData = file_get_contents($tempFilePath);
    
        // Split the CSV data into an array of rows
        $csvRows = explode("\n", $csvData);
    
        // Convert each row to an array
        $formattedRows = [];
    
        foreach ($csvRows as $row) {
            $formattedRows[] = str_getcsv($row);
        }
    
        // Remove the temporary file
        unlink($tempFilePath);
    
        array_shift($formattedRows);
    
        return [
            'status' => 200,
            'data' => $formattedRows,
            'message' => 'file parsed successully'
        ];
    }
    
    public function convertJSONtoCSV($file) {

        $jsonContent = file_get_contents($file->getPathname());
        $decodedData = json_decode($jsonContent, true);

        if (is_array($decodedData)) {
            $array = [];

            foreach ($decodedData as $item) {
                if (is_array($item)) {
                    $array[] = array_values($item);
                }
            }

            return [
                'status' => 200,
                'data' => $array,
                'message' => 'file parsed successully'
            ];
        } else {
            return [
                'status' => 500,
                'data' => [],
                'message' => 'failed to parse file'
            ];
        }
    }    

    public function validateMatchColumns($type, $cols) {
        $validate = [
            'students' => [
                'username',
                'email',
                'password',
                'firstname',
                'lastname',
                'contact',
                'address',
                'province',
                'city',
                'birthday',
                'gender'
            ],
            'instructors' => [
                'username',
                'email',
                'password',
                'firstname',
                'lastname',
                'contact',
                'address',
                'province',
                'city',
                'birthday',
                'gender'
            ],
            'administrators' => [
                'username',
                'email',
                'password',
                'firstname',
                'lastname',
                'contact',
                'address',
                'province',
                'city',
                'birthday',
                'gender',
                'role'
            ],
            'courses' => [
                'code',
                'name'
            ],
            'subjects' => [
                'code',
                'course',
                'name',
                'description'
            ],
            'sections' => [
                'name'
            ],
            'years' => [
                'name'
            ]
        ];

        $a = $validate[$type];
        $b = $cols;

        // $diff = array_diff($a, $b);
        
        if($a === $b) {
            return true;
        } else {
            return false;
        }

    }

}
