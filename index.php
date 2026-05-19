<?php
include('koneksi.php');

$query = mysqli_query($conn,"SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker</title>
</head>
<body>
    <h1>Daftar Tugas</h1>

    <a href="tambah.php">tambah tugas</a>

    <?php while($row = mysqli_fetch_assoc($query)) {?>

        <div>
            <h3><?php echo $row['judul']; ?></h3>
            <p><?php echo $row['kegiatan'] ?></p>
            <p>Status: <?php echo $row['status'] ?></p>
            <p><?php echo $row['created_at'] ?></p>

            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
            </td>
            <a href="hapus.php?id=<?php echo $row['id']; ?>">hapus</a>

        </div>

    <?php } ?>
    </body>
</html>