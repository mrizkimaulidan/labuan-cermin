<?php
require_once 'conn.php';
require_once 'helpers.php';

$title = 'Detail Reservasi';

$id = $_GET['id'];

$reservationQuery = "SELECT
    reservations.id,
    reservations.customer_name,
    reservations.number_of_day,
    reservations.number_of_participants,
    count(reservation_details.service_id) total_service
FROM
    reservations
JOIN
    reservation_details ON reservations.id = reservation_details.reservation_id
JOIN
    services ON reservation_details.service_id = services.id
    
    where reservations.id = $id";

$reservation = mysqli_query($conn, $reservationQuery);
$row = mysqli_fetch_assoc($reservation);

$servicesQuery = "select
    reservation_details.id,
    services.name,
    services.price
from
    reservation_details
    JOIN services ON reservation_details.service_id = services.id
where
    reservation_details.reservation_id = $id";

$services = mysqli_query($conn, $servicesQuery);
$totalPriceQuery = mysqli_query($conn, "SELECT id, reservation_id, total_price FROM reservation_summary WHERE reservation_id = $id");
$totalPriceResult = mysqli_fetch_assoc($totalPriceQuery);
?>
<?php include_once './layouts/frontend/header.php'; ?>

<?php include_once './layouts/frontend/navbar.php'; ?>

<div class="row justify-content-center pt-5 mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" value="<?= $row['customer_name']; ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="number_of_day" class="form-label">Jumlah Peserta:</label>
                    <input type="number" class="form-control" value="<?= $row['number_of_participants'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="customer_name" class="form-label">Waktu Perjalanan:</label>
                    <div class="input-group">
                        <input type="number" value="<?= $row['number_of_day']; ?>" class="form-control" disabled>
                        <span class="input-group-text">hari</span>
                    </div>
                </div>

                <?php $serviceNo = 1; ?>
                <div class="mb-3">
                    <ul class="list-group text-center">
                        <li class="list-group-item active" aria-current="true">Paket Yang Dipilih</li>
                        <?php while ($service = mysqli_fetch_assoc($services)) : ?>
                            <li class="list-group-item"><?= $service['name']; ?> (<?= local_currency_format($service['price']); ?>)</li>
                        <?php endwhile; ?>
                    </ul>
                </div>

                <div class="mb-3">
                    <ul class="list-group text-center">
                        <li class="list-group-item active" aria-current="true">Jumlah Tagihan</li>
                        <li class="list-group-item"><?= local_currency_format($totalPriceResult['total_price']); ?></li>
                    </ul>
                </div>
                <div class="text-center">
                    <a href="./reservasi.php" class="btn btn-light">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './layouts/frontend/footer.php'; ?>