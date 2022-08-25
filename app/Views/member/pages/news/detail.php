<?= $this->extend('layouts/member/member') ?>

<?= $this->section('page-title') ?>
    <?= /** @var array $news */ $news['title']; ?>
<?= $this->endSection() ?>

<?= $this->section('content-banner') ?>

    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Berita</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Beranda</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Berita</p>
            <p class="m-0 px-2">/</p>
            <p class="m-0"><?= /** @var array $category */ $category['name']; ?></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0"><?= $news['title']; ?></p>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="container py-5">
        <div class="row">
            <!-- Blog Detail Start -->
            <div class="col-lg-8">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="<?= base_url('/uploads/images/news/' . $news['thumbnail']); ?>" alt="">
                </div>
                <div class="pt-4 pb-2">
                    <div class="d-flex mb-3">

                    </div>
                    <h2 class="font-weight-bold"><?= $news['title']; ?></h2>
                </div>

                <div class="mb-5">
                    <?= $news['description']; ?>
                </div>
            </div>
            <!-- Blog Detail End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4 mt-5 mt-lg-0">

                <!-- Category Start -->
                <div class="mb-5">
                    <h3 class="font-weight-bold mb-4">Categories</h3>
                    <ul class="list-group">

                        <?php
                        $categories = (new \App\Models\NewsCategory())->findAll();
                        ?>

                        <?php foreach ($categories as $cat): ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a class="font-weight-semi-bold text-decoration-none" href="<?= route_to('member.news-categories.index', $cat['slug']); ?>"><i class="fa fa-angle-right mr-2"></i><?= $cat['name']; ?></a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- Category End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
<?= $this->endSection() ?>