<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Ubah Paket Wisata';

$id = $_GET['id'];

$reservationQuery = "SELECT * FROM services WHERE id = $id";

$reservation = mysqli_query($conn, $reservationQuery);
$row = mysqli_fetch_assoc($reservation);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "UPDATE services SET name = '$name', price = '$price' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Data berhasil diubah!';
    header("Location: ubah-paket-wisata.php?id=$id");
    exit;
}
?>

<?php include_once '../layouts/backend/header.php'; ?>
<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['message']; ?>
                        <?php unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Paket Wisata:</label>
                        <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga:</label>
                        <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>" id="price">
                    </div>

                    <div class="text-center">
                        <a href="./paket-wisata.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>