<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Tambah Paket Wisata';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO services (name, price) VALUES ('$name', '$price')";
    mysqli_query($conn, $query);

    header("Location: paket-wisata.php");
}
?>

<?php include_once '../layouts/backend/header.php'; ?>
<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Paket Wisata:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama paket wisata..." autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga:</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Masukan harga paket wisata...">
                    </div>

                    <div class="text-center">
                        <a href="./paket-wisata.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>