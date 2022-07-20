<!-- Navbar Start -->
<div class="container-fluid nav-bar p-0">
    <div class="container-lg p-0">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
            <a href="<?= route_to('home'); ?>" class="navbar-brand">
                <img src="<?= base_url('member/logo.png'); ?>" alt="">
<!--                <h1 class="m-0 text-white display-4"><span class="text-primary">D</span>ot<span class="text-primary">C</span>om</h1>-->
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="<?= route_to('home'); ?>" class="nav-item nav-link <?= last_segment() ?: 'active'; ?>">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?= all_in_segment(['organization']) ? 'active' : ''; ?>" data-toggle="dropdown">Organisasi</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <a href="<?= route_to('member.organization.history'); ?>" class="dropdown-item <?= all_in_segment(['organization', 'history']) ? 'active' : ''; ?>">Sejarah</a>
                            <a href="<?= route_to('member.organization.vision-mission'); ?>" class="dropdown-item <?= all_in_segment(['organization', 'vision-mission']) ? 'active' : ''; ?>">Visi & Misi</a>
                            <a href="<?= route_to('member.organization.national-boards'); ?>" class="dropdown-item <?= all_in_segment(['organization', 'national-boards']) ? 'active' : ''; ?>">Struktur Pengurus DPN</a>
                            <a href="<?= route_to('member.organization.regional-coordinators'); ?>" class="dropdown-item <?= all_in_segment(['organization', 'regional-coordinators']) ? 'active' : ''; ?>">Pengurus Korwil</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?= all_in_segment(['activity-programs']) ? 'active' : ''; ?>" data-toggle="dropdown">Aktivitas Kegiatan</a>

                        <?php
                            $activities = (new \App\Models\ActivityProgram())->findAll();
                        ?>

                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <?php foreach ($activities as $activity): ?>
                                <a href="<?= route_to('member.activity-programs.show', $activity['slug']); ?>" class="dropdown-item <?= all_in_segment(['activity-programs', $activity['slug']]) ? 'active' : ''; ?>"><?= $activity['title']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?= all_in_segment(['news-categories']) ? 'active' : ''; ?>" data-toggle="dropdown">Berita</a>

                        <?php
                            $categories = (new \App\Models\NewsCategory())->findAll();
                        ?>

                        <div class="dropdown-menu border-0 rounded-0 m-0">
                            <?php foreach ($categories as $category): ?>
                                <a href="<?= route_to('member.news-categories.index', $category['slug']); ?>" class="dropdown-item <?= all_in_segment(['news-categories', $category['slug']]) ? 'active' : ''; ?>"><?= $category['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if(session()->has('hasLoggedIn')): ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?= exists_in_segment(['chats', 'forums', 'profiles']) ? 'active' : ''; ?>" data-toggle="dropdown">Komunikasi</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="<?= route_to('member.chats.index'); ?>" class="dropdown-item <?= all_in_segment(['chats']) ? 'active' : ''; ?>">Chat</a>
                                <a href="<?= route_to('member.forums.index'); ?>" class="dropdown-item <?= all_in_segment(['forums']) ? 'active' : ''; ?>">Forum Diskusi</a>
                                <a href="<?= route_to('member.profiles.index'); ?>" class="dropdown-item <?= all_in_segment(['profiles']) ? 'active' : ''; ?>">Profil Member</a>
                            </div>
                        </div>
                        <a href="<?= route_to('logout'); ?>" class="nav-item nav-link">Logout</a>
                    <?php else: ?>
                        <a href="<?= route_to('member.auth.login.index'); ?>" class="nav-item nav-link <?= all_in_segment(['login']) ? 'active' : ''; ?>">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->