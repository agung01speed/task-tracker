<?php
include('koneksi.php');

$query = mysqli_query($conn,"SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Task Tracker</title>
</head>
<body>
    <h1>Daftar Tugas WOI</h1>
    <p class="kalimat-index">Selamat datang di task-tracker, pencet tombol "tambah tugas" untuk menuju ke halaman tambah tugas. Pencet "edit" untuk mengubah field yang tersedia atau mengubah status. Pencet "hapus draft" untuk menghapus draft tugas. Pencet tombol "hapus permananen" untuk menghapus tugas dari database</p>
    <br>
    <a href="tambah.php" class="tambah-tugas">tambah tugas</a>
    <button class="hapus-draft" type="button">
        Hapus Draft
    </button>
    <div class="container-tugas">
        <?php while($row = mysqli_fetch_assoc($query)) {?>

            <div class="tugas">
                <h3><?php echo $row['judul']; ?></h3>
                <p><?php echo $row['kegiatan'] ?></p>
                <p>Status: <?php echo $row['status'] ?></p>
                <p class="buat-tgl"><?php echo $row['created_at'] ?></p>
                
                <div class="aksi">
                    <a class="tombol-edit" href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                    <a class="tombol-hps-permanen" href="hapus.php?id=<?=$row['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus Permanen
                    </a>
                </div>
                <p class="tgl-edit"><?php echo $row['updated_at'] ?></p>
            </div>
        <?php } ?>
    </div>
    <script src="assets/js/draft.js"></script>
    </body>
</html>