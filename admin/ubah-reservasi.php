<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Ubah Reservasi';

$id = $_GET['id'];

$reservationQuery = "SELECT
    reservations.id,
    reservations.customer_name,
    reservations.number_of_day,
    reservations.number_of_participants,
    reservations.phone_number
FROM
    reservations
JOIN
    reservation_details ON reservations.id = reservation_details.reservation_id
JOIN
    services ON reservation_details.service_id = services.id
    WHERE reservations.id = $id";

$reservation = mysqli_query($conn, $reservationQuery);
$row = mysqli_fetch_assoc($reservation);

$serviceQuery = "SELECT id, name, price FROM services";
$serviceResult = mysqli_query($conn, $serviceQuery);

$selectedServicesQuery = "SELECT service_id FROM reservation_details WHERE reservation_id = $id";
$selectedServicesResult = mysqli_query($conn, $selectedServicesQuery);
$selectedServices = [];

while ($rowSelected = mysqli_fetch_assoc($selectedServicesResult)) {
    $selectedServices[] = $rowSelected['service_id'];
}

if (isset($_POST['submit'])) {
    $customerName = $_POST['customer_name'];
    $phoneNumber = $_POST['phone_number'];
    $numberOfDay = (int) $_POST['number_of_day'];
    $numberOfParticipants = (int) $_POST['number_of_participants'];
    $serviceIDs = $_POST['services_id'];

    $reservationQuery = "
        UPDATE reservations
        SET customer_name = '$customerName',
        number_of_day = $numberOfDay,
        number_of_participants = $numberOfParticipants,
        phone_number = $phoneNumber
        WHERE id = $id
    ";
    mysqli_query($conn, $reservationQuery);

    mysqli_query($conn, "DELETE FROM reservation_details WHERE reservation_id = $id");
    foreach ($serviceIDs as $serviceID) {
        mysqli_query($conn, "INSERT INTO reservation_details (reservation_id, service_id) VALUES ($id, $serviceID)");
    }

    $serviceIDsString = implode(',', $serviceIDs);
    $totalServicePriceQuery = "SELECT SUM(price) AS total_price FROM services WHERE id IN($serviceIDsString)";
    $totalServicePriceResult = mysqli_query($conn, $totalServicePriceQuery);
    $totalPriceService = mysqli_fetch_assoc($totalServicePriceResult);
    $totalPrice = $numberOfDay * $numberOfParticipants * $totalPriceService['total_price'];

    mysqli_query($conn, "UPDATE reservation_summary SET total_price = '$totalPrice' WHERE reservation_id = $id");

    header('Location: reservasi.php');
    exit;
}
?>

<?php include_once '../layouts/backend/header.php'; ?>
<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" id="reservation-form">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Pemesan:</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Masukan nama pemesan..." value="<?= $row['customer_name'] ?>" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomer Telp/HP:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Masukan nomer telp/hp..." value="<?= $row['phone_number'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="number_of_day" class="form-label">Waktu Perjalanan:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="number_of_day" id="number_of_day" placeholder="Masukan waktu perjalanan..." value="<?= $row['number_of_day'] ?>">
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="number_of_participants" class="form-label">Jumlah Peserta:</label>
                        <input type="number" class="form-control" name="number_of_participants" id="number_of_participants" placeholder="Masukan jumlah peserta..." value="<?= $row['number_of_participants'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="services_id" class="form-label">Pilih Pelayanan Paket Perjalanan:</label>
                        <select class="form-select" name="services_id[]" id="services_id" multiple>
                            <?php while ($rowService = mysqli_fetch_assoc($serviceResult)) : ?>
                                <option value="<?= $rowService['id']; ?>" <?= in_array($rowService['id'], $selectedServices) ? 'selected' : '' ?>>
                                    <?= $rowService['name']; ?> - (<?= local_currency_format($rowService['price']) ?>)
                                </option>
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

<?php include_once '../layouts/backend/footer.php'; ?>