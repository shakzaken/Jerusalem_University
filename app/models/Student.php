<?php
require_once ('../app/models/AcademicDegree.php');
require_once ('../app/models/Course.php');
class Student
{

    private $db;
    private $dbf;

    public function __construct()
    {
        $this->db = new Database();
        $this->dbf = new DbFunctions();
        $this->degreeModel = new AcademicDegree();
        $this->courseModel = new Course();

    }

    


    public function getAllCourses($id)
    {
        if(!isset($_SESSION['user']))
        {
            Header("location: " .URLROOT ."/users/login");
            return;
        }

        $sql = "SELECT course_id,status,grade,registrationDate,name,image,instructor  FROM students_courses,courses
        WHERE courses.id = students_courses.course_id
        and student_id = :student_id";
        $this->db->query($sql);
        $this->db->bind('student_id',$id);
        return $this->db->resultSet();
    }

    public function register($degree_id)
    {
        if(!isset($_SESSION['user']))
        {
            Header("location: " .URLROOT ."/users/login");
            return;
        }

        $user = $_SESSION['user'];
        $courses = $this->degreeModel->getCourseByDegreeId($degree_id);

        if($user->isRegistered == true){
            Header("location: " .URLROOT );
            return;
        }

        $sql ="UPDATE users set isRegistered = true , degree_id = :degree_id where id = :id";
        $this->db->query($sql);
        $this->db->bind('degree_id',$degree_id);
        $this->db->bind('id',$user->id);
        $this->db->execute();


        foreach($courses as $course){
            $data = [
                'student_id' => $user->id,
                'course_id' => $course->id
            ];
            $this->dbf->insertRow($data,'students_courses');
        }



    }


}
?>
