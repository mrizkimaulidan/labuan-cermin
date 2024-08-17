<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Tambah Waktu Operasional';

if (isset($_POST['submit'])) {
    $day = $_POST['day'];
    $timeStart = $_POST['time_start'];
    $timeEnd = $_POST['time_end'];
    $query = "INSERT INTO open_hours(day, time_start, time_end) VALUES('$day', '$timeStart', '$timeEnd')";
    mysqli_query($conn, $query);

    header("Location: waktu-operasional.php");
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
                        <input type="text" class="form-control" name="day" placeholder="Masukan nama hari..." autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="time_start" class="form-label">Jam Mulai:</label>
                        <input type="time" class="form-control" name="time_start" placeholder="Masukan jam mulai...">
                    </div>

                    <div class="mb-3">
                        <label for="time_end" class="form-label">Jam Akhir:</label>
                        <input type="time" class="form-control" name="time_end" placeholder="Masukan jam akhir...">
                    </div>

                    <div class="text-center">
                        <a href="./waktu-operasional.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>