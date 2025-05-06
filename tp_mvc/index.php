<!-- index.php -->
<?php
// Navigasi antar controller
echo '
<nav style="padding:10px; background:#f8f9fa; margin-bottom:20px;">
  <a href="?controller=student&action=index" style="margin-right: 15px;">Mahasiswa</a>
  <a href="?controller=course&action=index">Mata Kuliah</a>
  <a href= "views/students/courses.php">Course</a>
</nav>
';

// Ambil controller & action dari URL (default: student/index)
$controller = $_GET['controller'] ?? 'student';
$action = $_GET['action'] ?? 'index';

$controllerFile = "controllers/" . ucfirst($controller) . "Controller.php";

// Cek apakah file controller ada
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerName = ucfirst($controller) . "Controller";

    // Cek apakah class dan method ada
    if (class_exists($controllerName) && method_exists($controllerName, $action)) {
        $ctrl = new $controllerName;
        if (isset($_GET['id'])) {
            $ctrl->$action($_GET['id']);
        } else {
            $ctrl->$action();
        }
    } else {
        echo "Halaman tidak ditemukan (method tidak ada).";
    }
} else {
    echo "Halaman tidak ditemukan (controller tidak ada).";
}
