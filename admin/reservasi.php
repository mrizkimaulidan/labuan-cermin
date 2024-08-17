<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
middleware();

$title = 'Daftar Reservasi';

$query = "SELECT
        reservations.id,
        reservations.customer_name,
        reservations.number_of_day,
        reservations.number_of_participants,
        COALESCE(COUNT(reservation_details.service_id), NULL) AS total_service
    FROM
        reservations
    LEFT JOIN
        reservation_details ON reservations.id = reservation_details.reservation_id
    LEFT JOIN
        services ON reservation_details.service_id = services.id
    GROUP BY
        reservations.id, reservations.customer_name, reservations.number_of_day, reservations.number_of_participants
    ORDER BY
        reservations.id
";

$result = mysqli_query($conn, $query);
?>

<?php include_once '../layouts/backend/header.php'; ?>

<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row pt-5 mt-5 justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['message']; ?>
                        <?php unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Waktu Perjalanan</th>
                            <th scope="col">Jumlah Peserta</th>
                            <th scope="col">Jumlah Paket Perjalanan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $row['customer_name']; ?></td>
                                <td><?= $row['number_of_day']; ?> Hari</td>
                                <td><?= $row['number_of_participants']; ?></td>
                                <td><?= $row['total_service']; ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="./reservasi-detail.php?id=<?= $row['id']; ?>" class="btn btn-info">Detail</a> |
                                        <a href="./ubah-reservasi.php?id=<?= $row['id']; ?>" class="btn btn-success">Ubah</a> |
                                        <form action="./hapus-reservasi.php" method="get">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button type="submit" class="btn btn-danger delete-button">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/backend/footer.php'; ?>