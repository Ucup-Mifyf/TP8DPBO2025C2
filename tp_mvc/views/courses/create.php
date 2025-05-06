<!-- create.php -->
<!doctype html>
<html lang="en">

<head>
  <title>Tambah Mata Kuliah</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?controller=course&action=index">Courses</a>
    </div>
  </nav>

  <div class="container col-lg-6 mt-5">
    <form method="post">
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center">Tambah Mata Kuliah</h1>
        </div>
        <div class="card-body">
          <label>Nama Mata Kuliah:</label>
          <input type="text" name="course_name" class="form-control" required><br>

          <label>Dosen Pengampu:</label>
          <input type="text" name="lecturer" class="form-control" required><br>

          <button class="btn btn-success" type="submit" name="submit">Simpan</button>
          <a class="btn btn-secondary" href="?controller=course&action=index">Batal</a>
        </div>
      </div>
    </form>
  </div>

  <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>
