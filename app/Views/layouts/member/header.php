<!-- Navbar Start -->
<div class="container-fluid nav-bar p-0">
    <div class="container-lg p-0">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-white display-4"><span class="text-primary">D</span>ot<span class="text-primary">C</span>om</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="<?= route_to('home'); ?>" class="nav-item nav-link active">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Organisasi</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="<?= route_to('member.organization.history'); ?>" class="dropdown-item">Sejarah</a>
                            <a href="<?= route_to('member.organization.vision-mission'); ?>" class="dropdown-item">Visi & Misi</a>
                            <a href="<?= route_to('member.organization.national-boards'); ?>" class="dropdown-item">Struktur Pengurus DPN</a>
                            <a href="<?= route_to('member.organization.regional-coordinators'); ?>" class="dropdown-item">Pengurus Korwil</a>
                        </div>
                    </div>
                    <a href="<?= route_to('member.activity-programs'); ?>" class="nav-item nav-link">Aktivitas Kegiatan</a>
                    <a href="service.html" class="nav-item nav-link">Berita</a>
                    <a href="<?= route_to('member.contact-us'); ?>" class="nav-item nav-link">Kontak Kami</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->