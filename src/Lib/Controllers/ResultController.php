<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 2019-03-15
 * Time: 11:44
 */

namespace Lib\Controllers;
use Lib\Models\Student;
use Lib\Models\User;
use Lib\Models\Exam;
use Lib\Models\Result;
use Lib\Models\Exam_result;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;

class ResultController
{
    protected $db, $validator;

    public function __construct($db, $view, $validator)
    {
        $this->db = $db;
        $this->view = $view;
        $this->validator = $validator;

    }

    public function newresult(Request $request, Response $response, array $args = []) {
        $exam = new Exam($this->db);
        $exam = $exam->readById($request->getAttribute('idexam'));
        $student = new Student($this->db);
        $student = $student->readById($request->getAttribute("idstudent"));
        $r = new Result($this->db);
        $r->idstudent = $request->getAttribute("idstudent");
        $r->idexam = $request->getAttribute('idexam');
        $r->exam_date = $request->getAttribute("exam_date");
        $assessors = $r->getAssessorsByExamByDate();
        $results = $r->resultsByExamStudentsWithAllAspects();
        $user = new User($this->db);
        //$assessors = $user->readByIds([$results['assessor1'], $results['assessor2']]);
        $report = $r->resultsByExamStudents($request->getAttribute('idstudent'));

        if($exam->examcode == "LB") {
            $page = 'lb_detail_with_aspects.html';
        } elseif($exam->examcode == "BPV") {
            $page = 'bpv_detail_with_aspects.html';
        } else {
            $page = 'result_detail_with_aspects.html';
        }


        $this->view->render($response, $page, [
            'results' => $results,
            'student' => $student,
            'exam' => $exam,
            'assessors' => $assessors,
            'report' => $report
        ]);

    }

    public function all_newresults(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $student = $student->readById($request->getAttribute("idstudent"));
        $exam = new Exam($this->db);
        $exams = $exam->readByStudentIdResult($student->idstudent);
        $r = new Result($this->db);
        $r->idstudent = $student->idstudent;
        $all_results = [];
        foreach($exams as $exam) {
            $r->idexam = $exam['idexam'];
            $r->exam_date = $exam['exam_date'];
            $assessors = $r->getAssessorsByExamByDate();
            $all_results[] = $r->resultsByExamStudentsWithAllAspects();
        }


        $this->view->render($response, 'all_results_detail_with_aspects.html', [
            'all_results' => $all_results,
            'assessors' => $assessors,
        ]);

    }

    public function allExamResults(Request $request, Response $response, array $args = []) {
        $students = $request->getParsedBody()["idstudents"];
        $r = new Result($this->db);
        $r->idexam = $request->getAttribute("idexam");
        $r->exam_date = $request->getAttribute("exam_date");
        //echo $r->exam_date." ".$r->idexam;
        $assessors = $r->getAssessorsByExamByDate();
        $all_results = [];
        foreach($students as $student) {
            $r->idstudent = $student;
            $all_results[] = $r->resultsByExamStudentsWithAllAspects();
        }


        $this->view->render($response, 'all_results_detail_with_aspects.html', [
            'all_results' => $all_results,
            'assessors' => $assessors,
        ]);

    }

    public function results(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $exam = new Exam($this->db);
        $result = new Result($this->db);
        $result->getStudentExams($request->getAttribute('idstudent'));

        $this->view->render($response, 'results.html', [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exams' => $exam->readAll(),
            'examresults' => $result->examResultsByStudent($request->getAttribute('idstudent')),
        ]);
    }

    public function getNominationGroups($examgroups, $groups) {
        $result = [];
        foreach($examgroups as $group => $total) {
            if(in_array($group, array_keys($groups))) {
                $result[$group] = $total;
                $result[$group]['description'] = $groups[$group];
            }
        }
        return $result;
    }

    public function nomination(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $result = new Result($this->db);
        $exams = $result->examResultsByStudent($request->getAttribute('idstudent'));
        $examgroups = $result->examgroupScores($exams);

        //Filter basisberoepsexamens
        $groups= [
            "B1-K1" => "Levert een bijdrage aan het ontwikkeltraject",
            "B1-K2" => "Realiseert en test onderdelen van een product",
            "B1-K3" => "Levert een product op"
        ];

        $basisexamens = $this->getNominationGroups($examgroups, $groups);

        //Filter profieldeel
        $groups= [
                "P1-K1" => "Onderhoudt en beheert de applicatie",
        ];

        $profielexamens = $this->getNominationGroups($examgroups, $groups);

        $groups= [
            "BPV  " => "Eindoordeel BPV",
        ];

        $bpv = $this->getNominationGroups($examgroups, $groups);

        $groups= [
            "LB   " => "Loopbaan en burgerschap",
        ];

        $lb = $this->getNominationGroups($examgroups, $groups);

        $groups= [
            "K0497" => "Mobile Development (240 uur)",
            "K0501" => "Veilig programmeren (240 uur)",
            "K0505" => "Verdieping software (240 uur)",
            "K0023" => "Digitale vaardigheden (240 uur)",
            "K0842" => "Voorbereiding havo Biologie (480 uur)",
            "K0846" => "Voorbereiding havo Natuurkunde (480 uur)",
            "K0847" => "Voorbereiding havo Scheikunde (480 uur)",
            "K0848" => "Voorbereiding havo Wiskunde A (480 uur)",
        ];

        $keuzedelen = $this->getNominationGroups($examgroups, $groups);

        $this->view->render($response, 'nomination.html', [
            'student' => $student->readById($request->getAttribute('idstudent')),
            'exams' => $result->examResultsByStudent($request->getAttribute('idstudent')),
            'basisexamens' => $basisexamens,
            'profielexamens' => $profielexamens,
            'bpv' => $bpv,
            'lb' => $lb,
            'keuzedelen' => $keuzedelen
        ]);

    }

    public function bpv(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $idstudent = $request->getAttribute('idstudent');



    }

    public function deleteResult(Request $request, Response $response, array $args = []) {
        $er = new Exam_result($this->db);
        $er->idexam = ($request->getAttribute('idexam'));
        $er->exam_date = ($request->getAttribute('exam_date'));
        $er->idstudent = ($request->getAttribute('idstudent'));
        $er->delete();


        //$this->studentResults($request, $response, $args = []);
        $this->results($request, $response, $args = []);
    }

    public function save(Request $request, Response $response, array $args = []) {

        $validation = $this->validator->validate($request, [
            'comment' => v::notEmpty(),
            'exam_date' => v::notEmpty(),
            'assessor1' => v::notEmpty(),
            'assessor2' => v::not(v::equals($request->getParsedBodyParam("assessor1"))),
        ]);

        if ($validation->failed()) {
            return $response->withRedirect('/results/'.$request->getAttribute("idstudent"));
        }
        $er = new Exam_result($this->db);
        $er->comment = $request->getParsedBodyParam('comment');
        $er->exam_date = $request->getParsedBodyParam("exam_date");
        $er->idstudent = $request->getAttribute("idstudent");
        $er->idexam = $request->getAttribute('idexam');
        $er->assessor1 = $request->getParsedBodyParam("assessor1");
        $er->assessor2 = $request->getParsedBodyParam("assessor2");

        if($er->save()) {
            foreach($request->getParsedBody() as $key => $value) {
                if(substr($key, 0,1) == "_") {
                    $result = new Result($this->db);
                    $result->idstudent = $request->getAttribute("idstudent");
                    $result->idexam = $request->getAttribute('idexam');
                    $result->exam_date = $request->getParsedBodyParam("exam_date");
                    $result->idaspect = $value;
                    $result->save();
                }
            }
        }

         $this->results( $request,  $response, $args = []);
    }

    public function studentResults(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = $request->getAttribute('idexam');
        $result->exam_date = $request->getAttribute('exam_date');
        if(isset($request->getParsedBody()["idstudents"])) {
            $result->resultsByExamStudents($request->getParsedBody()["idstudents"]);
        } else {
            $result = $result->resultsByExamStudents();
        }
        //$assessors = $result->getAssessorsByExamByDate();

//        $er = new Exam_result($this->db);
//        $er->idexam = $request->getAttribute('idexam');
//        $er->exam_date = $request->getAttribute('exam_date');

        $this->view->render($response, 'results_exam_date.html', [
            'result' => $result,
        ]);

    }


    public function studentResultsByStudents(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = $request->getAttribute('idexam');
        $result->exam_date = $request->getAttribute('exam_date');
        $students = $request->getAttribute('idstudents');

        //$assessors = $result->getAssessorsByExamByDate();
        $result = $result->resultsByExamStudents();
//        $er = new Exam_result($this->db);
//        $er->idexam = $request->getAttribute('idexam');
//        $er->exam_date = $request->getAttribute('exam_date');

        $this->view->render($response, 'results_exam_date.html', [
            'result' => $result,
        ]);

    }

//    public function studentResultsByStudent(Request $request, Response $response, array $args = []) {
//        $result = new Result($this->db);
//        $result->idexam = $request->getAttribute('idexam');
//        $result->exam_date = $request->getAttribute('exam_date');
//        $result = $result->resultsByExamStudents($request->getAttribute('idstudent');
//
//        $this->view->render($response, 'results_exam_date.html', [
//            'result' => $result,
//        ]);

//    }
    public function studentResultsAll(Request $request, Response $response, array $args = []) {
        $result = new Result($this->db);
        $result->idexam = ($request->getAttribute('idexam'));

        $dates = $result->getExamDates();
        foreach($dates as $date) {
            $result->exam_date = $date['exam_date'];
            $results[] = $result->resultsByExamStudents();
        }

        //var_dump($results);

        $this->view->render($response, 'results_exam.html', [
            'results' => $results,
            //'assessorteams' => $assessorteams
        ]);

    }

    public function detail(Request $request, Response $response, array $args = []) {
        $student = new Student($this->db);
        $student = $student->readById($request->getAttribute("idstudent"));
        $exam = new Exam($this->db);
        $result = new Result($this->db);
        $result->idstudent = $request->getAttribute("idstudent");
        //$result->idexam = $request->getAttribute("idexam");
        $exams[0]['idexam'] = $request->getAttribute('idexam');
        $exams[0]['exam_date'] = $request->getAttribute('exam_date');

        if($request->getAttribute('template') == 'detail') {
            $template = 'result_detail.html';
        } elseif($request->getAttribute('template') == 'proces') {
            $template = 'result_proces.html';
        } else {
            $template = 'results_detail_all.html';
            $exams = $result->getStudentExams($request->getAttribute("idstudent"));
        }


        foreach($exams as $e) {
            $result = new Result($this->db);
            $exam = $exam->readById($e['idexam']);
            $er = new Exam_result($this->db);
            $er->idstudent = $request->getAttribute("idstudent");
            $er->idexam = $e['idexam'];
            $er->exam_date = $e['exam_date'];
            $exam_result = $er->read();

            $result->idstudent = $request->getAttribute("idstudent");
            $result->idexam = $e['idexam'];
            $result->exam_date = $e['exam_date'];

            $results = $result->resultsByExam();
            $exam_result->score = $results['exam_score'];
            $caesura = explode(" ", $exam->caesura);
            if ($results['grade'] == -1) {
                $exam_result->grade = str_replace(",", ".", $caesura[$exam_result->score]);
            } else {
                $exam_result->grade = $results['grade'];
            }

            $data[] = ['exam' => $exam, 'results' => $results, 'exam_result' => $exam_result];
        }


        if($template != 'results_detail_all.html') {
            $args = [
                'student' => $student,
                'exam' => $data[0]['exam'],
                'results' => $data[0]['results']['result'],
                'exam_result' => $data[0]['exam_result']
            ];
        } else {
            $args = [
                'student' => $student,
                'all' => $data
            ];
       }

        $this->view->render($response, $template, $args);


    }
}