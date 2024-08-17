<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Ubah Waktu Operasional';

$id = $_GET['id'];

$query = "SELECT * FROM open_hours WHERE id = $id";

$openHours = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($openHours);

if (isset($_POST['submit'])) {
    $day = $_POST['day'];
    $timeStart = $_POST['time_start'];
    $timeEnd = $_POST['time_end'];
    $query = "UPDATE open_hours SET day = '$day', time_start = '$timeStart', time_end = '$timeEnd' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Data berhasil diubah!';
    header("Location: ubah-waktu-operasional.php?id=$id");
    exit;
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
                        <label for="day" class="form-label">Hari:</label>
                        <input type="text" class="form-control" name="day" value="<?= $row['day'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="time_start" class="form-label">Jam Mulai:</label>
                        <input type="time" class="form-control" name="time_start" value="<?= $row['time_start'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="time_end" class="form-label">Jam Akhir:</label>
                        <input type="time" class="form-control" name="time_end" value="<?= $row['time_end'] ?>">
                    </div>

                    <div class="text-center">
                        <a href="./waktu-operasional.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>