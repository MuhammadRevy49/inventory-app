<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Inventory App' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen">

    <!-- Sidebar -->
    <?= view('layouts/sidebar') ?>

    <!-- Navbar Atas -->
    <?= view('layouts/navbar') ?>

    <!-- Konten Utama -->
    <main class="md:ml-64 min-h-screen transition-all duration-300">
        <div class="p-6 md:p-8">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Script Toggle Mobile -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');

        if (menuBtn && sidebar) {
            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    </script>
</body>
</html>