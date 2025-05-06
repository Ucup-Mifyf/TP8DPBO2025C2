    <?php
    // Student.php
    require_once "config/database.php";

    class Student {
        public static function all() {
            global $conn;
            $sql = "SELECT * FROM students";
        
            if (isset($_GET['search']) && $_GET['search'] != '') {
                $search = $conn->real_escape_string($_GET['search']);
                $sql .= " WHERE name LIKE '%$search%' OR nim LIKE '%$search%'";
            }
            return $conn->query($sql);
        }

        public static function find($id) {
            global $conn;
            return $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
        }

        public static function create($data) {
            global $conn;
            $stmt = $conn->prepare("INSERT INTO students (name, nim, phone, join_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $data['name'], $data['nim'], $data['phone'], $data['join_date']);
            return $stmt->execute();
        }

        public static function update($id, $data) {
            global $conn;
            $stmt = $conn->prepare("UPDATE students SET name=?, nim=?, phone=?, join_date=? WHERE id=?");
            $stmt->bind_param("ssssi", $data['name'], $data['nim'], $data['phone'], $data['join_date'], $id);
            return $stmt->execute();
        }

        public static function allWithCourse() {
            global $conn;
            $sql = "SELECT students.*, courses.course_name 
                    FROM students 
                    LEFT JOIN courses ON students.course_id = courses.id";
            return $conn->query($sql);
        }        

        public static function delete($id) {
            global $conn;
            return $conn->query("DELETE FROM students WHERE id=$id");
        }

        public function getCourses($student_id) {
            $db = $this->connect();
            $stmt = $db->prepare("
                SELECT c.course_name, c.lecturer
                FROM courses c
                JOIN course_student cs ON cs.course_id = c.id
                WHERE cs.student_id = :student_id
            ");
            $stmt->execute(['student_id' => $student_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }        
    }
