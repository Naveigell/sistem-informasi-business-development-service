<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-male"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Klien</h4>
                    </div>
                    <div class="card-body">
                        <?= $totalClients; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Konsultan</h4>
                    </div>
                    <div class="card-body">
                        <?= $totalConsultants; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-comments"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Forum Diskusi</h4>
                    </div>
                    <div class="card-body">
                        <?= number_format($totalForums, 0, ','); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Aktivitas Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <?= $totalActivities; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Berita</h4>
                    </div>
                    <div class="card-body">
                        <?= $totalNews; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-light">
                    <i style="font-size: 22px; color: #fff;" class="fa fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kategori Berita</h4>
                    </div>
                    <div class="card-body">
                        <?= $totalNewsCategories; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
