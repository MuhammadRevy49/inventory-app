<?php
$uri = service('uri');
$segment = $uri->getSegment(1);
?>
<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 shadow-sm transition-all duration-300 ease-in-out md:translate-x-0 -translate-x-full flex flex-col">
    
    <button id="toggle-sidebar" class="absolute -right-3 top-5 w-6 h-6 bg-white border border-slate-200 rounded-full md:flex items-center justify-center text-slate-500 hover:text-indigo-600 shadow-sm z-50 hidden transition-transform duration-300">
        <svg id="toggle-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <div class="h-16 flex items-center px-6 border-b border-slate-100 shrink-0 overflow-hidden whitespace-nowrap">
        <div class="flex items-center space-x-3 min-w-max">
            <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold shadow-md shadow-indigo-100 shrink-0">
                IA
            </div>
            <span class="sidebar-text text-lg font-bold text-slate-800 tracking-tight transition-opacity duration-300">Inventory App</span>
        </div>
    </div>

    <div class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto overflow-x-hidden whitespace-nowrap">
        <p class="sidebar-text px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 transition-opacity duration-300">Menu Utama</p>
        
        <a href="<?= base_url('/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all group <?= $segment == 'dashboard' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' ?>">
            <svg class="w-5 h-5 shrink-0 <?= $segment == 'dashboard' ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="sidebar-text transition-opacity duration-300">Dashboard</span>
        </a>

        <a href="<?= base_url('/products') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all group <?= $segment == 'products' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' ?>">
            <svg class="w-5 h-5 shrink-0 <?= $segment == 'products' ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            <span class="sidebar-text transition-opacity duration-300">Produk</span>
        </a>
    </div>

    <div class="p-4 border-t border-slate-100 shrink-0 overflow-hidden whitespace-nowrap">
        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl min-w-max">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-700 text-xs shrink-0">
                    <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                </div>
                <div class="sidebar-text transition-opacity duration-300">
                    <p class="text-xs font-semibold text-slate-800"><?= session()->get('name') ?></p>
                    <p class="text-[10px] text-slate-500 truncate w-24"><?= session()->get('email') ?></p>
                </div>
            </div>
            <a href="<?= base_url('/logout') ?>" class="sidebar-text p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </a>
        </div>
    </div>
</aside>