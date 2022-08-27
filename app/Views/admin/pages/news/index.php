<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
Berita
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
Berita
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<div class="card">
    <div class="card-header">
        <h4 class="d-inline">Berita</h4>
        <div class="card-header-action">
            <a href="<?= route_to('admin.news.create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Berita</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table data-table" id="table-2">
                <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Isi Berita</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $news */
                foreach ($news as $data): ?>

                    <?php
                        $category = (new \App\Models\NewsCategory())->where('id', $data['category_id'])->first();
                    ?>

                    <tr>
                        <td class="col-2">
                            <img alt="image" src="<?= base_url('/uploads/images/news/' . $data['thumbnail']); ?>" width="250" height="250">
                        </td>
                        <td><?= $category['name']; ?></td>
                        <td class="col-1"><?= $data['title']; ?></td>
                        <td class="col-8"><?= $data['description']; ?></td>
                        <td class="col-2">
                            <a href="<?= route_to('admin.news.edit', $data['id']); ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button data-target="#deleteModal" data-url="<?= route_to('admin.news.destroy', $data['id']); ?>" data-toggle="modal" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
