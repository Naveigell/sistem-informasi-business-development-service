<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
Kategori Berita
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Kategori Berita
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Kategori Berita</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.news-categories.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Kategori</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $newsCategories */
                foreach ($newsCategories as $category): ?>
                    <tr>
                        <td><?= $category['name']; ?></td>
                        <td>
                            <a href="<?= route_to('admin.news-categories.edit', $category['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button data-target="#deleteModal" data-url="<?= route_to('admin.news-categories.destroy', $category['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
