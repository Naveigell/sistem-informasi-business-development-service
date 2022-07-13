<?= $this->extend('layouts/member/member') ?>

<?= $this->section('content-banner') ?>

    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5"><?= /** @var array $activity */ $activity['title']; ?></h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Beranda</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Aktifitas Program</p>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="container py-5">
        <div class="row">
            <!-- Blog Detail Start -->
            <div class="col-lg-12">

                <div class="mb-5">
                    <?= $activity['content']; ?>
                </div>
            </div>
            <!-- Blog Detail End -->
        </div>
    </div>
<?= $this->endSection() ?>