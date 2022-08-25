<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $this->renderSection('page-title') ?> | ABDSI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->

    <?= $this->include('layouts/member/style'); ?>
    <?= $this->renderSection('content-style') ?>
</head>

<body>
<?= $this->include('layouts/member/header'); ?>

<?= $this->renderSection('content-banner') ?>

<?= $this->renderSection('content-body') ?>

<?= $this->include('layouts/member/footer'); ?>
<?= $this->include('layouts/member/script'); ?>
<?= $this->renderSection('content-script') ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-up"></i></a>



</body>

</html>