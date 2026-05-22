<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $kegiatan = $_POST['kegiatan'];
    $status = $_POST['status'];

    if (
        empty($judul) || 
        trim($kegiatan) == '<p><br></p>'|| 
        empty($status)
    ) {
        echo'
        <div class="notif-wajib-diisi" id="notif-error">
            <div class="bentuk-notif">
                <p class="huruf-notif">terjadi error, silahkan untuk mengisi semua field</p>
            </div>
        </div>
        
        <script>
            setTimeout(function() {
                var alertBox = document.getElementById("notif-error");
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                    alertBox.style.opacity = "0";
                    alertBox.style.transform = "translateX(100%)";

                    setTimeout(function() {
                    alertBox.style.display = "none";
                    }, 500);
                }
            }, 5000);
        </script>
        ';
    } else {

    $sql = "INSERT INTO tasks (judul, kegiatan, status) VALUES ('$judul', '$kegiatan', '$status')";

    if ($conn->query($sql) === TRUE) {
       header("Location: index.php");
    } else {
        echo "error: " . $conn->error;
    }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<head>
    <title>tambah tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Tambah tugas</h1>
    <p class="kalimat-index">Silahkan isi judul kegiatan dan kegiatan (sebagai deskripsi). Status otomatis hanya terbuka di status "belum" untuk halaman ini. Jika semua sudah bisa pencet tombol "simpan"</p>
    <form method="POST">
        <div>            
            <label>Judul kegiatan</label>
            <br>
            <input type="text" name="judul" required>
        </div>
        <div>
            <label>kegiatan</label>
        </div>

        <div id="editor" style="height: 200px;"></div>

        <input type="hidden" name="kegiatan" id="kegiatan">
        <br><br>

        <div>
            <label>Status</label>
            <br>
            <select name="status">
                <option value="belum" class="belum">belum</option>

            </select>
        </div>
        <br>

        <div class="posisi-tombol">
            <button type="submit" name="submit" class="efek-tombol">Simpan</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

    <script src="assets/js/editor.js"></script>
    <script src="assets/js/draft.js"></script>
</body>