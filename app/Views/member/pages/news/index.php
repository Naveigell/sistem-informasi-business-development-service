<?= $this->extend('layouts/member/member') ?>

<?= $this->section('page-title') ?>
Berita <?= /** @var array $category */ $category['name']; ?>
<?= $this->endSection() ?>

<?= $this->section('content-banner') ?>

    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Berita</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Beranda</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Berita</p>
            <p class="m-0 px-2">/</p>
            <p class="m-0"><?= $category['name']; ?></p>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>

    <div class="container py-5">
        <div class="row">
            <!-- Blog Grid Start -->
            <div class="col-lg-8">
                <div class="row">
                    <?php /** @var array $news */
                    foreach ($news as $data): ?>
                        <div class="col-md-12 mb-3">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?= base_url('/uploads/images/news/' . $data['thumbnail']); ?>" alt="">
                            </div>
                            <div class="border border-top-0 mb-3" style="padding: 30px;">
                                <div class="d-flex mb-3">
                                </div>
                                <a class="h4 font-weight-bold" href="<?= route_to('member.news.show', $category['slug'], $data['slug']); ?>"><?= $data['title']; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Blog Grid End -->

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
                <!-- Plain Text End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>

<?= $this->endSection() ?>