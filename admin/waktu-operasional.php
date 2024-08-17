<?php
session_start();
require_once '../conn.php';
require_once '../helpers.php';
require_once '../helpers.php';
middleware();

$title = 'Daftar Waktu Operasional';

$query = "SELECT * FROM open_hours";

$result = mysqli_query($conn, $query);
?>

<?php include_once '../layouts/backend/header.php'; ?>
<?php include_once '../layouts/backend/navbar.php'; ?>

<div class="row pt-5 mt-5 justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row-reverse">
                    <div class="btn-group pb-3" role="group" aria-label="Basic example">
                        <a href="./tambah-waktu-operasional.php" class="btn btn-success">Tambah Waktu Operasional</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $row['day']; ?></td>
                                <td><?= $row['time_start']; ?> - <?= $row['time_end']; ?></td>
                                <td>
                                    <a href="./ubah-waktu-operasional.php?id=<?= $row['id']; ?>">Ubah</a> |
                                    <a href="./hapus-waktu-operasional.php?id=<?= $row['id']; ?>">Hapus</a>
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