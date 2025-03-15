<!doctype html>
<html lang="en">
<!-- [Head] start -->


<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/dashboard/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Aug 2024 18:58:44 GMT -->

<head>
    <title>Invoice | Light Able Admin & Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [Favicon] icon -->
    <link rel="icon" href="/assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/css/plugins/style.css" />
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="/assets/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="/assets/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="/assets/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="/assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/assets/css/style-preset.css" />

    <style>
        .full-width {
            width: 100%;
        }

        .align-right {
            text-align: right;
        }

    </style>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <!-- <img src="/assets/images/logo.png" alt="logo image" style="height: 60px; background: #000; border-radius: 255px; padding: 10px;"/> -->
                    <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">Development Mode</span>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">

                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                        <i class="ph-duotone ph-buildings"></i>
                    </li>
                    <li class="pc-item">
                        <a href="/dashboard" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-gauge"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    @if(Auth::user()->role == 'admin')
                        <li class="pc-item">
                            <a href="/users" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ph-duotone ph-user-plus"></i>
                                </span>
                                <span class="pc-mtext">Users & Roles</span>
                            </a>
                        </li>

                        <!-- New Menu Item "Template Surat" -->
                        <li class="pc-item">
                            <a href="/template-surat" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ph-duotone ph-files"></i>
                                </span>
                                <span class="pc-mtext">Template Surat</span>
                            </a>
                        </li>
                    @endif

                    <!-- New Menu Item "Template Surat" -->
                    <li class="pc-item">
                        <a href="/surat" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-file-plus"></i>
                            </span>
                            <span class="pc-mtext">Buat Surat</span>
                        </a>
                    </li>

                </ul>

                <div class="card nav-action-card bg-brand-color-4">
                    <div class="card-body" style="background-image: url('/assets/images/layout/nav-card-bg.svg')">
                        <h5 class="text-dark">Help Center</h5>
                        <p class="text-dark text-opacity-75">Please contact us for more questions.</p>
                        <a href="https://phoenixcoded.support-hub.io/" class="btn btn-primary" target="_blank">Go to
                            help Center</a>
                    </div>
                </div>
            </div>
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="/assets/images/user/avatar-1.jpg" alt="user-image"
                                class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="dropdown">
                                <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-bs-offset="0,20">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 me-2">
                                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                            <small>{{ Auth::user()->email }}</small>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="btn btn-icon btn-link-secondary avtar">
                                                <i class="ph-duotone ph-windows-logo"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper">
            <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ph-duotone ph-magnifying-glass"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="mb-0 d-flex align-items-center">
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Search..." />
                                    <button class="btn btn-light-secondary btn-search">Search</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="form-search">
                            <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search..." />

                            <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Profile</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 225px)">
                                    <ul class="list-group list-group-flush w-100">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/assets/images/user/avatar-2.jpg" alt="user-image"
                                                        class="wid-50 rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1 mx-3">
                                                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                                    <a class="link-primary"
                                                        href="mailto:carson.darrin@company.io">{{ Auth::user()->email }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/logout" class="dropdown-item">
                                                <span class="d-flex align-items-center">
                                                    <i class="ph-duotone ph-power"></i>
                                                    <span>Logout</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            @yield('header')
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">Made with &#9829; by Team <a href="https://themeforest.net/user/phoenixcoded"
                            target="_blank"> Phoenixcoded</a></p>
                </div>
                <div class="col-sm-6 ms-auto my-1">
                    <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                        <li class="list-inline-item"><a href="../index-2.html">Home</a></li>
                        <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/"
                                target="_blank">Documentation</a></li>
                        <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/"
                                target="_blank">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Required Js -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/js/plugins/popper.min.js"></script>
    <script src="/assets/js/plugins/simplebar.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/fonts/custom-font.js"></script>
    <script src="/assets/js/pcoded.js"></script>
    <script src="/assets/js/plugins/feather.min.js"></script>


    <script>
        layout_change('light');

    </script>

    <script>
        layout_sidebar_change('light');

    </script>

    <script>
        change_box_container('false');

    </script>

    <script>
        layout_caption_change('true');

    </script>

    <script>
        layout_rtl_change('false');

    </script>

    <script>
        preset_change('preset-1');

    </script>


    <!-- [Page Specific JS] start -->
    <script src="/assets/js/plugins/apexcharts.min.js"></script>
    <script src="/assets/js/pages/invoice-dashboard.js"></script>

    @yield('script')
    <!-- [Page Specific JS] end -->
    <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
        <div class="offcanvas-header justify-content-between">
            <h5 class="offcanvas-title">Settings</h5>
            <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="ti ti-x"></i></button>
        </div>
        <div class="pct-body customizer-body">
            <div class="offcanvas-body py-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="pc-dark">
                            <h6 class="mb-1">Theme Mode</h6>
                            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
                            <div class="row theme-color theme-layout">
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="true"
                                            onclick="layout_change('light');">
                                            <span class="btn-label">Light</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="false"
                                            onclick="layout_change('dark');">
                                            <span class="btn-label">Dark</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="default"
                                            onclick="layout_change_default();" data-bs-toggle="tooltip"
                                            title="Automatically sets the theme based on user's operating system's color scheme.">
                                            <span class="btn-label">Default</span>
                                            <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                                                <i class="ph-duotone ph-cpu"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Sidebar Theme</h6>
                        <p class="text-muted text-sm">Choose Sidebar Theme</p>
                        <div class="row theme-color theme-sidebar-color">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="true"
                                        onclick="layout_sidebar_change('dark');">
                                        <span class="btn-label">Dark</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="false"
                                        onclick="layout_sidebar_change('light');">
                                        <span class="btn-label">Light</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Accent color</h6>
                        <p class="text-muted text-sm">Choose your primary theme color</p>
                        <div class="theme-color preset-color">
                            <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
                            <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-1">Sidebar Caption</h6>
                        <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
                        <div class="row theme-color theme-nav-caption">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="true"
                                        onclick="layout_caption_change('true');">
                                        <span class="btn-label">Caption Show</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="false"
                                        onclick="layout_caption_change('false');">
                                        <span class="btn-label">Caption Hide</span>
                                        <span
                                            class="pc-lay-icon"><span></span><span></span><span><span></span><span></span></span><span></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pc-rtl">
                            <h6 class="mb-1">Theme Layout</h6>
                            <p class="text-muted text-sm">LTR/RTL</p>
                            <div class="row theme-color theme-direction">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="false"
                                            onclick="layout_rtl_change('false');">
                                            <span class="btn-label">LTR</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="true"
                                            onclick="layout_rtl_change('true');">
                                            <span class="btn-label">RTL</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item pc-box-width">
                        <div class="pc-container-width">
                            <h6 class="mb-1">Layout Width</h6>
                            <p class="text-muted text-sm">Choose Full or Container Layout</p>
                            <div class="row theme-color theme-container">
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn active" data-value="false"
                                            onclick="change_box_container('false')">
                                            <span class="btn-label">Full Width</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid">
                                        <button class="preset-btn btn" data-value="true"
                                            onclick="change_box_container('true')">
                                            <span class="btn-label">Fixed Width</span>
                                            <span
                                                class="pc-lay-icon"><span></span><span></span><span></span><span><span></span></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-grid">
                            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>
<!-- [Body] end -->

<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/dashboard/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Aug 2024 18:58:44 GMT -->

</html>
