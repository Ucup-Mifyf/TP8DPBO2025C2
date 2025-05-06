<?php
// StudentController.php
require_once "models/Student.php";

class StudentController {
    public function index() {
        $students = Student::all();
        include "views/students/index.php";
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Student::create($_POST);
            header("Location: index.php?controller=student&action=index");
        } else {
            include "views/students/create.php";
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Student::update($_POST['id'], $_POST);
            header("Location: index.php?controller=student&action=index");
        } else {
            $student = Student::find($_GET['id']);
            include "views/students/edit.php";
        }
    }

    public function delete() {
        Student::delete($_GET['id']);
        header("Location: index.php?controller=student&action=index");
    }

    public function showCourses($id) {
        require_once './models/Student.php';
        $studentModel = new Student();
        $student = $studentModel->find($id); // Method untuk ambil data 1 mahasiswa
        $courses = $studentModel->getCourses($id);
    
        include './views/students/courses.php'; // View baru nanti kita buat
    }    
}
