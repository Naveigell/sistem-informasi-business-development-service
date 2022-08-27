<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
    Konsultan
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Konsultan
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Konsultan</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.consultants.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Konsultan</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php /** @var array $consultants */
                    foreach ($consultants as $consultant): ?>
                        <tr>
                            <td><img alt="image" src="<?= $consultant['avatar'] ? base_url('/uploads/images/users/' . $consultant['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" width="100" height="100"></td>
                            <td><?= $consultant['name']; ?></td>
                            <td><?= $consultant['username']; ?></td>
                            <td><?= $consultant['email']; ?></td>
                            <td><?= $consultant['phone']; ?></td>
                            <td><?= $consultant['address']; ?></td>
                            <td>
                                <a href="<?= route_to('admin.consultants.edit', $consultant['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                <button data-target="#deleteModal" data-url="<?= route_to('admin.consultants.destroy', $consultant['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
