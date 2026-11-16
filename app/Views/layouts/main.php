<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Inventory App' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
    <style>
        .sidebar-collapsed { width: 80px !important; }
        .sidebar-collapsed .sidebar-text { opacity: 0; pointer-events: none; width: 0; }
        .sidebar-collapsed #toggle-icon { transform: rotate(180deg); }
        
        .main-expanded { margin-left: 80px !important; }
        .header-expanded { margin-left: 80px !important; }
        
        .transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 300ms; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">

    <?= view('layouts/sidebar') ?>

    <?= view('layouts/navbar') ?>

    <main id="main-content" class="md:ml-64 min-h-screen transition-all duration-300">
        <div class="p-6 md:p-8">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const header = document.querySelector('header');
        const toggleBtn = document.getElementById('toggle-sidebar');
        const mobileMenuBtn = document.getElementById('menu-btn');

        function updateSidebarState(isCollapsed) {
            if (isCollapsed) {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-expanded');
                if (header) header.classList.add('header-expanded');
            } else {
                sidebar.classList.remove('sidebar-collapsed');
                mainContent.classList.remove('main-expanded');
                if (header) header.classList.remove('header-expanded');
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                const isCollapsed = !sidebar.classList.contains('sidebar-collapsed');
                updateSidebarState(isCollapsed);
                localStorage.setItem('sidebar-collapsed', isCollapsed);
            });
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }

        const savedState = localStorage.getItem('sidebar-collapsed') === 'true';
        if (savedState && window.innerWidth >= 768) {
            updateSidebarState(true);
        }
    </script>
</body>
</html>