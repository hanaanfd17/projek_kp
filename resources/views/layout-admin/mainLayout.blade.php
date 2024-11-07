<!DOCTYPE html>
<html lang="zxx">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/remixicon.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/flaticon.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/sidebar-menu.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/simplebar.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/apexcharts.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/prism.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/rangeslider.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/sweetalert.min.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/quill.snow.css">
<link rel="stylesheet" href="{{asset ('')}}admin/assets/css/style.css">

<link rel="icon" type="image/png" href="{{asset ('')}}images/logopgcandibaru.png">

<title>admin</title>
</head>
<body>
    <div class="preloader" id="preloader">
        <div class="preloader">
        <div class="waviy position-relative">
        <span class="d-inline-block">P</span>
        <span class="d-inline-block">G</span>
        <span class="d-inline-block">.</span>
        <span class="d-inline-block">C</span>
        <span class="d-inline-block">A</span>
        <span class="d-inline-block">N</span>
        <span class="d-inline-block">D</span>
        <span class="d-inline-block">I</span>
        <span class="d-inline-block">B</span>
        <span class="d-inline-block">A</span>
        <span class="d-inline-block">R</span>
        <span class="d-inline-block">U</span>
        </div>
        </div>
        </div>
        
        
    @include('layout-admin.sidebar')
    @include('layout-admin.header')


    
</div>
</div>


    <footer class="footer-area bg-white text-center rounded-top-10">
        <p class="fs-14">© <span class="text-primary">IT</span> anak magang <a href="https://hibootstrap.com/" target="_blank" class="text-decoration-none">PG.CANDI BARU</a></p>
        </footer>
        
        </div>
        </div>
        
        
        <button class="btn btn-danger theme-settings-btn p-0 position-fixed z-2 text-center" style="bottom: 30px; right: 30px; width: 40px; height: 40px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <i data-feather="settings" class="wh-20 text-white position-relative" style="top: -1px; outline: none;" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Click On Theme Settings"></i>
        </button>
        <div class="offcanvas offcanvas-end bg-white" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div class="offcanvas-header bg-body-bg py-3 px-4 mb-4">
        <h5 class="offcanvas-title fs-18" id="offcanvasScrollingLabel">Theme Settings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4">
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">RTL / LTR</h4>
        <div class="settings-btn rtl-btn">
        <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
        </label>
        </div>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Light / Dark</h4>
        <button class="switch-toggle settings-btn dark-btn" id="switch-toggle">
        Click To <span class="dark">Dark</span> <span class="light">Light</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Sidebar Light / Dark</h4>
        <button class="sidebar-light-dark settings-btn sidebar-dark-btn" id="sidebar-light-dark">
        Click To <span class="dark1">Dark</span> <span class="light1">Light</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Header Light / Dark</h4>
        <button class="header-light-dark settings-btn header-dark-btn" id="header-light-dark">
        Click To <span class="dark2">Dark</span> <span class="light2">Light</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Only Footer Light / Dark</h4>
        <button class="footer-light-dark settings-btn footer-dark-btn" id="footer-light-dark">
        Click To <span class="dark3">Dark</span> <span class="light3">Light</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Card Style Radius / Square</h4>
        <button class="card-radius-square settings-btn card-style-btn" id="card-radius-square">
        Click To <span class="square">Square</span> <span class="radius">Radius</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Card Style BG White / Gray</h4>
        <button class="card-bg settings-btn card-bg-style-btn" id="card-bg">
        Click To <span class="white">White</span> <span class="gray">Gray</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">Container Style Fluid / Boxed</h4>
        <button class="boxed-style settings-btn fluid-boxed-btn" id="boxed-style">
        Click To <span class="fluid">Fluid</span> <span class="boxed">Boxed</span>
        </button>
        </div>
        </div>
        
        
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/sidebar-menu.js"></script>
        <script src="{{asset ('')}}admin/assets/js/dragdrop.js"></script>
        <script src="{{asset ('')}}admin/assets/js/rangeslider.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/sweetalert.js"></script>
        <script src="{{asset ('')}}admin/assets/js/quill.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/data-table.js"></script>
        <script src="{{asset ('')}}admin/assets/js/prism.js"></script>
        <script src="{{asset ('')}}admin/assets/js/clipboard.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/feather.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/simplebar.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/apexcharts.min.js"></script>
        <script src="{{asset ('')}}admin/assets/js/amcharts.js"></script>
        <script src="{{asset ('')}}admin/assets/js/custom/ecommerce-chart.js"></script>
        <script src="{{asset ('')}}admin/assets/js/custom/custom.js"></script>
        </body>
        
</html>