<?= $this->extend('layouts/admin/admin') ?>

<?= $this->section('page-title') ?>
    Pengurus Nasional
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    Pengurus Nasional
<?= $this->endSection() ?>

<?= $this->section('content-title') ?>
    <style>
        .ck-editor__editable {
            min-height: 800px;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
    <div class="card">
        <?php /** @var array $nationalBoard */ ?>
        <form action="<?= @$nationalBoard ? route_to('admin.national-boards.update', $nationalBoard['id']) : route_to('admin.national-boards.store'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <?php if (@$nationalBoard): ?>
                <input type="hidden" name="_method" value="put">
            <?php endif; ?>
            <div class="card-header">
                <h4>Form Pengurus Nasional</h4>
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
                    <label>Content</label>
                    <textarea name="content" class="form-control" id="editor" cols="30" rows="10"><?= @$nationalBoard ? $nationalBoard['content'] : ''; ?></textarea>
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
                height: 800,
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