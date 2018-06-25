<?php
require_once('../app/models/Course.php');
require_once('../app/models/AcademicDegree.php');
require_once('../app/helpers/files.php');

class Admindegrees extends Controller
{

    function __construct()
    {

        $this->degreeModel = new AcademicDegree();
        $this->courseModel = new Course();
        $this->files = new Files();
    }

    public function index()
    {
        $degrees = $this->degreeModel->getAllDegrees();
        $data['allDegrees'] = $degrees;
        $data['view'] = 'degrees/viewAllDegrees';
        $this->view('admin/index',$data);
    }


    public function addDegree(){
        $data['view'] = 'degrees/addDegree';
        $this->view("admin/index",$data);
    }


    public function addCourse($id)
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $dbData = [
                'course_id' => $_POST['course'],
                'degree_id' => $id
            ];

            $this->degreeModel->insertDegreeAndCourse($dbData);
            header('Location: '. URLROOT. "/admindegrees/degreeDetails/$id");

        }

        $data['degree'] = $this->degreeModel->getDegreeById($id);
        $data['courses'] = $this->courseModel->getAllCourses();
        $data['view'] = "degrees/addCourseToDegree";
        $this->view('admin/index',$data);
    }


    public function degreeDetails($id)
    {
        $degree = $this->degreeModel->getDegreeById($id);
        $courses = $this->degreeModel->getCourseByDegreeId($id);

        $data['degree'] = $degree;
        $data['courses'] = $courses;
        $data['view'] = 'degrees/degreeDetails';
        $this->view('admin/index',$data);

    }

    public function deleteCourseFromDegree($courseId,$degreeId)
    {
       $this->degreeModel->deleteCourseFromDegree($courseId,$degreeId);
       Header('Location: '. URLROOT. "/admindegrees/degreeDetails/$degreeId");
    }

}
?>
