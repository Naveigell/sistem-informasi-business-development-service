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
            <li class="menu-header">Pemesanan</li>
            <li><a class="nav-link" href="<?= route_to('admin.bookings.index'); ?>"><i class="fa fa-link"></i> <span>Booking</span></a></li>
        </ul>
    </aside>
</div>