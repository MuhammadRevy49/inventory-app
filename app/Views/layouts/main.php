<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Inventory App' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
    <style>
        /* Style tambahan untuk collapsed state */
        .sidebar-collapsed { width: 5rem !important; }
        .sidebar-collapsed .sidebar-text { opacity: 0; pointer-events: none; }
        .sidebar-collapsed #toggle-icon { transform: rotate(180deg); }
        .main-expanded { margin-left: 5rem !important; }
        .header-expanded { margin-left: 5rem !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">

    <!-- Sidebar -->
    <?= view('layouts/sidebar') ?>

    <!-- Navbar Atas -->
    <?= view('layouts/navbar') ?>

    <!-- Konten Utama -->
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

        // Toggle Sidebar Desktop (Collapse)
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('sidebar-collapsed');
                mainContent.classList.toggle('main-expanded');
                if (header) header.classList.toggle('header-expanded');
                
                // Opsional: Simpan state ke localStorage
                localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('sidebar-collapsed'));
            });
        }

        // Mobile Toggle (Slide-in)
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }

        // Cek state dari localStorage saat reload
        if (localStorage.getItem('sidebar-collapsed') === 'true') {
            sidebar.classList.add('sidebar-collapsed');
            mainContent.classList.add('main-expanded');
            if (header) header.classList.add('header-expanded');
        }
    </script>
</body>
</html>