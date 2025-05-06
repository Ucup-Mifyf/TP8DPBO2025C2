<!-- students/index.php -->
<!doctype html>
<html lang="en">

<head>
  <title>Edit Mahasiswa</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?controller=student&action=index">Students</a>
    </div>
  </nav>

  <div class="container my-4">
    <div class="col-1 my-3">
      <a class="btn btn-primary" href="?controller=student&action=create">Add New</a>
    </div>
      <form method="GET" class="row g-3 mb-3">
    <input type="hidden" name="controller" value="student">
    <input type="hidden" name="action" value="index">
    <div class="col-auto">
      <input type="text" class="form-control" name="search" placeholder="Cari nama atau NIM" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Search</button>
    </div>
  </form>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIM</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $students->fetch_assoc()) : ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['join_date'] ?></td>
            <td>
              <a class="btn btn-success" href="?controller=student&action=edit&id=<?= $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="?controller=student&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>
