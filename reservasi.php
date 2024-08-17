<?php
session_start();

require_once './conn.php';
include_once './helpers.php';

$serviceQuery = "SELECT * FROM services ORDER BY price DESC";
$servicesResult = mysqli_query($conn, $serviceQuery);

if (isset($_POST['submit'])) {
    $customerName = $_POST['customer_name'];
    $phoneNumber = $_POST['phone_number'];
    $numberOfDay = (int) $_POST['number_of_day'];
    $numberOfParticipants = (int) $_POST['number_of_participants'];
    $serviceIDs = $_POST['services_id'];

    $reservationQuery = "
        INSERT INTO reservations(customer_name, number_of_day, number_of_participants, phone_number)
        VALUES('$customerName', '$numberOfDay', '$numberOfParticipants', '$phoneNumber')
    ";
    mysqli_query($conn, $reservationQuery);

    $reservationID = mysqli_insert_id($conn);
    foreach ($serviceIDs as $key => $serviceID) {
        mysqli_query($conn, "INSERT INTO reservation_details(reservation_id, service_id) VALUES('$reservationID', '$serviceID')");
    }

    $serviceIDsString = implode(',', $serviceIDs);
    $totalServicePriceQuery = "SELECT SUM(price) AS total_price FROM services WHERE id IN($serviceIDsString)";
    $totalServicePriceResult = mysqli_query($conn, $totalServicePriceQuery);
    $totalPriceService = mysqli_fetch_assoc($totalServicePriceResult);
    $totalPrice = $numberOfDay * $numberOfParticipants * $totalPriceService['total_price'];

    mysqli_query($conn, "INSERT INTO reservation_summary(reservation_id, total_price) VALUES('$reservationID', '$totalPrice')");

    $_SESSION['message'] = 'Berhasil melakukan reservasi!';
    $_SESSION['url'] = 'reservasi-detail.php?id=' . $reservationID;

    header('Location: reservasi.php');
    exit;
}
?>

<?php include_once './layouts/frontend/header.php'; ?>
<?php include_once './layouts/frontend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title text-center pb-5">Form Reservasi</h5>

                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['message']; ?><br><br>
                        Klik link berikut ini jika ingin melihat detail reservasi Anda : <a href="<?= $_SESSION['url'] ?>" class="link-underline-primary" target="_blank">Detail</a>
                        <?php session_destroy(); ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post" id="reservation-form">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Pemesan:</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Masukan nama pemesan..." autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomer Telp/HP:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Masukan nomer telp/hp...">
                    </div>

                    <div class="mb-3">
                        <label for="number_of_day" class="form-label">Waktu Perjalanan:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="number_of_day" id="number_of_day" placeholder="Masukan waktu perjalanan...">
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="number_of_participants" class="form-label">Jumlah Peserta:</label>
                        <input type="number" class="form-control" name="number_of_participants" id="number_of_participants" placeholder="Masukan jumlah peserta...">
                    </div>

                    <div class="mb-3">
                        <label for="services_id" class="form-label">Pilih Pelayanan Paket Perjalanan:</label>
                        <select class="form-select" name="services_id[]" id="services_id" multiple>
                            <?php while ($row = mysqli_fetch_assoc($servicesResult)) : ?>
                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?> - (<?= local_currency_format($row['price']) ?>)</option>
                            <?php endwhile; ?>
                        </select>
                        <div class="form-text">Pilih salah satu atau lebih dengan menahan tombol <span class="fw-bold">CTRL</span> pada keyboard dan klik paket yang ingin dipilih.</div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <ul class="list-group text-center">
                            <li class="list-group-item active" aria-current="true">Harga Paket</li>
                            <li class="list-group-item" id="service-price">0</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <ul class="list-group text-center">
                            <li class="list-group-item active" aria-current="true">Jumlah Tagihan</li>
                            <li class="list-group-item" id="total-price">0</li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <a href="./index.php" class="btn btn-light">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once './layouts/frontend/footer.php'; ?>