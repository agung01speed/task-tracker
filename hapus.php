<?php
include('koneksi.php');

$id = (int) $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");

if ($query) {
    header('Location: index.php');
} else {
    echo'Data gagal dihapus';
}

?>

<a href="hapus.php?id=<?=$row['id']; ?>"
onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus
</a>