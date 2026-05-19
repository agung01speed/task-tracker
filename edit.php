<?php 
include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tasks WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $kegiatan = $_POST['kegiatan'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE tasks SET judul='$judul', kegiatan='$kegiatan', status='$status' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<head>
    <title>edit tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
    <form action="" method="POST">

        <input type="text" name="judul"
        value="<?php echo $data['judul']; ?>">

        <br><br>
        <div id="editor">
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

        <button type="submit" name="update">
            Update
        </button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script src="assets/js/editor.js"></script>
</body>