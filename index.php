<?php
require_once './conn.php';
require_once './helpers.php';

$servicesResult = mysqli_query($conn, "SELECT * FROM services");
$galleryResult = mysqli_query($conn, "SELECT * FROM galleries");
$openHoursResult = mysqli_query($conn, "SELECT * FROM open_hours");
?>

<?php include_once './layouts/frontend/header.php'; ?>

<!--HEADER-->
<section class="hero" id="hero">
  <div class="heroText">
    <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
      Selamat Datang
    </h1>
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="1000">
      Wisata <strong class="custom-underline">Danau Labuan Cermin</strong>
    </p>
  </div>
  <div class="fotoWrapper">
    <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Danau_Labuan_Cermin_memiliki_rasa_asin_di_permukaan_danau_sementara_air_di_dasar_danau_terasa_tawar-1.jpg" class="custom-foto">
  </div>
  <div class="overlay"></div>
</section>
<!--endHEADER-->
<!--Nav-->

<?php include_once './layouts/frontend/navbar.php'; ?>

<!--End Nav-->
<!--GAMBAR Slide-->
<div class="container">
  <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Papan_selamat_datang_ke_Labuan_Cermin-1.jpg" class="w-100" style="height: 420px;">
        <div class="container">
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Danau_cantik_ini_terletak_di_Desa_Labuan_Kelambu_di_Kecamatan_Biduk-biduk-1.jpg" class="w-100" style="height: 420px;">
        <div class="container">
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Kapal_untuk_penyebrangan_ke_spot_Labuan_Cermin_harga_sewa_200_000_pulang-pergi-1.jpg" class="w-100" style="height: 420px;">
        <div class="container">
        </div>
      </div>
    </div>
  </div>
</div>
<!--endGambarSlide-->
<!--Home-->
<section>
  <div class="container">
    <div class="row text-center" style="margin: 10px;">
      <div class="col">
        <h2>Danau Labuan Cermin</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-5">
        <p class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum vitae atque assumenda
          inventore, fuga eveniet officia vero recusandae, asperiores exercitationem suscipit rem harum? Libero
          numquam consectetur laboriosam corporis odit repellat illo? Quidem, voluptatum nesciunt in rem inventore
          veniam recusandae. Modi eveniet sunt ea dicta, accusamus saepe quia animi architecto explicabo natus at,
          officia aspernatur, perferendis fugiat reprehenderit molestias deserunt corporis.
        </p>
      </div>
      <div class="col-5">
        <p class="txt">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit corrupti aspernatur,
          voluptate at iusto aperiam repellendus architecto quos ducimus eius est autem dicta facere voluptatibus,
          vero esse! Repellendus, praesentium aliquid vero eaque quo architecto facere, esse earum, similique
          exercitationem minus eveniet accusantium blanditiis ad aliquam dignissimos officia. Soluta facilis cum
          quisquam, cumque quia expedita eum mollitia in quod culpa molestias?
        </p>
      </div>
    </div>
  </div>
</section>
<!--End Home-->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0d6efd" fill-opacity="0.5" d="M0,192L21.8,170.7C43.6,149,87,107,131,90.7C174.5,75,218,85,262,112C305.5,139,349,181,393,186.7C436.4,192,480,160,524,165.3C567.3,171,611,213,655,213.3C698.2,213,742,171,785,176C829.1,181,873,235,916,245.3C960,256,1004,224,1047,213.3C1090.9,203,1135,213,1178,213.3C1221.8,213,1265,203,1309,176C1352.7,149,1396,107,1418,85.3L1440,64L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z">
  </path>
</svg>
<!--Sejarah Danau Labuan Cermin-->
<div class="container-fluid py-5" id="sejarah">
  <div class="container">
    <h4 class="text-center mb-5">Sejarah<br>Danau Labuan Cermin</h4>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card">
          <img src="https://jadesta.kemenparekraf.go.id/imgpost/118844.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title mb-3"></h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium asperiores nam, nisi beatae
              praesentium sapiente officiis architecto minus neque numquam magnam error nobis dolor quasi, earum amet
              quos incidunt itaque doloribus recusandae voluptas. Modi ex eos vitae ullam distinctio sequi facilis,
              officiis quos cum, libero quas veritatis autem quis voluptatibus reprehenderit velit consequuntur.
              Optio, veritatis soluta! Repellat ad iure quos culpa cum qui, adipisci, voluptatem, repellendus labore
              facere fuga nisi!
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card">
          <img src="https://jadesta.kemenparekraf.go.id/imgpost/99191.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title mb-3"></h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At rerum repellendus doloremque quisquam
              reiciendis fugiat nisi ad quia voluptates quas maiores mollitia aspernatur similique non harum sint
              molestias eius neque rem, molestiae nemo facere recusandae. Consectetur doloremque repudiandae corporis
              id eligendi maiores iure totam qui ad blanditiis esse repellendus, reiciendis officiis molestiae autem!
              A inventore, consequuntur eligendi animi, nam maiores eum delectus temporibus laborum porro nemo
              molestiae distinctio sed. Sint?
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="card">
          <img src="https://jadesta.kemenparekraf.go.id/imgpost/99188.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title mb-3"></h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut laborum quisquam, aspernatur neque
              accusamus culpa repudiandae doloribus consequatur eligendi facilis tempora voluptatum labore vitae
              dolore optio esse quas veritatis provident, quae quam natus assumenda, dolorem officia eum. Quos dolore
              non harum quas adipisci nam reiciendis veniam ipsum, cum numquam at accusantium eligendi quia assumenda
              repudiandae eos natus, a voluptatem quaerat? Quibusdam esse fuga facilis laudantium dicta odit id
              voluptatum quis?
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Sejarah-->
</div>
</div>
<!--Harga Tiket-->
<section class="section-padding">
  <div class="container" id="hargatiket">
    <br>
    <h4>Harga Paket Wisata "Danau Labuan Cermin"</h4>
    <br>
    <p><b>Danau Labuan Cermin</b></p>
    <p class="menjorok">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum praesentium optio qui, aspernatur saepe
      tempore necessitatibus eligendi illum dolor nisi! Non, ad dignissimos excepturi mollitia, nesciunt adipisci ea
      esse laboriosam explicabo neque eius, dolore consectetur rerum beatae obcaecati et debitis!
    </p>
    <p class="menjorok">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus veniam laborum tenetur eveniet eligendi animi
      nostrum omnis, nihil distinctio, in ratione deserunt saepe deleniti eum assumenda sunt unde. A, reiciendis.
    </p>
    <!--Tabel1-->
    <table class="table table-primary table-striped">
      <thead>
        <tr>
          <th scope="col" colspan="2" class="table-active" style="text-align: center;">Daftar Harga Paket</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php while ($row = mysqli_fetch_assoc($servicesResult)) : ?>
          <tr>
            <td scope="row"><?= $row['name']; ?></td>
            <td>( <?= local_currency_format($row['price']); ?> )</td>
          </tr>
        <?php endwhile; ?>
      </tbody>
      <thead>
        <tr>
          <th scope="col" colspan="2" class="table-active" style="text-align: center;">Waktu Operasional</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php while ($row = mysqli_fetch_assoc($openHoursResult)) : ?>
          <tr>
            <td scope="row"><?= $row['day']; ?></td>
            <td><?= $row['time_start']; ?> - <?= $row['time_end']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>


    <div class="text-center">
      <a href="./reservasi.php" class="btn btn-primary">Klik di sini untuk reservasi</a>
    </div>

    <!--End Tabel1-->
    <p><b>Lorem ipsum dolor sit amet.</b></p>
    <p class="menjorok">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quos eius id nostrum molestiae tempora ipsam
      nemo saepe veniam. Aperiam provident exercitationem eaque qui hic iste adipisci voluptatibus quia fugiat?
      Quibusdam similique ab vel corrupti minima dicta explicabo consequuntur facilis.
    </p>
    <p class="menjorok">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio, earum vero. Commodi ipsa optio tempora
      mollitia, quas minus sapiente architecto, eius ullam error eaque? Dolor!
    </p>
    <p><b>Lorem ipsum, dolor sit amet consectetur adipisicing.</b></p>
    <p class="menjorok">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate eos exercitationem sapiente quis dolorum
      natus, tenetur labore error inventore dignissimos sed officiis tempora possimus recusandae modi, soluta
      cupiditate similique nulla?
    </p>
    <p><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum!</b></p>
    <p class="menjorok">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus consectetur molestias nesciunt excepturi
      voluptatibus fugiat quia repudiandae sed ab ut?
    </p>
  </div>
</section>
<!--End Harga Tiket-->
<!--Gallery-->
<div class="container" id="Gallery">
  <h4>Gallery <br>"Danau Labuan Cermin"</h4>
  <div class="container-fluid py-5">
    <section class="gallery min-vh-100">
      <div class="container-lg">
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
          <?php while ($row = mysqli_fetch_assoc($galleryResult)) : ?>
            <div class="col">
              <img src="<?= $row['url']; ?>" class="gallery-item" alt="gallery">
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" class="modal-img" alt="modal img">
      </div>
    </div>
  </div>
</div>
<!--End Modal-->
<!--End Gallery-->
<!--LOKASI-->
<section class="section-padding">
  <div class="container" id="lokasi">
    <br>
    <h4>Cara Menuju Lokasi</h4>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div>
          <center>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.86547732565!2d118.67907297714666!3d1.252219295476351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32734cb76f07da33%3A0x5e898623450bccae!2sLabuan%20Cermin!5e0!3m2!1sen!2sid!4v1720870316997!5m2!1sen!2sid" width="80%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </center>
        </div>
      </div>
    </div>
    <br>
  </div>
</section>
<!--End Lokasi--->

<?php include_once './layouts/frontend/footer.php'; ?>