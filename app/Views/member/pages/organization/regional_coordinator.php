<?= $this->extend('layouts/member/member') ?>

<?= $this->section('content-title') ?>
    Koordinator Wilayah
<?= $this->endSection() ?>

<?= $this->section('content-style') ?>
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
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.min.js" integrity="sha512-FDbnUqS6P7md6VfBoH57otIQB3rwZKvvs/kQ080nmpK876/q4rycGB0KZ/yzlNIDuNc+ybpu0HV3ePdUYfT5cA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.es5.min.js" integrity="sha512-ssPi1cTYTwYV0e6IRdIId4ytENOrTDvixXo8l0DaTBAwYw9yD6rk9HU06pWRCoSWSRKwrucdVS/2fMC1getgcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.umd.min.js" integrity="sha512-2pp0/kD6a6gBsvL19QqDQPzDAESHtRw5Z+QrcoKfp+DH66Lx88A3QTdT/9NmBfT7ctvka24NgzpYqC4TQLTNQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!---->
<!--    <script>-->
<!--        lightGallery(document.getElementById('anchor-tag'));-->
<!--    </script>-->
<?= $this->endSection() ?>