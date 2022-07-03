<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('content-title') ?>
    Berita
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
        <?php /** @var array $news */ ?>
        <form action="<?= @$news ? route_to('admin.news.update', $news['id']) : route_to('admin.news.store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <?php if (@$news): ?>
                <input type="hidden" name="_method" value="put">
            <?php endif; ?>
            <div class="card-header">
                <h4>Form Berita</h4>
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
                    <label>Judul</label>
                    <input name="title" type="text" class="form-control" value="<?= @$news ? $news['title'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" id="editor" cols="30" rows="10"><?= @$news ? $news['description'] : ''; ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content-script') ?>
    <script src="<?= base_url('/vendor/ckeditor5/build/ckeditor.js'); ?>"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                height: 400,
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                // heading: {
                //     options: [
                //         { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                //         { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                //         { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                //     ]
                // }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
<?= $this->endSection() ?>