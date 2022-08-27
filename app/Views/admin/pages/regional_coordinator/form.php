<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
    Koordinator Wilayah
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Koordinator Wilayah
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="card">
        <?php /** @var array $coordinator */ ?>
        <form action="<?= @$coordinator ? route_to('admin.regional-coordinators.update', $coordinator['id']) : route_to('admin.regional-coordinators.store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <?php if (@$coordinator): ?>
                <input type="hidden" name="_method" value="put">
            <?php endif; ?>
            <div class="card-header">
                <h4>Form Koordinator Wilayah</h4>
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
                    <label>Thumbnail</label>
                    <input name="thumbnail" type="file" accept="image/png,image/jpeg,image/jpg" class="form-control">
                </div>
                <div class="form-group">
                    <label>Wilayah</label>
                    <input name="region" type="text" class="form-control" value="<?= @$coordinator ? $coordinator['region'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Ketua</label>
                    <input name="leader" type="text" class="form-control" value="<?= @$coordinator ? $coordinator['leader'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="address" type="text" class="form-control" value="<?= @$coordinator ? $coordinator['address'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Nomor Telp</label>
                    <input name="phone" type="text" class="form-control" value="<?= @$coordinator ? $coordinator['phone'] : ''; ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>