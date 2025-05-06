<?php
//CourseController.php
require_once "models/Course.php";

class CourseController {
  public function index() {
    $courses = Course::all();
    include "views/courses/index.php";
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Course::create($_POST);
      header("Location: index.php?controller=course&action=index");
    } else {
      include "views/courses/create.php";
    }
  }

  public function edit() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Course::update($_POST['id'], $_POST);
      header("Location: index.php?controller=course&action=index");
    } else {
      $course = Course::find($_GET['id']);
      include "views/courses/edit.php";
    }
  }

  public function delete() {
    if (isset($_GET['id'])) {
      Course::delete($_GET['id']);
    }
    header("Location: index.php?controller=course&action=index");
  }
}
