<?php 
include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tasks WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $kegiatan = $_POST['kegiatan'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET judul='$judul', kegiatan='$kegiatan', status='$status' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
       echo "tugas berhasil di edit";
    } else {
        echo "error saat mengupload editan" . $conn->error;
    }
    header("Location: index.php");
}
$conn->close();

?>

<!DOCTYPE html>
<head>
    <title>edit tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Edit tugas</h1>
     <p class="kalimat-index">Halaman ini memuat fitur edit judul, kegiatan, dan status. Jika semua sudah bisa pencet tombol "edit"</p>
    <form action="" method="POST">

        <label>Judul kegiatan</label>
        <br>
        <input type="text" name="judul"
        value="<?php echo $data['judul']; ?>">

        <br><br>
        <label>Kegiatan</label>
        <div id="editor" style="height: 200px;">
            <?php echo $data['kegiatan']; ?>
        </div>
        <input type="hidden" name="kegiatan" id="kegiatan">

        <br><br>

        <select name="status">
            <option value="Belum"
            <?php if($data['status'] == 'Belum') echo 'selected'; ?>>
                Belum
            </option>

            <option value="Selesai"
            <?php if($data['status'] == 'Selesai') echo 'selected'; ?>>
                Selesai
            </option>
        </select>

        <br><br>
        <div class="posisi-tombol">
            <button type="submit" name="update" class="efek-tombol">Edit</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script src="assets/js/editor.js"></script>
    <script src="assets/js/draft.js"></script>
</body>