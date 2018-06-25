<?php

class AcademicDegree
{

    
    private $db;
    private $dbf;
    
    public function __construct()
    {
        $this->db = new Database();
        $this->dbf = new DbFunctions();
    }

    
    public function addDegree($data)
    {
         $this->dbf->insertRow($data,'academic_degrees');  
    }
   
    public function getAllDegrees()
    {
        return $this->dbf->getAllRows('academic_degrees');
    }

    public function getDegreeById($id)
    {
       return  $this->dbf->getRowByVal($id,'id','academic_degrees');  
    } 
    public function deleteDegreeById($id)
    {
        $this->dbf->deleteRowByVal($id,'id','academic_degrees');
        $this->dbf->deleteRowByVal($id,'degree_id','degrees_courses');
    }

    public function deleteCourseFromDegree($courseId,$degreeId)
    {
       $sql ="DELETE FROM degrees_courses WHERE course_id = :course_id ";
       $sql .=" AND degree_id = :degree_id"; 
       $this->db->query($sql);
       $this->db->bind(':course_id',$courseId);
       $this->db->bind(':degree_id',$degreeId);
       $this->db->execute();
    }
    
    public function insertDegreeAndCourse($data)
    {
        $sql= "INSERT INTO degrees_courses(degree_id,course_id) ";
        $sql.=" VALUES(:degree_id,:course_id)";
        $this->db->query($sql);
        $this->db->bind('degree_id',$data['degree_id']);
        $this->db->bind('course_id',$data['course_id']);
        $this->db->execute();

    }

    public function getCourseByDegreeId($id)
    {
        $sql = "SELECT * from courses,degrees_courses 
        where courses.id = degrees_courses.course_id and degrees_courses.degree_id = :id";
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $this->db->execute();
        return $this->db->resultSet();
    }


    public function registerStudentToCourse($courseId,$studentId)
    {
        $sql= "INSERT INTO students_courses(student_id,course_id) ";
        $sql.=" VALUES(:student_id,:course_id)";
        $this->db->query($sql);
        $this->db->bind(':student_id',$studentId);
        $this->db->bind(':course_id',$courseId);
        $this->db->execute();

    }

    public function checkCourseStudent($courseId,$studentId)
    {
        $sql = "SELECT * FROM students_courses where 
         student_id = :student_id  and course_id = :course_id ";
         $this->db->query($sql);
         $this->db->bind(':student_id',$studentId);
         $this->db->bind(':course_id',$courseId);
         $this->db->execute();
         $count = $this->db->rowCount();

         if($count > 0)
         {
             return true;
         }
         return false;
    }


}
?>