<?php
// Course.php
require_once "config/database.php";

class Course {
  public static function all() {
    global $conn;
    return $conn->query("SELECT * FROM courses");
  }

  public static function find($id) {
    global $conn;
    return $conn->query("SELECT * FROM courses WHERE id=$id")->fetch_assoc();
  }

  public static function create($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO courses (course_name, lecturer) VALUES (?, ?)");
    $stmt->bind_param("ss", $data['course_name'], $data['lecturer']);
    return $stmt->execute();
  }

  public static function update($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE courses SET course_name=?, lecturer=? WHERE id=?");
    $stmt->bind_param("ssi", $data['course_name'], $data['lecturer'], $id);
    return $stmt->execute();
  }

  public static function delete($id) {
    global $conn;
    return $conn->query("DELETE FROM courses WHERE id=$id");
  }
}