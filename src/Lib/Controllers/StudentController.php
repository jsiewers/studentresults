<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 13:21
 */

namespace Lib\Controllers;
use Slim\Http\Request;
use Slim\Http\Response;
use Lib\Models\Student;

class StudentController

{
    protected $db, $view, $upload_path;

    public function __construct($db, $view, $uploads)
    {
        $this->db = $db;
        $this->view = $view;
        $this->upload_path = $uploads;
    }

    public function show(Request $request, Response $response, array $args = []) {

        $student = new Student($this->db);
        $student->read();
        $this->view->render($response, 'students.html', [
            'students' => $student->read(),
        ]);
    }

    public function import(Request $request, Response $response, array $args = []) {
        $target_dir = $this->upload_path;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $csvFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }


}
