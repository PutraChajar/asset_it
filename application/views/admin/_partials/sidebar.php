<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/Pegawai') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/Komputer') ?>">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Komputer</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/Mouse') ?>">
            <i class="fas fa-fw fa-mouse-pointer"></i>
            <span>Mouse</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/Keyboard') ?>">
            <i class="fas fa-fw fa-keyboard"></i>
            <span>Keyboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/Printer') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Printer</span></a>
    </li>
</ul>
