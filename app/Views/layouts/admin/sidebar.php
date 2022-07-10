<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li><a class="nav-link" href="<?= route_to('admin.dashboard.index'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Users</li>
            <li><a class="nav-link" href="<?= route_to('admin.consultants.index'); ?>"><i class="fa fa-users"></i> <span>Konsultan</span></a></li>
            <li><a class="nav-link" href="<?= route_to('admin.clients.index'); ?>"><i class="fa fa-male"></i> <span>Klien</span></a></li>
            <li class="menu-header">Programs</li>
            <li><a class="nav-link" href="<?= route_to('admin.activity-programs.index'); ?>"><i class="fa fa-calendar"></i> <span>Aktivitas Kegiatan</span></a></li>
            <li class="menu-header">Information</li>
            <li><a class="nav-link" href="<?= route_to('admin.news.index'); ?>"><i class="fa fa-newspaper"></i> <span>Berita</span></a></li>
            <li class="menu-header">Organization</li>
            <li><a class="nav-link" href="<?= route_to('admin.histories.edit', 1); ?>"><i class="fa fa-ankh"></i> <span>Sejarah</span></a></li>
            <li><a class="nav-link" href="<?= route_to('admin.vision-missions.edit', 1); ?>"><i class="fa fa-flag"></i> <span>Visi & Misi</span></a></li>
            <li><a class="nav-link" href="<?= route_to('admin.national-boards.edit', 1); ?>"><i class="fa fa-globe"></i> <span>Perwakilan Nasional</span></a></li>
            <li><a class="nav-link" href="<?= route_to('admin.regional-coordinators.index', 1); ?>"><i class="fa fa-bullseye"></i> <span>Koordinator Wilayah</span></a></li>
        </ul>
    </aside>
</div>