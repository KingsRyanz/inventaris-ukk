<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="InventoPro - Inventory Management System">
    <meta name="theme-color" content="#4f46e5">

    <title>InventoPro - Inventory Management Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin-dashboard.css') }}">
</head>

<body class="app-container">
    <!-- Page Loader -->
    <div class="loading-bar" role="progressbar" aria-hidden="true"></div>

    <!-- Mobile Controls -->
    <div class="mobile-controls">
        <button class="toggle-sidebar" aria-label="Toggle Sidebar">
            <i class="fas fa-bars" aria-hidden="true"></i>
        </button>

        <div class="theme-switch" id="themeSwitch" aria-label="Switch Theme">
            <i class="fas fa-moon" aria-hidden="true"></i>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar" aria-label="Main Navigation">
        <div class="sidebar-content">
            <!-- App Branding -->
            <header class="app-title-container">
                <div class="app-title">
                    <i class="fas fa-boxes" aria-hidden="true"></i>
                    <span>InventoPro</span>
                </div>
            </header>

            <!-- User Profile Section -->
            <div class="container mt-5">
        <!-- User Profile Section -->
        <div class="user-profile dropdown" id="profileDropdown">
            <div class="user-avatar" data-bs-toggle="dropdown" aria-expanded="false">
                RP
            </div>
            <div class="user-info">
                <p class="user-name mb-0">Ryan Perdana</p>
                <p class="user-role text-muted mb-0">Admin Manager</p>
            </div>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ri-logout-circle-line"></i> Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

            <!-- Main Navigation -->
            <ul class="nav flex-column main-nav">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard.index') }}">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <!-- Category Management -->
                <li class="nav-item">
                    <button class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#kategoriCollapse" aria-expanded="false" aria-controls="kategoriCollapse">
                        <i class="fas fa-tags" aria-hidden="true"></i>
                        <span>Kategori</span>
                        <i class="fas fa-chevron-down arrow-icon" aria-hidden="true"></i>
                    </button>

                    <div class="collapse submenu" id="kategoriCollapse">
                        <div class="container">
                            <a class="nav-link" href="{{ route('admin.master-barang.index') }}">
                                <i class="fas fa-box" aria-hidden="true"></i>
                                <span>Master Barang</span>
                            </a>
                            <a class="nav-link" href="{{ route('admin.kategori-asset.index') }}">
                                <i class="fas fa-layer-group" aria-hidden="true"></i>
                                <span>Kategori Aset</span>
                            </a>
                            <a class="nav-link" href="{{ route('admin.sub-kategori-asset.index') }}">
                                <i class="fas fa-stream" aria-hidden="true"></i>
                                <span>Sub Kategori Aset</span>
                            </a>
                            <a class="nav-link" href="{{ route('admin.satuan.index') }}">
                                <i class="fas fa-balance-scale" aria-hidden="true"></i>
                                <span>Satuan</span>
                            </a>
                        </div>
                    </div>
                </li>

                <div class="divider" role="separator"></div>

                <!-- Product Network -->
                <li class="nav-item">
                    <button class="nav-link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#jaringanCollapse" aria-expanded="false" aria-controls="jaringanCollapse">
                        <i class="fas fa-network-wired" aria-hidden="true"></i>
                        <span>Jaringan Produk</span>
                        <i class="fas fa-chevron-down arrow-icon" aria-hidden="true"></i>
                    </button>

                    <div class="collapse submenu" id="jaringanCollapse">
                        <div class="container">
                            <a class="nav-link" href="{{ route('admin.merk.index') }}">
                                <i class="fas fa-trademark" aria-hidden="true"></i>
                                <span>Merk</span>
                            </a>
                            <a class="nav-link" href="{{ route('admin.distributor.index') }}">
                                <i class="fas fa-truck" aria-hidden="true"></i>
                                <span>Distributor</span>
                            </a>
                        </div>
                    </div>
                </li>

                <div class="divider" role="separator"></div>

                <!-- Stand-alone Menu Items -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.depresiasi.index') }}">
                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                        <span>Depresiasi</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pengadaan.index') }}">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        <span>Pengadaan</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.lokasi.index') }}">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        <span>Lokasi</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.mutasi-lokasi.index') }}">
                        <i class="fas fa-random" aria-hidden="true"></i>
                        <span>Mutasi Lokasi</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.opname.index') }}">
                        <i class="fas fa-clipboard-check" aria-hidden="true"></i>
                        <span>Opname</span>
                    </a>
                </li>

                <div class="divider" role="separator"></div>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.hitung-depresiasi.index') }}">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        <span>Hitung Depresiasi</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer -->
        <footer class="sidebar-footer">
            <p class="copyright">© 2025 InventoPro. All rights reserved.</p>
        </footer>
    </nav>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <main class="main-content" role="main">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Utility function to handle localStorage
        const storage = {
            set: (key, value) => localStorage.setItem(key, value),
            get: (key) => localStorage.getItem(key),
            remove: (key) => localStorage.removeItem(key)
        };

        // Theme management
        const themeManager = {
            toggle() {
                const body = document.body;
                body.classList.toggle('dark-theme');
                storage.set('theme', body.classList.contains('dark-theme') ? 'dark' : 'light');
            },

            init() {
                const savedTheme = storage.get('theme');
                if (savedTheme === 'dark') {
                    document.body.classList.add('dark-theme');
                }
                document.querySelector('#themeSwitch').addEventListener('click', this.toggle);
            }
        };

        // Sidebar management
        const sidebarManager = {
            toggle() {
                document.querySelector('.sidebar').classList.toggle('show');
            },

            init() {
                const toggleBtn = document.querySelector('.toggle-sidebar');
                toggleBtn.addEventListener('click', this.toggle);

                // Close sidebar on outside click (mobile)
                document.addEventListener('click', (event) => {
                    if (window.innerWidth <= 768) {
                        const sidebar = document.querySelector('.sidebar');
                        const toggleBtn = document.querySelector('.toggle-sidebar');

                        if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                            sidebar.classList.remove('show');
                        }
                    }
                });
            }
        };

        // Loading bar management
        const loadingManager = {
            bar: document.querySelector('.loading-bar'),

            show() {
                this.bar.style.display = 'block';
            },

            hide() {
                this.bar.style.display = 'none';
            },

            init() {
                this.hide();
                document.addEventListener('click', (e) => {
                    if (e.target.tagName === 'A' && e.target.href) {
                        this.show();
                    }
                });
                window.addEventListener('load', () => this.hide());
            }
        };

        // Search functionality
        const searchManager = {
            init() {
                const searchInput = document.querySelector('.search-input');
                searchInput.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    document.querySelectorAll('.nav-item').forEach((item) => {
                        const text = item.textContent.toLowerCase();
                        item.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        };

        // Initialize all components
        document.addEventListener('DOMContentLoaded', () => {
            themeManager.init();
            sidebarManager.init();
            loadingManager.init();
            searchManager.init();
        });

        // Add event listener to user profile for logout
        document.getElementById('userProfile').addEventListener('click', () => {
            const confirmed = confirm("Apakah Anda yakin ingin log out?");
            if (confirmed) {
                document.querySelector('form[method="POST"]').submit();
            }
        });
    </script>
</body>