<!-- courses.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px 0; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

<?php if (!empty($student)): ?>
    <h2>Mata Kuliah yang Diambil oleh <?= htmlspecialchars($student['name']) ?></h2>

    <?php if (!empty($courses)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($course['course_name']) ?></td>
                        <td><?= htmlspecialchars($course['lecturer']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada mata kuliah yang dikontrak.</p>
    <?php endif; ?>

<?php else: ?>
    <p>Data mahasiswa tidak ditemukan.</p>
<?php endif; ?>

</body>
</html>
