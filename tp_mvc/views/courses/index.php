<!-- courses/index.php -->
<!doctype html>
<html lang="en">

<head>
  <title>Edit Mata Kuliah</title>

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

  <div class="container my-4">
    <div class="col-1 my-3">
      <a class="btn btn-primary" href="?controller=course&action=create">Add New Course</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Course Name</th>
          <th>Lecturer</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $courses->fetch_assoc()) : ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['course_name'] ?></td>
            <td><?= $row['lecturer'] ?></td>
            <td>
              <a class="btn btn-success" href="?controller=course&action=edit&id=<?= $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="?controller=course&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>
