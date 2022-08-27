<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
    Konsultan
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Konsultan
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="card">
        <?php /** @var array $consultant */ ?>
        <form action="<?= @$consultant ? route_to('admin.consultants.update', $consultant['id']) : route_to('admin.consultants.store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <?php if (@$consultant): ?>
                <input type="hidden" name="_method" value="put">
            <?php endif; ?>
            <div class="card-header">
                <h4>Form Konsultan</h4>
            </div>
            <div class="card-body">
                <?php if ($errors = session()->getFlashdata('errors')): ?>
                    <div class="alert-danger alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label>Avatar</label>
                    <input name="avatar" type="file" accept="image/png,image/jpeg,image/jpg" class="form-control" value="<?= @$client ? $client['avatar'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="name" type="text" class="form-control" value="<?= @$consultant ? $consultant['name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" value="<?= @$consultant ? $consultant['username'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" value="<?= @$consultant ? $consultant['email'] : ''; ?>">
                </div>
                <?php if (!@$consultant): ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" value="<?= @$consultant ? $consultant['password'] : ''; ?>">
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label>No Telp</label>
                    <input name="phone" type="text" class="form-control" value="<?= @$consultant ? $consultant['phone'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="address" type="text" class="form-control" value="<?= @$consultant ? $consultant['address'] : ''; ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>