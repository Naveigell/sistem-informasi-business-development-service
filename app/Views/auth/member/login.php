<?= $this->extend('layouts/member/member') ?>

<?= $this->section('content-banner') ?>

    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Login</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Beranda</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Login</p>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="container py-5">
        <div class="row">
            <form class="col-12" action="<?= route_to('member.auth.login.store'); ?>" method="post">
                <?php if ($errors = session()->getFlashdata('errors')): ?>
                    <div class="alert-danger alert text-left">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?= csrf_field(); ?>
                <h3>Login</h3>
                <div class="control-group">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" data-validation-required-message="Please enter your name" aria-invalid="false">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password" data-validation-required-message="Please enter your email">
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <button class="btn btn-primary py-2 px-4" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>