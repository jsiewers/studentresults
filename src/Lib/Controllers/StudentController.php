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
use Slim\Http\UploadedFile;
class StudentController

{
    protected $db, $view, $uploads;

    public function __construct($db, $view, $uploads)
    {
        $this->db = $db;
        $this->view = $view;
        $this->uploads = $uploads;
    }

    public function show(Request $request, Response $response, array $args = []) {

        $student = new Student($this->db);
        $groups = $student->getGroups();
        if(!$request->getParsedBodyParam('idgroup') ) {
            $group = $groups[0]['idgroup'];
        } else {
            $group = $request->getParsedBodyParam('idgroup');
        }
        $student->idgroup = $group;

        $this->view->render($response, 'students.html', [
            'students' => $student->readByGroup(),
            'groups' => $groups,
            'selected_group' => $group,
        ]);
    }

    public function import(Request $request, Response $response, array $args = [])
    {
        $directory = $this->uploads;
        $uploadedFiles = $request->getUploadedFiles();
        // handle single input with single file upload
        $uploadedFile = $uploadedFiles['fileToUpload'];
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $filename = $this->moveUploadedFile($directory, $uploadedFile);
            $response->write('uploaded ' . $filename . '<br/>');
        }
        $this->readFile($filename);

        $student = new Student($this->db);
        $student->read();
        $this->view->render($response, 'students.html', [
            'students' => $student->read(),
        ]);
    }

    function moveUploadedFile($directory, UploadedFile $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }

    function readFile($filename) {
        $directory = $this->uploads;
        $str = file_get_contents($directory."/".$filename);
        $students = explode(PHP_EOL, $str);
        $rowcount = 0;
        foreach($students as $row) {
            $arr = explode(";", $row);
            if(!empty($arr[0]) && is_numeric($arr[0])) {
                $student = new Student($this->db);
                $student->idstudent = $arr[0];
                $student->first_name = $arr[1];
                $student->prefix = $arr[2];
                $student->last_name = $arr[3];
                $student->email = $arr[4];
                $student->idgroup = $arr[5];
                $student->save();
                $sts[] = $student;
                $rowcount++;
            }
        }
    }

}
