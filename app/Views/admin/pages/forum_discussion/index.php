<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
Forum Diskusi
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
Forum Diskusi
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Forum Diskusi</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.forums.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Forum</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Nama Forum</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $forums */
                foreach ($forums as $forum): ?>
                    <tr>
                        <td class="col-1">
                            <img alt="image" src="<?= $forum['thumbnail'] ? base_url('/uploads/images/forums/' . $forum['thumbnail']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" width="100" height="100">
                        </td>
                        <td><?= $forum['forum_name']; ?></td>
                        <td>
                            <a href="<?= route_to('admin.forums.edit', $forum['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button data-target="#deleteModal" data-url="<?= route_to('admin.forums.destroy', $forum['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
