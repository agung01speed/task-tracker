<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $kegiatan = $_POST['kegiatan'];
    $status = $_POST['status'];

    $sql = "INSERT INTO TASKS (judul, kegiatan, status) VALUES ('$judul', '$kegiatan', '$status')";
    mysqli_query($conn, $sql);

    header("index.php");
    exit;
}
?>

<!DOCTYPE html>
<head>
    <title>tambah tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
    <h1>Tambah tugas</h1>
    <form method="POST">
        <div>            
            <label>Judul kegiatan</label>
            <br>
            <input type="text" name="judul">
        </div>
        <div>
            <label>kegiatan</label>
        </div>

        <div id="editor" style="heigt: 200px;"></div>

        <input type="hidden" name="kegiatan" id="kegiatan">
        <br><br>

        <div>
            <label>Status</label>
            <br>
            <select name="status">
                <option value="belum">belum</option>
                <option value="selesai">selesai</option>
            </select>
        </div>
        <br>

        <button type="submit" name="submit">Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

    <script src="assets/js/editor.js"></script>
    <script src="assets/js/draft.js"></script>
</body>