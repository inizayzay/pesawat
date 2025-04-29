<?php
$currentPath = basename($_SERVER['PHP_SELF']);

$navItems = [
    ['title' => 'Dashboard', 'href' => 'index.php', 'icon' => 'fas fa-fw fa-tachometer-alt'],
    ['title' => 'Airline', 'href' => 'maskapai.php', 'icon' => 'fas fa-fw fa-plane'],
    ['title' => 'Passenger', 'href' => 'penumpang.php', 'icon' => 'fas fa-fw fa-users'],
    ['title' => 'Terminal & Gate', 'href' => 'terminal_gate.php', 'icon' => 'fas fa-fw fa-door-open'],
    ['title' => 'Flight', 'href' => 'jadwal_penerbangan.php', 'icon' => 'fas fa-fw fa-calendar-alt'],
    ['title' => 'Ticket', 'href' => 'tiket.php', 'icon' => 'fas fa-fw fa-ticket-alt'],
];
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tiket Santuy<sup></sup></div>
    </a>
    <hr class="sidebar-divider my-0">

    <?php foreach ($navItems as $item): ?>
        <li class="nav-item <?php echo ($currentPath === $item['href']) ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo $item['href']; ?>">
                <i class="<?php echo $item['icon']; ?>"></i>
                <span><?php echo $item['title']; ?></span>
            </a>
        </li>
        <?php if ($item['title'] === 'Dashboard' || $item['title'] === 'Terminal & Gate'): ?>
            <hr class="sidebar-divider">
            <?php if ($item['title'] === 'Terminal & Gate'): ?>
                <div class="sidebar-heading">
                    Penerbangan
                </div>
            <?php elseif ($item['title'] === 'Dashboard'): ?>
                <div class="sidebar-heading">
                    Master Data
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
