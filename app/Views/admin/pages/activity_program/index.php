<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('content-title') ?>
    Program Kegiatan ABDSI
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Kegiatan ABDSI</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.activity-programs.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Kegiatan</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Content</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $programs */
                foreach ($programs as $program): ?>
                    <tr>
                        <td class="col-1"><?= $program['title']; ?></td>
                        <td><?= $program['content']; ?></td>
                        <td class="col-1">
                            <a href="<?= route_to('admin.activity-programs.edit', $program['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button data-target="#deleteModal" data-url="<?= route_to('admin.activity-programs.destroy', $program['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
