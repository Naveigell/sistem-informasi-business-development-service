<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('content-title') ?>
Klien
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Klien</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.clients.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Klien</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $clients */
                foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $client['name']; ?></td>
                        <td><?= $client['username']; ?></td>
                        <td><?= $client['email']; ?></td>
                        <td><?= $client['phone']; ?></td>
                        <td><?= $client['address']; ?></td>
                        <td>
                            <a href="<?= route_to('admin.clients.edit', $client['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button data-target="#deleteModal" data-url="<?= route_to('admin.clients.destroy', $client['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
