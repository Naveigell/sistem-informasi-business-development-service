<?= $this->extend('layouts/member/member') ?>

<?= $this->section('page-title') ?>
    Koordinator Wilayah
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Koordinator Wilayah
<?= $this->endSection() ?>

<?= $this->section('content-style') ?>
    <style>
        .owl-carousel .item {
            cursor: grab;
        }

        .owl-carousel .item span {
            opacity: 0.3;
        }

        .owl-carousel .item:hover span {
            opacity: 1;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content-banner') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery-bundle.min.css" integrity="sha512-lgRFGedXdci5Ykc5Wbgd8QCzt3lBmnkWcMRAS8myln2eMCDwQBrHmjqvUj9rBcKOyWMC+EYJnvEppggw1v+m8Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Koordinator Wilayah</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Beranda</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Koordinator Wilayah</p>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>

    <div class="container-fluid py-5">
        <div class="container">

            <div class="owl-carousel owl-theme mb-5">
                <?php
                /** @var array $coordinators */
                foreach ($coordinators as $coordinator): ?>
                    <div style="background: red; height: 206px" class="item position-relative">
                        <img src="<?= $coordinator['thumbnail'] ? base_url('/uploads/images/regional-coordinator/' . $coordinator['thumbnail']) : 'https://pertaniansehat.com/v01/wp-content/uploads/2015/08/default-placeholder.png'; ?>"
                             alt=""
                             width="100%" height="100%">
                        <span class="position-absolute bg-dark p-2 text-white" style="bottom: 5px; left: 5px;"><?= $coordinator['region']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2>Koordinator Wilayah</h2>
            <div>
                <?php /** @var array $coordinators */
                foreach ($coordinators as $coordinator): ?>
                    <div class="mt-4">
                        <b><?= $coordinator['region']; ?></b> <br>
                        <span>Ketua : <?= $coordinator['leader'] ?: '-'; ?></span> <br>
                        <?php if ($coordinator['address']): ?>
                            <span>Alamat : <?= $coordinator['address'] ?: '-'; ?></span> <br>
                        <?php endif; ?>
                        <?php if ($coordinator['phone']): ?>
                            <span>Kontak : <?= $coordinator['phone'] ?: '-'; ?></span> <br>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content-script') ?>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
<?= $this->endSection() ?>