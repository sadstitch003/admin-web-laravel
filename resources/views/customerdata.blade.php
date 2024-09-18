<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Customer Insert</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
              <!-- Logo SVG code here -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">MonoMode</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div>Dashboard</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Product</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('productMaster') }}" class="menu-link">
                  <div>Product Master</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('productInsert') }}" class="menu-link">
                  <div>Input/Update Product</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Transactions</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('transaction') }}" class="menu-link">
                  <div>Transaction Header</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('transactionProduct') }}" class="menu-link">
                  <div>Transaction Detail</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Customer</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('customerData') }}" class="menu-link">
                  <div>Customer Data</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('customerInsert') }}" class="menu-link">
                  <div>Input/Update Customer</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <div class="layout-page">
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            Customer/<b>Customer Insert</b>
          </div>
        </nav>

        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-12 mb-4 order-0">
              <div class="card">
                <div class="row p-5">
                  <h3>Customer Data</h3>
                  <form action="#" method="POST">
                    <div class="form">
                      <div class="row">
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-id" class="form-label">Customer ID</label>
                          <input type="text" id="cust-id" name="ID" placeholder="auto generated by system"
                            class="form-control shadow-none" disabled>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-username" class="form-label">Username</label>
                          <input type="text" id="cust-username" name="USERNAME" placeholder="Username"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-name" class="form-label">Name</label>
                          <input type="text" id="cust-name" name="NAME" placeholder="Name"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-gender" class="form-label">Gender</label>
                          <select name="GENDER" id="cust-gender" class="form-select shadow-none" required>
                            <option value="M" selected>Male</option>
                            <option value="F">Female</option>
                          </select>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-email" class="form-label">Email</label>
                          <input type="email" id="cust-email" name="EMAIL" placeholder="example@gmail.com"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-address" class="form-label">Address</label>
                          <input type="text" id="cust-address" name="ADDRESS" placeholder="Address"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-phone" class="form-label">Phone</label>
                          <input type="text" id="cust-phone" name="PHONE" placeholder="62XXXXXXXX"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-12 mb-3">
                            <input type="submit" value="Save" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              © <script>
                document.write(new Date().getFullYear());
              </script>, made with ❤️ by <a href="https://www.monomode.id" target="_blank"
                class="footer-link fw-bolder">MonoMode</a>
            </div>
            <div>
              <a href="https://www.monomode.id" target="_blank" class="footer-link me-4">About</a>
              <a href="https://www.monomode.id" target="_blank" class="footer-link me-4">Help</a>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>