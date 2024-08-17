<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Ubah Galeri';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM galleries WHERE id = $id");

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $targetDIR = "../galleries/";
    $oldImageName = $row['url'];
    unlink($oldImageName);

    $originalFileName = basename($_FILES["image"]["name"]);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = md5($originalFileName . time()) . '.' . $fileExtension;
    $targetFile = $targetDIR . $newFileName;
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

    $query = "UPDATE galleries SET url = '$targetFile' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Data berhasil diubah!';
    header('Location: galeri.php');
    exit;
}
?>

<?php include_once '../layouts/backend/header.php'; ?>
<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input class="form-control" name="image" type="file" id="image">
                    </div>

                    <div class="mb-3">
                        <label for="preview" class="form-label">Preview</label>
                        <img src="<?= $row['url']; ?>" class="form-control img-thumbnail" width="200" alt="...">
                    </div>

                    <div class="text-center">
                        <a href="./galeri.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>