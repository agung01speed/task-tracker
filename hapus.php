<?php
include('koneksi.php');

// 1. Pastikan parameter 'id' ada di URL
if (isset($_GET['id'])) {
    
    // 2. Casting ke integer untuk keamanan (SQL Injection Protection)
    $id = (int) $_GET['id'];

    // 3. Eksekusi query
    $query = mysqli_query($conn, "DELETE FROM tasks WHERE id = $id");

    if ($query) {
        // Berhasil, redirect kembali ke halaman utama
        header('Location: index.php');
        exit; // Selalu gunakan exit setelah header redirect
    } else {
        echo "Data gagal dihapus: " . mysqli_error($conn);
    }
} else {
    // Jika mencoba akses langsung tanpa ID
    header('Location: index.php');
    exit;
}

?>