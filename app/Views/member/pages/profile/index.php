<?= $this->extend('layouts/member/member') ?>

<?= $this->section('content-banner') ?>

<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Profil Pengguna</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Beranda</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Profil Pengguna</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>

<div class="container py-5">
    <h3>Klien</h3>
    <div class="row mb-3">
        <?php /** @var array $clients */
        foreach ($clients as $client): ?>
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card m-b-30">
                    <div class="card-body row">
                        <div class="col-6">
                            <a href=""><img width="92px" height="92px" src="<?= $client['avatar'] ? base_url('/uploads/images/users/' . $client['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" alt="" class="rounded-circle"></a>
                        </div>
                        <div class="col-6 card-title align-self-center mb-0">
                            <h5><?= $client['name']; ?></h5>
                            <p class="m-0"><?= ucwords($client['role']); ?></p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    </ul>
                    <div class="card-body">
                        <div class="float-right btn-group btn-group-sm">
                            <a target="_blank" href="<?= route_to('member.chats.edit', $client['id']); ?>" class="btn btn-primary tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Chat"><i class="fa fa-comment"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h3>Konsultan</h3>
    <div class="row">
        <?php /** @var array $consultants */
        foreach ($consultants as $consultant): ?>
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card m-b-30">
                    <div class="card-body row">
                        <div class="col-6">
                            <a href=""><img width="92px" height="92px" src="<?= $consultant['avatar'] ? base_url('/uploads/images/users/' . $consultant['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" alt="" class="rounded-circle"></a>
                        </div>
                        <div class="col-6 card-title align-self-center mb-0">
                            <h5><?= $consultant['name']; ?></h5>
                            <p class="m-0"><?= ucwords($consultant['role']); ?></p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    </ul>
                    <div class="card-body">
                        <div class="float-right btn-group btn-group-sm">
                            <a target="_blank" href="<?= route_to('member.chats.edit', $consultant['id']); ?>" class="btn btn-primary tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Chat"><i class="fa fa-comment"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>