<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('content-title') ?>
    Klien
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="card">
        <?php /** @var array $client */ ?>
        <form action="<?= @$client ? route_to('admin.clients.update', $client['id']) : route_to('admin.clients.store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <?php if (@$client): ?>
                <input type="hidden" name="_method" value="put">
            <?php endif; ?>
            <div class="card-header">
                <h4>Form Klien</h4>
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
                    <input name="name" type="text" class="form-control" value="<?= @$client ? $client['name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" value="<?= @$client ? $client['username'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" value="<?= @$client ? $client['email'] : ''; ?>">
                </div>
                <?php if (!@$client): ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" value="<?= @$client ? $client['password'] : ''; ?>">
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label>No Telp</label>
                    <input name="phone" type="text" class="form-control" value="<?= @$client ? $client['phone'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="address" type="text" class="form-control" value="<?= @$client ? $client['address'] : ''; ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>